<?php foreach ($user_information->result() as $usr_nfo): ?>
	<div class="col s12">

		<div class="col s12">
			<div class="widget z-depth-1">

				<div class="row">
					<div class="col s12">
						<div class="loader"></div>
						<div class="widget-title">
							<h2><?php echo $usr_nfo->last_name . ', ' . $usr_nfo->first_name;?></h2>
							<p><?php echo $usr_nfo->user_data_associated_category;?>, <?php echo $usr_nfo->user_data_associated_company;?>.</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<p><?php echo $usr_nfo->user_data_associated_bio;?></p>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<span> <a href="<?php echo $usr_nfo->user_data_associated_twitter;?>" target="_blank">Twitter</a> </span>
						<span> <a href="<?php echo $usr_nfo->user_data_associated_linkedin;?>" target="_blank">LinkedIn</a> </span>
						<span> <a href="<?php echo $usr_nfo->user_data_associated_academia;?>" target="_blank">Academia.edu</a> </span>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
							<h4>Proyectos</h4>
							<ul>
								<?php foreach ($all_projects_list->result() as $prjcts): ?>
									<li>
										<a href="<?php echo base_url() . 'project/' . $prjcts->map_project_code;?>">
											<?php echo $prjcts->map_project_title;?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
<?php endforeach; ?>
