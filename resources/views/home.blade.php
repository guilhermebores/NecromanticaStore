@extends('layouts.app')

@section('content')
    <header class="bg-black text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h2 class="display-5 text-danger">Melhor estilo pra você</h2>
                    <p>
                        Na NecromancaStore, a moda transcende o comum; é onde o mistério
                        encontra a elegância e a rebeldia se veste de sofisticação,
                        criando um estilo único e autêntico para quem ousa ser diferente.
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('imagem/Logo.png') }}" alt="Corset" class="img-fluid" />
                </div>
            </div>
        </div>
    </header>

    <section id="catalog" class="py-5 bg-black text-white">
        <div class="container">
            <!-- Conteúdo do catálogo -->
        </div>
    </section>

    <section id="about" class="py-5 bg-black text-white">
        <div class="container">
            <div class="text-center mb-4">
                <p class="text-white-50">Saiba Sobre Nós</p>
                <h3 class="text-white">Sobre</h3>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0 text-center">
                    <img class="img-fluid" src="{{ asset('imagem/Logo1.png') }}" alt="Sobre" />
                </div>
                <div class="col-md-6">
                    <h3 class="text-danger">Reúna Beleza e Moda</h3>
                    <p>
                        A NecromancaStore é o destino ideal para quem busca roupas
                        góticas de qualidade e estilo único. Com uma seleção que mistura o
                        clássico, o vitoriano e o cyberpunk, a loja oferece peças como
                        vestidos de veludo, jaquetas de couro com tachas, calças de
                        cintura alta e coletes, tudo pensado para exalar mistério e
                        sofisticação...
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-5 bg-black text-white">
        <div class="container">
            <div class="text-center mb-4">
                <p class="text-white-50">Entre em contato</p>
                <h3 class="text-white">Fale Conosco</h3>
            </div>
            <div class="text-center">
                <p>Telefone: <strong>(42) 99954-2839</strong></p>
                <p>Ou nos envie uma mensagem no WhatsApp e no Instagram:</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="https://wa.me/5542999674889/" target="_blank">
                        <img src="{{ asset('imagem/WhatsApp.png') }}" alt="WhatsApp" width="40" />
                    </a>
                    <a href="https://www.instagram.com/yourusername/" target="_blank">
                        <img src="{{ asset('imagem/instagram.png') }}" alt="Instagram" width="40" />
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
