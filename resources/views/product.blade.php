@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $product->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <p>{{ $product->description }}</p>
                            <p><strong>Price:</strong> ${{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
