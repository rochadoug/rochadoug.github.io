<?php
require_once("dbconfig.php");
    $perg = isset($_GET['perg']) ? $_GET['perg'] : $perg;

    if($perg == 'remover'){
        $dId = $_GET['id'];

        $pergRef = $fireDb->collection("perguntas");
        $pergRef->document($dId)->delete();

        header('Location: perguntas.php');
    }
?>

