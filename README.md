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

