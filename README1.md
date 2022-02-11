<h1 align="center">
    <img alt=" Promobit"  width="500" height="250" title="#seletivo" src="./project/images/Teste-Promobit-logo.svg" />
</h1>

<h4 align="center"> 
	🚧  Prcesso Seletivo - Promobit  🚧
</h4>

<p align="center">
 <a href="#-sobre-o-projeto">Sobre</a> •
 <a href="#-funcionalidades">Funcionalidades</a> •
 <a href="#-layout">Layout</a> • 
 <a href="#-como-executar-o-projeto">Como executar</a> • 
 <a href="#-tecnologias">Tecnologias</a> • 
 <a href="#-contribuidores">Contribuidores</a> • 
 <a href="#-autor">Autor</a> • 
 <a href="#user-content--licença">Licença</a>
</p>


## 💻 Sobre o projeto
<h3> Seletivo Promobit - Primeira fase do pocesso seletivo para vaga de Desenvolvimento de Software - Junior a Sênior.</h3> <br>
<p>Orientações:</p>
 <p>    Na linguagem de sua preferência, crie um servidor HTTP que, para cada requisição GET, retorne como resposta um JSON cuja chave `result` seja a o resultado de uma operação matemática recebida como parâmetro.</p>

 1. Os números podem estar no intervalo [-99999, 99999].
 2. As operações podem ser adição: (`+`), subtração (`-`), divisão (`/`) e multiplicação (`*`).\n
 3. Deve ser respeitada a precedência das operações, incluindo até um nível de parênteses.\n


---

## ⚙️ Funcionalidades dessa API
 
- [x] Os usuários da aplicação podem enviar requisições sem autenticação, para o end-point:
  - http://localhost:3000/api/*equação*
    - *equação* -> equação matemática padrão com hierarquia por padrão aritmético na sequência abaixo:
  - [x] hierarquia de parenteses(\(x+y\))
  - [x] divisão (/)
  - [x] multiplicação(*)
  - [x] soma (+)
  - [x] subtração(-)
 
- [x] Os avaliadores podem executar os testes baseados nas urls como exemplos:
  - [x] http://localhost:3000/api/1
  - [x] http://localhost:3000/api/-1042+1
  - [x] http://localhost:3000/api/4*4+4
  - [x] http://localhost:3000/api/4*\(4+4\)
  - [x] http://localhost:3000/api/\(4*4\)/-4

- [x] Requisitos atingidos nessa aplicação:
  - [x] Criação de um repositório *privado* em uma conta sua do git.
  - [x] A entrega será através de um Pull Request para o seu próprio repositório e convide seletivo-Promobit-cdm" para acessar o repositório.
  - [x] A utilização de biblioteca para recepção e resposta das informações requeridas. Implementação da interpretação das equações.
  - [x] Criação do Readme com informações de configuração uso e instalção.
  - [x] Solução própria para o algoritmo.
 
  - Observações sobre avaliação:
    - *Bônus*: criar ambiente Docker.
    -  Avaliar edge cases e tratamento de erros, testes unitários, estruturação e qualidade do código, uso do git.
---

## 🎨 Layout

A aplicação não possui layout exclusivo apenas o que a própria bilioteca disponibiliza.

---

## 🚀 Como executar o projeto

Este projeto é dividido em:
1. Backend - controlador de requisição (pasta project) 
2. Backend - regra de negócio (pasta api1)


### Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Git](https://git-scm.com),
[Python](https://www.python.org/doc/),
ou 
[Docker](https://docs.docker.com/engine/install/ubuntu/),
[Docker-compose] (https://docs.docker.com/compose/),
Editor [VSCode](https://code.visualstudio.com/).

#### 🎲 Rodando o (servidor) com python
```bash
# Clone este repositório
$ git clone git@github.com:aldebalima/seletivo-Promobit-cdm.git
# Acesse a pasta do projeto no terminal/cmd
$ cd seletivo-Promobit-cdm
# Crie ambiente virtual caso queira com 
$ python3 -m venv venv
# Ative ambiente
$ source venv/bin/activate
# Instale as dependências
$ pip install -r requirements.txt
# Execute a aplicação em modo de desenvolvimento
$ python manage.py runserver 3000
# O servidor inciará na porta:3000 - acesse http://localhost:3000 
```

Para rodar os teste da aplicação

```bash
# Após subir o container execute:
$ python manage.py test
```

<p align="center">
  <a href="https://github.com:aldebalima/seletivo-Promobit-cdm.git/testes_Insomnia_2022-01-15.json" target="_blank"><img src="https://insomnia.rest/images/run.svg" alt="Run in Insomnia"></a>
</p>


#### 🧭  Rodando o (servidor) com docker-compose

```bash
# Clone este repositório
$ git clone git@github.com:aldebalima/seletivo-Promobit-cdm.git
# Acesse a pasta do projeto no seu terminal/cmd
$ cd seletivo-Promobit-cdm
# Instalando 
$ docker-compose build
# Subindo container
$ docker-compose up
# A aplicação será executada na porta:3000 - acesse http://localhost:3000
```

Para rodar os teste da aplicação

```bash
# Após subir o container execute:
$ docker-compose run web python manage.py test
```
---

## 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

#### **WebServer**  ([Python](https://www.python.org/doc/)  +  [WSGI](https://docs.djangoproject.com/pt-br/3.0/howto/deployment/wsgi/))

> Veja o arquivo  [requitements.txt](https://github.com/aldebalima/seletivo-Promobit-cdm/requitements.txt)

-   **[Django](https://www.djangoproject.com/)**
-   **[django-filter](https://django-filter.readthedocs.io)**
-   **[djangorestframework](https://www.django-rest-framework.org)**
-   **[Markdown](https://python-markdown.github.io/)**
-   **[pytz](https://pypi.org/project/pytz/)**

-   Editor:  **[Visual Studio Code](https://code.visualstudio.com/)**  → Extensions:  **[SQLite](https://marketplace.visualstudio.com/items?itemName=alexcvzz.vscode-sqlite)**
-   Teste de API:  **[Insomnia](https://insomnia.rest/)**

---

## 👨‍💻 Contribuidores

  Gratidão a comunidade python pelas bilbiotecas

## 🦸 Autor


 <img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/57299968?s=52&v=4" width="100px;" alt=""/>
 <br />
 <sub><b>Aldebarã Franciso Ferreira de Lima</b></sub>
 <br />

[![Linkedin Badge](https://img.shields.io/badge/-Aldebara-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/aldebalima/)](https://www.linkedin.com/in/aldebalima/) 
[![Gmail Badge](https://img.shields.io/badge/-aldebalima@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:aldebalima@gmail.com)](mailto:aldebalima@gmail.com)

---

## 📝 Licença

Este projeto esta sobe a licença [MIT](./LICENSE).

Feito por Aldebarã Lima 👋🏽 [Entre em contato!](https://www.linkedin.com/in/aldebalima/)

---

##  Versões do README

[Português 🇧🇷](./README.md)  