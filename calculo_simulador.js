let valor_liquido = 100000

let valor_imovel = 300000

let saldo_devedor_inicial = (valor_liquido * (12.38 / 100)) + valor_liquido
let indexador = 0.89 / 100

let saldo_devedor_atual =  (saldo_devedor_inicial * (101.49 / 100 ))

let prazo_contratado = 240

let carencia = 1

let amortizacao = saldo_devedor_atual / (prazo_contratado - carencia)

let saldo_primeira_parcela = saldo_devedor_atual - amortizacao

let juros_primeira_parcela = saldo_devedor_atual * indexador

let seguro_mbi_primeira_parcela = (saldo_devedor_inicial * (0.021 / 100 ) + saldo_devedor_atual * (0.021 / 100 ))

let seguro_dfi_primeira_parcela = valor_imovel * ((0.0037 / 100) * 2)
let taxa_adm = 25.00

let taxa_adm_primeira_parcela = taxa_adm * 2

let valor_primeira_parcela = amortizacao + juros_primeira_parcela + seguro_mbi_primeira_parcela + seguro_dfi_primeira_parcela + taxa_adm_primeira_parcela
/* document.write('Saldo devedor inicial: ' . saldo_devedor_inicial ) */
document.write('Valor Liquido: '+ valor_liquido.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) +'<br>')

document.write('Valor Imóvel: '+ valor_imovel.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) +'<br>')

document.write(' Saldo devedor Inicial: '+ saldo_devedor_inicial.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) +'<br>')

document.write(' Saldo devedor Atual: '+ saldo_devedor_atual.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) +'<br>')

document.write(' Saldo Primeira Parcela: '+ saldo_primeira_parcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) +'<br>')

document.write(' Amortizacao: '+ amortizacao.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) +'<br>')

document.write(' Juros Primeira Parcela: '+ juros_primeira_parcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) +'<br>')

document.write(' Seguro mib primeira parcela: '+ seguro_mbi_primeira_parcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) +'<br>')

document.write(' Seguro dfi primeira parcela: '+ seguro_dfi_primeira_parcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) +'<br>')

document.write(' Taxa Primeira Parcela: '+ taxa_adm_primeira_parcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) +'<br>')

document.write('Valor Primeira Parcela: '+ valor_primeira_parcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) +'<br>')


document.write("| Nº Parcela | Saldo devedor | Armotização | Juros | Seguro MBI | Seguro DFI | Taxa ADM | Valor Parcela |<br>")


document.write(`| Nº Parcela: 0 | Saldo devedor: ${saldo_devedor_inicial.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} | Armotização: - | Juros: - | Seguro MBI: - |  Seguro DFI: - | Taxa ADM: - | Valor Parcela: - |<br>`)

document.write('<hr>')

document.write(`| Nº Parcela: 1 | Saldo devedor: ${saldo_devedor_atual.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} | Armotização: - | Juros: - | Seguro MBI: - |  Seguro DFI: - | Taxa ADM: - | Valor Parcela: - |<br>`)
document.write('<hr>')

document.write(`| Nº Parcela: 2 | Saldo devedor: ${saldo_primeira_parcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} | Armotização: ${amortizacao.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} | Juros: ${juros_primeira_parcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} | Seguro MBI: ${seguro_mbi_primeira_parcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} |  Seguro DFI: ${seguro_dfi_primeira_parcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} | Taxa ADM: ${taxa_adm_primeira_parcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} | Valor Parcela: ${valor_primeira_parcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} |<br>`)
document.write('<hr>')

let sd_anterior = saldo_primeira_parcela
let sd_atual =saldo_primeira_parcela - amortizacao
let j_anterior = juros_primeira_parcela
let j_atual = sd_anterior * indexador
let v_parcela

let sg_dfi_atual = seguro_dfi_primeira_parcela/2
let sg_mbi_atual = sd_anterior * (0.021 / 100)
let sg_mbi_anterior


for ( let i = 3 ; i <= prazo_contratado ; i++){
 v_parcela = amortizacao + j_atual + sg_mbi_atual + sg_dfi_atual + taxa_adm   

		document.write(`| Nº Parcela: ${i} | Saldo devedor: ${sd_atual.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} | Armotização: ${amortizacao.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} | Juros: ${j_atual.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} | Seguro MBI: ${sg_mbi_atual.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} |  Seguro DFI: ${sg_dfi_atual.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} | Taxa ADM: ${taxa_adm.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} | Valor Parcela: ${v_parcela.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })} |<br>`)
document.write('<hr>')
sd_anterior = sd_atual
sd_atual = sd_atual - amortizacao
j_anterior = j_atual
j_atual =  sd_anterior * indexador
sg_mbi_anterior = sg_mbi_atual
sg_mbi_atual = sd_anterior * (0.021 / 100)
   
   document.write('<hr>')

}