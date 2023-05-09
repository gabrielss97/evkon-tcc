# Organização de eventos]

Resumo:<br>
Sistema para que clientes contratem pessoas que organizam eventos, o
colaborador é o organizador do evento que cria uma conta e adiciona anúncios do seus eventos...
E o cliente cria uma conta, seleciona o tipo de evento que procura e os locais dos eventos são exibidos pra ele, o cliente tem uma opçao para entrar em contato com o colaborador que criou o anúncio.

## Usuários

-   Admin
-   Colaborador
-   Cliente

## Funcionalidades

### Admin

-   Cadastro único no sistema
-   Consegue visualizar lista de colaboradores com opção de pesquisa por nome e evento, excluir conta, habilitar e desabilitar conta
-   Consegue visualizar lista de clientes com opção de pesquisa, excluir conta, habilitar e desabilitar conta
-   Visualiza dados do sistema com gráficos, exporta os gráficos em pdf
-   Exporta dados em excel
-   Visualiza mensagens de contato
-   Visualiza denúncias de anúncios e comentarios
-   Edita o perfil

### Colaborador

-   Cadastro e login com opção de ser por meio de rede social
-   Cria anúncios, edita, exclui, denúncia comentários
-   Edita o perfil

### Cliente

-   Visualiza anúncios
-   Entra em contato com colaborador
-   Faz comentários em anúncios
-   Faz denúncia de anúncio
-   Edita o perfil

## Pacotes Laravel utilizados

-   https://github.com/laravel/ui
-   https://github.com/lucascudo/laravel-pt-BR-localization
-   https://github.com/LaravelLegends/pt-br-validator
-   https://laravel-excel.com/
-   https://github.com/mccarlosen/laravel-mpdf
-   https://laravel.com/docs/8.x/socialite

## APIs utilizadas

-   Google API Javascript (https://developers.google.com/maps/documentation/embed/get-started)
-   https://brasilapi.com.br

## Libs utilizadas

-   https://www.chartjs.org/
-   Jquery Mask

## Instalação do projeto Laravel

#### Requisitos

-   PHP v7.4 pelo menos
-   MySQL v10.4 pelo menos

#### Baixando os pacotes via composer

```
composer install
```

#### Configure o arquivo ".env", esse arquivo não existe então você tem que criar e usar o ".env.example" como exemplo

```
copy .env.example .env
```

#### Gerando key obrigatória

```
php artisan key:generate
```

#### Após configurar o banco de dados no ".env", e execute os migrations

```
php artisan migrate
```

#### Gerando dados fakes (opcional)

```
php artisan db:seed
```

#### Iniciar em localhost

```
php artisan serve
```
