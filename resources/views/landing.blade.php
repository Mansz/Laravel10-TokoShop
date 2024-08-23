@extends('filament::layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Selamat Datang di Tokoshop</h1>
        <p>Temukan produk terbaik kami dan pesan sekarang juga!</p>
        
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Kategori: {{ $product->category->name }}</p>
                            <p class="card-text">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="card-text">Stok: {{ $product->stock }}</p>

                            <form action="{{ route('orders.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif