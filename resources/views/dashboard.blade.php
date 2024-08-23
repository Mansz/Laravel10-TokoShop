@extends('filament::layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard Tokoshop</h1>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Lihat Produk</a>
    </div>
@endsection