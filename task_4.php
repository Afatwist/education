<?php

$progressBars = [

	0 => [
		'title' => 'My Tasks',
		'title div class' => 'd-flex mt-2',
		'span' => '130 / 500',
		'box div class' => 'progress progress-sm mb-3',
		'progressBar div class' => 'progress-bar bg-fusion-400',
		'style' => '65',
		'aria-valuenow' => '65',
	],

	1 => [
		'title' => 'Transferred',
		'title div class' => 'd-flex',
		'span' => '440 TB',
		'box div class' => 'progress progress-sm mb-3',
		'progressBar div class' => 'progress-bar bg-success-500',
		'style' => '34',
		'aria-valuenow' => '34',
	],

	2 => [
		'title' => 'Bugs Squashed',
		'title div class' => 'd-flex',
		'span' => '77%',
		'box div class' => 'progress progress-sm mb-3',
		'progressBar div class' => 'progress-bar bg-info-400',
		'style' => '77',
		'aria-valuenow' => '77',
	],

	3 => [
		'title' => 'User Testing',
		'title div class' => 'd-flex',
		'span' => '7 days',
		'box div class' => 'progress progress-sm mb-g',
		'progressBar div class' => 'progress-bar bg-primary-300',
		'style' => '84',
		'aria-valuenow' => '84',
	],

];
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>
		Подготовительные задания к курсу
	</title>
	<meta name="description" content="Chartist.html">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
	<link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
	<link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
	<link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
	<link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
	<link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
	<link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
	<link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
	<link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
</head>

<body class="mod-bg-1 mod-nav-link ">
	<main id="js-page-content" role="main" class="page-content">
		<div class="col-md-6">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>
						Задание
					</h2>
					<div class="panel-toolbar">
						<button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
						<button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
					</div>
				</div>

				<div class="panel-container show">
					<div class="panel-content">
						<? foreach ($progressBars as $bar) : ?>
							<div class="<?= $bar['title div class'] ?>">
								<?= $bar['title'] ?>
								<span class="d-inline-block ml-auto"><?= $bar['span'] ?></span>
							</div>
							<div class="<?= $bar['box div class'] ?>">
								<div class="<?= $bar['progressBar div class'] ?>" role="progressbar" style="width: <?= $bar['style'] ?>%;" aria-valuenow="<?= $bar['aria-valuenow'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						<? endforeach ?>
					</div>
				</div>

			</div>
		</div>
	</main>


	<script src="js/vendors.bundle.js"></script>
	<script src="js/app.bundle.js"></script>
	<script>
		// default list filter
		initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
		// custom response message
		initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
	</script>
</body>

</html>