@extends('layouts.app')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('clear-cart-btn').addEventListener('click', function() {
            // Send an AJAX request to the route
            fetch('{{ route("cart.clear") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                // Handle the response
                if (response.ok) {
                    // Reload the page or perform any other action
                    window.location.reload();
                } else {
                    console.error('Failed to clear cart');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Shopping Cart</h1>
            @if($cartItems->isEmpty())
                <p>Your cart is empty</p>
            @else
                @foreach($cartItems as $item)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                    <p class="card-text">Price: ${{ $item->price }}</p>
                                    <!-- You can add more details here if needed -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <button id="clear-cart-btn" class="btn btn-danger">Clear Cart</button>
            @endif
        </div>
    </div>
</div>
@endsection
