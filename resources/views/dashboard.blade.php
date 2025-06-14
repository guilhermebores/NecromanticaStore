@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-black card-body">
                    <h5 class="text-success mb-3">
                        Você está logado!
                    </h5>
                    <a href="{{ route('home') }}" class="btn btn-primary">
                        ← Voltar para a Página Inicial
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
