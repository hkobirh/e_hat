<?php

namespace App\Http\Controllers\Admin;


use Exception;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = Product::take('20')->get();
        return view( 'backend/products/manage', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data['brands']     = Brands::select( 'id', 'name' )->get();
        $data['categories'] = Category::select( 'id', 'root', 'name' )->where( 'root', 0 )->get();
        return view( 'backend/products/create', $data );
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request ) {

        try {
            $data = $request->except( 'brand', 'category', 'thumbnail' );

            $data['brand_id']    = $request->brand;
            $data['category_id'] = $request->category;
            $data['slug']        = slugify( $request->name );
            $data['create_by']   = Auth::id();


            $file_names = [];
            $gallery    = $request->file( 'gallery' );
            $thumbnail  = $request->file( 'thumbnail' )[0];

            $file_name = rand( 00000, 99999 ) . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(300,200)->save(storage_path('app/public/storage/uploads/products/'.$file_name));


            foreach ( $gallery as $row ) {
                $name = rand( 00000, 99999 ) . uniqid() . '.' . $row->getClientOriginalExtension();
                Image::make( $row )->resize( 200, 100 )->save( storage_path( 'app/public/storage/uploads/products/' . $name ) );
                array_push( $file_names, $name );
            }

            $data['thumbnail'] = $file_name;
            $data['gallery']   = json_encode($file_names);

            Product::create( $data );

            $message = __( 'my-alert.product.create.success' );

        } catch ( Exception $e ) {
            $message = $e->getMessage();
           //  $status  = false;
            // $message = 'Database error: ' . __( 'my-alert.product.create.error' );
        }
        return response()->json( [
            'status'  => $status ?? true,
            'message' => $message,
        ] );
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        //
    }
}
