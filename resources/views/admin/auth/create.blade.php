@extends('layouts.app')

@section('content')
<div class="container bg-black text-white py-5">
    <h1 class="h3 mb-4">Criar Conta de Administrador</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card bg-dark text-white shadow-sm">
        <div class="card-body">
            <h2 class="h5 mb-4">Criar Conta de Usuário</h2>

            <form method="POST" action="{{ route('user.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="user_name" class="form-label">Nome</label>
                    <input type="text" name="name" id="user_name" value="{{ old('name') }}" required class="form-control bg-dark text-white border-light">
                </div>

                <div class="mb-3">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" name="email" id="user_email" value="{{ old('email') }}" required class="form-control bg-dark text-white border-light">
                </div>

                <div class="mb-3">
                    <label for="user_password" class="form-label">Senha</label>
                    <input type="password" name="password" id="user_password" required class="form-control bg-dark text-white border-light">
                </div>

                <div class="mb-4">
                    <label for="user_password_confirmation" class="form-label">Confirmar Senha</label>
                    <input type="password" name="password_confirmation" id="user_password_confirmation" required class="form-control bg-dark text-white border-light">
                </div>

                <button type="submit" class="btn btn-success w-100">Finalizar Cadastro</button>
            </form>
        </div>
    </div>

    <div class="mt-3 text-center">
        <a href="{{ route('admin.login') }}" class="text-info text-decoration-none">Já tem uma conta? Faça login</a>
    </div>
</div>
@endsection
