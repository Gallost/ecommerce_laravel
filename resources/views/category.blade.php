@extends('layouts.app')

<script>
    document.addEventListener('click', function(event) {
        console.log(event.target);
        console.log(event.target.id);
        // console.log(window.location.href);
        let target = event.target.id;
        if (target) {
            fetch('{{ route("clickstream.collect") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    target: target,
                    route: window.location.href.split('/').slice(3).join()
                })
            })
            .then(response => {
                if (!response.ok) {
                    console.error('Failed to log clickstream event');
                }
                else {
                    console.log(response.text());
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });
</script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{$categoryName}}</h1>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img id="img-{{$product->id}}" src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 id="name-{{$product->id}}" class="card-title">{{ $product->name }}</h5>
                            <p id="desc-{{$product->id}}" class="card-text">{{ $product->description }}</p>
                            <p id="price-{{$product->id}}" class="card-text fw-bold">Price: ${{ $product->price }}</p>
                            <div class="btn-group" style="justify-content: space-between; display: flex; gap: 16px">
                                <a id="detail-{{$product->id}}" href="{{ route('product.show', $product->id) }}" class="btn btn-secondary">View Details</a>
                                <a id="cart-{{$product->id}}" href="{{ route('product.addToCart', $product->id) }}" class="btn btn-primary">Add To Cart</a>
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
