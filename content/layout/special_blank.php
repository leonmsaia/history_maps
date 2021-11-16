<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title><?php echo $title;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <?php $this->load->view('layout/assets/style');?>
  <script src="<?php echo base_url();?>assets/js/libs/jquery-3.2.1.min.js"></script>
</head>
<body>

	<?php $this->load->view('layout/modules/general_elements/loader');?>

  <?php $this->load->view('pages/' . $page);?>

  <?php $this->load->view('layout/assets/scripts_bottom');?>

</body>
</html>
