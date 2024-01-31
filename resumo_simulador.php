<?php
require_once 'hdsimulador.php';

// echo "<h3>Valores Preenchidos</h3><br>";
$carenciaqtd = $_POST['carencia'];

if ($carenciaqtd = 1) {
    carencia30();
}elseif($carenciaqtd = 2){
    carencia60();
}else{
    carencia90();
}

// echo "R$ ". number_format($valor_total,2,',','.') ;
function carencia30()
{
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
    $txtIndexador = $_POST['indexador'] == 1 ? "0.89% + CDI A.M " : "1.09% + IPCA A.M ";
    $carenciatxt = '';
    if ($carenciaqtd == 1) {
        $carenciatxt = "1 Mês";
    } elseif ($carenciaqtd == 2) {
        $carenciatxt = "2 Meses";
    } else {
        $carenciatxt = "3 Meses";
    }

    $valor_total = 0;
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
    $ltv = ($valor_liquido / $valor_imovel) * 100;

    $valor_primeira_parcela = $amortizacao + $juros_primeira_parcela + $seguro_mbi_primeira_parcela + $seguro_dfi_primeira_parcela + $taxa_adm_primeira_parcela;
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
    <div class="container-fluid" style="font-size: 14px;">
        <div class="row ps-5 pe-5 pb-5 pt-2 ">
            <div class="col-12" style="background: #0a2554; color: white; font-weight: bold;">
                <h3>Dados do Cliente</h3>
            </div>
        
            <div class="row pt-3 ">
                <div class="col-6">
                    <h6>Nome: <?= $nome;  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Contato: <?= $contato;  ?></h6>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-6">
                    <h6>CPF: <?= $cpf;  ?></h6>
                </div>
                <div class="col-6">
                    <h6>E-mail: <?= $email;  ?></h6>
                </div>
            </div>
        </div>
        <div class="row ps-5 pe-5 pb-5 pt-2">
            <div class="col-12" style="background: #0a2554; color: white; font-weight: bold;">
                <h3>Dados da Simulação</h3>
            </div>
            <div class="row pt-3 text-center">
                <h4><?="Data da Simulação: ". date('d/m/Y'); ?></h4>
            </div>
            <hr>
            <div class="row pt-3">
                <div class="col-6">
                    <h6>Carência: <?= $carenciatxt;  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Armotização: <?= "R$ " . number_format($amortizacao, 2, ',', '.');  ?></h6>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-6">
                    <h6>Prazo: <?= $qtdparcela . 'x';  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Taxa de Juros : <?= $txtIndexador;  ?></h6>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-6">
                    <h6>Valor do Crédito: <?= "R$ " . number_format($valor_liquido, 2, ',', '.');  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Valor da Garantia : <?= "R$ " . number_format($valor_imovel, 2, ',', '.');  ?></h6>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-6">
                    <h6>Parcela inicial: <?= $arr[2]['VALOR PARCELA'];  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Parcela final: <?= $arr[$qtdparcela]['VALOR PARCELA'];  ?></h6>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-6">
                    <h6>LTV: <?= number_format($ltv, 2, ',', '.') . '%';  ?></h6>
                </div>
                <div class="col-6">
                    <h5></h5>
                </div>
            </div>
            <div class="row pt-4">
                <p style="font-weight: bold;font-size: 12px;">Observação Importante: Este documento mostra os resultados de uma simulação, por isso, não tem valor legal. É APENAS UMA SIMULAÇÃO, a formalização dessa proposta irá depender do laudo do imóvel oferecido como garantia, parecer jurídico de todos os envolvidos no contrato e a capacidade mensal de pagamento. Não existe nenhuma obrigação da Primus Bank enquanto o contrato de empréstimo com imóvel em garantia não for efetivamente assinado e registrado pelo Cartório de Registro de Imóvel responsável pelo imóvel.</p>
            </div>
            <div class="row text-center mt-5">
                <div class="d-flex justify-content-center">
                    <input class="btn btn-outline-primary" type="button" value="Imprimir simulação" onClick="window.print()" />

                </div>

            </div>
        </div>
    </div>
    <script>
        var txt = document.getElementById('simulador')
        txt.innerText = "Resumo da Simulação"
    </script>

<?php

}

