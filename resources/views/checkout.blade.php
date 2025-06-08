@extends('layouts.app')

@section('content')
    <div class="checkout">
        <h1>Finalizar Compra</h1>

        @if(count($cartItems) > 0)
            <form action="{{ url('/checkout/complete') }}" method="POST">
                @csrf
                <div class="checkout-details">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="address">Endereço de Entrega:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="checkout-summary">
                    <h2>Resumo do Carrinho</h2>
                    <ul>
                        @foreach ($cartItems as $item)
                            <li>{{ $item->name }} - R$ {{ number_format($item->price, 2, ',', '.') }}</li>
                        @endforeach
                    </ul>
                    <p>Total: R$ {{ number_format($total, 2, ',', '.') }}</p>

                        <form id="coupon-form">
                            <label for="coupon-code">Código do Cupom:</label>
                            <input type="text" id="coupon-code" name="coupon_code" required>
                            <button type="submit">Aplicar</button>
                        </form>

                        <div id="coupon-message"></div>

                    <label for="payment-method">Método de Pagamento:</label>
                    <select name="payment-method" id="payment-method" onchange="togglePaymentForm(this)">
                        <option value="credit_card">Cartão de Crédito</option>
                        <option value="boleto">Boleto Bancário</option>
                    </select>
                    <div id="stripe-form" style="display:none;">
                        <form action="{{ url('/payment') }}" method="POST">
                            @csrf
                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{ env('STRIPE_KEY') }}"
                                    data-amount="{{ $total * 100 }}"
                                    data-name="NecromanticaStore"
                                    data-description="Compra de produtos"
                                    data-image="{{ env('STRIPE_IMAGE_URL') }}"
                                    data-currency="brl">
                            </script>
                        </form>
                    </div>

                    <button type="submit" class="btn-complete">Finalizar Compra</button>
                </div>
            </form>
        @else
            <p>Seu carrinho está vazio.</p>
        @endif
    </div>
@endsection

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
    function togglePaymentForm(selectElement) {
        var stripeForm = document.getElementById('stripe-form');
        if (selectElement.value === 'credit_card') {
            stripeForm.style.display = 'block';
        } else {
            stripeForm.style.display = 'none';
        }
    }
</script>


