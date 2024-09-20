<?php
	$name = session()->get('name');
	$role = session()->get('role');
	$permissions = [
		'ALL'
	];
	
	//session()->get('permissions');
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
	<?php #$customCSS ?>
</head>
<body>
		<div class="wrapper">
			<!-- Navbar -->
			<header class="navbar navbar-expand-md d-print-none" >
				<div class="container-xl">
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
						<a href="<?= base_url() ?>">
							<img src="<?= base_url('assets/img/logo.svg') ?>" width="110" height="32" alt="Webmóvel" class="navbar-brand-image">
						</a>
					</h1>
					<div class="navbar-nav flex-row order-md-last">
						<div class="d-none d-md-flex">
							<a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
							</a>
							<a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
							</a>
							<div class="nav-item dropdown d-none d-md-flex me-3">
								<a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
								<span class="badge bg-red"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
								<div class="card">
									<div class="card-header">
									<h3 class="card-title">Last updates</h3>
									</div>
									<div class="list-group list-group-flush list-group-hoverable">
									<div class="list-group-item">
										<div class="row align-items-center">
										<div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
										<div class="col text-truncate">
											<a href="#" class="text-body d-block">Example 1</a>
											<div class="d-block text-muted text-truncate mt-n1">
											Change deprecated html tags to text decoration classes (#29604)
											</div>
										</div>
										<div class="col-auto">
											<a href="#" class="list-group-item-actions">
											<!-- Download SVG icon from http://tabler-icons.io/i/star -->
											<svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
											</a>
										</div>
										</div>
									</div>
									<div class="list-group-item">
										<div class="row align-items-center">
										<div class="col-auto"><span class="status-dot d-block"></span></div>
										<div class="col text-truncate">
											<a href="#" class="text-body d-block">Example 2</a>
											<div class="d-block text-muted text-truncate mt-n1">
											justify-content:between ⇒ justify-content:space-between (#29734)
											</div>
										</div>
										<div class="col-auto">
											<a href="#" class="list-group-item-actions show">
											<!-- Download SVG icon from http://tabler-icons.io/i/star -->
											<svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
											</a>
										</div>
										</div>
									</div>
									<div class="list-group-item">
										<div class="row align-items-center">
										<div class="col-auto"><span class="status-dot d-block"></span></div>
										<div class="col text-truncate">
											<a href="#" class="text-body d-block">Example 3</a>
											<div class="d-block text-muted text-truncate mt-n1">
											Update change-version.js (#29736)
											</div>
										</div>
										<div class="col-auto">
											<a href="#" class="list-group-item-actions">
											<!-- Download SVG icon from http://tabler-icons.io/i/star -->
											<svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
											</a>
										</div>
										</div>
									</div>
									<div class="list-group-item">
										<div class="row align-items-center">
										<div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
										<div class="col text-truncate">
											<a href="#" class="text-body d-block">Example 4</a>
											<div class="d-block text-muted text-truncate mt-n1">
											Regenerate package-lock.json (#29730)
											</div>
										</div>
										<div class="col-auto">
											<a href="#" class="list-group-item-actions">
											<!-- Download SVG icon from http://tabler-icons.io/i/star -->
											<svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
											</a>
										</div>
										</div>
									</div>
									</div>
								</div>
								</div>
							</div>
						</div>
						<div class="nav-item dropdown">
							<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Abrir menu do utilizador">
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
								<?php if (in_array('USERS', $permissions) || in_array('ALL', $permissions)) : ?>
									<a href="<?= base_url('clients') ?>" class="dropdown-item <?= isset($subMenu) && $subMenu == 'USERS' ? 'active' : '' ?>">Clients</a>
									<div class="dropdown-divider"></div>
								<?php endif; ?>
								<!-- <a href="<?= base_url('users/myPassword') ?>" class="dropdown-item <?= isset($subMenu) && $subMenu == 'MY-PASSWORD' ? 'active' : '' ?>">Alterar password</a> -->
								<a href="<?= base_url('auth/logout') ?>" class="dropdown-item">Log out</a>
							</div>
						</div>
					</div>
					<div class="collapse navbar-collapse" id="navbar-menu">
						<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
							<ul class="navbar-nav">

								<li class="nav-item dropdown <?= isset($menu) && $menu == 'GENERAL_TABLES' ? 'active' : '' ?>">
									<a class="nav-link dropdown-toggle" href="#GENERAL_TABLES" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
										<span class="nav-link-icon d-md-none d-lg-inline-block">
											<i class="ti ti-settings"></i>
										</span>
										<span class="nav-link-title">Tabelas gerais</span>
									</a>
									<div class="dropdown-menu">
										<?php if (in_array('CUSTOMERS', $permissions) || in_array('ALL', $permissions)) : ?>
											<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'CUSTOMERS' ? 'active' : '' ?>" href="<?= base_url('customers')?>">Clientes</a>
										<?php endif; ?>
									</div>
								</li>
								<li class="nav-item dropdown <?= isset($menu) && $menu == 'CATALOG' ? 'active' : '' ?>">
									<a class="nav-link dropdown-toggle" href="#CATALOG" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
										<span class="nav-link-icon d-md-none d-lg-inline-block">
											<i class="ti ti-building-warehouse"></i>
										</span>
										<span class="nav-link-title">Catálogo</span>
									</a>
									<div class="dropdown-menu">
										<?php if (in_array('PRODUCTS', $permissions) || in_array('ALL', $permissions)) : ?>
											<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'PRODUCTS' ? 'active' : '' ?>" href="<?= base_url('products') ?>">Produtos</a>
										<?php endif; ?>
										<?php if (in_array('ATTRIBUTES', $permissions) || in_array('ALL', $permissions)) : ?>
											<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'ATTRIBUTES' ? 'active' : '' ?>" href="<?= base_url('attributes') ?>">Atributos</a>
										<?php endif; ?>
										<?php if (in_array('CATEGORIES', $permissions) || in_array('ALL', $permissions)) : ?>
											<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'CATEGORIES' ? 'active' : '' ?>" href="<?= base_url('categories') ?>">Categorias</a>
										<?php endif; ?>
										<?php if (in_array('BRANDS', $permissions) || in_array('ALL', $permissions)) : ?>
											<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'BRANDS' ? 'active' : '' ?>" href="<?= base_url('brands') ?>">Marcas</a>
										<?php endif; ?>
										<?php if (in_array('LOCATIONS', $permissions) || in_array('ALL', $permissions)) : ?>
											<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'LOCATIONS' ? 'active' : '' ?>" href="<?= base_url('locations') ?>">Localizações</a>
										<?php endif; ?>
									</div>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</header>
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
			const dataTables_StateSave = "<?php #$_ENV['DATATABLES_STATESAVE'] ?>";
		</script>
		<?= $customJS ?>

	</body>
</html>