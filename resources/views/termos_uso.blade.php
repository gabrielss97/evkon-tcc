@extends('layouts.inicio.app')
@section('titulo', 'Termos de Uso')

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
                    <h1 class="h2 fw-bold mt-5">Termos de Uso</h1>
                    <p>
                        O uso desta plataforma está condicionado à
                        aceitação e cumprimento aos Termos e Condições de Uso (“Termos de Uso”) descritos abaixo.
                    </p>
                    <p>
                        Estes Termos de Uso, junto de nossas <a href="{{ route('politica-de-privacidade') }}"
                            class="">Políticas de Privacidade</a>, Constituem o acordo legal realizado
                        entre você e nossa plataforma, para utilização e acesso ao site da Evkon. Bem como a qualquer
                        aplicação, produto ou serviço relacionado a esta.
                    </p>
                    <p>
                        Ao acessar e utilizar nossos serviços, você declara que leu, entendeu e concorda com estes
                        Termos de Uso, Políticas de Privacidade e demais regras expostas em nosso site.
                    </p>
                    <p>
                        Na hipótese de você não concordar com as regras dispostas nestes Termos de Uso, solicitamos,
                        gentilmente, que deixe de utilizar nosso site e serviços imediatamente.
                    </p>
                    <p>
                        Eventualmente, podemos realizar alterações ou modificações neste documento. A versão atualizada dos
                        Termos de Uso sempre será indicada com a data da última revisão para sua melhor visualização no
                        início
                        do documento. Sendo você o responsável por revisar estes Termos de Uso de tempos em tempos, a fim de
                        verificar se ainda está de acordo com todas as nossas regras. Para que, na hipótese de você não
                        concordar com as alterações ou modificações, você poderá, a qualquer momento, solicitar o
                        cancelamento
                        de sua conta ou deixar de utilizar nosso site e serviços, conforme previsto.
                    </p>
                    <h2 class="h4 mt-4">REGISTRO DE USUÁRIO</h2>
                    <p class="">
                        Para a utilização da plataforma, o Usuário – pessoa física ou jurídica que esteja em pleno e total
                        gozo
                        da capacidade civil, bem como esteja apto à prática de todo e qualquer ato necessário à validade das
                        solicitações de serviços requeridas, nos termos da legislação aplicável – deverá realizar seu
                        cadastro
                        na plataforma.
                    </p>
                    <p class="">
                        Ao se cadastrar, o Usuário se compromete a fornecer informações verídicas, completas e atualizadas,
                        sob
                        pena das consequências jurídicas e legais da apresentação de informações falsas
                    </p>
                    <p class="">
                        O login e a senha criados pelo Usuário são pessoais e intransferíveis, sendo o Usuário seu único e
                        exclusivo responsável por mantê-las em segurança e sigilo, evitando, pois, o uso não autorizado de
                        seu
                        Cadastro por terceiros.
                    </p>

                    <h2 class="h4 mt-4">DAS OBRIGAÇÕES E DEVERES DOS USUÁRIOS</h2>
                    <p class="">
                        O usuário declara possuir plena ciência de que, ao utilizar os serviços da nossa plataforma, deverá
                        se
                        comportar em estrita observância a estes Termos de Uso e à Política de Privacidade de nossa empresa,
                        respeitando a legislação vigente, a moral e os bons costumes. O usuário concorda, ainda, em não
                        utilizar
                        os serviços oferecidos em nossa plataforma para fins ilícitos, não lesar os direitos e interesses da
                        Evkon, de outros usuários e/ou terceiros, ou de qualquer forma prejudicar, desativar ou
                        sobrecarregar os serviços, impedindo a sua normal utilização por Evkon, outros usuários e/ou
                        terceiros, devendo preservar as disposições destes Termos de Uso.
                    </p>
                    <p class="">
                        O usuário concorda em abster-se da prática de quaisquer dos atos abaixo descritos:
                    </p>
                    <ol class="">
                        <li class="">
                            Alterar ou violar, de qualquer forma, os sistemas de autenticação, verificação de identidade
                            e/ou de segurança dos serviços, redes ou cadastros de usuários e/ou administradores responsáveis
                            pelos serviços, incluindo, mas não se limitando a tentativas de acessos a dados não destinados
                            ao usuário, tentativa de acesso aos serviços ou contas sem autorização expressa para fazê-lo, ou
                            tentativa de acesso ou alteração, de qualquer maneira e em qualquer nível de segurança, à rede
                            de Evkon;
                        </li>
                        <li class="">
                            Promover, de forma proposital, interrupções, mudanças ou cortes nas comunicações do site e/ou
                            nos serviços disponibilizados, bem como, efetuar ataques cibernéticos ou similares;
                        </li>
                        <li class="">
                            Efetuar qualquer tipo de monitoramento que envolva a interceptação de informações que não se
                            destinem ao usuário, remeter ou transmitir arquivos com vírus ou outras características
                            destrutivas, que possam afetar de forma prejudicial a operação de um computador e/ou o bom
                            funcionamento do site;
                        </li>
                        <li class="">
                            Utilizar qualquer programa de computador ou qualquer outra forma que induza a erro, com o
                            objetivo de obter vantagens patrimoniais ou comerciais em favor do usuário ou de terceiros, não
                            autorizadas por Evkon ou em desarmonia com estes Termos de Uso;
                        </li>
                        <li class="">
                            Efetuar ações que limitem, deneguem ou vetem qualquer usuário de acessar o site e utilizar os
                            serviços.
                        </li>
                    </ol>
                    <p class="">
                        O usuário será responsável, na esfera cível e criminal, pelos danos patrimoniais e
                        extrapatrimoniais, ou por qualquer outro prejuízo que venha a causar à Evkon, terceiros e
                        outros usuários, em razão de descumprimento ou não de qualquer das disposições preconizadas nestes
                        Termos de Uso, ou em quaisquer outros avisos, regulamentos de uso, instruções, políticas e/ou
                        regulamentos editados e devidamente publicados por Evkon em seu site.
                    </p>

                    <h2 class="h4 mt-4">
                        DOS LIMITES DA RESPONSABILIDADE PELOS SERVIÇOS PRESTADOS PELA Evkon
                    </h2>
                    <p class="">
                        A Evkon possui contrato com acesso à internet e servidores de terceiros para o desenvolvimento
                        dos serviços que se dedica, motivo pelo qual o usuário reconhece que os mesmos poderão,
                        eventualmente, estar indisponíveis em decorrência de problemas técnicos, falhas na internet ou
                        provedor, bem como por qualquer outra razão alheia a atos de Evkon, incluindo, eventos de caso
                        fortuito ou de força maior. Desse modo, a Evkon não garante a disponibilidade, de forma
                        contínua e ininterrupta, do funcionamento dos serviços prestados.
                    </p>
                    <p class="">
                        Evkon fica isenta de qualquer responsabilidade por danos e prejuízos de qualquer natureza que
                        sejam decorrentes, de forma direta ou indireta, da interrupção ou suspensão, falha, cessação, falta
                        de disponibilidade ou da descontinuação do funcionamento dos serviços prestados.
                    </p>
                    <p class="">
                        O usuário será o único responsável pelas informações remetidas à/ao Evkon e pelo cumprimento
                        das obrigações dela decorrentes.
                    </p>
                    <p class="">
                        Sem prejuízo dos demais direitos previstos em lei, Evkon tem resguardado o direito de regresso
                        em face do usuário, em razão de quaisquer danos materiais e/ou morais que eventualmente vierem a ser
                        demandados contra Evkon, em juízo ou fora dele, ou, ainda, que Evkon venha a sofrer, em
                        decorrência do descumprimento de obrigações do usuário, resultante dos serviços disponibilizados na
                        plataforma digital.
                    </p>
                    <p>
                        Estes Termos de Uso foram atualizados em 15/01/2021.
                    </p>

                </div>
            </div>
        </div>
    </section>

@endsection
