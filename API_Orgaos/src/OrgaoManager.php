<?php

require_once __DIR__ . '/../config/config.php';
//require_once "Orgao.php";

use API_Orgaos\Orgao;

class OrgaoManager
{
    private $orgaos = [];
    private $apiUrl;
    private $clientId;

    public function __construct()
    {
        $config = require __DIR__ . '/../config/config.php';
        $this->apiUrl = $config['api_url'];
        $this->clientId = $config['client_id'];
    }

    public function carregarOrgaosDaApi()
    {
        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        // 🔹 Adiciona o client_id no cabeçalho, com o codigo passado pelo responsavel DTIC - client_id
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "client_id: " . $this->clientId,
            "Accept: application/json"
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200 || !$response) {
            die("Erro ao buscar dados da API. Código HTTP: $httpCode");
        }

        $dados = json_decode($response, true);
        if (!is_array($dados)) {
            die("Erro ao decodificar JSON da API. Resposta recebida: " . htmlspecialchars($response));
        }

        foreach ($dados as $dado) {
            if (isset($dado['codigo'], $dado['codigo_formatado'], $dado['sigla'],  $dado['unidade_hierarquica'], $dado['unidade'], $dado['situacao'])) {
                $this->orgaos[] = new Orgao(
                    $dado['codigo'],
                    $dado['codigo_formatado'],
                    $dado['sigla'],
                    $dado['unidade_hierarquica'],
                    $dado['unidade'],
                    $dado['situacao']
                );
            }
        }
    }

    public function listarOrgaosOrdenados()
    {
        usort($this->orgaos, function ($a, $b) {
            return strcmp($a->getCodigo(), $b->getCodigo());
        });
        return $this->orgaos;
    }

    public function listarOrgaosOrdenadosCod02()
    {
         // Filtra os órgãos cujo código formatado começa com "02."
        $orgaosFiltrados = array_filter($this->orgaos, function ($orgao) {
            return strpos($orgao->getCodigoFormatado(), '02.') === 0; // Verifica se começa com "02."
        });

        // Ordena os órgãos filtrados pelo código
        usort($orgaosFiltrados, function ($a, $b) {
            return strcmp($a->getCodigo(), $b->getCodigo());
        });

        return $orgaosFiltrados;
    }
}
