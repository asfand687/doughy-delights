@extends('master')
@section('content')

<div class="product-detail">
  <div class="container card">
    <div class="img-div"><img src="{{url($product['gallery'])}}" alt=""></div>
    <div class="product-specs">
      <h2>{{$product['name']}}</h2>
      <span class="tag tag-teal">{{$product['category']}}</span>
      <h3 class="price">{{'PKR '.$product['price']}}</h3>
      <p class="description">{{$product['description']}}</p>
      <div class="price-input">
        <p><strong>Quantity</strong></p>
        <div>
          <input type="text" value="{{$product['quantity']}}">
        </div>
      </div>
      <span><strong> &nbsp;</strong></span>  
      <div>
        <form action="/add_to_cart" method="POST">
          @csrf
          <input type="hidden" name="product_id" value="{{$product['id']}}">
          <button class="btn">Add to Cart</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection