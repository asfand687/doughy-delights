@extends('master')
@section('content')

<div class="product-detail pb-2">
  <div class="container card">
    <div class="img-div"><img src="{{url($product['gallery'])}}" alt=""></div>
    <div class="product-specs">
      <h2>{{$product['name']}}</h2>
      <span class="tag tag-teal">{{$product['category']}}</span>
      <h3 class="price">{{'PKR '.$product['price']}}</h3>
      <p class="description">{{$product['description']}}</p>
      <form action="/add_to_cart" method="POST">
        @csrf
          <div class="price-input">
            <p><strong>Quantity</strong></p>
            <div>
              <input type="text" name="quantity" value="{{$product['quantity']}}">
            </div>
          </div> 
          <input type="hidden" name="product_id" value="{{$product['id']}}">
          <input type="hidden" name="product_price" value="{{$product['price']}}">
          <button class="btn">Add to Cart</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection