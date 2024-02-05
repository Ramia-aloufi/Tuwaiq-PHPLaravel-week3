@extends('layouts.app')

@section('content')
<div class="row" class="bg-white" style="font-family:Cairo;">
        <div class="col-3 navbar-light bg-white shadow-sm min-vh-100 ">
            <div class="position-sticky">
                <ul class="nav flex-column">
                <a href="{{route('item-group')}}" class="nav-link" style="color:#666">الفئات</a>
                    <a href="{{route('items')}}" class="nav-link"style="color:#666">المنتجات</a>
                    <!-- Add more sidebar links as needed -->
                </ul>
            </div>
        </div>
        <div class="col-9">
        <main class="py-4">
            @yield('dashboard_content')
        </main>
            </div>
    </div>
    @endsection