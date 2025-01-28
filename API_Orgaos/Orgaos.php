<?php

class Orgao
{
    private $codigo;
    private $codigoFormatado;
    private $sigla;
    private $unidadeHierarquica;
    private $unidade;
    private $situacao;
    private $createdAt;

    public function __construct($codigo, $codigoFormatado, $sigla, $unidadeHierarquica, $unidade, $situacao, $createdAt)
    {
        $this->codigo = $codigo;
        $this->codigoFormatado = $codigoFormatado;
        $this->sigla = $sigla;
        $this->unidadeHierarquica = $unidadeHierarquica;
        $this->unidade = $unidade;
        $this->situacao = $situacao;
        $this->createdAt = $createdAt;
    }

    public function getSigla()
    {
        return $this->sigla;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function __toString()
    {
        return "Sigla: {$this->sigla}, Unidade: {$this->unidade}, Situação: {$this->situacao}";
    }
}