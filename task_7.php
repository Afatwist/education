<?php
$userList = [
	0 => [
		'avatar' => 'sunny.png',
		'altText' => 'Sunny A.',
		'name' => 'Sunny A.',
		'profession' => 'UI/UX Expert',
		'role' => 'Lead Author',
		'twitter' => '@myplaneticket',
		'wrapbootstrap' => 'myorange',
		'bootstrapTitle' => 'Sunny',
		'ban' => ''
	],

	1 => [
		'avatar' => 'josh.png',
		'altText' => 'Jos K.',
		'name' => 'Jos K.',
		'profession' => 'ASP.NET Developer',
		'role' => 'Partner &amp; Contributor',
		'twitter' => '@atlantez',
		'wrapbootstrap' => 'Walapa',
		'bootstrapTitle' => 'Jos',
		'ban' => ''
	],

	2 => [
		'avatar' => 'jovanni.png',
		'altText' => 'Jovanni Lo',
		'name' => 'Jovanni L.',
		'profession' => 'PHP Developer',
		'role' => 'Partner &amp; Contributor',
		'twitter' => '@lodev09',
		'wrapbootstrap' => 'lodev09',
		'bootstrapTitle' => 'Jovanni',
		'ban' => 'banned'
	],

	3 => [
		'avatar' => 'roberto.png',
		'altText' => 'Roberto R.',
		'name' => 'Roberto R.',
		'profession' => 'Rails Developer',
		'role' => 'Partner &amp; Contributor',
		'twitter' => '@sildur',
		'wrapbootstrap' => 'sildur',
		'bootstrapTitle' => 'Roberto',
		'ban' => 'banned'
	]
];
$pdo = new PDO("mysql:host=localhost; dbname=education", 'root', null);



foreach ($userList as $employed) {

	$sqlTest = "SELECT * FROM task_7 WHERE name=:name LIMIT 1";
	$statement = $pdo->prepare($sqlTest);
	$statement->bindParam('name', $employed['name']);
	$statement->execute();
	$test = $statement->fetch(PDO::FETCH_ASSOC);
	if (is_array($test)) continue;

	$sqlInsert = "INSERT INTO task_7 (avatar, altText, name, profession, role, twitter, wrapbootstrap, bootstrapTitle, ban) VALUE (:avatar, :altText, :name, :profession, :role, :twitter, :wrapbootstrap, :bootstrapTitle, :ban)";

	$statement = $pdo->prepare($sqlInsert);
	$statement->execute($employed);
}

$sqlSelect = "SELECT * FROM task_7";
$statement = $pdo->prepare($sqlSelect);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

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
						<div class="d-flex flex-wrap demo demo-h-spacing mt-3 mb-3">

							<? foreach ($results as $user) : ?>

								<div class="<?= $user['ban'] ?> rounded-pill bg-white shadow-sm p-2 border-faded mr-3 d-flex flex-row align-items-center justify-content-center flex-shrink-0">
									<img src="img/demo/authors/<?= $user['avatar'] ?>" alt="<?= $user['altText'] ?>" class="img-thumbnail img-responsive rounded-circle" style="width:5rem; height: 5rem;">
									<div class="ml-2 mr-3">
										<h5 class="m-0">
											<?= $user['name'] ?> (<?= $user['profession'] ?>)
											<small class="m-0 fw-300">
												<?= $user['role'] ?>
											</small>
										</h5>
										<a href="https://twitter.com/<?= $user['twitter'] ?>" class="text-info fs-sm" target="_blank"><?= $user['twitter'] ?></a> -
										<a href="https://wrapbootstrap.com/user/<?= $user['wrapbootstrap'] ?>" class="text-info fs-sm" target="_blank" title="Contact <?= $user['bootstrapTitle'] ?>"><i class="fal fa-envelope"></i></a>
									</div>
								</div>
							<? endforeach ?>
						</div>
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