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
                    <h6 class="text-capitalize"><?php echo "Nova Simulação"; ?></h6>
                    <!-- <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 2021
              </p> -->
                    <div class="d-flex justify-content-end"><a type="button" href="dashboard.php" class="btn btn-primary">Voltar</a></div>
                </div>
                <div class="card-body p-3">
                    <form action="resumo.php" method="post" class="mt-3">
                        <div class="row p-5" style="background-color: whitesmoke;
    border-radius: 10px;">
                            <h4>Dados Cliente</h4>
                            <div class="mb-3 col-6">
                                
                                <div class="col-12">
                                    <label for="exampleFormControlInput1" class="form-label">Nome do Cliente</label>
                                    <input type="text" id='nome' name="nome" class="form-control w-100 " placeholder="" required style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="tipo_cliente" class="form-label">Tipo de Cliente</label>
                                    <select style="padding-top: 0rem; padding-bottom: 0rem;height: 38px;box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);" onchange="cpf_cnpj()" class="form-select form-select-lg mb-3" required id="tipo_cliente" name="tipo_cliente" aria-label=".form-select-lg example" style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">

                                        <option value="PF" selected>Pessoa Física</option>
                                        <option value="PJ">Pessoa Jurídica</option>

                                    </select>
                                </div>


                            </div>

                            <div class="mb-3 col-6">
                                <div class="col-12">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" class="form-control w-100" id='email' name="email" placeholder="" required style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">Contato(Celular)</label>
                                    <input type="text" class="form-control w-100" id='contato' onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="contato" placeholder="" required style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="col-6">
                                    <label for="cpf" class="form-label" id="cpf_cnpj">CPF</label>
                                    <input type="cpf" class="form-control w-100" id='cpf' required name="cpf" placeholder="" required style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                                </div>
                            </div>

                        </div>

                        <div class="row mt-2 p-5" style="background-color: whitesmoke;
    border-radius: 10px;">
                            <h5>PRODUTO</h5>
                            <div class="d-flex justify-content-evenly mt-3">

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
                            </div>
                            <div class="row ">
                                <div class="row ">
                                    <h2 class="mt-4">Cálculo</h2>
                                    <div class="mb-3 col-4">
                                        <label for="exampleFormControlInput1" class="form-label">Valor Imóvel</label>
                                        <input type="number" min="250000" required class="form-control" id='vimovel' onchange="defineValorMaximo()" name="vimovel" placeholder="" style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label for="exampleFormControlInput1" class="form-label">Valor Crédito</label>
                                        <input type='number' required class="form-control" id='vcredito' name="vcredito" placeholder="" style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                                    </div>

                                    <div class="mb-3 col-4">
                                        <label for="exampleFormControlInput1" class="form-label">Tipo de Indexador</label>
                                        <select class="form-select form-select-lg mb-3" required id="indexador" name="indexador" aria-label=".form-select-lg example" style="padding-top: 0rem; padding-bottom: 0rem; height: 38px;box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
                                            <option selected>Selecione...</option>
                                            <option value="1">CDI</option>
                                            <option value="2">IPCA</option>

                                        </select>
                                    </div>

                                </div>

                                <div class=" d-flex justify-content-between mt-3">
                                    <div class="mb-3 col-6" style="max-width: 600px;">
                                        <!-- <label class="input-group-text fs-6" for="qtdparcela">Qtd Parcelas</label>
                        <select class="form-select" id='qtdparcela' name="qtdparcela">
                            <option selected>Selecione...</option>

                            <option value="1">60 meses</option>
                            <option value="2">120 meses</option>
                            <option value="3">168 meses</option>
                            <option value="4">180 meses</option>
                            <option value="5">240 meses</option>
                        </select> -->
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="carencia">Qtd Parcelas</label>
                                                <input type="range" name="vol2" value="60" min="60" max="240" step="60" oninput="display2.value=value" onchange="display2.value=value">
                                            </div>
                                            <div class="col-12">
                                                <input type="text" id="display2" value="60" name="qtdparcela" readonly style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);
    border: none;
    border-radius: 10px;
    text-align: center;
    margin-top: 10px;">
                                            </div>
                                        </div>
                                        <!-- <label for="carencia">Quantidade Parcelas</label>
                            <input type="range" name="vol2" value="60" min="60" max="240" step="60" oninput="display2.value=value" onchange="display2.value=value">
                            <input type="text" id="display2" value="60" name="qtdparcela" readonly> -->



                                    </div>

                                    <div class=" mb-3 col-6" style="max-width: 600px;">
                                        <!-- <label class="input-group-text fs-6" for="inputGroupSelect01">Carência</label>
                        <select class="form-select" id="carencia" name="carencia">
                            <option selected>Selecione...</option>
                            <option value="0">Sem carência</option>
                            <option value="1">1 mês</option>
                            <option value="2">2 meses</option>
                            <option value="3">3 meses</option>
                        </select> -->
                                        <div class="row">
                                            <div class="col-12"><label for="carencia">Carência</label>
                                                <input type="range" name="vol" value="0" min="1" max="3" oninput="display.value=value" onchange="display.value=value">
                                            </div>
                                            <div class="col-12"><input type="text" id="display" value="1" name="carencia" readonly style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);
    border: none;
    border-radius: 10px;
    text-align: center;
    margin-top: 10px;"></div>
                                        </div>

                                    </div>



                                </div>
                                <div class="d-flex mt-3 justify-content-center">
                                    <button type="submit" class="btn btn-success btn-lg ">Calcular</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-5">
          <div class="card card-carousel overflow-hidden h-100 p-0">
            <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
              <div class="carousel-inner border-radius-lg h-100">
                <div class="carousel-item h-100 active" style="background-image: url('./assets/img/carousel-1.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-camera-compact text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Get started with Argon</h5>
                    <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('./assets/img/carousel-2.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Faster way to create web pages</h5>
                    <p>That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('./assets/img/carousel-3.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-trophy text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Share with us your design tips!</h5>
                    <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div> -->
    </div>
    <!-- <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Sales by Country</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center ">
                        <tbody>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="./assets/img/icons/flags/US.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Country:</p>
                                            <h6 class="text-sm mb-0">United States</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                        <h6 class="text-sm mb-0">2500</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Value:</p>
                                        <h6 class="text-sm mb-0">$230,900</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-sm">
                                    <div class="col text-center">
                                        <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                        <h6 class="text-sm mb-0">29.9%</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="./assets/img/icons/flags/DE.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Country:</p>
                                            <h6 class="text-sm mb-0">Germany</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                        <h6 class="text-sm mb-0">3.900</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Value:</p>
                                        <h6 class="text-sm mb-0">$440,000</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-sm">
                                    <div class="col text-center">
                                        <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                        <h6 class="text-sm mb-0">40.22%</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="./assets/img/icons/flags/GB.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Country:</p>
                                            <h6 class="text-sm mb-0">Great Britain</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                        <h6 class="text-sm mb-0">1.400</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Value:</p>
                                        <h6 class="text-sm mb-0">$190,700</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-sm">
                                    <div class="col text-center">
                                        <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                        <h6 class="text-sm mb-0">23.44%</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="./assets/img/icons/flags/BR.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Country:</p>
                                            <h6 class="text-sm mb-0">Brasil</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                        <h6 class="text-sm mb-0">562</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Value:</p>
                                        <h6 class="text-sm mb-0">$143,960</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-sm">
                                    <div class="col text-center">
                                        <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                        <h6 class="text-sm mb-0">32.14%</h6>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Categories</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Devices</h6>
                                    <span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-tag text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                                    <span class="text-xs">123 closed, <span class="font-weight-bold">15 open</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-box-2 text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                                    <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-satisfied text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                                    <span class="text-xs font-weight-bold">+ 430</span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->



    <script src="../src/js/jquery-3-6-4.min.js"></script>
    <!-- <script src="../src/js/jquery-3-6-4.min.js"></script> -->
    <script>
        function defineValorMaximo() {
            var elemento = document.getElementById('vcredito');
            var vimovel = document.getElementById('vimovel');

            var valor = elemento.value;
            var valorImovel = vimovel.value;
            var max = ((60 / 100) * valorImovel);

            elemento.setAttribute("max", max);

        }
        // inicio função formata telefone
        function mask(o, f) {
            setTimeout(function() {
                var v = mphone(o.value);
                if (v != o.value) {
                    o.value = v;
                }
            }, 1);
        }

        function mphone(v) {
            var r = v.replace(/\D/g, "");
            r = r.replace(/^0/, "");
            if (r.length > 10) {
                r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
            } else if (r.length > 5) {
                r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
            } else if (r.length > 2) {
                r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
            } else {
                r = r.replace(/^(\d*)/, "($1");
            }
            return r;
        }

        function cpf_cnpj() {
            var tipo_cliente = document.getElementById('tipo_cliente').value;
            var label = document.getElementById("cpf_cnpj")
            if (tipo_cliente == "PF") {
                label.innerHTML = 'CPF'
            } else {
                label.innerHTML = 'CNPJ'
            }


        }

        // FIM função formata telefone
    </script>

    <?php

    require_once 'footer.php';
