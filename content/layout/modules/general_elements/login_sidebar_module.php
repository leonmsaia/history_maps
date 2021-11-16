<?php if ($this->ion_auth->logged_in()): ?>
  <?php foreach ($user_information->result() as $usr_nfo): ?>
    <div class="admin">
      <img src="http://placehold.it/78x78" alt="" />
      <div class="admin-detail">
        <h2><?php echo $usr_nfo->first_name . ' ' . $usr_nfo->last_name;?></h2>
        <a class="dropdown-button" href='#' title="" data-activates='dropdown2'>Opciones <i class="ti-angle-down"></i></a>
        <ul id='dropdown2' class='dropdown-content'>
          <li><a href="#!">Configuracion</a></li>
          <li><a href="#!">Perfil</a></li>
          <li><a href="#!">Mis Comentarios</a></li>
          <li><a href="#!">Mis Proyectos</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo base_url();?>/User/logUserOut">Signout</a></li>
        </ul>
      </div>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <div class="admin">
    <a href="<?php echo base_url();?>user/login" class="btn btn-large waves-effect waves-light red add-contact">
      Iniciar Sesion
    </a>
  </div>
<?php endif; ?>
