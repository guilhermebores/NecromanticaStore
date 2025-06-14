@extends('layouts.app')

@section('content')
<div class="container bg-black   text-white py-4">
    <h1 class="h3 mb-4">Carrinho de Compras</h1>

    @if(session('successo'))
        <div class="alert alert-success">
            {{ session('successo') }}
        </div>
    @endif

    @if($cartItems->isEmpty())
        <p>Seu carrinho está vazio.</p>
    @else
        <div class="table-responsive mb-4">
            <table class="table table-dark table-hover align-middle">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>R$ {{ number_format($item->product->price, 2, ',', '.') }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item->product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Remover este item do carrinho?')">Remover</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="table-dark">
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total:</strong></td>
                        <td><strong>R$ {{ number_format($total, 2, ',', '.') }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <form action="{{ route('payment.form') }}" method="GET">
            <button type="submit" class="btn btn-success">Ir para Pagamento</button>
        </form>
    @endif
</div>
@endsection
