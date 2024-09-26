<?php
	$name = session()->get('name');
	$role = session()->get('role');
	$permissions = session()->get('permissions');
?>

<!doctype html>
<html lang="pt-PT">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title><?= "{$title} | " ?>johnny</title>

	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('logo.svg') ?>">

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
						<?php
							$nameExplode = explode(" ", $name);
							$firstL = $nameExplode[0][0];
							$secondL = "";
							if (isset($nameExplode[1][0])) {
								$secondL = $nameExplode[1][0];
							}
						?>
						<span class="avatar bg-orange-lt"><?= "{$firstL}{$secondL}" ?></span>
						<div class="d-none d-xl-block ps-2">
							<div><?= $name ?></div>
							<div class="mt-1 small text-muted"><?= $role ?></div>
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
						<a href="<?= base_url('users/myPassword') ?>" class="dropdown-item <?= isset($subMenu) && $subMenu == 'MY-PASSWORD' ? 'active' : '' ?>">Alterar password</a>
						<a href="<?= base_url('auth/logout') ?>" class="dropdown-item">Log out</a>
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
					<li class="nav-item dropdown <?= isset($menu) && $menu == 'COSTUMERS' ? 'active' : '' ?>">
						<a class="nav-link dropdown-toggle" href="#COSTUMERS" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="ti ti-users"></i>
							</span>
							<span class="nav-link-title">Clientes</span>
						</a>
						<div class="dropdown-menu">
							<?php if (in_array('CUSTOMERS', $permissions) || in_array('ALL', $permissions)) : ?>
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'CUSTOMER CREATION' ? 'active' : '' ?>" href="<?= base_url('clients/createClientPage') ?>">Criação</a>
							<?php endif; ?>

							<?php if (in_array('CUSTOMER UPDATE', $permissions) || in_array('ALL', $permissions)) : ?>
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'CUSTOMER UPDATE' ? 'active' : '' ?>" href="<?= base_url('clients/updateClientPage') ?>">Atualização</a>
							<?php endif; ?>

							<?php if (in_array('CUSTOMERS', $permissions) || in_array('ALL', $permissions)) : ?>
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'CUSTOMER CONTACT' ? 'active' : '' ?>" href="<?= base_url('clients/addContactPage') ?>">Adicionar Contacto</a>
							<?php endif; ?>

							<?php if (in_array('CUSTOMERS', $permissions) || in_array('ALL', $permissions)) : ?>
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'CUSTOMER CAR' ? 'active' : '' ?>" href="<?= base_url('clients/addCarPage') ?>">Adicionar Carro</a>
							<?php endif; ?>

							<?php if (in_array('CUSTOMER LIST', $permissions) || in_array('CUSTOMERS', $permissions) || in_array('ALL', $permissions)) : ?>
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'CUSTOMER LIST' ? 'active' : '' ?>" href="<?= base_url('clients/listAllClients') ?>">Lista</a>
							<?php endif; ?>

							<?php if (in_array('CUSTOMERS', $permissions) || in_array('ALL', $permissions)) : ?>
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'CUSTOMER OTHERS' ? 'active' : '' ?>" href="<?= base_url() ?>">Outros</a>
							<?php endif; ?>
						</div>
					</li>
            	</ul>
          	</div>
        </div>
    </aside>
	
	<div class="wrapper">
		<div class="page-wrapper">
			<?= $this->renderSection("content") ?>

			<div id="page-loader">
				<img src="<?= base_url('assets/img/logo.svg') ?>" alt="Logo">
			</div>

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