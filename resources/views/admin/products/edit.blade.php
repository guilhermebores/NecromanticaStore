@extends('layouts.app')

@section('content')
<div class="container bg-black text-white py-4">
    <h1 class="h4 fw-bold mb-4">Editar Produto</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" name="name" id="name" class="form-control bg-secondary text-white" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Preço:</label>
            <input type="number" name="price" id="price" class="form-control bg-secondary text-white" value="{{ old('price', $product->price) }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Quantidade em Estoque:</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}">

        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Descrição:</label>
            <textarea name="description" id="description" rows="4" class="form-control bg-secondary text-white">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagem Atual:</label><br>
            @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="Imagem do Produto" class="img-thumbnail mb-2" style="width: 150px; height: 150px; object-fit: cover;">
            @else
            <p class="text-muted">Nenhuma imagem disponível.</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Nova Imagem (opcional):</label>
            <input type="file" name="image" id="image" class="form-control bg-secondary text-white" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Produto</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-light ms-2">← Voltar</a>
    </form>
</div>
@endsection
