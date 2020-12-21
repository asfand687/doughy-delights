@extends('master')
@section('content')

<div class="hero">
  <div class="container"> 
    <div></div>
    <div class="content">
      <h2>Obeez Burger.</h2>
      <h3>Making People Happy</h3>
      <p>Flipping Burgers and Proud of it!</p>
      <div class="button-container">
        <a href="/menu" class="btn"><svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg> Order Now</a>
        <a href="/specials" class="btn btn-solid">Our Specials</a>
      </div>
    </div>
  </div>
</div>

<div class="items-grid">
  <div class="container">
    <div><a href="/specials"><img src="{{url('/img/fast-food.jpg')}}" alt="Image"/></a>
      <div class="caption">
        <h3>Our Specials</h3>
      </div>
    </div>
    <div><a href="#"><img src="{{url('/img/order.jpg')}}" alt="Image"/></a>
      <div class="caption">
        <h3>Orders</h3>
      </div>
    </div>
    <div><a href="gift_baskets"><img src="{{url('/img/choco.jpg')}}" alt="Image"/></a>
      <div class="caption">
        <h3>Gift Baskets</h3>
      </div>
    </div>
  </div>
</div>

<div class="welcome-description">
  <div class="container">
    <div class="text-data">
      <h2>Welcome to Doughy Delights</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quia qui totam amet neque sint, sapiente repellendus rerum dignissimos sit, aliquam odio enim culpa quo. Laboriosam, incidunt ea! Id, quas quis consequuntur ex necessitatibus voluptates?</p>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque doloribus sequi earum necessitatibus impedit, expedita deleniti numquam dolore, laboriosam minima libero maxime magnam eius eum.</p>
    </div>
    <div class="location">
    
        <h3>Our Location</h3>
        <a href="#"><img src="{{url('/img/location.png')}}" alt="Image"/></a>
      
    </div>
  </div>
</div>

@endsection