<!doctype html>
<html>
  <head>
    <title><?php echo $title;?></title>
    <?php $this->load->view('layout/assets/style');?>
    <script src="<?php echo base_url();?>assets/js/libs/jquery-3.2.1.min.js"></script>
  </head>
   <body>

      <?php $this->load->view('layout/modules/navbar');?>
      
      <?php $this->load->view('pages/' . $page);?>
      
      <?php $this->load->view('layout/modules/footer');?>
      
      <?php $this->load->view('layout/assets/scripts_bottom');?>

    
   </body>
</html>
