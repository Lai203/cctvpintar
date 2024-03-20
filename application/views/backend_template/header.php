<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= $title; ?></title>
	<script type="text/javascript">
		var CKEDITOR_BASEPATH = '<?= base_url('asset/') ?>vendor/ckeditor/';
	</script>
	<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="<?= base_url('asset/') ?>css/styles.css" rel="stylesheet" />
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" type='text/css'>
</head>

<body class="sb-nav-fixed">
	<button class="btn btn-link btn-sm order-lg-0 border mt-4" style="float:right; position:relative; right: 40px;" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>