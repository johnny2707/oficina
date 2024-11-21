<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>
    
    <!-- <div class="container-xl">
            Page title
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="page-title"></h2>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card mb-1">
                            <div class="card-body bg-body-tertiary">
                                <div class="row">
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Matrícula</label></div>
                                    <div class="col-sm-3"><input type="text" name="veiculoMatricula" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Marca e Modelo</label></div>
                                    <div class="col-sm-8"><input type="text" name="veiculoMarca" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Ano</label></div>
                                    <div class="col-sm-3"><input type="text" name="veiculoAno" class="form-control"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Quilómetros</label></div>
                                    <div class="col-sm-3"><input type="text" name="veiculoQuilometros" class="form-control"></div>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs" id="pageNavigationTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link active"
                                    id="servicos-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#servicos"
                                    type="button"
                                    role="tab"
                                    aria-controls="servicos"
                                    aria-selected="false"
                                >
                                    Serviço
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div
                                class="tab-pane active py-3 bg-body-secondary border border-top-0 px-3"
                                id="servicos"
                                role="tabpanel"
                                aria-labelledby="servicos-tab"
                            >
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Código</th>
                                                <th scope="col">Descrição</th>
                                                <th scope="col">Quantidade</th>
                                                <th scope="col">Unidade</th>
                                                <th scope="col">Preço s/IVA</th>
                                                <th scope="col">Desconto</th>
                                                <th scope="col">Preço</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            <tr class="">
                                                <td scope="row"><input class="form-control" type="text" name="serviceSelect" id="serviceSelect"></td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="row pt-5">
                                    <div class="col-sm-2">Total Bruto</div>
                                    <div class="col-sm-10">36.43€</div>
                                    <hr class="my-2">
                                    <div class="col-sm-2">Desconto Global</div>
                                    <div class="col-sm-10">0.00€</div>
                                    <hr class="my-2">
                                    <div class="col-sm-2">Total Liquido</div>
                                    <div class="col-sm-10">36.43€</div>
                                    <hr class="my-2">
                                    <div class="col-sm-2"><b>TOTAL</b></div>
                                    <div class="col-sm-10">36.43€</div>
                                </div>
                            </div>
                            <!-- <div
                                class="tab-pane active pt-3 bg-body-secondary border border-top-0 px-3"
                                id="contactos"
                                role="tabpanel"
                                aria-labelledby="contactos-tab"
                            >
                                <div class="row">

                                </div> 
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
<?= $this->endSection() ?>