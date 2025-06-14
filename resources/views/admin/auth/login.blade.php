@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6 bg-dark text-white p-5 rounded shadow">
        <h2 class="text-center mb-4 text-danger">Login</h2>

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input 
                    type="email" 
                    class="form-control bg-black text-white border-secondary" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="Digite seu email" 
                    required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input 
                    type="password" 
                    class="form-control bg-black text-white border-secondary" 
                    id="password" 
                    name="password" 
                    placeholder="Digite sua senha" 
                    required>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-danger">Entrar</button>
            </div>

            <div class="text-center">
                <a href="{{ route('admin.create') }}" class="text-decoration-none text-light">Criar Admin</a>
            </div>
        </form>
    </div>
</div>
@endsection