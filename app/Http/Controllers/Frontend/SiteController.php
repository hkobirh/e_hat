<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order_items;
use App\Models\Orders;
use App\Models\ProductReview;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

// use Illuminate\Support\Facades\App;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $customer = Customer::all();
        if ($customer->isEmpty()) session()->forget('customer_id');
        $slider = Slider::all();
        return view('frontend.includes.index', compact('slider'));
    }

    /**
     *
     * @param Request $request
     * @return array
     */
    public function home_search(Request $request){
        $request->validate([
            'category'=>'required',
            'search'=>'required',
        ]);
        $products = Product::where('category_id',$request->category)->orderBy('id','DESC')
            ->where('name','like','%'.$request->search.'%')->take(10)->get();

        return view('frontend.header-search-product', compact('products'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function load_more(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id) {
                $data['new_products'] = Product::where('id', '<', $request->id)
                    ->where('status', 'active')
                    ->orderBy('id', 'DESC')
                    ->select('id', 'name', 'slug', 'price', 'thumbnail', 'gallery', 'off_price',
                        'off_date_start', 'off_date_end')
                    ->take(15)->get();

            } else {
                $data['new_products'] =  Product::where('status', 'active')
                    ->orderBy('id', 'DESC')
                    ->select('id', 'name', 'slug', 'price', 'thumbnail', 'gallery', 'off_price',
                        'off_date_start', 'off_date_end')
                    ->take(15)->get();
//                Cache()->forget('new_prodcut');
//                $data['new_products'] = Cache('new_product',function (){
//                    return Product::where('status', 'active')
//                        ->orderBy('id', 'DESC')
//                        ->select('id', 'name', 'slug', 'price', 'thumbnail', 'gallery', 'off_price',
//                            'off_date_start', 'off_date_end')
//                        ->take(15)->get();
//                });
            }
        }
        return view('frontend.load-more', $data);
    }


    public function load_more_cat_product(Request $request)
    {

        if ($request->ajax()) {
            if ($request->id) {
                $data['products'] = Product::where('id', '<', $request->id)
                    ->where('status', 'active')
                    ->orderBy('id', 'DESC')
                    ->select('id', 'name', 'slug', 'price', 'thumbnail', 'gallery', 'off_price',
                        'off_date_start', 'off_date_end')
                    ->take(10)->get();

            } else {
                $data['products'] = Product::where('status', 'active')
                    ->orderBy('id', 'DESC')
                    ->select('id', 'name', 'slug', 'price', 'thumbnail', 'gallery', 'off_price',
                        'off_date_start', 'off_date_end',)
                    ->take(10)->get();
            }
        }
        return view('frontend.load-more-cat-items', $data);
    }

    public function change_lang(Request $request)
    {
        //  App::setLocale($request->lang);
        session()->put('lang', $request->lang);
    }

    public function product_quick_view($slug)
    {
        $product = Product:: with('category')->where('slug', $slug)->first();
        $category = Category:: where('id', $product->category_id)->first();
        if ($product) {
            return view('frontend/product-quick-view', compact('product', 'category'));
        } else {
            return response()->json([
                'message' => 'Prodcut not found !',
            ], 404);
        }

    }

    public function single_product($slug)
    {
        $data['product'] = Product::with('reviews')-> with('brand')->with('category')->where('slug', $slug)->where('status', Product::ACTIVE)->first();
        $data['order_item'] = Order_items::with('orders')->where('product_slug',$slug)->first();
        $data['reviews'] = ProductReview::where('product_id',$data['product']->id)->where('status','success')->get();
        $data['is_review'] = $this->is_review_permitted($data['product']->id);
        if ($data['product']) {
            $data['related_products'] = Product::where('category_id', $data['product']->category_id)->where('status',
                Product::ACTIVE)->get();
            $data['vendor'] = Product::where('status', 'active')
                ->select('name', 'slug', 'price', 'thumbnail', 'gallery', 'off_price', 'off_date_start',
                    'off_date_end')
                ->orderBy('id', 'DESC')
                ->take(3)->get();

            return view('frontend.single-product', $data);
        }
        return view('frontend.includes.main');
    }

    private function is_review_permitted($product)
    {
        if(session()->has('customer_id')){
            $orders = Orders::where('customer_id',session()->get('customer_id'))->where('order_status','success')->get();
            foreach ($orders as $order){
                   foreach ($order->order_items as $item){
                      if($product === $item->product_id){
                          return true;
                      }
                   }
            }
        }
        return  false;
    }


    public function category_products(Request $request, $slug1, $slug2 = null, $slug3 = null)
    {
        $brands = Brands::select('id', 'name')->get();
        $new_products = Product::where('status', 'active')->select('name', 'slug', 'price',
            'thumbnail', 'gallery', 'off_price', 'off_date_start', 'off_date_end')
            ->orderBy('id', 'DESC')
            ->take(10)->get();

        if ($slug3) {
            $category = Category::where('slug', $slug3)->first();
            $cats[] = $category->id;
        } else {
            $category = Category::where('slug', $slug2)->first();
            $cats = [$category->id];
            foreach ($category->sub_cats as $sub_cat) {
                array_push($cats, $sub_cat->id);
            }
        }
        $root_category = Category::where('id', $category->root)->first();

        $limit = $request->limit ?? 18;
        $sql = Product::with('category', 'brand')->where('status', Product::ACTIVE)->whereIn('category_id', $cats)->select();

        if (isset($request->order) || isset($request->brands) || (isset($request->min) && isset($request->max))) {

            if (isset($request->brands)) {
                $brandIds = [];
                $brands = explode(',', $request->brands);
                foreach ($brands as $brand) array_push($brandIds, $brand);
                $sql->whereIn('brand_id', $brandIds);
            }

            if (isset($request->min) && isset($request->max)) {
                $sql->whereBetween('price', [$request->min, $request->max]);
            }

            if (isset($request->order)) {
                switch ($request->order) {
                    case 'price-high':
                        $data = $sql->orderBy('price', 'DESC')->paginate($limit);
                        break;
                    case 'price-low':
                        $data = $sql->orderBy('price', 'ASC')->paginate($limit);
                        break;
                    default:
                        $data = $sql->paginate($limit);
                        break;
                }
            }
        } else {
            $data = $sql->paginate($limit);
        }
        if ($request->ajax()) {
            return view('frontend.category.manage', compact('data', 'category', 'root_category', 'brands'));
        } else {
            return view('frontend.category.category-product', compact('data', 'category', 'root_category', 'brands'));
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function track_order(Request $request)
    {
        $order = null;
        if ($request->method() !== 'GET') {
            $order = Orders::findOrFail($request->order_id);
        }
        return view('frontend.track-order', compact('order'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
