<form action="template_pdf.php" method="post" class="mt-3" style="display: none;">
  
                <label for="exampleFormControlInput1" class="form-label">Nome do Cliente</label>
                <input type="text" id='nome' name="nome" class="form-control w-100 " placeholder="" required style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
           
                <label for="tipo_cliente" class="form-label">Tipo de Cliente</label>
                <select style="padding-top: 0rem; padding-bottom: 0rem;height: 38px;box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);" onchange="cpf_cnpj()" class="form-select form-select-lg mb-3" required id="tipo_cliente" name="tipo_cliente" aria-label=".form-select-lg example" style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">

                    <option value="PF" selected>Pessoa Física</option>
                    <option value="PJ">Pessoa Jurídica</option>

                </select>
      
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control w-100" id='email' name="email" placeholder="" required style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
           
        
                <label for="exampleFormControlInput1" class="form-label">Contato(Celular)</label>
                <input type="text" class="form-control w-100" id='contato' onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="contato" placeholder="" required style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
     
                <label for="cpf" class="form-label" id="cpf_cnpj">CPF</label>
                <input type="cpf" class="form-control w-100" id='cpf' required name="cpf" placeholder="" required style="box-shadow: 1px 2px 4px 0px rgba(0,0,0,0.75);">
     


        <h5>PRODUTO</h5>
       

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

                </div>

                <div class=" mb-3 col-6" style="max-width: 600px;">

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