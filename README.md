![PHP Badge](https://img.shields.io/badge/PHP-8.2.4-blue)
![Laravel Badge](https://img.shields.io/badge/Laravel-%2010.18-red)
![License Badge](https://img.shields.io/badge/License-%20MIT-green)

# BigHouse Finance 💰

BigHouse Finance é um site de gestão de finanças com o objetivo de gerenciar e armazenar as economias dos usuários, sendo classificadas como carteiras, onde um usuário pode ter diversas carteiras, cada carteira com seu saldo, despesas, receitas e a capacidade de realizar transferências entre carteiras, assim como calcular seu saldo perante essas receitas e despesas.

## Especificações

As documentações das especificações do projeto podem ser encontradas nessa [pasta](https://github.com/mathiasfate/BigHouseFinance/tree/master/docs).

## Pré Requisitos
- [PHP 8.2.4](https://www.php.net/downloads.php)
- [Laravel](https://laravel.com/docs/4.2)

## Instalação
```
git clone "https://github.com/mathiasfate/BigHouseFinance.git"
cd BigHouseFinance
php artisan serve
```
## Seeders
```
php artisan db:seed --class=CarteirasTableSeeder
```
## Funcionalidades

### Login/Cadastro
````
O usuário deve encontrar na home page do site uma forma de se logar ou cadastrar.
Caso Login: Deve ser informado email e senha, se corretos deve autenticar o usuário ao site, 
se incorretos, deve informar que alguma das credenciais está incorreta.
Caso Cadastro: Deve ser informado email, senha, nome, telefone e cpf. Se o email já estiver 
sendo utilizado, deve informar o usuário que o email já está sendo utilizado.
````
### Carteira
````
O usuário, já logado no sistema, deve encontrar no menu site uma forma de acessar a pagina de carteiras.
Na pagina de carteiras ele deve ser capaz de consultar suas carteiras, cadastrar carteiras novas e 
excluir carteiras.
Clicando em uma carteira ele deve ser capaz de consultar seu saldo, suas despesas, suas fontes de renda, 
realizar depósitos, realizar transferências e calcular seu balanço.
````
### Despesa
````
O usuário, já logado no sistema, ao consultar uma carteira, deve encontrar um botão para CADASTRAR 
uma nova despesa, APAGAR uma despesa já existente nessa carteira, ALTERAR alguma despesa e ver TODAS 
as despesas que foram criadas.
Uma despesa deve possuir os campos, VALOR, NOME e IDCARTEIRA.
````
### Receita
````
O usuário, já logado no sistema, ao consultar uma carteira, deve encontrar um botão para CADASTRAR uma 
nova receita, APAGAR uma receita já existente nessa carteira, ALTERAR alguma receita e ver TODAS as 
receitas que foram criadas.
Uma receita deve possuir os campos VALOR, NOME e IDCARTEIRA.
````
### Calcular balanço
````
O usuário, já logado no sistema, ao consultar uma carteira, deve encontrar um botão para calcular seu 
balanço nessa carteira, que consiste em:
SALDO DA CONTA + FONTES DE RENDA – DESPESAS = balanço final
Após demonstrar qual será seu balanço final deve ser alertado ao usuário a escolha de efetuar esse 
calculo ou não.
Caso Sim: Atualiza o saldo da conta.
Caso não: Retorna a pagina da carteira.
````
### Transferência
````
O usuário, já logado no sistema, ao consultar uma carteira, deve encontrar um botão para 
realizar transferências.
Um usuário normal, deve poder realizar transferências apenas de sua carteira, para qualquer 
outra cadastrada.
Um usuário administrador deve poder realizar transferências de qualquer conta para qualquer conta.
As transferências devem ficar armazenadas em uma tabela, contendo o remetente e o 
recebedor, a data e o valor.
````
### Autor
Matheus Casagrande <br>
[![Linkedin Badge](https://img.shields.io/badge/-Matheus%20Casagrande-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/tgmarinho/)](https://www.linkedin.com/in/matheus-casagrande-629364205/) 
[![Gmail Badge](https://img.shields.io/badge/-mccghdev@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:mccghdev@gmail@gmail.com)](mailto:mccghdev@gmail.com)