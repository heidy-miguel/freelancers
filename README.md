

## Sobre Este projecto

Repositório do Sistema de Gestão Processual para o tribunal de Malange.

## Instalação

### Requisitos
- Xampp 7.4 [Link para download - 156MB](https://www.apachefriends.org/download.html)
- Github [Link para download - 108MB](https://central.github.com/deployments/desktop/desktop/latest/win32?format=msi)

Para a realizar a instalação de uma versão local na tua máquina, segue os seguintes passos:

1. Copia o repositório para o teu computador, preferencialmente dentro da pasta htdocs do xampp (C:\xamp\htdocs\)
```bash
git clone https://github.com/heidy-miguel/sgp-adminlte
```
2. Entra no directório da versão recentemente clonada
```bash
cd nome_da_versao_local
```
3. Instala as dependências do projecto usando o composer
```bash
composer install
```
```bash
php artisan key:generate
```
4. No phpmyadmin cria uma base de dados com um nome ao teu gosto  
5. Edita o ficheiro '**.env.exemple**', escreve o nome da base de dados que você escolheu, bem como o nome do usuário e a pasword . Depois disso, renomeia o ficheiro **.env.exemple** para **.env**, ou seja, remove o **.exemple** no nome.  
6. Cria as tabelas necessárias e insere os dados usando o comando para migração
```bash
php artisan migrate:fresh --seed
```
<!-- 7. Insere dados ficticios na base de dados, para isso precisamos primeiro entrar no Tinker:
    - **php artisan tinker**
    - **$autor = Author::factory()->count(3)->create();** - Cria 3 autores na base de dados
    - **$user = User::factory()->count(26)->create();** - Cria 6 usuários na base de dados
    - **$crime = CrimeType::factory()->count(3)->create();**
    - **$process_type = ProcessType::factory()->count(3)->create();**
    - **$processo_criminal = CriminalProcess::factory()->has(Accused::factory()->count(6))->create();**
    - **$processo_civil = CivilProcess::factory()->has(Accused::factory()->count(3))->create();**
8. Sai do tinker precionando as teclas CTRL + C  -->
7. Ponha o projecto a correr  
```bash
php artisan serve
```
8. Dados de login: **admin@gmail.com, escrivao@gmail.com, juiz@gmail.com - password: 'password'** a senha de todos usuários é **password**.

## Colaboração
No github, as colaborações são basicamente realizadas através de **pull request**, vou deixar aqui alguns links onde exolicam passo a passo como realizar um:
 - [Como fazer um Pull Request no Github](https://dev.to/estevaowat/como-fazer-um-pull-request-no-github-2pgi)
 - [Precisamos falar sobre Pull Request](https://gomex.me/2020/07/05/precisamos-falar-sobre-pull-request/)
 - [Criar um pull request](https://docs.github.com/pt/github/collaborating-with-issues-and-pull-requests/creating-a-pull-request)
