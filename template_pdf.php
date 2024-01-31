<?php
header('Content-type: application/pdf');
require __DIR__ . '/src/dompdf/autoload.inc.php';

//variavels de input
$nome = $_POST['nome'] ? $_POST['nome'] : 'NOME';
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$contato = $_POST['contato'];
$p1 = $_POST['p1'] ? 'Home Equity' : '';
$p2 = $_POST['p2'] ? 'Condo Primus' : '';
$vimovel = $_POST['vimovel'];
$vcredito = $_POST['vcredito'];
$indexadorTipo = $_POST['indexador'] == 1 ? 0.89 / 100 : 1.09 / 100;
$taxa_texto = $_POST['indexador'] == 1 ? "0.89% A.M" : "1.09% A.M";
$qtdparcela = $_POST['qtdparcela'];
$carenciaqtd = $_POST['carencia'];
$tipo_cliente = $_POST['tipo_cliente'] == 'PF' ? 'CPF' : 'CNPJ';
$valor_total = 0;
$carenciatxt = '';
if ($carenciaqtd == 1) {
    $carenciatxt = "1 Mês";
} elseif( $carenciaqtd == 2 ) {
    $carenciatxt ="2 Meses";
}else{
    $carenciatxt ="3 Meses";
}

$tipo_produto = '';

if ($p1 != '') {
    $tipo_produto = $p1;
} else {
    $tipo_produto = $p2;
}
// echo $carencia;
// exit;

//fim das variaveis

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->setChroot(__DIR__);
$options->set('isRemoteEnabled', TRUE);




