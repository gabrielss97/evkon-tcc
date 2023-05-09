@extends('layouts.inicio.app')
@section('titulo', 'Política de Privacidade')

@section('css')
    <style>
        #tornar-colaborador {
            display: none
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="py-5 mt-3">
            <div class="container">
                <div class="pt-2 col-12 col-md-10 mx-auto">
                    <h1 class="h2 mb-5 fw-bold mt-5">Política de Privacidade</h1>
                    <h2 class="h4 mt-4">SEÇÃO 1 - O QUE FAREMOS COM ESTA INFORMAÇÃO?</h2>
                    <p>
                        Quando você se cadastra, como parte do processo do nosso sistema,
                        coletamos
                        as informações pessoais que você nos dá tais como: nome, e-mail, telefone...
                    </p>
                    <p>
                        Quando você acessa nosso site, também recebemos automaticamente o protocolo de internet do seu
                        computador, endereço de IP, a fim de obter informações que nos ajudam a aprender sobre seu navegador
                        e
                        sistema operacional.
                    </p>

                    <h2 class="h4 mt-4">SEÇÃO 2 - CONSENTIMENTO</h2>
                    <p>Como vocês obtêm meu consentimento?</p>
                    <p>
                        Quando você fornece informações pessoais como nome, telefone, endereço e outros, entendemos que você
                        está de acordo com a coleta de dados para serem utilizados
                        pela nossa empresa.
                    </p>
                    <p>
                        Se pedimos por suas informações pessoais por uma razão secundária, como marketing, vamos lhe pedir
                        diretamente por seu consentimento, ou lhe fornecer a oportunidade de dizer não.
                    </p>
                    <p>
                        E caso você queira retirar seu consentimento, como proceder?
                    </p>
                    <p>
                        Se após você nos fornecer seus dados, você mudar de ideia, você pode retirar o seu consentimento
                        para
                        que possamos entrar em contato, para a coleção de dados contínua, uso ou divulgação de suas
                        informações,
                        a qualquer momento, entrando em contato conosco enviando uma
                        mensagem em: <a href="{{ route('contato') }}" class=""><strong>Contato</strong></a>
                    </p>

                    <h2 class="h4 mt-4">ÇÃO 3 - DIVULGAÇÃO</h2>
                    <p>
                        Podemos divulgar suas informações pessoais caso sejamos obrigados pela lei para fazê-lo ou se você
                        violar nossos <a href="{{ route('termos-de-uso') }}" class="">Termos de Uso</a>.
                    </p>

                    <h2 class="h4 mt-4">SEÇÃO 4 - SERVIÇOS DE TERCEIROS</h2>
                    <p>
                        No geral, os fornecedores terceirizados usados por nós irão apenas coletar, usar e divulgar suas
                        informações na medida do necessário para permitir que eles realizem os serviços que eles
                        fornecem.
                    </p>
                    <p>
                        Uma vez que você deixe o site da nossa empresa ou seja redirecionado para um aplicativo ou site de
                        terceiros, você não será mais regido por essa Política de Privacidade ou pelos <a
                            href="{{ route('termos-de-uso') }}" class="">Termos de Uso</a> do
                        nosso site.
                    </p>
                    <p>
                        Links
                    </p>
                    <p>
                        Quando você clica em links na nossa loja, eles podem lhe direcionar para fora do nosso site. Não
                        somos
                        responsáveis pelas práticas de privacidade de outros sites e lhe incentivamos a ler as declarações
                        de
                        privacidade deles.
                    </p>

                    <h2 class="h4 mt-4">SEÇÃO 5 - SEGURANÇA</h2>
                    <p>
                        Para proteger suas informações pessoais, tomamos precauções razoáveis e seguimos as melhores
                        práticas da
                        indústria para nos certificar que elas não serão perdidas inadequadamente, usurpadas, acessadas,
                        divulgadas, alteradas ou destruídas.
                    </p>
                    <p>
                        Se você nos fornecer as suas informações de cartão de crédito, essa informação é criptografada
                        usando
                        tecnologia "secure socket layer" (SSL) e armazenada com uma criptografia AES-256. Embora nenhum
                        método
                        de transmissão pela Internet ou armazenamento eletrônico é 100% seguro, nós seguimos todos os
                        requisitos
                        da PCI-DSS e implementamos padrões adicionais geralmente aceitos pela indústria.
                    </p>

                    <h2 class="h4 mt-4">SEÇÃO 6 - ALTERAÇÕES PARA ESSA POLÍTICA DE PRIVACIDADE</h2>
                    <p>
                        Reservamos o direito de modificar essa política de privacidade a qualquer momento, então por favor,
                        revise-a com frequência. Alterações e esclarecimentos vão surtir efeito imediatamente após sua
                        publicação no site. Se fizermos alterações de materiais para essa política, iremos notificá-lo aqui
                        que
                        eles foram atualizados, para que você tenha ciência sobre quais informações coletamos, como as
                        usamos, e
                        sob que circunstâncias, se alguma, usamos e/ou divulgamos elas.
                    </p>
                    <p>
                        Se nossa empresa for adquirida ou fundida com outra empresa, suas informações podem ser transferidas
                        para
                        os novos proprietários para que possamos continuar a vender produtos para você.
                    </p>
                    <p>
                        Essas Políticas de Privacidade foram atualizados em 15/01/2021.
                    </p>

                </div>
            </div>
        </div>
    </section>

@endsection
