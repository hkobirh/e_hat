<div class="row gutter-lg">
    <div class="col-md-6 mb-4 mb-md-0">
        <div class="product-gallery product-gallery-sticky mb-0">
            <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                <figure class="product-image">
                    <img src="{{ $product->thumbnail }}" data-zoom-image="{{ $product->thumbnail }}"
                         alt="Water Boil Black Utensil" width="800" height="900">
                </figure>
                @foreach (json_decode($product->gallery) as $image)
                    <figure class="product-image">
                        <img src="{{ $image }}" data-zoom-image="{{ $image }}"
                             alt="Water Boil Black Utensil" width="800" height="900">
                    </figure>
                @endforeach
            </div>
            <div class="product-thumbs-wrap">
                <div class="product-thumbs">
                    <div class="product-thumb active">
                        <img src="{{ $product->thumbnail }}" alt="Product Thumb" width="103" height="116">
                    </div>
                    @foreach (json_decode($product->gallery) as $image[0])
                        <div class="product-thumb">
                            <img src="{{ $image }}" alt="Product Thumb" width="103" height="116">
                        </div>
                    @endforeach
                </div>
                <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
            </div>
        </div>
    </div>
    <div class="col-md-6 overflow-hidden p-relative">
        <div class="product-details scrollable pl-0">
            <h2 class="product-title">{{ $product->name }}</h2>
            <div class="product-bm-wrapper">
                <figure class="brand">
                    <img src="{{ asset('frontend/assets/images/products/brand/brand-1.jpg') }}" alt="Brand" width="102"
                         height="48"/>
                </figure>
                <div class="product-meta">
                    <div class="product-categories">
                        Category:
                        <span class="product-category"><a href="#">{{ $category->name }}</a></span>
                    </div>
                    <div class="product-sku">
                        SKU: <span>{{ $product->sku_code }}</span>
                    </div>
                </div>
            </div>

            <hr class="product-divider">

            <div class="product-price">&#2547; {{ $product->price }}</div>

            <div class="ratings-container">
                <div class="ratings-full">
                    <span class="ratings" style="width: 80%;"></span>
                    <span class="tooltiptext tooltip-top"></span>
                </div>
                <a href="#" class="rating-reviews">(3 Reviews)</a>
            </div>

            <div class="product-short-desc">
                <ul class="list-type-check list-style-none">
                    <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                </ul>
            </div>

            <hr class="product-divider">

            <div class="product-form product-variation-form product-color-swatch">
                <label>Color:</label>
                <div class="d-flex align-items-center product-variations">
                    <a href="#" class="color" style="background-color: #ffcc01"></a>
                    <a href="#" class="color" style="background-color: #ca6d00;"></a>
                    <a href="#" class="color" style="background-color: #1c93cb;"></a>
                    <a href="#" class="color" style="background-color: #ccc;"></a>
                    <a href="#" class="color" style="background-color: #333;"></a>
                </div>
            </div>
            <div class="product-form product-variation-form product-size-swatch">
                <label class="mb-1">Size:</label>
                <div class="flex-wrap d-flex align-items-center product-variations">
                    <a href="#" class="size">Small</a>
                    <a href="#" class="size">Medium</a>
                    <a href="#" class="size">Large</a>
                    <a href="#" class="size">Extra Large</a>
                </div>
                <a href="#" class="product-variation-clean">Clean All</a>
            </div>

            <div class="product-variation-price">
                <span></span>
            </div>

            <div class="product-form">
                <div class="product-qty-form">
                    <div class="input-group">
                        <input class="quantity form-control" type="number" min="1" max="10000000">
                        <button class="quantity-plus w-icon-plus"></button>
                        <button class="quantity-minus w-icon-minus"></button>
                    </div>
                </div>
                <button class="btn btn-primary btn-cart">
                    <i class="w-icon-cart"></i>
                    <span>Add to Cart</span>
                </button>
            </div>

            <div class="social-links-wrapper">
                <div class="social-links">
                    <div class="social-icons social-no-color border-thin">
                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                        <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                        <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                    </div>
                </div>
                <span class="divider d-xs-show"></span>
                <div class="product-link-wrapper d-flex">
                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"></a>
                    <a href="#" class="btn-product-icon btn-compare btn-icon-left w-icon-compare"></a>
                </div>
            </div>
        </div>
    </div>
</div>
