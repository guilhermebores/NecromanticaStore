@extends('layouts.app')

@section('content')
<div class="container bg-black text-white py-4">
    <h1 class="h4 fw-bold mb-4">Gerenciar Produtos</h1>

    <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">Adicionar Produto</a>

    <div class="table-responsive">
        <table class="table table-dark table-bordered align-middle text-white">
            <thead class="table-light text-dark">
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td style="width: 120px;">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                            <span class="text-muted">Sem imagem</span>
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="margin-left: 8px;" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
