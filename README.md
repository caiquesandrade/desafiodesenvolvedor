### Costumer API (RESTFul CRUD)

1- `composer update` para fazer download das dependencias do projeto

2- Subir o projeto da maneira que achar melhor. Na minha maquina uso Vagrant + VM Box + Homestead

3- Criar o BD chamado costumers

4- Atualizar o composer dump com comando `composer dump-autoload` para então 

5- Alimentar o BD com os clientes/usuários com cmd `php artisan migrate:refresh --seed`

6- Tudo ok? Ir para o SPA para interface ou verificar a API com Postman e as rotas documentadas.

>Documentação publica da API com Postman -> [AQUI](https://www.getpostman.com/collections/d11555c09b533292a408) <-

7- Como criei uma **API** decidi fazer um SPA em VueJS para consumir a API, já esta pronta e configurada no seguinte repository -> https://github.com/caiquesandrade/costumer-spa
