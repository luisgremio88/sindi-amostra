# Sindi Amostra

Projeto de estudo em PHP puro + MySQL, criado como amostra de um portal institucional com area publica, area restrita e painel administrativo.

O objetivo deste repositorio e demonstrar organizacao de estrutura, modelagem inicial de banco, fluxo de autenticacao e manutencao de conteudo institucional, pensando em um site que pode evoluir para um sistema real no futuro.

## Visao geral

O projeto simula o portal de uma entidade institucional, com:

- Home com banners rotativos
- Menu institucional com paginas separadas
- Ficha de associacao
- Area restrita com acesso de administrador e associado
- Painel administrativo para alimentar a Home e o conteudo do portal
- Cadastro e consulta de boletos
- Upload de documentos anuais em PDF
- Galeria e imagens de destaque

## Funcionalidades implementadas

### Area publica

- [index.php](./index.php): Home com banner principal, noticias em destaque, ultimas noticias e galeria de fotos
- [institucional.php](./institucional.php): secoes `Quem Somos`, `Diretoria` e `Conselho Fiscal`
- [convencoes.php](./convencoes.php): listagem de convencoes e tabela de emolumentos por ano
- [informativo.php](./informativo.php): download de informativos anuais
- [contato.php](./contato.php): dados de contato e formulario para envio de mensagem
- [associe-se.php](./associe-se.php): ficha de inscricao de associado
- [area-restrita.php](./area-restrita.php): login unificado para administrador e associado

### Area administrativa

- [admin/dashboard.php](./admin/dashboard.php): painel com organizacao por secoes
- gerenciamento de banners da Home
- gerenciamento de imagens de destaque e galeria
- cadastro e edicao de administradores
- cadastro e edicao de associados
- aprovacao de fichas de associacao
- manutencao de conteudo institucional
- manutencao de representantes
- upload e exclusao de documentos anuais
- cadastro de noticias
- cadastro de boletos

### Area do associado

- [associado/dashboard.php](./associado/dashboard.php): visualizacao de dados e boletos em aberto

## Estrutura do projeto

```text
sindi-amostra/
|-- admin/
|-- associado/
|-- assets/
|   `-- css/
|-- config/
|-- database/
|-- includes/
|-- uploads/
|-- area-restrita.php
|-- associe-se.php
|-- contato.php
|-- convencoes.php
|-- index.php
|-- informativo.php
`-- institucional.php
```

## Arquitetura

O projeto foi construido com uma arquitetura simples e didatica:

- `includes/bootstrap.php`
  Inicializa sessao, caminhos do projeto e funcoes utilitarias

- `includes/layout.php`
  Centraliza cabecalho e rodape compartilhados

- `includes/data_store.php`
  Concentra a camada de acesso ao banco e regras principais de leitura/escrita

- `config/database.php`
  Define a conexao com MySQL

- `database/schema.sql`
  Documenta a estrutura principal do banco

Essa abordagem foi escolhida para manter o projeto legivel e facil de evoluir em ambiente de estudo.

## Configuracao local

Para ambiente local, o projeto pode usar um arquivo privado:

- `config/database.local.php`

Esse arquivo fica fora do versionamento via `.gitignore` e deve conter as credenciais reais do banco no ambiente de desenvolvimento.

O arquivo publico [config/database.php](./config/database.php) funciona como carregador seguro:

- tenta usar `config/database.local.php`
- se nao existir, tenta usar variaveis de ambiente

Tambem existe um exemplo em [config/database.example.php](./config/database.example.php).

## Banco de dados

O sistema utiliza MySQL e cria/organiza tabelas voltadas para:

- administradores
- associados
- fichas de associacao
- noticias
- boletos
- documentos anuais
- banners
- galeria
- mensagens de contato
- conteudo institucional

## Tecnologias utilizadas

- PHP 7.4
- MySQL
- HTML5
- CSS3
- JavaScript vanilla
- XAMPP para ambiente local

## Objetivo de portfolio

Este projeto nao foi pensado como produto final pronto para producao, e sim como uma demonstracao de capacidade tecnica em:

- estruturar um sistema PHP sem framework
- organizar rotas e responsabilidades por pagina
- modelar um banco relacional inicial
- criar painel administrativo funcional
- integrar formularios, autenticacao e uploads
- transformar uma ideia visual em uma aplicacao navegavel

## Pontos de seguranca que ainda faltariam para producao

Para um ambiente real com dados sensiveis de clientes, ainda seria importante adicionar:

- protecao CSRF nos formularios
- validacoes mais rigidas no backend
- limitacao de tentativas de login
- politica de senhas mais forte
- recuperacao de senha segura
- configuracao mais forte de sessao
- auditoria e log de acoes administrativas
- validacao mais avancada de upload de arquivos
- revisao de permissoes por perfil
- tratamento de LGPD para CPF, e-mail e dados financeiros
- uso obrigatorio de HTTPS em producao
- backup e estrategia de restauracao do banco

## Melhorias futuras

- separar melhor o painel administrativo em modulos menores
- dividir a camada de dados em arquivos por dominio
- criar paginas individuais para noticias
- adicionar edicao mais completa de documentos e conteudos
- melhorar fluxo de recuperacao de acesso
- substituir configuracoes locais por variaveis de ambiente

## Observacao importante

As configuracoes locais presentes neste projeto foram mantidas apenas para ambiente de estudo. Em uma publicacao real, o ideal e:

- nao expor credenciais reais
- usar `.env` ou configuracao externa
- preparar uma versao de deploy com ajustes de seguranca
- revisar e limpar uploads e dados de teste antes de publicar

## Autor

Projeto criado por Luis como estudo e demonstracao de conhecimento para portfolio.
