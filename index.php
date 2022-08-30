<?php

include_once('conectar.php');

if(isset($_POST['altura'])){

    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $imc =  $peso / ($altura ** 2) * 10000;
    $imc = number_format($imc, 1,'.', "");

    $sql = $pdo->prepare("INSERT INTO registros VALUES (null, ?, ?, ?)");
    $sql->execute(array($altura, $peso, $imc));
}

if(!isset($_POST['altura'])){
  $imc = "";
}

$resultado = "SELECT * FROM registros ORDER BY idregistros DESC";
$resultado = $pdo->prepare($resultado);
$resultado->execute();

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="src/styles/main.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="shortcut icon" href="src/img/favicon.ico" type="image/x-icon">
    <title>KingIMC</title>
  </head>
  <body>
    <section class="container">
      <div class="title">
        <h1>King<span>IMC</span></h1>
        <p>Faça o cálculo do seu IMC</p>
      </div>
      <form method="post">
        <div class="container-calculadora">
          <div class="calculadora">
            <div class="input-container">
              <label for="altura">Altura: <span>(ex: 171cm)</span></label>
              <input type="number" name="altura" id="altura" required>
            </div>
            <div class="input-container">
              <label for="altura">Peso <span>(ex: 58kg)</span></label>
              <input type="number" name="peso" id="peso" required>
            </div>
          </div>
          <div class="button">
            <input type="submit" value="Calcular">
          </div>
      </form>
        <div class="show-imc">
            <div class="imc-content">
              <?php
                    if($imc > 0 && $imc < 18.5){
                      echo '<h3><strong>Seu IMC: </strong></h3>' . $imc;
                      echo '<p class="regular">Magreza</p>';
                    } else if ($imc >= 18.5 && $imc <= 24.9) {
                      echo '<h3><strong>Seu IMC: </strong></h3>' . $imc;
                      echo '<p class="ok">Normal</p>';
                    } else if ($imc >= 25.0 && $imc <= 29.9) {
                      echo '<h3><strong>Seu IMC: </strong></h3>' . $imc;
                      echo '<p class="regular">Sobrepeso</p>';
                    } else if ($imc >= 30.0 && $imc <= 39.9) {
                      echo '<h3><strong>Seu IMC: </strong></h3>' . $imc;
                      echo '<p class="bad">Obesidade</p>';
                    } else if ($imc > 40.0 ){
                      echo '<h3><strong>Seu IMC: </strong></h3>' . $imc;
                      echo '<p class="bad">Obesidade grave</p>';
                    } 
              ?>
            </div>
        </div>
        <div class="registros">
          <table>
            <caption>Histórico de registros</caption>
            <thead>
              <tr>
                <th>Altura</th>
                <th>Peso</th>
                <th>IMC</th>
                <th class="bin">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  while($user = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>".$user['altura']."</td>";
                    echo "<td>".$user['peso']."</td>";
                    echo "<td>".$user['imc']."</td>";
                    echo "<td><a href='delete.php?idregistros=$user[idregistros]'><i class='bx bxs-trash'></i></a></td>";
                    echo "</tr>";
                  }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </body>
</html>
