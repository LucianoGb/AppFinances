<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Primus - Simulador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    body {
        /* background-image:url("imagens/logo.png");
    background-repeat: no-repeat;
    height:2000px;
    background-attachment:fixed;
    margin: auto; */
        /* background: rgb(16,5,139);
background: linear-gradient(180deg, rgba(16,5,139,1) 0%, rgba(110,89,205,1) 100%); */
        background: rgb(250, 252, 254);
        background: linear-gradient(180deg, rgba(250, 252, 254, 1) 14%, rgba(159, 159, 159, 0.5466561624649859) 38%);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        height: 100vh !important;
        background-attachment: fixed;
        color: black;
        font-size: 18px;
        font-weight: bold;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <img src="./imagens/logo.png" alt="" style=" width: 196px;">
        </div>
    </div>

    <div class="container p-5 mt-3 ">

        <h1 class="text-center">Simulador</h1>
        <form action="resumo_simulador.php" method="post" class="mt-3">
            <div class="row p-5" style="background-color: whitesmoke;
    border-radius: 10px;">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="../src/js/jquery-3-6-4.min.js"></script>
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
</body>

</html>