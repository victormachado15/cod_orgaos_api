<?php

class OrgaoManager
{
    private $orgaos = [];

    public function adicionarOrgaos(array $dados)
    {
        foreach ($dados as $dado) {
            $orgao = new Orgao(
                $dado['codigo'],
                $dado['codigo_formatado'],
                $dado['sigla'],
                $dado['unidade_hierarquica'],
                $dado['unidade'],
                $dado['situacao'],
                $dado['created_at']
            );
            $this->orgaos[] = $orgao;
        }
    }

    public function listarOrgaos()
    {
        return $this->orgaos;
        
    }

    public function filtrarPorSituacao($situacao)
    {
        return array_filter($this->orgaos, function ($orgao) use ($situacao) {
            return $orgao->getSituacao() === $situacao;
        });
    }

    public function buscarPorSigla($sigla)
    {
        foreach ($this->orgaos as $orgao) {
            if ($orgao->getSigla() === $sigla) {
                return $orgao;
            }
        }
        return null;
    }
}