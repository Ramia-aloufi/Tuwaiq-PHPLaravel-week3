@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="alert alert-success text-center">أهلا بكم في موقعي</h1>
    <h1>الفئات</h1>
     <div class="row">
     <a href="{{ route('all-category')}}" class="col">
                    <div class="card rounded">
                        <div class="card-body">
                            <h5 class="card-title">الكل</h5>
                            
                        </div>
                    </div>
                </a>
    @if(isset($data))
    @foreach($data as $category)
    <a href="{{ route('home-category', ['x' => $category->id]) }}" class="col">
                    <div class="card rounded">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->itemGroupName }}</h5>
                            
                        </div>
                    </div>
                </a>
    @endforeach
    @endif
    </div>
    <h1>المنتجات</h1>
     <div class="row">
    @if(isset($products))
    @foreach($products as $product)
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $product->itemName }}</h5>
        <p class="card-text">Price: ${{ $product->price }}</p>
        <p class="card-text">Quantity: {{ $product->qty }}</p>
        <p class="card-text">Group Number: {{ $product->itemGroupNum }}</p>
        <p class="card-text">Color: {{ $product->color }}</p>
        <a href="{{ route('add-to-cart', ['x' => $product->id]) }}" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to Cart</a>
    </div>
</div>
    @endforeach
    @endif
    </div>
</div>
@endsection