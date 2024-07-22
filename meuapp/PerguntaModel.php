<?php

use Ramsey\Uuid\Type\Integer;

class Pergunta
{
    private $id;
    private $pergunta;
    private $respotaCorreta;
    private $ouro;
    private $level;
    private $referencia;
    private $respostas = array();

    public function __get($attr)
    {
        return $this->$attr;
    }

    public function __set($attr, $value)
    {
        $this->$attr = $value;
        return $this;
    }
    
    public function __construct(string $perg, string $respCorr, string $referencia, int $level = 1, int $ouro, array $respostas = [])
    {
        $this->__set('pergunta', $perg);
        $this->__set('respostaCorreta', $respCorr);
        $this->__set('referencia', $referencia);
        $this->__set('level', $level);
        $this->__set('ouro', $ouro);
        $this->__set('respostas', $respostas);
    }

    public static function fromArray(array $source)
    {
        $pergunta = new Pergunta(
            $source['pergunta'],
            $source['respostaCorreta'],
            $source['referencia'],
            $source['level'],
            $source['ouro'],
            $source['respostas']
        );
        return $pergunta;
    }
}
