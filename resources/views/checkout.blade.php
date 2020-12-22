@extends('master')
@section('content')

<div class="cart-checkout container">
  <h2>Checkout</h2>
  <div class="content">
    <form action="/order_place" method="POST">
      <h3 class="billing">Billing Details</h3>
      <p class="details">Please enter your details below</p>
      @csrf
      <p><input type="text" name="address1" placeholder="Address Line 1" required></p>
      <p><input type="text" name="address2" placeholder="Address Line 2"></p>
      <p class="payment">Payment Method</p>
      <input type="radio" name="payment_method" value="COD" checked> <span><strong>COD</strong></span>
      <p class="order">Order Type</p>
      <p><input id="delivery" type="radio" name="delivery" value="1" checked> <span><strong>Home Delivery(PKR 150 Delivery Charges)</strong></span></p>
      <p><input id="takeOut" type="radio" name="delivery" value="0"> <span><strong>Takeout</strong></span></p>
      <div>
        <h3 class="total">Total: PKR <span id="totalBill">{{$totalAmount}}</span></h3>
      </div>
      <button class="btn">Place Order</button>
    </form>
  </div>
</div>

@endsection