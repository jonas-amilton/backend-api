<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

## Target API

API REST desenvolvida em **Laravel**, projeto utiliza **Docker**, **MySQL** e segue boas práticas de arquitetura, aplicando conceitos de **SOLID**, **DRY** e testes automatizados.

---

## Stack utilizada

- PHP 8.4
- Laravel 12
- MySQL 8
- Nginx
- Docker e Docker Compose
- JWT (JSON Web Token)
- PHPUnit

---

## Pré-requisitos

- Docker
- Docker Compose

> Não é necessário ter PHP ou Composer instalados localmente.

---

## Instalação e execução

### Clonar o repositório

```bash
git clone git@github.com:jonas-amilton/targetit-api.git
cd targetit-api
```

---

### Configurar variáveis de ambiente

```bash
cp .env.example .env
```

O arquivo `.env.example` já está configurado para execução em ambiente Docker local.

---

### Subir os containers

```bash
docker compose up -d --build
```

---

### Instalar dependências e preparar a aplicação

```bash
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

---

### Acessar a aplicação

- API disponível em: **http://localhost:8080**

---

## Executar testes

```bash
docker compose exec app php artisan test
```

---

## Autenticação

A autenticação é realizada via **JWT**.

O token deve ser enviado no header das requisições protegidas:

```http
Authorization: Bearer {token}
```

---

## Funcionalidades

- Autenticação JWT
- CRUD de usuários
- Soft delete de usuários
- Associação de permissões
- Cadastro de endereços por usuário
- Testes automatizados de validação

---

## Organização do projeto

O projeto segue uma arquitetura em camadas:

- Controllers: entrada da aplicação
- Services: regras de negócio
- Repositories: acesso a dados
- DTOs: transporte de dados
- Form Requests: validação
- Tests: testes unitários e de integração

Essa estrutura facilita manutenção, testes e evolução do sistema.

---

## Observações

- As credenciais presentes no `.env.example` são exclusivas para ambiente local Docker.

---