<div class="sidemenu">
  <div class="sidemenu-inner scroll">


    <?php $this->load->view('layout/modules/general_elements/login_sidebar_module');?>

    <nav class="admin-nav">
      <ul>
        <li>
          <a class="waves-effect" href="#"><i class="ti-home red lighten-1"></i> Listado de Mapas</a>
          <ul>
            <?php foreach ($map_unit_list_data->result() as $unit_render): ?>
              <li>
                <a href="#" title=""><?php echo $unit_render->map_unit_title;?></a>
              </li>
            <?php endforeach ?>
          </ul>
        </li>
      </ul>
      <ul>
        <li>
          <a class="waves-effect" href="#"><i class="ti-home red lighten-1"></i> Leyenda</a>
          <ul>
            <?php foreach ($map_unit_list_assets_poi->result() as $legend_elemnt): ?>
              <li>
                <a href="#poi_data_<?php echo $legend_elemnt->map_assets_poi_id;?>">
                  <?php echo $legend_elemnt->map_assets_poi_title;?>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        </li>
      </ul>

      <ul class="credit_legend">
        <li>
          <span class="copy_holder">
            Desarrollado por <a href="https://www.linkedin.com/in/leonmsaia/" target="_blank">Leonardo Saia</a>
            <br>
            En el Año 2021.
            <br>
            Catedra EPHOHAYA.
            <br>
            <a href="https://www.ungs.edu.ar/" target="_blank">Universidad Nacional de General Sarmiento</a>
            <br><br>
            Codigo Libre, Abierto, Publico y Gratuito.
            <br><br>
            <a href="https://github.com/leonmsaia/history_maps" target="_blank">Ver Repositorio</a>
          </span>
        </li>
      </ul>
    </nav>

  </div>
</div>
