<?php

namespace API_Orgaos;
class Orgao
{
    private $codigo;
    private $codigoFormatado;
    private $sigla;
    private $unidadeHierarquica;
    private $unidade;
    private $situacao;

    public function __construct($codigo, $codigoFormatado, $sigla, $unidadeHierarquica, $unidade, $situacao)
    {
        $this->codigo = $codigo;
        $this->codigoFormatado = $codigoFormatado;
        $this->sigla = $sigla;
        $this->unidadeHierarquica = $unidadeHierarquica;
        $this->unidade = $unidade;
        $this->situacao = $situacao;
    }

    // 🔹 Métodos GET para acessar os atributos
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getCodigoFormatado()
    {
        return $this->codigoFormatado;
    }

    public function getSigla()
    {
        return $this->sigla;
    }

    public function getUnidade()
    {
        return $this->unidade;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }
    
    public function getUnidadeHierarquica()
    {
        return $this->unidadeHierarquica;
    }

   
}
