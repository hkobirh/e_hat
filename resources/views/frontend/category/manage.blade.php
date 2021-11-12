@if($data->isEmpty())
    <div><h2>No data Found !</h2></div>
@endif
@foreach ($data as $product)

    <div class="product-wrap">
        <div class="product text-center">
            <figure class="product-media">
                <a href="#">
                    <img src="{{ $product->thumbnail }}" alt="Product" width="300"
                         height="338" />
                    <img src="{{ json_decode($product->gallery)[0] }}" alt="Product" width="300"
                         height="338" />
                </a>
                <div class="product-action-horizontal">
                    <a href="{{ route('cart.store') }}" data-slug="{{ $product->slug }}"
                       class="btn-product-icon cart-product w-icon-cart" title="Add to cart" id="add-to-cart"></a>
                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                       title="Wishlist"></a>
                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                       title="Compare"></a>
                    <a href="{{ route('product.quick.view', $product->slug) }}" class="btn-product-icon btn-quickview w-icon-search"
                       id="btnQuickview" title="Quick View"></a>
                </div>
            </figure>
            <div class="product-details">
                <div class="product-cat">
                    <a href="#">Electronics</a>
                </div>
                <h3 class="product-name">
                    <a href="{{ route('single.product', $product->slug) }}">{{ $product->name }}</a>
                </h3>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="#" class="rating-reviews">(10 reviews)</a>
                </div>
                <div class="product-pa-wrapper">
                                        <div class="product-price">
                                                <ins class="new-price">&#2547; {{ $product->price }}</ins>
                                        </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
