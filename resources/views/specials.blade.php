@extends('master')
@section('content')

<div class="product-page container pb-2">
  <h2>Our Specials</h2>
  <div class="menu-grid">
    @foreach ($products as $product)
    <a href="/product/{{$product['id']}}">
        <div class="card">
          <div class="card-header">
            <img src="{{url($product['gallery'])}}" alt="" />
          </div>
          <div class="card-body">
          <span class="tag tag-teal">{{$product['category']}}</span>
          <h4>{{$product['name']}}</h4>
          <p>{{ \Illuminate\Support\Str::limit($product['description'], 40, $end='...') }}</p>
          </div>
        </div>
      </a>
      @endforeach
  </div>
</div>

@endsection