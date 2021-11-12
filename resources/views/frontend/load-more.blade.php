


 @php($sl = 0)
 @foreach ($new_products as $product)
     <div class="product-wrap">
         <div class="product text-center">
             <figure class="product-media">
                 <a href="{{ route('single.product', $product->slug) }}">
                     <img src="{{ $product->thumbnail }}" alt="Product" width="300" height="338" />
                     <img src="{{ json_decode($product->gallery)[0] }}" alt="Product" width="300" height="338" />
                 </a>
                 <div class="product-action-vertical">
                     <a href="{{ route('cart.store') }}" data-slug="{{ $product->slug }}"
                         class="btn-product-icon cart-product w-icon-cart" title="Add to cart" id="add-to-cart"></a>
                     <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                     <a href="{{ route('product.quick.view', $product->slug) }}"
                         class="btn-product-icon btn-quickview w-icon-search" title="Quickview" id="btnQuickview"></a>
                 </div>
             </figure>
             <div class="product-details">
                 <h4 class="product-name"><a
                         href="{{ route('single.product', $product->slug) }}">{{ $product->name }}</a>
                 </h4>
                 <div class="ratings-container">
                     <div class="ratings-full">
                         <span class="ratings" style="width: 60%;"></span>
                         <span class="tooltiptext tooltip-top"></span>
                     </div>
                     <a href="#" class="rating-reviews">(1 Reviews)</a>
                 </div>
                 <div class="product-price">
                     @if ($product->off_date_start <= date('Y-m-d') && $product->off_date_end >= date('Y-m-d'))

                         <div style="font-weight: bold; font-size:15px">
                             Discount :
                             <span style="color: rgb(3, 68, 12); font-weight:bold">
                                 {{round((100 * ($product->price - $product->off_price)) / $product->price)}} %
                             </span>
                         </div>
                         <del>&#2547; {{ $product->price }}</del>
                         <ins class="new-price">&#2547; {{ $product->off_price }}</ins>
                     @else
                         <ins class="new-price">&#2547; {{ $product->off_price }}</ins>
                     @endif
                 </div>
             </div>
         </div>
     </div>
     @php($sl = $loop->iteration)
 @endforeach



 @if ($sl === 15)
             <span class="loadingmorebtn" id="loadMoreBtn" data-id="{{ $product->id }}"
                 data-url="{{ route('load.more') }}">Load more product <i class="w-icon-long-arrow-right"></i></span>
 @endif