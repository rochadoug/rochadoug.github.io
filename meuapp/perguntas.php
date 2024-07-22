<?php
require_once("dbconfig.php");
require_once("PerguntaModel.php");

$perg = ""; 
require_once("removerPergunta.php");

$perguntas = array();
$pergRef = $fireDb->collection("perguntas");
$query = $pergRef->orderBy('level', 'ASC');
$documents = $query->documents();
foreach ($documents as $doc) {
    if ($doc->exists()) {
        $p = Pergunta::fromArray($doc->data());
        $p->id = $doc->id();
        $perguntas[] = $p;
    }
}

//printf('Id do documento %s </br>' . PHP_EOL, $perguntas[2]->pergunta);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas as Perguntas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container rounded">
        <div class="row p-2">
            <div class="col">
                <div class="row ">
                    <div class="col-10 p-2">
                        <div class="d-flex  justify-content-center">
                            <h4 >Todas as Perguntas</h4>
                        </div>
                    </div>
                    <div class="col-2 p-2 d-flex align-items-center justify-content-center ">
                      
                        <button type="button" class="btn btn-primary text-hightlight" onclick="voltar()">Voltar</button>
                        
                    </div>

                    <hr>
                    <?php foreach ($perguntas as $perg) { ?>
                        <div class="row m-2">
                            <div class="col-sm-7 d-flex justify-content-center text-dark align-items-center border fw-bold"> <?php echo $perg->pergunta ?></div>
                            <div class="col-sm-2 d-flex justify-content-center align-items-center border">
                                <div class="bg-secondary m-2 text-white p-2 d-flex justify-content-center border rounded">Level: <?php echo $perg->level ?> </div>
                            </div>
                            <div class="col-sm-3 d-flex justify-content-center align-items-center border">
                                <button type="button" class="btn btn-danger btn-md"  onclick="excluir('<?php echo $perg->id ?>')">Excluir</button>
                            </div>

                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <script src="app.js"></script>
</body>

</html>