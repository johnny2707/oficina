<!doctype html>
<html lang="pt-PT">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>johnny</title>

	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/logo.svg') ?>">

	<!-- Libs CSS -->
	<link href="<?= base_url('assets/libs/notyf/css/notyf.min.css') ?>" rel="stylesheet"/>

	<link href="<?= base_url('assets/libs/datatables/dataTables.bootstrap5.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/libs/datatables/responsive.dataTables.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/libs/datatables/stateRestore.dataTables.min.css') ?>" rel="stylesheet"/>
	
	<link href="<?= base_url('assets/libs/tabler-icons/tabler-icons.min.css') ?>" rel="stylesheet"/>
	
	<link href="<?= base_url('assets/libs/jquery-confirm/css/jquery-confirm.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/libs/tom-select/css/tom-select.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/libs/jquery-ui/jquery-ui.min.css') ?>" rel="stylesheet"/>

	<!-- CSS files -->
	<link href="<?= base_url('assets/css/core/tabler.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/css/core/tabler-flags.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/css/core/tabler-payments.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/css/core/tabler-vendors.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/css/core/demo.min.css') ?>" rel="stylesheet"/>

	<!-- Webmóvel CSS -->
	<link href="<?= base_url('assets/css/custom/custom.css') ?>" rel="stylesheet"/>
</head>
<body>

<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
  <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
			</button>
			<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3 my-3">
				<a href="<?= base_url() ?>" class="text-decoration-none">
					<img src="<?= base_url('assets/img/logo.svg') ?>" width="110" height="32" alt="Oficina" class="navbar-brand-image">
					Oficina
				</a>
			</h1>
			<div class="navbar-nav flex-row">
				<div class="d-none d-lg-flex order-2">
					<a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable dark mode" data-bs-original-title="Enable dark mode">
						<!-- Download SVG icon from http://tabler-icons.io/i/moon -->
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path></svg>
					</a>
					<a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable light mode" data-bs-original-title="Enable light mode">
						<!-- Download SVG icon from http://tabler-icons.io/i/sun -->
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path></svg>
					</a>
				</div>
				<div class="nav-item dropdown">
					<a href="#" class="nav-link d-flex lh-1 text-reset p-0 ms-3 me-5" data-bs-toggle="dropdown" aria-label="Abrir menu do utilizador">
						<span class="avatar bg-orange-lt"><?= "JS" ?></span>
						<div class="d-none d-xl-block ps-2">
							<div>joão soares</div>
							<div class="mt-1 small text-muted">developer</div>
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
						<a href="" class="dropdown-item">Alterar password</a>
						<a href="" class="dropdown-item">Log out</a>
					</div>
				</div>
			</div>
          	<div class="collapse navbar-collapse" id="sidebar-menu">
            	<ul class="navbar-nav pt-lg-3">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>">
							<span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l-2 0l9 -9l9 9l-2 0"></path><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg>
							</span>
							<span class="nav-link-title">
								Home
							</span>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#COSTUMERS" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="ti ti-users"></i>
							</span>
							<span class="nav-link-title">Clientes</span>
						</a>
						<div class="dropdown-menu">
							
							<a class="dropdown-item" href="<?= base_url() ?>">Criação</a>
							<a class="dropdown-item" href="<?= base_url() ?>">Lista</a>
							<a class="dropdown-item" href="<?= base_url() ?>">Outros</a>
							
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#COSTUMERS" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="ti ti-tool"></i>
							</span>
							<span class="nav-link-title">Mecânicos</span>
						</a>
						<div class="dropdown-menu">
							
                            <a class="dropdown-item" href="<?= base_url() ?>">Criação</a>
							<a class="dropdown-item" href="<?= base_url() ?>">Agenda</a>
							<a class="dropdown-item" href="<?= base_url() ?>">Lista</a>
							<a class="dropdown-item" href="<?= base_url() ?>">Outros</a>
							
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#EVENTS" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="ti ti-calendar"></i>
							</span>
							<span class="nav-link-title">Events</span>
						</a>
						<div class="dropdown-menu">
							
							<a class="dropdown-item" href="<?= base_url() ?>">Criação</a>
							<a class="dropdown-item" href="<?= base_url() ?>">Lista</a>
							<a class="dropdown-item" href="<?= base_url() ?>">Outros</a>
							
						</div>
					</li>
					<li>
						<a class="nav-link" href="<?= base_url() ?>" role="button">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="ti ti-clock"></i>
							</span>
							<span class="nav-link-title">clock</span>
						</a>
					</li>
            	</ul>
          	</div>
        </div>
    </aside>
	
	<div class="page-wrapper">


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
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Nome</label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteNome" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Contribuinte</label></div>
                                    <div class="col-sm-3"><input type="text" name="clienteContribuinte" class="form-control"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Telefone</label></div>
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
                            <li class="nav-item" role="presentation">
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
                            </li>
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
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Morada</label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteMorada" class="form-control"></div>

                                    <div class="w-100 d-md-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Localidade</label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteLocalidade" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Código Postal</label></div>
                                    <div class="col-sm-3"><input type="text" name="clienteCodigoPostal" class="form-control"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">País</label></div>
                                    <div class="col-sm-3">
                                        <select name="clientePais" class="form-select">
                                            <option value="">select country</option>
                                        </select>
                                    </div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Zona</label></div>
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
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Telemóvel</label></div>
                                    <div class="col-sm-3"><input type="tel" name="clienteTelemovel" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Site</label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteSite" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Email</label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteEmail" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Email para envio</label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteEmailEnvio" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Email para envio CC</label></div>
                                    <div class="col-sm-8"><input type="text" name="clienteEmailCC" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Data de criação</label></div>
                                    <div class="col-sm-3"><input type="text" name="clienteDataCriacao" class="form-control"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Grupo</label></div>
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
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Matrícula</label></div>
                                    <div class="col-sm-3"><input type="text" name="viaturaMatricula" class="form-control" pattern="[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Marca</label></div>
                                    <div class="col-sm-3"><input type="text" name="viaturaMarca" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Modelo</label></div>
                                    <div class="col-sm-8"><input type="text" name="viaturaModelo" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Ano</label></div>
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
                            <div
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


		<div id="page-loader">
			<img src="<?= base_url('assets/img/logo.svg') ?>" alt="Logo">
		</div>

	</div>

	<!-- Tabler Core -->
	<script src="<?= base_url('assets/js/core/tabler.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/core/demo-theme.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/core/demo.min.js') ?>"></script>

	<!-- Libs JS -->
	<script src="<?= base_url('assets/libs/jquery/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/notyf/js/notyf.min.js') ?>"></script>

	<script src="<?= base_url('assets/libs/datatables/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/datatables/dataTables.bootstrap5.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/datatables/dataTables.responsive.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/datatables/dataTables.stateRestore.min.js') ?>"></script>

	<script src="<?= base_url('assets/libs/jquery-confirm/js/jquery-confirm.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/tom-select/js/tom-select.complete.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/jquery-ui/jquery-ui.min.js') ?>"></script>

	<script src="<?= base_url('assets/libs/list.js/list.min.js') ?>"></script>
	
	<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

	<!-- Webmóvel JS -->
	<script src="<?= base_url('assets/js/custom/custom.js') ?>"></script>

	<!-- Custom JS -->
	<script> 
		const baseURL = "<?= base_url() ?>";
		const dataTables_StateSave = "<?php //$_ENV['DATATABLES_STATESAVE'] ?>";

        $(document).ready(function(){

            $("#page-loader").hide();

        });
	</script>
</body>
</html>