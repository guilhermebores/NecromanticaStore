<x-guest-layout>
    <div class="container py-5" style="max-width: 400px;">
        @if (session('status'))
        <div class="alert alert-success mb-4" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="bg-dark p-4 rounded shadow text-white">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    class="form-control bg-dark text-white border-light @error('email') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="form-control bg-dark text-white border-light @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-3">
                <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                <label for="remember_me" class="form-check-label text-white">Lembrar de mim</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-info text-decoration-none small">
                    Esqueceu a senha?
                </a>
                @endif
                <button type="submit" class="btn btn-success ms-3">
                    Entrar
                </button>

            </div>
        </form>

        <div class="mt-4 text-center text-white">
            <p>Não tem uma conta?
                <a href="{{ route('register') }}" class="text-info text-decoration-none">
                    Cadastre-se
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
