<?php
require __DIR__.'/src/dompdf/autoload.inc.php';
require_once 'hdsimulador.php';
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
$tipo_cliente= $_POST['tipo_cliente'] == 'PF' ? 'CPF' : 'CNPJ';
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

// echo "<hr>";

// echo "Nome: " .$nome . "<br>";
// echo "CPF: " .$cpf . "<br>";
// echo "Email: " .$email . "<br>";
// echo "Contato: " .$contato . "<br>";
// echo "Valor Liquido: " .$valor_liquido . "<br>";
// echo "P2: " .$p2 . "<br>";
// echo "Valor Imovel: " .$valor_imovel . "<br>";
// // echo "Valor Credito: " .$vcredito . "<br>";
// echo "Saldo devedor Inicial: " .$saldo_devedor_inicial . "<br>";
// echo "Saldo devedor Atual: " .$saldo_devedor_atual . "<br>";
// echo "Carencia: " .$carencia . "<br>";
// echo "Saldo Primeira Parcela: " .$saldo_primeira_parcela . "<br>";
// echo "Armotizacao: " .$amortizacao . "<br>";
// echo "Juros Primeira Parcela: " .$juros_primeira_parcela . "<br>";
// echo "Seguro MBI Primeira Parcela: " .$seguro_mbi_primeira_parcela . "<br>";
// echo "Seguro DFI Primeira Parcela: " .$seguro_dfi_primeira_parcela . "<br>";
// echo "Taxa Primeira Parcela: " .$taxa_adm_primeira_parcela . "<br>";
// echo "Valor Primeira Parcela: " .$valor_primeira_parcela . "<br>";

// number_format($numero, 2, ',', '.')



use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->setChroot(__DIR__);


$dompdf = new Dompdf($options);
$html='<div class="container">
<h3>Dados do Cliente</h3>
<div class="row">
    <div class="col-3">
        <h6>Nome: <?= $nome; ?></h6>
    </div>
    <div class="col-3">
        <h6><?= $tipo_cliente .": " . $cpf; ?></h6>
    </div>
    <div class="col-3">
        <h6>Email: <?= $email; ?></h6>
    </div>
    <div class="col-3">
        <h6>Contato: <?= $contato; ?></h6>
    </div>
</div>
<div class="row text-center mt-5" style="display: block;">
    <div class="d-flex justify-content-center">
        <div class="card text-bg-primary mb-3" style="max-width:300px">
            <div class="card-header">
                Taxa de Juros:
            </div>
            <div class="card-body">
                <h5 id="valor_total" class="card-title">0,98% ao mês</h5>

            </div>
        </div>
    </div>

</div>
<div class="row text-center mt-5">
    <div class="d-flex justify-content-end">
    <input class="btn btn-outline-primary" type="button" value="Imprimir simulação" onClick="window.print()"/>

    </div>

</div>
<hr>
</div>
<table class="table table-striped-columns table-hover mt-3">
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
        <td><?= "R$ " . number_format($saldo_devedor_inicial, 2, ",", "."); ?></td>
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
        <td><?= "R$ " . number_format($saldo_devedor_atual, 2, ",", "."); ?></td>
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
        <td><?= "R$ " . number_format($saldo_primeira_parcela, 2, ",", "."); ?></td>
        <td><?= "R$ " . number_format($amortizacao, 2, ",", "."); ?></td>
        <td><?= "R$ " . number_format($juros_primeira_parcela, 2, ",", "."); ?></td>
        <td><?= "R$ " . number_format($seguro_mbi_primeira_parcela, 2, ",", "."); ?></td>
        <td><?= "R$ " . number_format($seguro_dfi_primeira_parcela, 2, ",", "."); ?></td>
        <td><?= "R$ " . number_format($taxa_adm_primeira_parcela, 2, ",", "."); ?></td>
        <td><?= "R$ " . number_format($valor_primeira_parcela, 2, ",", "."); ?></td>
       <td><?= $indexadorTipo == 0.0089 ? "+ CDI" : "+ IPCA" ;?></td>
    </tr>
';
$dompdf->loadHtml($html);


$dompdf->render();

header('Content-type: application/pdf');

echo $dompdf->output();
exit;
?>
<div class="container">
    <h3>Dados do Cliente</h3>
    <div class="row">
        <div class="col-3">
            <h6>Nome: <?= $nome; ?></h6>
        </div>
        <div class="col-3">
            <h6><?= $tipo_cliente .': ' . $cpf; ?></h6>
        </div>
        <div class="col-3">
            <h6>Email: <?= $email; ?></h6>
        </div>
        <div class="col-3">
            <h6>Contato: <?= $contato; ?></h6>
        </div>
    </div>
    <div class="row text-center mt-5" style="display: block;">
        <div class="d-flex justify-content-center">
            <div class="card text-bg-primary mb-3" style="max-width:300px">
                <div class="card-header">
                    Taxa de Juros:
                </div>
                <div class="card-body">
                    <h5 id="valor_total" class="card-title">0,98% ao mês</h5>

                </div>
            </div>
        </div>

    </div>
    <div class="row text-center mt-5">
        <div class="d-flex justify-content-end">
        <input class="btn btn-outline-primary" type="button" value="Imprimir simulação" onClick="window.print()"/>

        </div>

    </div>
    <hr>
