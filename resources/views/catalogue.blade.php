@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Product Catalogue</h1>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Price: ${{ $product->price }}</strong></p>
                            <div class="btn-group" style="justify-content: space-between; display: flex; gap: 16px">
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-secondary">View Details</a>
                                <a href="{{ route('product.addToCart', $product->id) }}" class="btn btn-primary">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
