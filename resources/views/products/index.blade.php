@extends('layouts.app')

@section('content')
<div class="container bg-black text-white py-4">
    <h1 class="h3 fw-bold text-light mb-4">Catálogo de Produtos</h1>

    <form action="{{ url('/products') }}" method="GET" class="mb-4">
        <div class="row g-2">
            <div class="col-md-9">
                <input type="text" name="search" placeholder="Buscar produtos..."
                       value="{{ request('search') }}"
                       class="form-control bg-secondary text-white border-0">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Buscar</button>
            </div>
        </div>
    </form>

    <div class="row g-4">
        @foreach ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 bg-secondary text-white border-0 shadow">
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="card-img-top object-fit-cover"
                         alt="{{ $product->name }}"
                         style="height: 350px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text small text-light">{{ $product->description }}</p>
                        <span class="h6 text-warning mb-3">R$ {{ number_format($product->price, 2, ',', '.') }}</span>

                        @auth
                            <form action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST" class="mt-auto">
                                @csrf
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <input type="number" name="quantity" value="1" min="1" required
                                           class="form-control bg-dark text-white text-center" style="width: 70px;">
                                    <button type="submit" class="btn btn-success flex-fill">
                                        Adicionar ao Carrinho
                                    </button>
                                </div>
                            </form>
                        @else
                            <p class="text-muted small mt-auto">Faça login para adicionar ao carrinho.</p>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
