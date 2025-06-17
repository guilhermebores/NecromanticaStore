<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento - NecromanticaStore</title>
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>

<body>
    <div class="container">
        @php
        $total = 0;
        @endphp

        @if($cartItems->count() > 0)
        <h2>Resumo do Pedido</h2>
        <ul>
            @foreach($cartItems as $item)
            <li>
                {{ $item->product->name }} -
                R$ {{ number_format($item->product->price, 2, ',', '.') }} x
                {{ $item->quantity }}
            </li>
            @php
            $total += $item->product->price * $item->quantity;
            @endphp
            @endforeach
        </ul>
        <h3>Total: R$ {{ number_format($total, 2, ',', '.') }}</h3>
        @else
        <div class="alert alert-warning">Seu carrinho está vazio</div>
        @endif
        <a href="{{ route('cart.index') }}">
            <button type="button">← Voltar para o Carrinho</button>
        </a>

        <h1>Finalizar Pagamento</h1>

        <form action="{{ route('payment') }}" method="POST" class="payment-form">
            @csrf

            <div class="form-section">
                <h3>Informações do Cartão</h3>
                <label for="name">Nome no Cartão</label>
                <input type="text" id="name" name="name" required>

                <label for="card-number">Número do Cartão</label>
                <input type="text" id="card-number" name="card_number" required>

                <label for="card-expiry">Data de Expiração (MM/AA)</label>
                <input type="text" id="card-expiry" name="card_expiry" required>

                <label for="card-cvc">Código de Segurança (CVC)</label>
                <input type="text" id="card-cvc" name="card_cvc" required>
            </div>

            <div class="form-section">
                <h3>Endereço de Entrega</h3>
                <label for="billing_address">Endereço</label>
                <input type="text" id="billing_address" name="billing_address" required>

                <label for="billing_city">Cidade</label>
                <input type="text" id="billing_city" name="billing_city" required>

                <label for="billing_state">Estado</label>
                <input type="text" id="billing_state" name="billing_state" required>

                <label for="billing_zip">CEP</label>
                <input type="text" id="billing_zip" name="billing_zip" required>
            </div>

            <input type="hidden" name="total" value="{{ number_format($total, 2, '.', '') }}">

            <button type="submit">Pagar Agora</button>
        </form>


    </div>

    @if(session('successo'))
    <div style="color: green;">{{ session('successo') }}</div>
    @endif

    @if(session('error_message'))
    <div style="color: red;">{{ session('error_message') }}</div>
    @endif
</body>

</html>
