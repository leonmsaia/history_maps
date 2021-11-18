<div class="col s12">

	<div class="col s12">
		<div class="widget z-depth-1">
			<div class="loader"></div>
			<div class="widget-title">
				<h3>Mis Proyectos</h3>
				<p>Opciones para la creacion, modificacion y eliminacion de proyectos.</p>
				<a class="options dropdown-button waves-effect" href="#" title="" data-activates='dropdown3'><i class="ti-more-alt"></i></a>
			</div>

			<?php foreach ($all_projects_list->result() as $prjcts): ?>
					<div class="col s6">
						<div class="row">
							<div class="col s12">
								<h4><?php echo $prjcts->map_project_title;?></h4>
							</div>
						</div>
						<div class="row">
							<ul class="col s12">
								<li>Codigo: <?php echo $prjcts->map_project_code;?></li>
								<li>Fecha de Creación: <?php echo format_date($prjcts->map_project_date);?></li>
								<li>Estado: <?php echo getProjectStatusType($prjcts->map_project_status);?></li>
								<li>Privacidad: <?php echo getProjectStatusPrivacity($prjcts->map_project_privacity);?></li>
							</ul>
						</div>
						<div class="row">
							<div class="col s12">
								<ul>
									<li><b>Mapas Contenidos en el proyecto:</b></li>
									<li>
										<ul class="project_list_container">
											<?php foreach (getProjectMapsTitles($prjcts->map_project_id)->result() as $prjc_mps): ?>
												<li><?php echo $prjc_mps->map_unit_title;?></li>
											<?php endforeach; ?>
										</ul>
									</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col s12">
								<span>
									<a class="btn waves-effect waves-light blue" href="<?php echo base_url() . 'project/' . $prjcts->map_project_code;?>">Ver</a>
								</span>
								<span>
									<a class="btn waves-effect waves-light green" href="<?php echo base_url() . 'project/' . $prjcts->map_project_code . '/action/edit/';?>">Editar</a>
								</span>
								<span>
									<a class="btn waves-effect waves-light red" href="<?php echo base_url() . 'project/' . $prjcts->map_project_code . '/action/delete/';?>">Borrar</a>
								</span>
							</div>
						</div>
					</div>
			<?php endforeach; ?>

		</div>
	</div>

</div>
