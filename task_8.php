<?php

$users = [
	0 => [

		'FirstName' => 'Mark',
		'LastName' => 'Otto',
		'Username' => '@mdo'
	],

	1 => [

		'FirstName' => 'Jacob',
		'LastName' => 'Thornton',
		'Username' => '@fat'
	],

	2 => [

		'FirstName' => 'Larry',
		'LastName' => 'the Bird',
		'Username' => '@twitter'
	],

	3 => [

		'FirstName' => 'Larry the Bird',
		'LastName' =>  'Bird',
		'Username' => '@twitter'
	]
];
$pdo = new PDO("mysql:host=localhost; dbname=education", "root", null);

foreach ($users as $user) {

	$sqlTest = "SELECT * FROM task_8 WHERE FirstName=:FirstName LIMIT 1";
	$statement = $pdo->prepare($sqlTest);
	$statement->bindParam('FirstName', $user['FirstName']);
	$statement->execute();
	$test = $statement->fetch(PDO::FETCH_ASSOC);
	if (is_array($test)) continue;

	$sqlInsert = "INSERT INTO task_8 (FirstName, LastName, Username) VALUE (:FirstName, :LastName, :Username)";
	$statement = $pdo->prepare($sqlInsert);
	$statement->execute($user);
}

$sqlSelect = "SELECT * FROM task_8";
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
						<h5 class="frame-heading">
							Обычная таблица
						</h5>
						<div class="frame-wrap">
							<table class="table m-0">
								<thead>
									<tr>
										<th>#</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Username</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<? foreach ($results as $result) : ?>
										<tr>
											<th scope="row"><?= $result['id'] ?></th>
											<td><?= $result['FirstName'] ?></td>
											<td><?= $result['LastName'] ?></td>
											<td><?= $result['Username'] ?></td>
											<td>
												<a href="show.php?id=<?= $result['id'] ?>" class="btn btn-info">Редактировать</a>
												<a href="edit.php?id=<?= $result['id'] ?>" class="btn btn-warning">Изменить</a>
												<a href="delete.php?id=<?= $result['id'] ?>" class="btn btn-danger">Удалить</a>
											</td>
										</tr>
									<? endforeach ?>
								</tbody>
							</table>
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