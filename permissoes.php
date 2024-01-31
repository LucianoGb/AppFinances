<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Permissões</title>
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

        <h1 class="text-center">Permissões</h1>
        <form action="resumo_simulador.php" method="post" class="mt-3">
            <div class="row p-5" style="background-color: whitesmoke;
    border-radius: 10px;">
                <h3>Administrador</h3>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Colaborador</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheckcl1" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl1">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheckcl2" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl2">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheckcl3" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl3">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheckcl4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheckcl4">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Cliente</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck1">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck2">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck3">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck4">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Login</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck5">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck6">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck7">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck8">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Gerente</h3>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Colaborador</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheckcl1" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl1">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheckcl2" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl2">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheckcl3" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl3">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheckcl4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheckcl4">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Cliente</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck1">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck2">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck3">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck4">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Login</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck5">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck6">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck7">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck8">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Assistente Comercial</h3>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Colaborador</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheckcl1" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl1">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheckcl2" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl2">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheckcl3" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl3">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheckcl4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheckcl4">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Cliente</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck1">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck2">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck3">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck4">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Login</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck5">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck6">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck7">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck8">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Head Comercial</h3>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Colaborador</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheckcl1" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl1">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheckcl2" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl2">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheckcl3" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl3">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheckcl4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheckcl4">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Cliente</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck1">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck2">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck3">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck4">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Login</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck5">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck6">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck7">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck8">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Gerente Comercial</h3>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Colaborador</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheckcl1" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl1">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheckcl2" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl2">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheckcl3" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl3">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheckcl4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheckcl4">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Cliente</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck1">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck2">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck3">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck4">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Login</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck5">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck6">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck7">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck8">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Gerente de Produtos</h3>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Colaborador</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheckcl1" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl1">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheckcl2" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl2">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheckcl3" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheckcl3">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheckcl4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheckcl4">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Cliente</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck1">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck2">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck3">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck4">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="row">
                        <h4>Login</h4>
                        <div class="p-3">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck5">Criar</label>

                                <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck6">Alterar</label>

                                <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
                                <label class="btn btn-outline-primary me-1" for="btncheck7">Deletar </label>

                                <input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck8">Apenas Visualizar </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>


                <div class="d-flex mt-3 justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg ">Salvar</button>
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