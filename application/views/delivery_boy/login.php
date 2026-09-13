<!DOCTYPE html>
<html>
<?php $this->load->view('admin/include-head.php'); ?>

<body class="hold-transition login-page  bg-admin">
    <!-- Logo removed -->
    <div class="overlay"></div>
	<?php $this->load->view('delivery_boy/pages/' . $main_page); ?>
	<!-- Footer -->
	<?php $this->load->view('admin/include-script.php'); ?>
</body>

</html>
