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

                                    <div class="w-100 d-block d-md-none mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Telefone <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="tel" name="clienteTelefone" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" class="form-control"></div>
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
                            <!-- <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
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
                            </li> -->
                            <!-- <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link active"
                                    id="contactos-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#contactos"
                                    type="button"
                                    role="tab"
                                    aria-controls="contactos"
                                    aria-selected="false"
                                >
                                    Contactos
                                </button>
                            </li> -->
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
                                    <div class="col-sm-8"><input type="text" name="clienteMorada" class="form-control" id="select"></div>

                                    <div class="w-100 d-md-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Localidade <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteLocalidade" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Código Postal <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="clienteCodigoPostal" class="form-control"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">País <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3">
                                        <select name="clientePais" class="form-select">
                                            <option value="">select country</option>
                                        </select>
                                    </div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Zona <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3">
                                        <select name="clienteZona" class="form-select">
                                            <option value="">select area</option>
                                        </select>
                                    </div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Fax</label></div>
                                    <div class="col-sm-3"><input type="text" name="clienteFax" class="form-control"></div>
                                
                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Idioma</label></div>
                                    <div class="col-sm-3">
                                        <select name="clienteIdioma" class="form-select">
                                            <option value="">select language</option>
                                        </select>
                                    </div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Telemóvel <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="tel" name="clienteTelemovel" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Site</label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteSite" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Email <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteEmail" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Email para envio <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteEmailEnvio" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Email para envio CC</label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteEmailCC" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Data de criação</label></div>
                                    <div class="col-sm-3"><input type="text" name="clienteDataCriacao" class="form-control"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>
                                
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
                            <!-- <div
                                class="tab-pane pt-3 bg-body-secondary border border-top-0 px-3"
                                id="servicos"
                                role="tabpanel"
                                aria-labelledby="servicos-tab"
                            >
                                <div class="row">
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Código</label></div>
                                    <div class="col-sm-3"><input type="text" name="servicoCodigo" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Descrição</label></div>
                                    <div class="col-sm-8"><input type="text" name="servicoDescricao" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Tipo de Produto</label></div>
                                    <div class="col-sm-3">
                                        <select name="servicoTipoDeProduto" class="form-select">
                                            <option value="">select type</option>
                                        </select>
                                    </div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Unidade</label></div>
                                    <div class="col-sm-3">
                                        <select name="servicoUnidade" class="form-select">
                                            <option>select unit</option>
                                        </select>
                                    </div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2"><label class="form-label">Observações</label></div>
                                    <div class="col-sm-8"><textarea name="servicoObservacoes" class="form-control"></textarea></div>

                                    <div class="w-100 d-block mb-3"></div>
                                </div> 
                            </div> -->
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