
<div class="cart-header">
    <span>Shopping Cart</span>
    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
</div>

<div class="products" style="overflow:scroll">
    @foreach(Cart::getContent() as $item)

        <div class="product product-cart">
            <div class="product-detail">
                <a href="#" class="product-name">{{$item->name}}</a>
                <div class="price-box">
                    <span class="product-quantity">{{$item->quantity}}</span>
                    <span class="product-price">&#2547; {{$item->price}}</span>
                </div>
            </div>
            <figure class="product-media">
                <a href="#">
                    <img src="{{$item->attributes->image}}" alt="product" width="84"
                         height="94" />
                </a>
            </figure>

            </figure>
            <button class="btn btn-link btn-close" id="cartItemRemove"data-url="{{route('cart.remove',$item->id)}}">
                <i class="fas fa-times"></i>
            </button>
        </div>
        {{-- @if($loop->index === 1)
            @break
        @endif --}}
    @endforeach
</div>

<div class="cart-total">
    <label>Subtotal:</label>
    <span class="price">&#2547; {{Cart::getSubtotal()}}</span>
</div>

<div class="cart-action">
    <a href="{{route('cart.index')}}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
    <a href="{{route('checkout')}}" class="btn btn-primary  btn-rounded">Checkout</a>
</div>
