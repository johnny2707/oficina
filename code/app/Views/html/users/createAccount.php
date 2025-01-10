<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user creation</title>

    
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

    <!-- Custom CSS -->
    <?= $customCSS ?>
</head>
<body>
<!--         
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Utilizadores
                    </div>
                    <h2 class="page-title">Criação</h2>
                </div>
            </div>
        </div>
    </div> -->

    <div class="page-body d-flex justify-content-center align-items-center h-50">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Confirmar password</label>
                                    <input type="password" class="form-control" name="confirm-password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary ms-auto submitButtonWebmovel createNewUser">Criar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
	<div class="page-wrapper">
		<?= $this->renderSection("content") ?>

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
	</script>

	<?= $customJS ?>
</body>
</html>