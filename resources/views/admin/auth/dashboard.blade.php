@extends('layouts.app')

@section('content')
<div class="container bg-black text-white py-4">
    <h1 class="h4 fw-bold mb-4">Painel do Administrador</h1>
    <p class="mb-4">Bem-vindo ao painel de administração.</p>

    <div class="d-flex flex-column gap-3">
        <a href="{{ route('admin.products.index') }}" class="btn btn-primary">
            Ver Todos os Produtos
        </a>

        <a href="{{ route('admin.products.create') }}" class="btn btn-success">
            Adicionar Novo Produto
        </a>
    </div>
</div>
@endsection