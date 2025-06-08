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

        <form action="{{ route('payment') }}" method="POST">
            @csrf

            <label for="name">Nome no Cartão</label>
            <input type="text" id="name" name="name" required>

            <!-- Campos do cartão -->
            <label for="card-number">Número do Cartão</label>
            <input type="text" id="card-number" name="card_number" required>

            <label for="card-expiry">Data de Expiração (MM/AA)</label>
            <input type="text" id="card-expiry" name="card_expiry" required>

            <label for="card-cvc">Código de Segurança (CVC)</label>
            <input type="text" id="card-cvc" name="card_cvc" required>

            <!-- Campos de endereço -->
            <h3>Endereço de Cobrança</h3>
            <label for="address-line1">Endereço</label>
            <input type="text" id="address-line1" name="address_line1" required>

            <label for="address-city">Cidade</label>
            <input type="text" id="address-city" name="address_city" required>

            <label for="address-state">Estado</label>
            <input type="text" id="address-state" name="address_state" required>

            <label for="address-zip">CEP</label>
            <input type="text" id="address-zip" name="address_zip" required>

            <label for="address-country">País</label>
            <select id="address-country" name="address_country" required>
                <option value="BR">Brasil</option>
                <!-- Outros países se necessário -->
            </select>

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