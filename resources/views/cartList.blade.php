@extends('master')
@section('content')

<div class="cart-list">
  <div class="container">
    <h2>Cart List</h2>
    <div class="content">
    @foreach ($products as $product)
        <div>
          <img src="{{url($product->gallery)}}" alt="">
        </div>
        <div>
          <h3>{{$product->name}}</h3>
          <h5 class="quantity">Quantity: {{$product->product_quantity}}</h5>
          <p class="price">Price: PKR {{$product->total_price}}</p>
        </div>
        <div>
          <a class="remove-button" href="/removecart/{{$product->cart_id}}">
            <svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"/></svg>
          </a>
        </div>
    @endforeach
    </div>
    <div class="checkout-btn-container">
      <a href="/checkout" class="btn">Checkout</a>
    </div>
  </div>
</div>

@endsection