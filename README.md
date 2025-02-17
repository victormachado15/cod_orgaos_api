Documentação do Sistema de Seleção de Órgãos da Unicamp

1. Introdução

Este sistema tem como objetivo buscar e exibir uma lista de órgãos da Unicamp a partir de uma API oficial. Os órgãos podem ser filtrados e ordenados, sendo apresentados ao usuário em um campo Select interativo, com suporte a pesquisa dinâmica.

2. Características Principais

Consome a API de órgãos da Unicamp.

Exibe os órgãos ordenados pelo código formatado.

Permite filtragem específica por órgãos cujo código inicia com "02.".

Utiliza Select2 para melhorar a experiência do usuário ao selecionar um órgão.

Implementa um endpoint para pesquisa dinâmica de órgãos.

3. API Utilizada

A API utilizada fornece informações sobre os órgãos da Unicamp.

Endpoint:

https://api.unicamp.br/orgaos-unicamp/v1/orgaos?situacao=ativo

Autenticação

A requisição à API exige um client_id, que deve ser enviado no cabeçalho da requisição:

client_id: 728439ea-42e8-4d08-a2c0-c1308300c020

Resposta da API (Exemplo)

[
    {
        "codigo": "01000000000000",
        "codigo_formatado": "01.00.00.00.00.00.00",
        "sigla": "REIT",
        "unidade_hierarquica": "REIT",
        "unidade": "REITORIA",
        "situacao": "ativo",
        "created_at": "2025-01-27 23:42:18.223658"
    }
]

4. Estrutura do Sistema

O sistema é composto pelos seguintes arquivos:

4.1. Classe Orgao.php

Representa um órgão e seus atributos.

4.2. Classe OrgaoManager.php

Gerencia a busca e manipulação dos órgãos.

4.3. buscar_orgaos.php

Endpoint responsável por retornar órgãos filtrados para a pesquisa dinâmica.

4.4. index.php

Interface principal que exibe a lista de órgãos para seleção.

---> CRIANDO NOVO PROJETO

1. Crie um Novo Projeto
Para começar, crie uma nova pasta para o seu projeto e entre nela;

mkdir teste_api
cd teste_api

2. Inicie um Novo Projeto com o Composer
Execute o seguinte comando para inicializar o seu projeto e criar o arquivo composer.json:

composer init

Siga as instruções no terminal para preencher as informações do seu projeto (como nome, descrição, etc.).

3. Instale o Pacote
Instale o pacote victormachado15/api-orgaos executando o comando abaixo:

composer require victormachado15/api-orgaos:*@dev

Este comando irá baixar o pacote e todas as dependências necessárias para o seu projeto. Após a instalação, o pacote estará disponível na pasta vendor/.

4. Estrutura do Projeto
A estrutura do seu projeto ficará assim:

teste_api/
│
├── src/            # Se houver alguma classe personalizada
├── vendor/         # Pacotes instalados via Composer
│   └── victormachado15/
│       └── api-orgaos/
│           └── API_Orgaos/
│               ├── src/
│               ├── config/
│               └── ...
├── composer.json   # Arquivo de configuração do Composer
└── index.php       # Arquivo de exemplo para utilizar a API

