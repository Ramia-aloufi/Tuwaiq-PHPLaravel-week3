@extends('layouts.app')

@section('content')
<div class="container">
<div class=" jumbotron jumbotron-fluid text-dark object-fit-cover my-2  rounded" style="    background:#EEEEEE ;">
<div class="row">

    <div class="col p-5">
        <h1 class="display-4 mb-4"> مع لارافل ،تجربة تسوق استثنائية </h1>
        <p class="lead">استكشف أحدث المنتجات بأسعار مذهلة!</p>
    </div>



</div>
</div>  
     <div class="row mb-5 gap-2 p-2">
     <h3>الفئات</h3>
     <a href="{{ route('all-category')}}" class="btn btn-outline-secondary col">الكل</a>
    @if(isset($data))
    @foreach($data as $category)
    <a href="{{ route('home-category', ['x' => $category->id]) }}" class="btn btn-outline-secondary col">{{ $category->itemGroupName }}</a>
    @endforeach
    @endif
    </div>
     <div class="row">
     <h3>المنتجات</h3>
    @if(isset($products))
    @foreach($products as $item)
        <div class="col-md-3">
            <div class="card mb-4 bg-white ">
                <img src="{{ $item->image }}" class="card-img-top img-fluid" alt="{{ $item->itemName }}"style="height: 250px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->itemName }}</h5>
                    <p class="card-text">{{ $item->color }}</p>
                    <p class="card-text"> ${{ $item->price }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <a href="{{ route('add-to-cart', ['x' => $item->id]) }}" class="btn btn-sm btn-secondary">add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    @endif
    </div>
</div>
@endsection