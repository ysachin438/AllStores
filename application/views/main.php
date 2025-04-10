<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title)? $title : 'Admin Dashboard'?></title>
    <?php $this->load->view('includes/styles'); ?>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
	<!--begin::App Wrapper-->
	<div class="app-wrapper">
    <?php $this->load->view('layouts/header');?>
    <?php $this->load->view('layouts/sidebar');?>
    <?php $this->load->view(isset($view) ? $view : 'index');?>

    <?php $this->load->view('layouts/footer');?>
    
    <?php $this->load->view('includes/script'); ?>
</body>
</html>