$dompdf = new Dompdf($options);
// calcula de acordo com a carência
if($carenciaqtd == 1){
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
    $html .= '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/bootstrap53/css/bootstrap.css">


    <title>Primus - Simulador</title>
</head>
<style>
    table{
        font-size:14px;
        border-collapse: collapse;
      
    }
    th, td {
        border-bottom: 2px solid #ddd;
      }
      tr:nth-child(even) {background-color: #dddddd;}
      td{
        padding:3px 5px;
      }
      thead tr {
        background-color: #0d6efd;
        color: #ffffff;
        text-align: left;
        cellspacing="5px";
      
    }
    thead tr td {
    
        text-align: left;
      
    }
    tbody tr {
        border-bottom: 1px solid #dddddd;
    }

</style>
<body>
    <div class="container">
        <div class="" style="display: grid;text-align:center;
        align-items: center;
        justify-content: center;">

            <div class="row">
                <div class="col-6 mt-5">
                    <img src="./imagens/logo.png" alt="" style=" width: 196px;">
                </div>

            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <h2 style="text-align:center;">Dados do Cliente</h2>
        </div>
        
        <div class="cliente"  style="display:inline !important;">
            <div class="col-6">
                <div class="row">
                    <div class="col-6" style="
                  
                    width: 50%;
                ">
                        <b>Nome: ' . $nome . '</b>
                    </div>
                    <div class="col-6" >
                        <b>' . $tipo_cliente . ': ' . $cpf . '</b>
                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="row" >
                    <div class="col-6" >
                        <b>Email: ' . $email . '</b>
                    </div>
                    <div class="col-6" ;
                ">

                        <b>Contato: ' . $contato . '</b>
                    </div>
                </div>
            </div>

        </div>
        <hr>
        <div class="row mt-5">
            <h2 style="text-align:center;">Dados da Simulação</h2>
        </div>

        <div class="taxa" style=" font-weight: bold;;
      ">
      <div class="">
      <b id="valor_total" 
      >Produto: ' . $tipo_produto . '</b>
    </div>  
          <div class="">
            <b id="valor_total" >Taxa de Juros: ' . $taxa_texto . '</b>
          </div>
          <div>
            <b id="valor_total" >Valor Solicitado: R$ ' . number_format($valor_liquido, 2, ',', '.') . '</b>
          </div>
           <div>
            <b id="valor_total" >Valor do Imóvel: R$ ' . number_format($valor_imovel, 2, ',', '.') . '</b>
           </div>
            <div>
                <b id="valor_total" >Quantidade Parcelas: ' . $qtdparcela . 'x</b>
            </div>
            <div>
                <b id="" >Carência: '. $carenciatxt .'</b>
            </div>
        </div>
        <div style="color:gray; font-size:12px; margin-top:15px;">
        <b>Observação Importante:</b> Este documento mostra os resultados de uma simulação, por isso, não tem valor legal. É APENAS UMA SIMULAÇÃO, a formalização dessa proposta irá depender do laudo do imóvel oferecido como garantia, parecer jurídico de todos os envolvidos no contrato e a capacidade mensal de pagamento. Não existe nenhuma obrigação da Primus Bank enquanto o contrato de empréstimo com imóvel em garantia não for efetivamente assinado e registrado pelo Cartório de Registro de Imóvel responsável pelo imóvel.
        </div>
        <div class="table-responsive" style="margin-top:15px;margin-left:50px">
           
            <table class="table" style="  cellspacing="10";
            cellpadding="4"; margin-top:20px">
           
                <thead >
                  <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">S.Devedor</th>
                    <th scope="col">Amortização</th>
                    <th scope="col">Juros</th>
                    <th scope="col">Seguro MBI</th>
                    <th scope="col">Seguro DFI</th>
                    <th scope="col">Taxa ADM</th>
                    <th scope="col">Valor Parcela</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <th scope="row">0</th>
                  <td>R$' . number_format($saldo_devedor_inicial, 2, ',', '.') . '</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                 
                  </tr>
                  <tr>
                    <th scope="row">1
                    </th>
                    <td>R$'  . number_format($saldo_devedor_atual, 2, ',', '.') . '</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  
                  </tr>
                  <tr>
                    <th scope="row">2
                    </th>
                    <td>R$'  . number_format($saldo_primeira_parcela, 2, ',', '.') . '</td>
                    <td>R$' . number_format($amortizacao, 2, ',', '.') . '</td>
                    <td>R$' . number_format($juros_primeira_parcela, 2, ',', '.') . '</td>
                    <td>R$' . number_format($seguro_mbi_primeira_parcela, 2, ',', '.') . '</td>
                    <td>R$' . number_format($seguro_dfi_primeira_parcela, 2, ',', '.') . '</td>
                    <td>R$' . number_format($taxa_adm_primeira_parcela, 2, ',', '.') . '</td>
                    <td>R$' . number_format($valor_primeira_parcela, 2, ',', '.') . '</td>
                  </tr>';

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

    $html .= ' <tr>
<th scope="row">' . $i . '</th>
<td>R$'  . number_format($sd_atual, 2, ',', '.') . '</td>
<td>R$' . number_format($amortizacao, 2, ',', '.') . '</td>
<td>R$' . number_format($j_atual, 2, ',', '.') . '</td>
<td>R$' . number_format($sg_mbi_atual, 2, ',', '.') . '</td>
<td>R$' . number_format($sg_dfi_atual, 2, ',', '.') . '</td>
<td>R$' . number_format($taxa_adm, 2, ',', '.') . '</td>
<td>R$' . number_format($v_parcela, 2, ',', '.') . '</td>

</tr>';

    $valor_total += $v_parcela;
    $sd_anterior = $sd_atual;
    $sd_atual = $sd_atual - $amortizacao;
    $j_anterior = $j_atual;
    $j_atual =  $sd_anterior * $indexador;
    $sg_mbi_anterior = $sg_mbi_atual;
    $sg_mbi_atual = $sd_anterior * (0.021 / 100);
}


$html .= '</tbody>
              
</table>

</div>
</div>
<footer>  <div style="color:gray; font-size:14px; margin-top:15px">
<b>Observação Importante:</b> Este documento mostra os resultados de uma simulação, por isso, não tem valor legal. É APENAS UMA SIMULAÇÃO, a formalização dessa proposta irá depender do laudo do imóvel oferecido como garantia, parecer jurídico de todos os envolvidos no contrato e a capacidade mensal de pagamento. Não existe nenhuma obrigação da Primus Bank enquanto o contrato de empréstimo com imóvel em garantia não for efetivamente assinado e registrado pelo Cartório de Registro de Imóvel responsável pelo imóvel.
</div></footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>';


$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');
$dompdf->render();



echo $dompdf->output();

}elseif($carenciaqtd == 2){

    $valor_liquido = $vcredito;

$valor_imovel = $vimovel;

$saldo_devedor_inicial = ($valor_liquido * (12.38 / 100)) + $valor_liquido;
$indexador = $indexadorTipo;

$saldo_devedor_atual =  ($saldo_devedor_inicial * (101.49 / 100));

$saldo_devedor_atual60 = ($saldo_devedor_atual * (101.49 / 100));

$prazo_contratado = $qtdparcela;

$carencia = $carenciaqtd;

$amortizacao = $saldo_devedor_atual60 / ($prazo_contratado - $carencia);

$saldo_primeira_parcela = $saldo_devedor_atual60 - $amortizacao;

$juros_primeira_parcela = $saldo_devedor_atual60 * $indexador;

$seguro_mbi_primeira_parcela = ($saldo_devedor_inicial * (0.021 / 100) + $saldo_devedor_atual * (0.021 / 100) + $saldo_devedor_atual60 * (0.021 / 100));

$seguro_dfi_primeira_parcela = $valor_imovel * ((0.0037 / 100) * 3);
$taxa_adm = 25.00;

$taxa_adm_primeira_parcela = $taxa_adm * 3;

$valor_primeira_parcela = $amortizacao + $juros_primeira_parcela + $seguro_mbi_primeira_parcela + $seguro_dfi_primeira_parcela + $taxa_adm_primeira_parcela;
    $html .= '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../src/bootstrap53/css/bootstrap.css">
    
    
        <title>Primus - Simulador</title>
    </head>
    <style>
        table{
            font-size:14px;
            border-collapse: collapse;
          
        }
        th, td {
            border-bottom: 2px solid #ddd;
          }
          tr:nth-child(even) {background-color: #dddddd;}
          td{
            padding:3px 5px;
          }
          thead tr {
            background-color: #0d6efd;
            color: #ffffff;
            text-align: left;
            cellspacing="5px";
          
        }
        thead tr td {
        
            text-align: left;
          
        }
        tbody tr {
            border-bottom: 1px solid #dddddd;
        }
    
    </style>
    <body>
        <div class="container">
            <div class="" style="display: grid;text-align:center;
            align-items: center;
            justify-content: center;">
    
                <div class="row">
                    <div class="col-6 mt-5">
                        <img src="./imagens/logo.png" alt="" style=" width: 196px;">
                    </div>
    
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <h2 style="text-align:center;">Dados do Cliente</h2>
            </div>
            
            <div class="cliente"  style="display:inline !important;">
                <div class="col-6">
                    <div class="row">
                        <div class="col-6" style="
                      
                        width: 50%;
                    ">
                            <b>Nome: ' . $nome . '</b>
                        </div>
                        <div class="col-6" >
                            <b>' . $tipo_cliente . ': ' . $cpf . '</b>
                        </div>
                    </div>
    
                </div>
                <div class="col-6">
                    <div class="row" >
                        <div class="col-6" >
                            <b>Email: ' . $email . '</b>
                        </div>
                        <div class="col-6" ;
                    ">
    
                            <b>Contato: ' . $contato . '</b>
                        </div>
                    </div>
                </div>
    
            </div>
            <hr>
            <div class="row mt-5">
                <h2 style="text-align:center;">Dados da Simulação</h2>
            </div>
    
            <div class="taxa" style=" font-weight: bold;;
          ">
          <div class="">
          <b id="valor_total" 
          >Produto: ' . $tipo_produto . '</b>
        </div>  
              <div class="">
                <b id="valor_total" >Taxa de Juros: ' . $taxa_texto . '</b>
              </div>
              <div>
                <b id="valor_total" >Valor Solicitado: R$ ' . number_format($valor_liquido, 2, ',', '.') . '</b>
              </div>
               <div>
                <b id="valor_total" >Valor do Imóvel: R$ ' . number_format($valor_imovel, 2, ',', '.') . '</b>
               </div>
                <div>
                    <b id="valor_total" >Quantidade Parcelas: ' . $qtdparcela . 'x</b>
                </div>
                <div>
                    <b id="" >Carência: '. $carenciatxt .'</b>
                </div>
            </div>
            <div style="color:gray; font-size:12px; margin-top:15px;">
            <b>Observação Importante:</b> Este documento mostra os resultados de uma simulação, por isso, não tem valor legal. É APENAS UMA SIMULAÇÃO, a formalização dessa proposta irá depender do laudo do imóvel oferecido como garantia, parecer jurídico de todos os envolvidos no contrato e a capacidade mensal de pagamento. Não existe nenhuma obrigação da Primus Bank enquanto o contrato de empréstimo com imóvel em garantia não for efetivamente assinado e registrado pelo Cartório de Registro de Imóvel responsável pelo imóvel.
            </div>
            <div class="table-responsive" style="margin-top:15px;margin-left:50px">
               
                <table class="table" style="  cellspacing="10";
                cellpadding="4"; margin-top:20px">
               
                    <thead >
                      <tr>
                        <th scope="col">Nº</th>
                        <th scope="col">S.Devedor</th>
                        <th scope="col">Amortização</th>
                        <th scope="col">Juros</th>
                        <th scope="col">Seguro MBI</th>
                        <th scope="col">Seguro DFI</th>
                        <th scope="col">Taxa ADM</th>
                        <th scope="col">Valor Parcela</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <th scope="row">0</th>
                      <td>R$' . number_format($saldo_devedor_inicial, 2, ',', '.') . '</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                     
                      </tr>
                      <tr>
                        <th scope="row">1
                        </th>
                        <td>R$'  . number_format($saldo_devedor_atual, 2, ',', '.') . '</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      
                      </tr>
                      <tr>
                        <th scope="row">2
                        </th>
                        <td>R$'  . number_format($saldo_devedor_atual60, 2, ',', '.') . '</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      <tr>
                        <th scope="row">3
                        </th>
                        <td>R$'  . number_format($saldo_primeira_parcela, 2, ',', '.') . '</td>
                        <td>R$' . number_format($amortizacao, 2, ',', '.') . '</td>
                        <td>R$' . number_format($juros_primeira_parcela, 2, ',', '.') . '</td>
                        <td>R$' . number_format($seguro_mbi_primeira_parcela, 2, ',', '.') . '</td>
                        <td>R$' . number_format($seguro_dfi_primeira_parcela, 2, ',', '.') . '</td>
                        <td>R$' . number_format($taxa_adm_primeira_parcela, 2, ',', '.') . '</td>
                        <td>R$' . number_format($valor_primeira_parcela, 2, ',', '.') . '</td>
                      </tr>';
    
    $sd_anterior = $saldo_primeira_parcela;
    $sd_atual = $saldo_primeira_parcela - $amortizacao;
    $j_anterior = $juros_primeira_parcela;
    $j_atual = $sd_anterior * $indexador;
    $v_parcela = 0;
    
    $sg_dfi_atual = $seguro_dfi_primeira_parcela / 3;
    $sg_mbi_atual = $sd_anterior * (0.021 / 100);
    $sg_mbi_anterior = 0;
    
    
    
    for ($i = 4; $i <= $qtdparcela; $i++) {
        # sd_anterior = sd_atual
        $v_parcela = $amortizacao + $j_atual + $sg_mbi_atual + $sg_dfi_atual + $taxa_adm;
    
        $html .= ' <tr>
    <th scope="row">' . $i . '</th>
    <td>R$'  . number_format($sd_atual, 2, ',', '.') . '</td>
    <td>R$' . number_format($amortizacao, 2, ',', '.') . '</td>
    <td>R$' . number_format($j_atual, 2, ',', '.') . '</td>
    <td>R$' . number_format($sg_mbi_atual, 2, ',', '.') . '</td>
    <td>R$' . number_format($sg_dfi_atual, 2, ',', '.') . '</td>
    <td>R$' . number_format($taxa_adm, 2, ',', '.') . '</td>
    <td>R$' . number_format($v_parcela, 2, ',', '.') . '</td>
    
    </tr>';
    
        $valor_total += $v_parcela;
        $sd_anterior = $sd_atual;
        $sd_atual = $sd_atual - $amortizacao;
        $j_anterior = $j_atual;
        $j_atual =  $sd_anterior * $indexador;
        $sg_mbi_anterior = $sg_mbi_atual;
        $sg_mbi_atual = $sd_anterior * (0.021 / 100);
    }
    
    
    $html .= '</tbody>
                  
    </table>
    
    </div>
    </div>
    <footer>  <div style="color:gray; font-size:14px; margin-top:15px">
    <b>Observação Importante:</b> Este documento mostra os resultados de uma simulação, por isso, não tem valor legal. É APENAS UMA SIMULAÇÃO, a formalização dessa proposta irá depender do laudo do imóvel oferecido como garantia, parecer jurídico de todos os envolvidos no contrato e a capacidade mensal de pagamento. Não existe nenhuma obrigação da Primus Bank enquanto o contrato de empréstimo com imóvel em garantia não for efetivamente assinado e registrado pelo Cartório de Registro de Imóvel responsável pelo imóvel.
    </div></footer>
    </body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    </html>';
    
    
    $dompdf->loadHtml($html);
    
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    
    
    
    echo $dompdf->output();
    
}else{
    $valor_liquido = $vcredito;

    $valor_imovel = $vimovel;
    
    $saldo_devedor_inicial = ($valor_liquido * (12.38 / 100)) + $valor_liquido;
    $indexador = $indexadorTipo;
    
    $saldo_devedor_atual =  ($saldo_devedor_inicial * (101.49 / 100));
    
    $saldo_devedor_atual60 = ($saldo_devedor_atual * (101.49 / 100));
    
    $saldo_devedor_atual90 = ($saldo_devedor_atual60 * (101.49 / 100));
    
    $prazo_contratado = $qtdparcela;
    
    $carencia = $carenciaqtd;
    
    $amortizacao = $saldo_devedor_atual90 / ($prazo_contratado - $carencia);
    
    $saldo_primeira_parcela = $saldo_devedor_atual90 - $amortizacao;
    
    $juros_primeira_parcela = $saldo_devedor_atual90 * $indexador;
    
    $seguro_mbi_primeira_parcela = ($saldo_devedor_inicial * (0.021 / 100) + $saldo_devedor_atual * (0.021 / 100) + $saldo_devedor_atual60 * (0.021 / 100) + $saldo_devedor_atual90 * (0.021 / 100));
    
    $seguro_dfi_primeira_parcela = $valor_imovel * ((0.0037 / 100) * 4);
    $taxa_adm = 25.00;
    
    $taxa_adm_primeira_parcela = $taxa_adm * 4;
    
    $valor_primeira_parcela = $amortizacao + $juros_primeira_parcela + $seguro_mbi_primeira_parcela + $seguro_dfi_primeira_parcela + $taxa_adm_primeira_parcela;
        $html .= '<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../src/bootstrap53/css/bootstrap.css">
        
        
            <title>Primus - Simulador</title>
        </head>
        <style>
            table{
                font-size:14px;
                border-collapse: collapse;
              
            }
            th, td {
                border-bottom: 2px solid #ddd;
              }
              tr:nth-child(even) {background-color: #dddddd;}
              td{
                padding:3px 5px;
              }
              thead tr {
                background-color: #0d6efd;
                color: #ffffff;
                text-align: left;
                cellspacing="5px";
              
            }
            thead tr td {
            
                text-align: left;
              
            }
            tbody tr {
                border-bottom: 1px solid #dddddd;
            }
        
        </style>
        <body>
            <div class="container">
                <div class="" style="display: grid;text-align:center;
                align-items: center;
                justify-content: center;">
        
                    <div class="row">
                        <div class="col-6 mt-5">
                            <img src="./imagens/logo.png" alt="" style=" width: 196px;">
                        </div>
        
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <div class="row">
                    <h2 style="text-align:center;">Dados do Cliente</h2>
                </div>
                
                <div class="cliente"  style="display:inline !important;">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6" style="
                          
                            width: 50%;
                        ">
                                <b>Nome: ' . $nome . '</b>
                            </div>
                            <div class="col-6" >
                                <b>' . $tipo_cliente . ': ' . $cpf . '</b>
                            </div>
                        </div>
        
                    </div>
                    <div class="col-6">
                        <div class="row" >
                            <div class="col-6" >
                                <b>Email: ' . $email . '</b>
                            </div>
                            <div class="col-6" ;
                        ">
        
                                <b>Contato: ' . $contato . '</b>
                            </div>
                        </div>
                    </div>
        
                </div>
                <hr>
                <div class="row mt-5">
                    <h2 style="text-align:center;">Dados da Simulação</h2>
                </div>
        
                <div class="taxa" style=" font-weight: bold;;
              ">
              <div class="">
              <b id="valor_total" 
              >Produto: ' . $tipo_produto . '</b>
            </div>  
                  <div class="">
                    <b id="valor_total" >Taxa de Juros: ' . $taxa_texto . '</b>
                  </div>
                  <div>
                    <b id="valor_total" >Valor Solicitado: R$ ' . number_format($valor_liquido, 2, ',', '.') . '</b>
                  </div>
                   <div>
                    <b id="valor_total" >Valor do Imóvel: R$ ' . number_format($valor_imovel, 2, ',', '.') . '</b>
                   </div>
                    <div>
                        <b id="valor_total" >Quantidade Parcelas: ' . $qtdparcela . 'x</b>
                    </div>
                    <div>
                        <b id="" >Carência: '. $carenciatxt .'</b>
                    </div>
                </div>
                <div style="color:gray; font-size:12px; margin-top:15px;">
                <b>Observação Importante:</b> Este documento mostra os resultados de uma simulação, por isso, não tem valor legal. É APENAS UMA SIMULAÇÃO, a formalização dessa proposta irá depender do laudo do imóvel oferecido como garantia, parecer jurídico de todos os envolvidos no contrato e a capacidade mensal de pagamento. Não existe nenhuma obrigação da Primus Bank enquanto o contrato de empréstimo com imóvel em garantia não for efetivamente assinado e registrado pelo Cartório de Registro de Imóvel responsável pelo imóvel.
                </div>
                <div class="table-responsive" style="margin-top:15px;margin-left:50px">
                   
                    <table class="table" style="  cellspacing="10";
                    cellpadding="4"; margin-top:20px">
                   
                        <thead >
                          <tr>
                            <th scope="col">Nº</th>
                            <th scope="col">S.Devedor</th>
                            <th scope="col">Amortização</th>
                            <th scope="col">Juros</th>
                            <th scope="col">Seguro MBI</th>
                            <th scope="col">Seguro DFI</th>
                            <th scope="col">Taxa ADM</th>
                            <th scope="col">Valor Parcela</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <th scope="row">0</th>
                          <td>R$' . number_format($saldo_devedor_inicial, 2, ',', '.') . '</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                         
                          </tr>
                          <tr>
                            <th scope="row">1
                            </th>
                            <td>R$'  . number_format($saldo_devedor_atual, 2, ',', '.') . '</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                          
                          </tr>
                          <tr>
                            <th scope="row">2
                            </th>
                            <td>R$'  . number_format($saldo_devedor_atual60, 2, ',', '.') . '</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                        <th scope="row">3
                        </th>
                        <td>R$'  . number_format($saldo_devedor_atual90, 2, ',', '.') . '</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        </tr>
                          <tr>
                            <th scope="row">4
                            </th>
                            <td>R$'  . number_format($saldo_primeira_parcela, 2, ',', '.') . '</td>
                            <td>R$' . number_format($amortizacao, 2, ',', '.') . '</td>
                            <td>R$' . number_format($juros_primeira_parcela, 2, ',', '.') . '</td>
                            <td>R$' . number_format($seguro_mbi_primeira_parcela, 2, ',', '.') . '</td>
                            <td>R$' . number_format($seguro_dfi_primeira_parcela, 2, ',', '.') . '</td>
                            <td>R$' . number_format($taxa_adm_primeira_parcela, 2, ',', '.') . '</td>
                            <td>R$' . number_format($valor_primeira_parcela, 2, ',', '.') . '</td>
                          </tr>';
        
        $sd_anterior = $saldo_primeira_parcela;
        $sd_atual = $saldo_primeira_parcela - $amortizacao;
        $j_anterior = $juros_primeira_parcela;
        $j_atual = $sd_anterior * $indexador;
        $v_parcela = 0;
        
        $sg_dfi_atual = $seguro_dfi_primeira_parcela / 4;
        $sg_mbi_atual = $sd_anterior * (0.021 / 100);
        $sg_mbi_anterior = 0;
        
        
        
        for ($i = 5; $i <= $qtdparcela; $i++) {
            # sd_anterior = sd_atual
            $v_parcela = $amortizacao + $j_atual + $sg_mbi_atual + $sg_dfi_atual + $taxa_adm;
        
            $html .= ' <tr>
        <th scope="row">' . $i . '</th>
        <td>R$'  . number_format($sd_atual, 2, ',', '.') . '</td>
        <td>R$' . number_format($amortizacao, 2, ',', '.') . '</td>
        <td>R$' . number_format($j_atual, 2, ',', '.') . '</td>
        <td>R$' . number_format($sg_mbi_atual, 2, ',', '.') . '</td>
        <td>R$' . number_format($sg_dfi_atual, 2, ',', '.') . '</td>
        <td>R$' . number_format($taxa_adm, 2, ',', '.') . '</td>
        <td>R$' . number_format($v_parcela, 2, ',', '.') . '</td>
        
        </tr>';
        
            $valor_total += $v_parcela;
            $sd_anterior = $sd_atual;
            $sd_atual = $sd_atual - $amortizacao;
            $j_anterior = $j_atual;
            $j_atual =  $sd_anterior * $indexador;
            $sg_mbi_anterior = $sg_mbi_atual;
            $sg_mbi_atual = $sd_anterior * (0.021 / 100);
        }
        
        
        $html .= '</tbody>
                      
        </table>
        
        </div>
        </div>
        <footer>  <div style="color:gray; font-size:14px; margin-top:15px">
        <b>Observação Importante:</b> Este documento mostra os resultados de uma simulação, por isso, não tem valor legal. É APENAS UMA SIMULAÇÃO, a formalização dessa proposta irá depender do laudo do imóvel oferecido como garantia, parecer jurídico de todos os envolvidos no contrato e a capacidade mensal de pagamento. Não existe nenhuma obrigação da Primus Bank enquanto o contrato de empréstimo com imóvel em garantia não for efetivamente assinado e registrado pelo Cartório de Registro de Imóvel responsável pelo imóvel.
        </div></footer>
        </body>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        
        </html>';
        
        
        $dompdf->loadHtml($html);
        
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        
        
        echo $dompdf->output();
}



