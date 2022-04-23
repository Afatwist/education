<?php
if (session_status() != 2) session_start();
$error = false;
if (isset($_SESSION['error'])) $error = $_SESSION['error'];

function getAll($table)
{
	$pdo = new PDO("mysql:host=localhost; dbname=education", "root", null);
	$sql = "SELECT * FROM $table";
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

function errorShow($error)
{
	if (!$error) return;
	$box = '<div class="alert alert-danger fade show" role="alert">';

	if ($error == 'no image') $desc = 'Загружаемый файл не является изображением!';

	if ($error == 'cant upload') $desc = 'Невозможно сохранить файл!';

	if ($error == 'database error') $desc = 'Что-то пошло не так';

	if ($error == 'complete') $desc = 'Файл сохранен';

	unset($_SESSION['error']);
	return $box . $desc . '</div>';
}

$images = getAll('images');
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
		<div class="row">
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
							<div class="panel-content">
								<div class="form-group">

									<?= errorShow($error) ?>

									<form action="task_15_handler.php" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label class="form-label" for="simpleinput">Image</label>
											<input accept="image/*" required name="image" type="file" id="simpleinput" class="form-control">
										</div>
										<button class="btn btn-success mt-3">Submit</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div id="panel-1" class="panel">
					<div class="panel-hdr">
						<h2>
							Загруженные картинки
						</h2>
						<div class="panel-toolbar">
							<button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
							<button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
						</div>
					</div>

					<div class="panel-container show">
						<div class="panel-content">
							<div class="panel-content image-gallery">
								<div class="row">

									<? foreach ($images as $image) : ?>
										<div class="col-md-3 image">
											<img src="img/demo/mygallery/<?= $image['image'] ?>" width="75%">
										</div>
									<? endforeach ?>

								</div>
							</div>
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