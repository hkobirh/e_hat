<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){

        is_permitted( 'Orders' );

        $limit = $request->limit ?? 10;
        $sql   = Orders::select();
        if ( isset( $request->search ) ) {
            $data = $sql->where( 'name', "LIKE", "%$request->search%" )
                ->paginate( $limit );
        } else {
            $data = Orders::paginate( $limit );
        }

        if ( $request->ajax() ) {
            return view( 'backend/orders/orders-table', compact( 'data' ) );
        } else {
            return view( 'backend/orders/manage', compact( 'data' ) );
        }
    }

    public function view($id){
        $data = Orders::find($id);
        return view('backend/orders/view', compact('data'));
    }
    public function invoice($id){
        $data = Orders::find($id);
        return view('backend/orders/invoice', compact('data'));
    }
}
