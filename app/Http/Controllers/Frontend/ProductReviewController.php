<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function store(Request $request){
        ProductReview::create([
            'customer_id'=> session()->get('customer_id'),
            'product_id'=>$request->product_id,
            'rating'=>$request->rating,
            'message'=>$request->message,
        ]);
        return redirect()->back();
    }

    public function view(){
        $data = ProductReview::take('20')->get();
        return view('backend.reviews.manage',compact('data'));
    }
}
