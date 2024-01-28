<!-- resources/views/checkout.blade.php -->

@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container mt-4">
  <div class="row">
      <div class="col-8">
         <h2>Order Summary</h2>
            <table class="table">
             <thead>
               <tr>
                   <th>Product</th>
                   <th>Price</th>
                   <th>Quantity</th>
                   <th>Sub-Total</th>
               </tr>
             </thead>
             <tbody>
               @foreach($cartItems as $cartItem)
                <tr>
                  <td>{{ $cartItem->itemName }}</td>
                   <td>${{ $cartItem->price }}</td>
                   <td>{{ $cartItem->quantity }}</td>
                   <td>${{ $cartItem->price * $cartItem->quantity }}</td>
                </tr>
               @endforeach
             </tbody>
             </table>
    <div class="subtotal">
         <span>Subtotal:</span>
         <span>${{$total}}</span>
    </div>
     <div class="total">
         <span>Total:</span>
        <span>${{$total}}</span>
     </div>
     <div class="coupon my-4">
         <input type="text" class="form-control" placeholder="Enter Coupon Code">
         <button type="button" class="btn btn-primary">Apply Coupon</button>
     </div>
     <div class="checkout my-4">
         <a href="{{ route('checkout') }}" class="btn btn-success btn-block">Checkout</a>
     </div>

  </div>
</div>
@endsection
