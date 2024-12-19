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
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Cliente</label></div>
                                    <div class="col-sm-3"><input type="text" name="clienteCodigo" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Nome <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteNome" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Contribuinte <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="clienteContribuinte" class="form-control"></div>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs" id="pageNavigationTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link active"
                                    id="informacao-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#informacao"
                                    type="button"
                                    role="tab"
                                    aria-controls="informacao"
                                    aria-selected="true"
                                >
                                    Informação
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="veiculos-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#veiculos"
                                    type="button"
                                    role="tab"
                                    aria-controls="veiculos"
                                    aria-selected="false"
                                >
                                    Veículo
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                                <div
                                class="tab-pane active pt-3 bg-body-secondary border border-top-0 px-3"
                                id="informacao"
                                role="tabpanel"
                                aria-labelledby="informacao-tab"
                            >
                                <div class="row">
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Morada <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteMorada" class="form-control clienteMorada" id="select"></div>

                                    <div class="w-100 d-md-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Localidade <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteLocalidade" class="form-control clienteLocalidade"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Código Postal <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="clienteCodigoPostal" class="form-control clienteCodigoPostal"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">País <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="clientePais" class="form-control clientePais"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Destrito <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="clienteZona" class="form-control clienteZona"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Idioma</label></div>
                                    <div class="col-sm-3"><input type="text" name="clienteIdioma" id="clienteIdioma" class="form-control clienteIdioma"></div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Email <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteEmail" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Telemóvel <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="tel" name="clienteTelemovel" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" class="form-control"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Grupo <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3">
                                        <select name="clienteGrupo" class="form-select">
                                            <option value="" selected>select group</option>
                                            <option value="">developer</option>
                                        </select>
                                    </div>

                                    <div class="w-100 d-block mb-3"></div>
                                </div>
                            </div>
                            <div
                                class="tab-pane pt-3 bg-body-secondary border border-top-0 px-3"
                                id="veiculos"
                                role="tabpanel"
                                aria-labelledby="veiculos-tab"
                            >
                                <div class="row">
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Matrícula <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="viaturaMatricula" class="form-control" pattern="[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Marca <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="viaturaMarca" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Modelo <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-8"><input type="text" name="viaturaModelo" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Ano <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="viaturaAno" class="form-control" pattern="[0-9]{4}"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Chassi</label></div>
                                    <div class="col-sm-3"><input type="text" name="viaturaChassi" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2"><label class="form-label">Observações</label></div>
                                    <div class="col-sm-8"><textarea name="viaturaObservacoes" class="form-control"></textarea></div>

                                    <div class="w-100 d-block mb-3"></div>
                                </div> 
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary mt-5">registar cliente</button>
                    </div>
                </div>
            </div>
        </div>
        
<?= $this->endSection() ?>