<x-guest-layout>
    <div class="mb-4 text-sm text-white">
        Esqueceu sua senha? Sem problemas. Basta informar seu endereço de e-mail e enviaremos um link para redefinição de senha que permitirá escolher uma nova.
    </div>

    @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label text-white">Email</label>
            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <div class="text-danger mt-1">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
                Enviar link de redefinição
            </button>
        </div>
    </form>
</x-guest-layout>
