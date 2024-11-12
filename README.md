# [Aplicação Web Devs do RN]

<img src="/assets/images/capa-manual-de-uso-e-design-interface.jpg">

> Descrição do projeto: Este projeto foi desenvolvido para o desafio vaga Dev PHP :: 2024.2. Trata-se de uma aplicação web para asociação "Devs do RN" com o objetivo de facilitar a gestão de associados e o controle das anuidades devidas. Com uma interface simples e intuitiva, o sistema permite ao gerente da associação realizar o cadastro de novos associados, registrar anuidades e acompanhar os pagamentos de cada associado. A plataforma foi projetada para otimizar o processo de cobrança, fornecer uma visão geral dos pagamentos em atraso e facilitar a atualização do valor das anuidades anuais.

O sistema também permite o acompanhamento detalhado da situação financeira de cada associado, considerando a data de filiação para determinar quais anuidades são devidas e possibilitando que o pagamento de cada ano seja realizado individualmente. Dessa forma, o gerente consegue identificar de forma rápida e prática quais associados estão com os pagamentos em dia e quais estão em atraso. ".

[![Autor](https://img.shields.io/badge/SusanMarques-SusanMarques-ff9000?style=flat-square)](https://github.com/SusanMarques)
[![Languages](https://img.shields.io/github/languages/count/SusanMarques/desafio-devs-do-rn?color=%23ff9000&style=flat-square)](#)
[![Stars](https://img.shields.io/github/stars/SusanMarques/desafio-devs-do-rn?color=ff9000&style=flat-square)](https://github.com/desafio-devs-do-rn/stargazers)
[![Forks](https://img.shields.io/github/forks/SusanMarques/desafio-devs-do-rn?color=%23ff9000&style=flat-square)](https://github.com/desafio-devs-do-rn/network/members)
[![Contributors](https://img.shields.io/github/contributors/SusanMarques/desafio-devs-do-rn?color=ff9000&style=flat-square)](https://github.com/desafio-devs-do-rn/graphs/contributors)

# :pushpin: Sumario deste projeto

- [Título e Imagem de capa](#Aplicação-Web-Devs-do-RN)
- [Descrição do Projeto](#Aplicação-Web-Devs-do-RN)
- [Badge](#Aplicação-Web-Devs-do-RN)
- [Índice](#sumario-deste-projeto)
- [Features](#rocket-features)
- [Encontrou algum bug?](#bug-bugs)
- [Contribuição](#tada-contribuição)
- [Licença](#closed_book-licença)
- [Documento de Requisitos](#documento-de-requisitos)

<br />

# :rocket: Features

# Funcionalidades do Projeto
1. **Cadastro de Associados**
- Permite o cadastro de associados com informações pessoais, como Nome, E-mail, CPF e Data de Filiação.
- Armazena os dados de cada associado em uma base de dados para controle e acompanhamento.
2. **Registro de Anuidades**
- Possibilita o cadastro de anuidades, incluindo o ano de vigência e o valor correspondente.
- Permite que o valor da anuidade seja facilmente atualizado pelo gerente, conforme a necessidade.
3. **Cobrança das Anuidades**
- Exibe uma lista das anuidades devidas por cada associado, considerando a data de filiação para calcular os valores pendentes.
- Calcula o valor total devido de todas as anuidades pendentes, proporcionando um "checkout" fácil de todas as anuidades de um associado.
4. **Pagamento de Anuidades**
- Permite a marcação de pagamentos de anuidades individualmente, usando uma flag para indicar se a anuidade foi paga ou não.
- Garante que o associado possa quitar somente as anuidades desejadas, ao invés de obrigatoriamente quitar todos os anos pendentes.
5. **Identificação de Associados em Dia e em Atraso**
- Lista todos os associados e sua situação financeira com relação às anuidades (em dia ou em atraso).
- Considera todo novo associado devedor da anuidade corrente, permitindo uma visão clara e simplificada do status financeiro de cada associado.
6. **Melhorias futuras**
- Página de login e autenticação



# :framed_picture: UI Interface do Usuário e manual de uso

<p align="left">
    <img src="/assets/images/capa-manual-de-uso-e-design-interface.jpg" /> 
    <img src="/assets/images/home-manual-de-uso-e-design-interface.jpg" /> 
    <img src="/assets/images/listar-assoc-manual-de-uso-e-design-interface.jpg" /> 
    <img src="/assets/images/detalhes-manual-de-uso-e-design-interface.jpg" /> 
    <img src="/assets/images/cadastrar-manual-de-uso-e-design-interface.jpg" /> 
</p>

# Protótipo das telas no Figma

Para o desenvolvimento desse sistema foi feita a prototipação das telas no Figma, [clique aqui para visualizar](https://www.figma.com/design/WhO4aATTZRTQtx8HfFzpCH/prot%C3%B3tipo-gest%C3%A3o-de-associados?node-id=0-1&t=8Z43tNUxCh7EpKNN-1)

# :construction_worker: Guia de instalação

# Guia de Instalação do Projeto para a Associação Devs do RN

Este guia fornece as instruções completas para instalar e executar o projeto em PHP e MySQL em uma máquina local. Siga cada etapa para garantir que o ambiente seja configurado corretamente.

### Pré-requisitos
Certifique-se de ter o **PHP** , o **MYSQL** e o **GIT** instalados em sua máquina. 
**Recomendação: Para simplificar o processo de instalação, você pode utilizar o XAMPP, um pacote que instala Apache, PHP, e MySQL em uma única instalação. Após instalar, inicie o Apache e o MySQL pelo painel de controle do XAMPP.**

### Passo a Passo

1. **Clonar o Repositório**
    - Abra o terminal ou prompt de comando.
   - No terminal, execute o comando para clonar o repositório:
     ```bash
     git clone https://github.com/SusanMarques/desafio-devs-do-rn.git
     ```
   - Navegue até o diretório do projeto:
     ```
     cd desafio-devs-do-rn
     ```
     

2. **Configurar o Banco de Dados**
    - **Criar o Banco de Dados:**
    Acesse o phpMyAdmin ou um outro gerenciador de banco de dados.
    Crie um novo banco de dados para o projeto, nomeando-o de acordo com o arquivo .env (exemplo: devs_do_rn).
    - **Importar o Arquivo de Estrutura (meu_database.sql):**
    No phpMyAdmin, selecione o banco de dados que acabou de criar.
    Acesse a aba "Importar" e escolha o arquivo meu_database.sql.
    Clique em "Executar" para importar todas as tabelas e dados iniciais necessários.

3. **Configurar Variáveis de Ambiente (.env)**
   - O projeto usa um arquivo .env para armazenar as informações sensíveis, como as credenciais do banco de dados. 
   No diretório do projeto, crie um arquivo .env e adicione as seguintes variáveis
     ```
     DB_SERVER=localhost
     DB_USER=seu_usuario 
     DB_PASS= sua_senha
     DB_NAME=nome_do_banco (ex.: devs_do_rn)

     ```
    Certifique-se de que o arquivo .env está salvo corretamente no diretório raiz do projeto.
4. **Executar o Projeto**
   - Inicie o servidor Apache (ou outro servidor que esteja usando, como o PHP integrado).
   - No terminal, navegue até o diretório do projeto e execute:
     ```bash
     php -S localhost:8000
     ```
- usando XAMPP, coloque o projeto dentro do diretório htdocs e acesse no navegador: ex: 
    ```
    http://localhost/devs_do_rn.
    ```

### Observação
1. Verifique se as credenciais no .env correspondem às configuradas no MySQL.

# :postbox: FAQ

**Pergunta:** Quais tecnologias foram utilizadas neste projeto?

**Resposta:** As tecnologias utilizadas são: [PHP](https://www.php.net/) ,[MySQL](https://www.apachefriends.org/pt_br/index.html) via XAMPP, [GIT](https://git-scm.com/) e [APACHE](https://www.apachefriends.org/pt_br/index.html) via XAMPP

# Metodo ágil 

Para a realização do projeto foi utilizado o método ágil Kanban por meio dos cartões do Trello, organizando as funcionalidades no backlog e movendo os cartões a cada tarefa finalizada para concluída. também ficou registrado o checklist das funcionalidades finalizadas e das que ficaram como melhorias futuras. [Kanban no trello](https://trello.com/invite/b/672a5d691c1d2a6b833d4cf9/ATTIf4728619a237f47e79d59bc9558c51aa235CB38C/kanban-projeto-associacao-devs-do-rn)

# :bug: Bugs

Sinta-se à vontade para **registrar um novo problema** com o respectivo título e descrição no [desafio-devs-do-rn](https://github.com/susanmarques/desafio-devs-do-rn/issues). Se você já encontrou uma solução para o seu problema, **adoraria revisar sua solicitação de pull request**! Dê uma olhada em nosso **gia de contribuição abaixo**.

# :tada: Contribuição

### Se você quiser contribuir para este projeto, siga estas etapas:

1. Faça um fork do projeto.
2. Crie uma branch para a sua feature `git checkout -b feat/NomeDaSuaFeature`.
3. Faça commit das suas alterações `git commit -am "[add/edit/del]/feat: Descrição da feature"`.
4. Faça push para a branch `git push origin feat/NomeDaSuaFeature`.
5. Crie um novo Pull Request.

# :closed_book: Licença

Lançado em 2024.
Este projeto esta sob a licença [MIT license](https://github.com/desafio-devs-do-rn/blob/master/LICENSE).