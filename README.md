# iClinic

Name: Danilo Deverso

## Table of contents:
* **[Requisitos](#requisitos)**
* **[Instalação](#instalação)**
* **[Enpoint](#endpoint)**
* **[Testes](#testes)**
* **[Observações](#observações)**

## Requisitos
- Docker
- Git

## Instalação

#### Running with Docker:
```bash
# Clone o projeto
$ git clone git@github.com:deverso/iclinic.git

# Acesse a pasta do projeto
$ cd iclinic

# Suba a aplicação utilizando o sail
$ ./vendor/bin/sail up

# Em uma nova aba do terminal, 
# acesse a pasta do projeto execute a migration
$ ./vendor/bin/sail artisan migrate
```

## Endpoint

#### Criar prescrições:

```bash
POST http://localhost/api/prescriptions
{
  "clinic": {
    "id": "1"
  },
  "physician": {
    "id": 1
  },
  "patient": {
    "id": 11
  },
  "text": "Dipirona 1x ao dia"
}

```

## Testes

#### Como rodar os testes

```bash
# Acesse a pasta do projeto localmente
# Acesse o container do projeto
$ docker exec -it <container> bash

# Acesse a pasta do projeto dentro do container
$ cd /var/www/html

# Execute os testes
$ ./vendor/bin/phpunit
# ou os arquivos de coverage
$ ./vendor/bin/phpunit  --coverage-html reports/
```

## Observações
- Devido a indisponibilidade do serviço de métricas o teste de intergração está falhando.
