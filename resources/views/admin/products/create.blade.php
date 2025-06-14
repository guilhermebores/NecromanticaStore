@extends('layouts.app')

@section('content')
<div class="container bg-black text-white py-4">
    <h1 class="h4 fw-bold mb-4">Adicionar Produto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" name="name" id="name" class="form-control bg-secondary text-white" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Preço:</label>
            <input type="number" name="price" id="price" class="form-control bg-secondary text-white" value="{{ old('price') }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição:</label>
            <textarea name="description" id="description" rows="4" class="form-control bg-secondary text-white">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Imagem:</label>
            <input type="file" name="image" id="image" class="form-control bg-secondary text-white" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Salvar Produto</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-light ms-2">← Voltar</a>
    </form>
</div>
@endsection