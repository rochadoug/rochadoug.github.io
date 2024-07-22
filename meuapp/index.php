<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar perguntas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <div class="container rounded">
    <div class="row p-2">
      <div class="col">
        <div class="row">
          <div class="col-sm-9 p-2">
            <div class="d-flex  justify-content-center">
              <h4>Adicionar Pergunta</h4>
            </div>
          </div>
          <div class="col-sm-3 p-2  d-flex justify-content-center align-items-center">
            <a class="btn btn-primary" href="perguntas.php">Lista de perguntas</a>

          </div>
        </div>

        <div class="row">
          <div class="col p-2">
            <form class="row g-3 px-3" action="criarpergunta.php?acao=inserir" method="post">
              <div>
                <input type="text" name="pergunta" id="pergunta" placeholder="Pergunta..." class="form-control">
              </div>
              <div>
                <input type="text" name="resposta1" id="resposta1" placeholder="Primeira resposta" class="form-control">
              </div>
              <div>
                <input type="text" name="resposta2" id="resposta2" placeholder="Segunda resposta" class="form-control">
              </div>
              <div>
                <input type="text" name="resposta3" id="resposta3" placeholder="Terceira resposta" class="form-control">
              </div>
              <div>
                <input type="text" name="resposta4" id="resposta4" placeholder="Quarta resposta" class="form-control">
              </div>
              <div>
                <input type="text" name="correta" id="correta" placeholder="RESPOSTA CORRETA AQUI (DEVE SER IGUAL A UMA DAS 4 ACIMA)" class="form-control">
              </div>
              <div>
                <input type="number" name="level" id="level" placeholder="Level: 1 até 70" class="form-control">
              </div>
              <div>
                <input type="text" name="referencia" id="referencia" placeholder="Referência bíblica. Ex: (Gn:1:1)" class="form-control">
              </div>
              <div class="d-flex justify-content-center">
                <input class="btn - btn-success" type="submit" value="ADICIONAR">
              </div>
            </form>

            <?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
              <div class="d-flex justify-content-center bg-success text-white">
                <h5>Pergunta inserida com sucesso!</h5>
              </div>
            <?php } else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 0) { ?>
              <div class="d-flex justify-content-center bg-danger text-white">
                <h3>Preencha todos os campos, por favor! <?php if (isset($_POST['pergunta'])) echo $_POST['pergunta'] ?></h3>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="app.js"></script>
</body>

</html>