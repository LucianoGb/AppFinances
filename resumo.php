<?php

session_start();
// echo 'dashboard';

if (!$_SESSION['email']) {
    header('Location: ./pages/login.php');
}

if (isset($_GET['id'])) {
    require_once 'funcoes.php';


    $resp = listarClientePorId($_GET['id']);

    // echo $resp[0]['nome'];
    // exit;
} else {
    $resp[0]['nome_razao'] = '';
    $resp[0]['cpf_cnpj'] = '';
    $resp[0]['tipo'] = '';
    $resp[0]['data_nascimento'] = '';
    $resp[0]['data_admissao'] = '';
    $resp[0]['data_abertura'] = '';
    $resp[0]['email'] = '';
    $resp[0]['celular'] = '';
    $resp[0]['id'] = '';
}

require_once 'header.php';

?>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Simulador</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Simulador</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="logout.php" class="nav-link text-white font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">Sair</span>
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="./assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New message</span> from Laur
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            13 minutes ago
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="./assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New album</span> by Travis Scott
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            1 day
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>credit-card</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(453.000000, 454.000000)">
                                                            <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                            <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            Payment successfully completed
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            2 days
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->


<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <!-- <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
                                <h5 class="font-weight-bolder">
                                    $53,000
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                                    since yesterday
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <!-- <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Users</p>
                                <h5 class="font-weight-bolder">
                                    2,300
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+3%</span>
                                    since last week
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <!-- <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
                                <h5 class="font-weight-bolder">
                                    +3,462
                                </h5>
                                <p class="mb-0">
                                    <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                    since last quarter
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="col-xl-3 col-sm-6">
            <!-- <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                                <h5 class="font-weight-bolder">
                                    $103,430
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="row mt-4" style="min-height: 500px;">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize"><?php echo "Simulação"; ?></h6>
                    <!-- <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 2021
              </p> -->
                    <div class="d-flex justify-content-end"><a type="button" href="dashboard.php" class="btn btn-primary">Voltar</a></div>
                </div>
                <div class="card-body p-3">
                    <?php
                    $nome = $_POST['nome'];
                    $cpf = $_POST['cpf'];
                    $email = $_POST['email'];
                    $contato = $_POST['contato'];
                    $p1 = $_POST['p1'] ? 'home' : '';
                    $p2 = $_POST['p2'] ? 'condo' : '';
                    $vimovel = $_POST['vimovel'];
                    $vcredito = $_POST['vcredito'];
                    $indexadorTipo = $_POST['indexador'] == 1 ? 0.89 / 100 : 1.09 / 100;
                    $qtdparcela = $_POST['qtdparcela'];
                    $carenciaqtd = $_POST['carencia'];
                    $tipo_cliente = $_POST['tipo_cliente'] == 'PF' ? 'CPF' : 'CNPJ';
                    $valor_total = 0;
                    // echo "<h3>Valores Preenchidos</h3><br>";



                    $valor_liquido = $vcredito;

                    $valor_imovel = $vimovel;

                    $saldo_devedor_inicial = ($valor_liquido * (12.38 / 100)) + $valor_liquido;
                    $indexador = $indexadorTipo;

                    $saldo_devedor_atual =  ($saldo_devedor_inicial * (101.49 / 100));

                    $prazo_contratado = $qtdparcela;

                    $carencia = $carenciaqtd;

                    $amortizacao = $saldo_devedor_atual / ($prazo_contratado - $carencia);

                    $saldo_primeira_parcela = $saldo_devedor_atual - $amortizacao;

                    $juros_primeira_parcela = $saldo_devedor_atual * $indexador;

                    $seguro_mbi_primeira_parcela = ($saldo_devedor_inicial * (0.021 / 100) + $saldo_devedor_atual * (0.021 / 100));

                    $seguro_dfi_primeira_parcela = $valor_imovel * ((0.0037 / 100) * 2);
                    $taxa_adm = 25.00;

                    $taxa_adm_primeira_parcela = $taxa_adm * 2;

                    $valor_primeira_parcela = $amortizacao + $juros_primeira_parcela + $seguro_mbi_primeira_parcela + $seguro_dfi_primeira_parcela + $taxa_adm_primeira_parcela;

      

                    ?>
                    <div class="container">
                        <form action="template_pdf.php" method="post" >
                            <div style="display: none;">
                            <label for="nome" class="form-label">Nome do Cliente</label>
                            <input type="text" value="<?=$nome ;?>" id='nome' name="nome" class="form-control w-100 " placeholder="" required style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                            <label for="tipo_cliente" class="form-label">Tipo de Cliente</label>
                            <select style="padding-top: 0rem; padding-bottom: 0rem;height: 38px;box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);" onchange="cpf_cnpj()" class="form-select form-select-lg mb-3" required id="tipo_cliente" name="tipo_cliente" aria-label=".form-select-lg example" style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                                <?php if($tipo_cliente == 'CPF'){
                                    ?>
                                    <option value="PF" selected>Pessoa Física</option>
                                <option value="PJ">Pessoa Jurídica</option>
                            <?php    
                            }else {
                                ?>
                                <option value="PF" >Pessoa Física</option>
                                <option value="PJ" selected>Pessoa Jurídica</option>
                           <?php } ?>
                                

                            </select>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="<?=$email ;?>" class="form-control w-100" id='email' name="email" placeholder="" required style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                            <label for="contato" class="form-label">Contato(Celular)</label>
                            <input type="text" value="<?=$contato ;?>" class="form-control w-100" id='contato' onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="contato" placeholder="" required style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                            <label for="cpf" class="form-label" id="cpf_cnpj">CPF</label>
                            <input type="cpf" value="<?=$cpf ;?>"class="form-control w-100" id='cpf' required name="cpf" placeholder="" required style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id='p1' name="p1" value="option1" checked>
                                <label class="form-check-label" for="p1">
                                    Home Equity
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id='p2' name="p2" value="option2" disabled>
                                <label class="form-check-label" for="p2">
                                    Condo Primus
                                </label>
                            </div>
                            <label for="vimovel" class="form-label">Valor Imóvel</label>
                            <input type="number" value="<?=$vimovel ;?>" min="250000" required class="form-control" id='vimovel' onchange="defineValorMaximo()" name="vimovel" placeholder="" style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                            <label for="vcredito" class="form-label">Valor Crédito</label>
                            <input type='number' value="<?=$vcredito ;?>" required class="form-control" id='vcredito' name="vcredito" placeholder="" style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">

                            <label for="indexador" class="form-label">Tipo de Indexador</label>
                            <select class="form-select form-select-lg mb-3" required id="indexador" name="indexador" aria-label=".form-select-lg example" style="padding-top: 0rem; padding-bottom: 0rem; height: 38px;box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                                <?php if($_POST['indexador'] == 1) {?>
                                <option >Selecione...</option>
                                <option value="1" selected>CDI</option>
                                <option value="2">IPCA</option>
                                <?php }else{?>    
                                    <option >Selecione...</option>
                                <option value="1" >CDI</option>
                                <option value="2"selected>IPCA</option> 
                                <?php } ?>  
                            </select>
                           
                            <input type="text" id="display2" value="<?=$qtdparcela ;?>"name="qtdparcela" readonly style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                            <input type="text" id="display" value="<?=$carencia ;?>" name="carencia" readonly style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);
    border: none;
    border-radius: 10px;
    text-align: center;
    margin-top: 10px;">        
                         <div class="d-flex mt-3 justify-content-center">
                                    <button type="submit" class="btn btn-success btn-lg ">Calcular</button>
                                </div>

                                </div>
                       
                        <h3>Dados do Cliente</h3>
                        <div class=" row mt-3">
                            <div class="col-3">
                                <h6>Nome: <?= $nome; ?></h6>
                            </div>
                            <div class="col-3">
                                <h6><?= $tipo_cliente . ': ' . $cpf; ?></h6>
                            </div>
                            <div class="col-3">
                                <h6>Email: <?= $email; ?></h6>
                            </div>
                            <div class="col-3">
                                <h6>Contato: <?= $contato; ?></h6>
                            </div>
                    </div>
                    <div class="row text-center mt-5" style="display: block;">
                        <div class="d-flex justify-content-evenly">
                            <div class="card text-bg-primary mb-3" style="max-width:300px; min-width: 250px; ; border: solid;">
                                <div class="card-header">
                                    Primeira Parcela:
                                </div>
                                <div class="card-body">
                                    <h5 id="valor_primeira" class="card-title" style="color:white"><?= number_format($valor_primeira_parcela, 2, ',', '.') ?></h5>

                                </div>
                            </div>
                            <div class="card text-bg-primary mb-3" style="max-width:300px;min-width: 250px;; border: solid;">
                                <div class="card-header">
                                    Taxa de Juros:
                                </div>
                                <div class="card-body">
                                    <h5 id="valor_total" style="color:white" class="card-title">0,98% ao mês</h5>

                                </div>
                            </div>
                            <div class="card text-bg-primary mb-3" style="max-width:300px;min-width: 250px; ;border: solid;">
                                <div class="card-header">
                                    Última Parcela:
                                </div>
                                <div class="card-body">
                                    <h5 id="valor_parcela" style="color:white" class="card-title"></h5>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row text-center mt-5">
                        <div class="d-flex justify-content-center">
                            <input class="btn btn-outline-primary" type="submit" value="Imprimir simulação" />

                        </div>
                     
                    </div>
                    <hr>
                </div>
                </form>
                <!-- <table class="table table-striped-columns table-hover mt-3" style="font-size: 12px;">
    <thead>
        <tr>
            <th scope="col">Nº PARCELA</th>
            <th scope="col">SALDO DEVEDOR</th>
            <th scope="col">AMORTIZAÇAO</th>
            <th scope="col">JUROS</th>
            <th scope="col">SEGURO MBI</th>
            <th scope="col">SEGURO DFI</th>
            <th scope="col">TAXA ADM</th>
            <th scope="col">VALOR PARCELA</th>
            <th scope="col">CORREÇÃO</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">0</th>
            <td><?= "R$ " . number_format($saldo_devedor_inicial, 2, ',', '.'); ?></td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td><?= "R$ " . number_format($saldo_devedor_atual, 2, ',', '.'); ?></td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td><?= "R$ " . number_format($saldo_primeira_parcela, 2, ',', '.'); ?></td>
            <td><?= "R$ " . number_format($amortizacao, 2, ',', '.'); ?></td>
            <td><?= "R$ " . number_format($juros_primeira_parcela, 2, ',', '.'); ?></td>
            <td><?= "R$ " . number_format($seguro_mbi_primeira_parcela, 2, ',', '.'); ?></td>
            <td><?= "R$ " . number_format($seguro_dfi_primeira_parcela, 2, ',', '.'); ?></td>
            <td><?= "R$ " . number_format($taxa_adm_primeira_parcela, 2, ',', '.'); ?></td>
            <td><?= "R$ " . number_format($valor_primeira_parcela, 2, ',', '.'); ?></td>
           <td><?= $indexadorTipo == 0.0089 ? "+ CDI" : "+ IPCA"; ?></td>
        </tr> -->


                <?php
                $arr = [];
                $associativo = ['Nº PARCELA' => '', 'SALDO DEVEDOR' => '', 'JUROS' => '', 'ARMOTIZACAO' => '', 'SEGURO MBI' => '', 'SEGURO DFI' => '', 'TAXA ADM' => '', 'VALOR PARCELA' => '', 'CORRECAO' => ''];
                $associativo['Nº PARCELA'] = "0";
                $associativo['SALDO DEVEDOR'] = "R$ " . number_format($saldo_devedor_inicial, 2, ',', '.');
                $associativo['JUROS'] = "- ";
                $associativo['ARMOTIZACAO'] = "-";
                $associativo['SEGURO DFI'] = "-";
                $associativo['SEGURO MBI'] = "-";
                $associativo['TAXA ADM'] = "-";
                $associativo['VALOR PARCELA'] = "-";
                $associativo['CORRECAO'];
                $arr[0] = $associativo;
                $associativo['Nº PARCELA'] = "1";
                $associativo['SALDO DEVEDOR'] = "R$ " . number_format($saldo_devedor_atual, 2, ',', '.');
                $associativo['JUROS'] = "- ";
                $associativo['ARMOTIZACAO'] = "-";
                $associativo['SEGURO DFI'] = "-";
                $associativo['SEGURO MBI'] = "-";
                $associativo['TAXA ADM'] = "-";
                $associativo['VALOR PARCELA'] = "-";
                $associativo['CORRECAO'];
                $arr[1] = $associativo;
                $associativo['Nº PARCELA'] = "2";
                $associativo['SALDO DEVEDOR'] = "R$ " . number_format($saldo_primeira_parcela, 2, ',', '.');
                $associativo['JUROS'] = "R$ " . number_format($juros_primeira_parcela, 2, ',', '.');
                $associativo['ARMOTIZACAO'] = "R$ " . number_format($amortizacao, 2, ',', '.');
                $associativo['SEGURO DFI'] = "R$ " . number_format($seguro_dfi_primeira_parcela, 2, ',', '.');
                $associativo['SEGURO MBI'] = "R$ " . number_format($seguro_mbi_primeira_parcela, 2, ',', '.');
                $associativo['TAXA ADM'] = "R$ " . number_format($taxa_adm_primeira_parcela, 2, ',', '.');
                $associativo['VALOR PARCELA'] = "R$ " . number_format($valor_primeira_parcela, 2, ',', '.');
                $associativo['CORRECAO'];
                $arr[2] = $associativo;


                $sd_anterior = $saldo_primeira_parcela;
                $sd_atual = $saldo_primeira_parcela - $amortizacao;
                $j_anterior = $juros_primeira_parcela;
                $j_atual = $sd_anterior * $indexador;
                $v_parcela = 0;

                $sg_dfi_atual = $seguro_dfi_primeira_parcela / 2;
                $sg_mbi_atual = $sd_anterior * (0.021 / 100);
                $sg_mbi_anterior = 0;



                for ($i = 3; $i <= $qtdparcela; $i++) {
                    # sd_anterior = sd_atual
                    $v_parcela = $amortizacao + $j_atual + $sg_mbi_atual + $sg_dfi_atual + $taxa_adm;
                    $associativo['Nº PARCELA'] = $i;
                    $associativo['SALDO DEVEDOR'] = "R$ " . number_format($sd_atual, 2, ',', '.');
                    $associativo['JUROS'] = "R$ " . number_format($j_atual, 2, ',', '.');
                    $associativo['ARMOTIZACAO'] = "R$ " . number_format($amortizacao, 2, ',', '.');
                    $associativo['SEGURO DFI'] = "R$ " . number_format($sg_dfi_atual, 2, ',', '.');
                    $associativo['SEGURO MBI'] = "R$ " . number_format($sg_mbi_atual, 2, ',', '.');
                    $associativo['TAXA ADM'] = "R$ " . number_format($taxa_adm, 2, ',', '.');
                    $associativo['VALOR PARCELA'] = "R$ " . number_format($v_parcela, 2, ',', '.');
                    $associativo['CORRECAO'] = $indexadorTipo == 0.0089 ? "+ CDI" : "+ IPCA";
                    $arr[$i] = $associativo;
              
                    $valor_total += $v_parcela;
                    $sd_anterior = $sd_atual;
                    $sd_atual = $sd_atual - $amortizacao;
                    $j_anterior = $j_atual;
                    $j_atual =  $sd_anterior * $indexador;
                    $sg_mbi_anterior = $sg_mbi_atual;
                    $sg_mbi_atual = $sd_anterior * (0.021 / 100);
                }

   ?>
                <script>
                    let total = '<?= $_POST['indexador'] == 1 ? "0.89% A.M" : "1.09% A.M"; ?>'
                    let doc = document.getElementById('valor_total')
                    doc.innerText = total
                    let totalParcela = '<?= $arr[$qtdparcela]['VALOR PARCELA'] ?>'
                    let docs = document.getElementById('valor_parcela')
                    docs.innerText = totalParcela
                </script>

            </div>
        </div>
    </div>

</div>




<script src="../src/js/jquery-3-6-4.min.js"></script>
<script src="../src/js/cliente_ajax.js"></script>

<?php

require_once 'footer.php';
