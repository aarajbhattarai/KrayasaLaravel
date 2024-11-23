@extends('vendor::layouts.master')

@section('content')
    <div>
        <h1>Vendor Dashboard</h1>
        <p>Welcome, {{ auth()->guard('vendor')->user()->name }}!</p>

        <div>
            <h2>Your Shop</h2>
            @if(auth()->guard('vendor')->user()->shop)
                <p>Shop Name: {{ auth()->guard('vendor')->user()->shop->name }}</p>
                <p>Shop URL: {{ auth()->guard('vendor')->user()->shop->url }}</p>
            @else
                <p>You haven't created a shop yet.</p>
                <a href="{{ route('vendor.shop.create') }}">Create Shop</a>
            @endif
        </div>

        <div>
            <h2>Your Products</h2>
            <a href="{{ route('vendor.products.create') }}">Add New Product</a>
        </div>

        <div>
            <a href="{{ route('vendor.logout') }}">Logout</a>
        </div>
    </div>
@endsection