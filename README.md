# iClinic

Name: Danilo Fernando Deverso

## Table of contents:
* **[Requisitos](#requisitos)**
* **[Instalação](#instalação)**
* **[Enpoint](#endpoint)**

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
