<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center;">Sistema Interactivo de Visualización de Mapas Historicos</h1>
		</div>
	</div>
	<div class="row">
    <div class="col-md-3">
			<div class="row">
				<div class="col-md-12">
					<h3>Ultimos Proyectos</h3>
					<ul class="legend_poi_map">

					</ul>
				</div>
			</div>
		</div>
    <div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<ul>
            <?php foreach ($projects_data->result() as $prjct): ?>
              <li>
                <a href="<?php echo base_url() . 'MapView/project/' . $prjct->map_project_code;?>">
                  <?php echo $prjct->map_project_title;?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p style="text-align: center;">Desarrollado por Leonardo Saia, para la Universidad Nacional de General Sarmiento. 2021</p>
		</div>
	</div>

</div>
