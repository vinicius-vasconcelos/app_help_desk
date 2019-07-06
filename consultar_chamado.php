<?require_once("validador_acesso.php")?>

<?php

  $chamados = [];
  //abrindo arquivo e trazendo os conteúdos
  $arquivo = fopen("../../../app_help_desk/arquivo.txt", "r");

  while (!feof($arquivo))
    $chamados[] = fgets($arquivo);

  fclose($arquivo);

  //removendo o último registro em branco 
  unset($chamados[count($chamados) - 1]);

  //tratando perfis
  $novo_arr = [];


  if($_SESSION['perfil_id'] == 2){ 
    for($i = 0; $i < count($chamados); $i++) {
      if(explode('#', $chamados[$i])[0] == $_SESSION['id']){
        $novo_arr[] = $chamados[$i];
      }
    }
  }
  else{
    $novo_arr =  $chamados;
  }
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <? include_once("menu.php"); ?>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <? foreach ($novo_arr as $valor) {?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= explode('#', $valor)[1] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= explode('#', $valor)[2] ?></h6>
                    <p class="card-text"><?= explode('#', $valor)[3] ?></p>

                  </div>
                </div>
              <?}?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>