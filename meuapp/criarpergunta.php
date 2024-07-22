<?php
require_once("dbconfig.php");
require_once("PerguntaModel.php");

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
if(!isset($_POST[0]) 
&& !isset($_POST[1]) 
&& !isset($_POST[2]) 
&& !isset($_POST[3]) 
&& !isset($_POST[4]) 
&& !isset($_POST[5])
&& !isset($_POST[6])
&& !isset($_POST[7])){
    header('Location: /?inclusao=0'); 
}


if ($acao == 'inserir' ) {

    $respostas = [$_POST['resposta1'],$_POST['resposta2'],$_POST['resposta3'],$_POST['resposta4']];
    $ouro = (int)10+ ( 10*(int)$_POST['level']/100);
    $pergunta = new Pergunta($_POST['pergunta'], $_POST['correta'],$_POST['referencia'], $_POST['level'], $ouro, $respostas);

    if (
        !empty($pergunta->__get('pergunta')) &&
        !empty($pergunta->__get('respostaCorreta')) &&
        !empty($pergunta->__get('referencia')) &&
        !empty($pergunta->__get('level')) &&
        !empty($pergunta->__get('respostas'))
    ) {

        if($pergunta->__get('level') < 1){
            $pergunta->__set('level', 1);
        }
        if($pergunta->__get('level') > 70){
            $pergunta->__set('level', 70);
        }
        
        $data = [
            'pergunta' => $pergunta->__get('pergunta'),
            'respostaCorreta' => $pergunta->__get('respostaCorreta'),
            'referencia' => $pergunta->__get('referencia'),
            'level' => intval( $pergunta->__get('level'), 10),
            'ouro' => intval( $pergunta->__get('ouro'), 10),
            'respostas' => $pergunta->__get('respostas')    
        ];

        $docRef = $fireDb->collection('perguntas')->add($data);
        
        header('Location: /?inclusao=1');
    } else {
           header('Location: /?inclusao=0'); 
    }
}else{
    
}