</div>
<table class="table table-striped-columns table-hover mt-3">
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
           <td><?= $indexadorTipo == 0.0089 ? "+ CDI" : "+ IPCA" ;?></td>
        </tr>


        <?php
            $arr = [];
            $associativo = ['Nº PARCELA' => '','SALDO DEVEDOR' => '','JUROS' => '','ARMOTIZACAO' => '','SEGURO MBI' => '','SEGURO DFI' => '','TAXA ADM' => '','VALOR PARCELA' => '','CORRECAO' => ''];
            $associativo['Nº PARCELA'] ="0";
            $associativo['SALDO DEVEDOR'] ="R$ " . number_format($saldo_devedor_inicial, 2, ',', '.');
            $associativo['JUROS'] ="- " ;
            $associativo['ARMOTIZACAO'] ="-" ;
            $associativo['SEGURO DFI'] ="-" ;
            $associativo['SEGURO MBI'] ="-" ;
            $associativo['TAXA ADM'] ="-" ;
            $associativo['VALOR PARCELA'] ="-";
            $associativo['CORRECAO'];
            $arr[0] = $associativo;
            $associativo['Nº PARCELA'] ="1";
            $associativo['SALDO DEVEDOR'] ="R$ " . number_format($saldo_devedor_atual, 2, ',', '.');
            $associativo['JUROS'] ="- " ;
            $associativo['ARMOTIZACAO'] ="-" ;
            $associativo['SEGURO DFI'] ="-" ;
            $associativo['SEGURO MBI'] ="-" ;
            $associativo['TAXA ADM'] ="-" ;
            $associativo['VALOR PARCELA'] ="-";
            $associativo['CORRECAO'];
            $arr[1] = $associativo;
            $associativo['Nº PARCELA'] ="2";
            $associativo['SALDO DEVEDOR'] ="R$ " . number_format($saldo_primeira_parcela, 2, ',', '.');
            $associativo['JUROS'] ="R$ " . number_format($juros_primeira_parcela, 2, ',', '.') ;
            $associativo['ARMOTIZACAO'] ="R$ " . number_format($amortizacao, 2, ',', '.') ;
            $associativo['SEGURO DFI'] ="R$ " . number_format($seguro_dfi_primeira_parcela, 2, ',', '.') ;
            $associativo['SEGURO MBI'] ="R$ " . number_format($seguro_mbi_primeira_parcela, 2, ',', '.') ;
            $associativo['TAXA ADM'] ="R$ " . number_format($taxa_adm_primeira_parcela, 2, ',', '.') ;
            $associativo['VALOR PARCELA'] ="R$ " . number_format($valor_primeira_parcela, 2, ',', '.');
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
            $associativo['Nº PARCELA'] =$i;
            $associativo['SALDO DEVEDOR'] ="R$ " . number_format($sd_atual, 2, ',', '.');
            $associativo['JUROS'] ="R$ " . number_format($j_atual, 2, ',', '.') ;
            $associativo['ARMOTIZACAO'] ="R$ " . number_format($amortizacao, 2, ',', '.') ;
            $associativo['SEGURO DFI'] ="R$ " . number_format($sg_dfi_atual, 2, ',', '.') ;
            $associativo['SEGURO MBI'] ="R$ " . number_format($sg_mbi_atual, 2, ',', '.') ;
            $associativo['TAXA ADM'] ="R$ " . number_format($taxa_adm, 2, ',', '.') ;
            $associativo['VALOR PARCELA'] ="R$ " . number_format($v_parcela, 2, ',', '.');
            $associativo['CORRECAO'] = $indexadorTipo == 0.0089 ? "+ CDI" : "+ IPCA" ;
            $arr[$i] = $associativo;
        ?>
        <?php /*
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= "R$ " . number_format($sd_atual, 2, ',', '.'); ?></td>
                <td><?= "R$ " . number_format($amortizacao, 2, ',', '.'); ?></td>
                <td><?= "R$ " . number_format($j_atual, 2, ',', '.'); ?></td>
                <td><?= "R$ " . number_format($sg_mbi_atual, 2, ',', '.'); ?></td>
                <td><?= "R$ " . number_format($sg_dfi_atual, 2, ',', '.'); ?></td>
                <td><?= "R$ " . number_format($taxa_adm, 2, ',', '.'); ?></td>
                <td><?= "R$ " . number_format($v_parcela, 2, ',', '.'); ?></td>
                <td><?= $indexadorTipo == 0.0089 ? "+ CDI" : "+ IPCA" ;?></td>
            </tr>
            */
            ?>
        <?php
            $valor_total += $v_parcela;
            $sd_anterior = $sd_atual;
            $sd_atual = $sd_atual - $amortizacao;
            $j_anterior = $j_atual;
            $j_atual =  $sd_anterior * $indexador;
            $sg_mbi_anterior = $sg_mbi_atual;
            $sg_mbi_atual = $sd_anterior * (0.021 / 100);

        }
        // var_dump($arr[219]);

        ?>
           <tr>
                <th scope="row"><?php print_r($arr[240]['Nº PARCELA']); ?></th>
                <td><?php print_r($arr[240]['SALDO DEVEDOR']); ?></td>
                <td><?php print_r($arr[240]['ARMOTIZACAO']); ?></td>
                <td><?php print_r($arr[240]['JUROS']); ?></td>
                <td><?php print_r($arr[240]['SEGURO MBI']); ?></td>
                <td><?php print_r($arr[240]['SEGURO DFI'],); ?></td>
                <td><?php print_r($arr[240]['TAXA ADM']); ?></td>
                <td><?php print_r($arr[240]['VALOR PARCELA']); ?></td>
                <td><?php echo $indexadorTipo == 0.0089 ? "+ CDI" : "+ IPCA" ;?></td>
            </tr>
    </tbody>
</table>

<script>
    let total = '<?= $_POST['indexador'] == 1 ? "0.89% A.M" : "1.09% A.M"; ?>'
    let doc = document.getElementById('valor_total')
    doc.innerText = total
</script>
<?php
// echo "R$ ". number_format($valor_total,2,',','.') ;

require_once 'ftsimulador.php';