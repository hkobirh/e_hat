

<ul>
    @foreach($products as $product)
    <li><a href="{{ route('single.product', $product->slug) }}">{{$product->name}}</a></li>
    @endforeach
</ul>
