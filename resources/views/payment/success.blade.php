<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pagamento Aprovado - NecromanticaStore</title>
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>
<body>
    <div class="container">
        <h1>✅ Pagamento Aprovado!</h1>
        <p>{{ $message }}</p>
        
        <a href="{{ route('home') }}">
            <button>Voltar à Página Inicial</button>
        </a>
    </div>
</body>
</html>