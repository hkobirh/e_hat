<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Orders;
use App\Models\Order_items;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Exception;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::getSubtotal() > 0) {
            return view('frontend.cart.cart-index');
        } else {
            return redirect()->route('index');
        }

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function checkout()
    {
        if (Cart::getSubtotal() < 1) return redirect()->route('index');
        $items = Cart::getContent();
        return view('frontend.cart.checkout', compact('items'));
    }

    /**
     * @param Request $request
     * @return string|void
     */
    public function new_order(Request $request)
    {
        if (Cart::getSubtotal() < 1) return redirect()->route('index');
        $request->validate([
            "firstname"     => "required",
            "lastname"      => "required",
            "country"       => "required",
            "address"       => "required",
            "mobile"        => "required",
            "shipping_type" => "required",
            "pay_method"    => "required",
        ]);
        try {
            $billing = Billing::create([
                "firstname" => $request->firstname,
                "lastname"  => $request->lastname,
                "country"   => $request->country,
                "address"   => $request->address,
                "mobile"    => $request->mobile,
            ]);
            if ($request->s_firstname !== null) {
                $shipping = Shipping::create([
                    "s_firstname" => $request->s_firstname,
                    "s_lastname"  => $request->s_lastname,
                    "s_country"   => $request->s_country,
                    "s_address"   => $request->s_address,
                    "s_mobile"    => $request->s_mobile,
                ]);
            } else {
                $shipping = Shipping::create([
                    "s_firstname" => $request->firstname,
                    "s_lastname"  => $request->lastname,
                    "s_country"   => $request->country,
                    "s_address"   => $request->address,
                    "s_mobile"    => $request->mobile,
                ]);
            }

            $order = Orders::create([
                'customer_id'   => session()->get('customer_id'),
                'shipping_id'   => $shipping->id,
                'billing_id'    => $billing->id,
                'amount'        => Cart::getSubTotal(),
                'pay_method'    => $request->pay_method,
                'shipping_type' => $request->shipping_type,
            ]);

            foreach (Cart::getContent() as $item){
                Order_items::create([
                    'order_id'=>$order->id,
                    'product_id'=>$item->id,
                    'product_name'=>$item->name,
                    'product_slug'=>slugify($item->name),
                    'product_price'=>$item->price,
                    'product_qty'=>$item->quantity,

                ]);
            }
            Cart::clear();
            return view('frontend.cart.order-complete',compact('order'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $product = Product::where('slug', $request->slug)->where('status', Product::ACTIVE)->first();
        if ($product) {
            Cart::add([
                'id'         => $product->id,
                'name'       => $product->name,
                'price'      => $product->price,
                'quantity'   => 1,
                'attributes' => [
                    'slug'  => $product->slug,
                    'image' => $product->thumbnail,
                ],
            ]);
            return response()->json([
                'status'     => true,
                'cart_count' => Cart::getContent()->count(),
                'message'    => "You have add " . $product->name . " to your shopin card.",
                'product'    => $product,
            ], 200);
        }
        return response()->json([
            'error' => 'Product not found',
        ], 404);

    }

    public function get_cart()
    {
        $items = Cart::getContent();
        return view('frontend.cart.cart-items', compact('items'));
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
     *
     *  Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\JsonResponse|void
     *
     */
    public function destroy($id)
    {
        $deleteId = Cart::remove($id);
        if ($deleteId) {
            return response()->json([
                'cart_count' => Cart::getContent()->count(),
                'message'    => '1 Item deleted successfully.',
            ]);
        }

    }

    public function cart_clear()
    {
        $clear = Cart::clear();
        if ($clear) {
            $status = true;
            $message = 'Cart data cleared.';
        } else {
            $status = false;
            $message = 'Cart data can not be cleared.';
        }
        return response()->json([
            'status'  => $status,
            'message' => $message,
        ]);
    }
}
