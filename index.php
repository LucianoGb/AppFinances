<?php


session_start();
require 'CriadorDeConexao.php';
$shipping = '';
// echo '1';
function search()
{
  try {
    // echo 'try';
    $pdo = CriadorDeConexao::Conexao();
    $sql = "SELECT shipping.*, client.name
            FROM shipping
            INNER JOIN client ON shipping.client_id = client.id";

    $stmt = $pdo->query($sql);
    
  
    if ($stmt && $stmt->rowCount() != 0) {
      $shipping = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $shipping;
    } else {
      return  $shipping = [''];
    }
  } catch (PDOException $Exception) {
    echo "FALHA AO CONECTAR AO BANCO: " . $Exception->getMessage();
  
    logMensage("Falha ao validar ao banco: {$Exception->getMessage()}", "info");
  }
}
$shipping = search();
// foreach ($shipping as $key => $sp){
//   echo "$key: $sp<br>";
// }
// print_r($shipping[0]['name']);
// var_dump($shipping['name']);
// exit();
// if(!$_SESSION['email']){
//   header('Location: ./pages/login.php');
  
// }else{
//      header('Location:dashboard.php');
// }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TS - System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="TS_logo.png">
  </head>
  <body >
    <main class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-dark rounded-bottom justify-content-center" style="background:#192025 !important"  >
                <div class="container-fluid  " >
                  <a class="navbar-brand" href="#">
                    <img src="TS_logo.png" alt="Bootstrap" width="100" height="60">
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                      </li> -->
                      <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                      </li> -->
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
        
        <?php foreach ($shipping as $key => $sp) : ?>
        <div class="row mt-2 p-2 bg-light">
                             
            <div class="col">
                <h3><?= $sp['name'] ?></h3>
                <hr>
            </div>
            <div class="col">
              <div class="accordion " id="accordionPanelsStayOpenExample " data-bs-theme="dark" >
                  <div class="accordion-item" >
                    <h2 class="accordion-header ">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?= $sp['code'] ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne" style="background:#192025 !important ;color:white">
                          <strong>Cod: <?= $sp['code'] ?></strong>
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapse<?= $sp['code'] ?>" class="accordion-collapse collapse ">
                      <div class="accordion-body">
                          <p class="card-text"><strong>Tracking link: </strong><a href="<?= $sp['link'] ?>" target="_blank"><?= $sp['code'] ?></a></p>
                          <p class="card-text" id='embarque'><strong>Shipping date: </strong><?= $sp['shipping_date'] ?></p>
                          <p class="card-text" id='prevista'><strong>Expected date: </strong><?= $sp['expected_date'] ?> </p>
                          <p class="card-text" id='eat'><strong>EAT: </strong><?= $sp['eat'] ?></p>
                      </div>
                    </div>
                  </div>
                                
              </div>
            </div>
        </div>
        <?php endforeach; ?>    
       
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