function carencia60()
{
    
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
    $txtIndexador = $_POST['indexador'] == 1 ? "0.89% + CDI A.M " : "1.09% + IPCA A.M ";
    $carenciatxt = '';
    if ($carenciaqtd == 1) {
        $carenciatxt = "1 Mês";
    } elseif ($carenciaqtd == 2) {
        $carenciatxt = "2 Meses";
    } else {
        $carenciatxt = "3 Meses";
    }

    $valor_total = 0;
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
    $ltv = ($valor_liquido / $valor_imovel) * 100;
    $valor_primeira_parcela = $amortizacao + $juros_primeira_parcela + $seguro_mbi_primeira_parcela + $seguro_dfi_primeira_parcela + $taxa_adm_primeira_parcela;
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
    $associativo['SALDO DEVEDOR'] = "R$ " . number_format($saldo_devedor_atual60, 2, ',', '.');
    $associativo['JUROS'] = "- ";
    $associativo['ARMOTIZACAO'] = "-";
    $associativo['SEGURO DFI'] = "-";
    $associativo['SEGURO MBI'] = "-";
    $associativo['TAXA ADM'] = "-";
    $associativo['VALOR PARCELA'] = "-";
    $associativo['CORRECAO'];
    $arr[2] = $associativo;
    $associativo['Nº PARCELA'] = "3";
    $associativo['SALDO DEVEDOR'] = "R$ " . number_format($saldo_primeira_parcela, 2, ',', '.');
    $associativo['JUROS'] = "R$ " . number_format($juros_primeira_parcela, 2, ',', '.');
    $associativo['ARMOTIZACAO'] = "R$ " . number_format($amortizacao, 2, ',', '.');
    $associativo['SEGURO DFI'] = "R$ " . number_format($seguro_dfi_primeira_parcela, 2, ',', '.');
    $associativo['SEGURO MBI'] = "R$ " . number_format($seguro_mbi_primeira_parcela, 2, ',', '.');
    $associativo['TAXA ADM'] = "R$ " . number_format($taxa_adm_primeira_parcela, 2, ',', '.');
    $associativo['VALOR PARCELA'] = "R$ " . number_format($valor_primeira_parcela, 2, ',', '.');
    $associativo['CORRECAO'];
    $arr[3] = $associativo;


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
    <div class="container-fluid" style="font-size: 14px;">
        <div class="row ps-5 pe-5 pb-5 pt-2 ">
            <div class="col-12" style="background: #0a2554; color: white; font-weight: bold;">
                <h3>Dados do Cliente</h3>
            </div>
        
            <div class="row pt-3 ">
                <div class="col-6">
                    <h6>Nome: <?= $nome;  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Contato: <?= $contato;  ?></h6>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-6">
                    <h6>CPF: <?= $cpf;  ?></h6>
                </div>
                <div class="col-6">
                    <h6>E-mail: <?= $email;  ?></h6>
                </div>
            </div>
        </div>
        <div class="row ps-5 pe-5 pb-5 pt-2">
            <div class="col-12" style="background: #0a2554; color: white; font-weight: bold;">
                <h3>Dados da Simulação</h3>
            </div>
            <div class="row pt-3 text-center">
                <h4><?="Data da Simulação: ". date('d/m/Y'); ?></h4>
            </div>
            <hr>
            <div class="row pt-3">
                <div class="col-6">
                    <h6>Carência: <?= $carenciatxt;  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Armotização: <?= "R$ " . number_format($amortizacao, 2, ',', '.');  ?></h6>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-6">
                    <h6>Prazo: <?= $qtdparcela . 'x';  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Taxa de Juros : <?= $txtIndexador;  ?></h6>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-6">
                    <h6>Valor do Crédito: <?= "R$ " . number_format($valor_liquido, 2, ',', '.');  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Valor da Garantia : <?= "R$ " . number_format($valor_imovel, 2, ',', '.');  ?></h6>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-6">
                    <h6>Parcela inicial: <?= $arr[3]['VALOR PARCELA'];  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Parcela final: <?= $arr[$qtdparcela]['VALOR PARCELA'];  ?></h6>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-6">
                    <h6>LTV: <?= number_format($ltv, 2, ',', '.') . '%';  ?></h6>
                </div>
                <div class="col-6">
                    <h5></h5>
                </div>
            </div>
            <div class="row pt-4">
                <p style="font-weight: bold;font-size: 12px;">Observação Importante: Este documento mostra os resultados de uma simulação, por isso, não tem valor legal. É APENAS UMA SIMULAÇÃO, a formalização dessa proposta irá depender do laudo do imóvel oferecido como garantia, parecer jurídico de todos os envolvidos no contrato e a capacidade mensal de pagamento. Não existe nenhuma obrigação da Primus Bank enquanto o contrato de empréstimo com imóvel em garantia não for efetivamente assinado e registrado pelo Cartório de Registro de Imóvel responsável pelo imóvel.</p>
            </div>
            <div class="row text-center mt-5">
                <div class="d-flex justify-content-center">
                    <input class="btn btn-outline-primary" type="button" value="Imprimir simulação" onClick="window.print()" />

                </div>

            </div>
        </div>
    </div>
    <script>
        var txt = document.getElementById('simulador')
        txt.innerText = "Resumo da Simulação"
    </script>

<?php
}
function carencia90()
{
 
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
    $txtIndexador = $_POST['indexador'] == 1 ? "0.89% + CDI A.M " : "1.09% + IPCA A.M ";
    $carenciatxt = '';
    if ($carenciaqtd == 1) {
        $carenciatxt = "1 Mês";
    } elseif ($carenciaqtd == 2) {
        $carenciatxt = "2 Meses";
    } else {
        $carenciatxt = "3 Meses";
    }

    $valor_total = 0;
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
    $ltv = ($valor_liquido / $valor_imovel) * 100;
    $valor_primeira_parcela = $amortizacao + $juros_primeira_parcela + $seguro_mbi_primeira_parcela + $seguro_dfi_primeira_parcela + $taxa_adm_primeira_parcela;
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
    $associativo['SALDO DEVEDOR'] = "R$ " . number_format($saldo_devedor_atual60, 2, ',', '.');
    $associativo['JUROS'] = "- ";
    $associativo['ARMOTIZACAO'] = "-";
    $associativo['SEGURO DFI'] = "-";
    $associativo['SEGURO MBI'] = "-";
    $associativo['TAXA ADM'] = "-";
    $associativo['VALOR PARCELA'] = "-";
    $associativo['CORRECAO'];
    $arr[2] = $associativo;
    $associativo['Nº PARCELA'] = "3";
    $associativo['SALDO DEVEDOR'] = "R$ " . number_format($saldo_devedor_atual90, 2, ',', '.');
    $associativo['JUROS'] = "- ";
    $associativo['ARMOTIZACAO'] = "-";
    $associativo['SEGURO DFI'] = "-";
    $associativo['SEGURO MBI'] = "-";
    $associativo['TAXA ADM'] = "-";
    $associativo['VALOR PARCELA'] = "-";
    $associativo['CORRECAO'];
    $arr[3] = $associativo;
    $associativo['Nº PARCELA'] = "4";
    $associativo['SALDO DEVEDOR'] = "R$ " . number_format($saldo_primeira_parcela, 2, ',', '.');
    $associativo['JUROS'] = "R$ " . number_format($juros_primeira_parcela, 2, ',', '.');
    $associativo['ARMOTIZACAO'] = "R$ " . number_format($amortizacao, 2, ',', '.');
    $associativo['SEGURO DFI'] = "R$ " . number_format($seguro_dfi_primeira_parcela, 2, ',', '.');
    $associativo['SEGURO MBI'] = "R$ " . number_format($seguro_mbi_primeira_parcela, 2, ',', '.');
    $associativo['TAXA ADM'] = "R$ " . number_format($taxa_adm_primeira_parcela, 2, ',', '.');
    $associativo['VALOR PARCELA'] = "R$ " . number_format($valor_primeira_parcela, 2, ',', '.');
    $associativo['CORRECAO'];
    $arr[4] = $associativo;


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
    <div class="container-fluid" style="font-size: 14px;">
        <div class="row ps-5 pe-5 pb-5 pt-2 ">
            <div class="col-12" style="background: #0a2554; color: white; font-weight: bold;">
                <h3>Dados do Cliente</h3>
            </div>
        
            <div class="row pt-3 ">
                <div class="col-6">
                    <h6>Nome: <?= $nome;  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Contato: <?= $contato;  ?></h6>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-6">
                    <h6>CPF: <?= $cpf;  ?></h6>
                </div>
                <div class="col-6">
                    <h6>E-mail: <?= $email;  ?></h6>
                </div>
            </div>
        </div>
        <div class="row ps-5 pe-5 pb-5 pt-2">
            <div class="col-12" style="background: #0a2554; color: white; font-weight: bold;">
                <h3>Dados da Simulação</h3>
            </div>
            <div class="row pt-3 text-center">
                <h4><?="Data da Simulação: ". date('d/m/Y'); ?></h4>
            </div>
            <hr>
            <div class="row pt-3">
                <div class="col-6">
                    <h6>Carência: <?= $carenciatxt;  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Armotização: <?= "R$ " . number_format($amortizacao, 2, ',', '.');  ?></h6>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-6">
                    <h6>Prazo: <?= $qtdparcela . 'x';  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Taxa de Juros : <?= $txtIndexador;  ?></h6>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-6">
                    <h6>Valor do Crédito: <?= "R$ " . number_format($valor_liquido, 2, ',', '.');  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Valor da Garantia : <?= "R$ " . number_format($valor_imovel, 2, ',', '.');  ?></h6>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-6">
                    <h6>Parcela inicial: <?= $arr[4]['VALOR PARCELA'];  ?></h6>
                </div>
                <div class="col-6">
                    <h6>Parcela final: <?= $arr[$qtdparcela]['VALOR PARCELA'];  ?></h6>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-6">
                    <h6>LTV: <?= number_format($ltv, 2, ',', '.') . '%';  ?></h6>
                </div>
                <div class="col-6">
                    <h5></h5>
                </div>
            </div>
            <div class="row pt-4">
                <p style="font-weight: bold;font-size: 12px;">Observação Importante: Este documento mostra os resultados de uma simulação, por isso, não tem valor legal. É APENAS UMA SIMULAÇÃO, a formalização dessa proposta irá depender do laudo do imóvel oferecido como garantia, parecer jurídico de todos os envolvidos no contrato e a capacidade mensal de pagamento. Não existe nenhuma obrigação da Primus Bank enquanto o contrato de empréstimo com imóvel em garantia não for efetivamente assinado e registrado pelo Cartório de Registro de Imóvel responsável pelo imóvel.</p>
            </div>
            <div class="row text-center mt-5">
                <div class="d-flex justify-content-center">
                    <input class="btn btn-outline-primary" type="button" value="Imprimir simulação" onClick="window.print()" />

                </div>

            </div>
        </div>
    </div>
    <script>
        var txt = document.getElementById('simulador')
        txt.innerText = "Resumo da Simulação"
    </script>

<?php
}
require_once 'ftsimulador.php';
