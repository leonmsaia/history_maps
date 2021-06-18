<?php
	foreach ($map_unit_list_data->result() as $map_data) {
		$current_map_title = $map_data->map_unit_title;
		$current_map_lat = $map_data->map_unit_center_lat;
		$current_map_lon = $map_data->map_unit_center_lgn;
		$current_map_zoom = $map_data->map_unit_center_zoom;
		$current_map_maxzoom = $map_data->map_unit_center_zoom_max;
		$current_map_ID = $map_data->map_unit_id;
	}

	$map_project_code = $map_project_data->result()[0]->map_project_code;
?>

<div class="container-fluid">
	


	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center;">Sistema Interactivo de Visualización de Mapas Historicos</h1>
		</div>
	</div>	

	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center;">
				<?php echo $map_project_data->result()[0]->map_project_title;?>: 
				<?php echo $current_map_title;?>
			</h1>
		</div>
	</div>



	<div class="row">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<h3 style="text-align: center;">Listado de Mapas</h3>
					<ul>
						<?php foreach ($map_unit_list_data->result() as $unit_render): ?>
							<li>
								<i><?php echo $unit_render->map_unit_title;?></i>
								<a href="#">Ver</a>
								<a href="#">Editar</a>
								<a href="#">Borrar</a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">

					<div class="row">
						<div class="col-md-12">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link" id="mainconf-tab" data-toggle="tab" href="#mainconf" role="tab" aria-controls="mainconf" aria-selected="true">
										Configuración del Proyecto
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="mapconf-tab" data-toggle="tab" href="#mapconf" role="tab" aria-controls="mapconf" aria-selected="false">
										Configuración del Mapa
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link active" id="poiconf-tab" data-toggle="tab" href="#poiconf" role="tab" aria-controls="poiconf" aria-selected="false">
										Puntos de Interes
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
										Lineas
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
										Areas de Dibujo
									</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
									







								<!-- PROJECT CONFIGURATION -->
								<div class="tab-pane fade" id="mainconf" role="tabpanel" aria-labelledby="mainconf-tab">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-12">
												<h3>Configuración del Proyecto</h3>
											</div>
										</div>
										<div class="row">
											<form class="col-md-12">
												<div class="mb-3">
													<label for="project_title" class="form-label">Nombre del Proyecto</label>
													<input type="text" class="form-control" value="<?php echo $map_project_data->result()[0]->map_project_title;?>" id="project_title">
												</div>
												<div class="mb-3">
													<label for="project_privacity" class="form-label">Privacidad</label>
													<select id="project_privacity" class="form-select" aria-label="Default select example">
													  <option value="1" selected>Publico</option>
													  <option value="2">Privado</option>
													</select>
												</div>
												<div class="mb-3">
													<button type="submit" class="btn btn-primary">Guardar</button>
												</div>
											</form>
										</div>	
									</div>
								</div>
								<!-- PROJECT CONFIGURATION END -->






								<!-- CURRENT MAP CONFIGURATION -->
								<div class="tab-pane fade" id="mapconf" role="tabpanel" aria-labelledby="mapconf-tab">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-12">
												<h3>Configuración del Mapa</h3>
											</div>
										</div>
										<div class="row">
											<form class="col-md-12">
												
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-12">
																<label for="project_title" class="form-label">
																	Nombre del Mapa
																</label>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<input type="text" class="form-control" value="<?php echo $current_map_title;?>" id="project_title">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-12">
																<label for="map_center_lat" class="form-label">
																	Punto Central de Mapa: Latitud
																</label>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<input type="text" class="form-control" value="<?php echo $current_map_lat;?>" id="map_center_lat">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-12">
																<label for="map_center_lng" class="form-label">
																	Punto Central de Mapa: Longitud
																</label>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<input type="text" class="form-control" value="<?php echo $current_map_lon;?>" id="map_center_lng">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-12">
																<label for="project_title" class="form-label">
																	Punto Central de Mapa: Zoom
																</label>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<input type="text" class="form-control" value="<?php echo $current_map_zoom;?>" id="map_zoom_value">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-12">
																<label for="project_title" class="form-label">
																	Punto Central de Mapa: Max. Zoom
																</label>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<input type="text" class="form-control" value="<?php echo $current_map_maxzoom;?>" id="project_title">
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<button type="submit" class="btn btn-primary">Guardar</button>
													</div>
												</div>

											</form>
										</div>	
									</div>
								</div>
								<!-- CURRENT MAP CONFIGURATION END -->






								<!-- POI CONFIGURATION -->
								<div class="tab-pane fade show active" id="poiconf" role="tabpanel" aria-labelledby="poiconf-tab">
									<div class="row">
										
										<?php // POI List ?>
										<div class="col-md-12">
											<h3>Puntos de Interes</h3>
											<ul>
												<?php foreach ($map_unit_list_assets_poi->result() as $poi_data_set): ?>
													<li>
														<i><?php echo $poi_data_set->map_assets_poi_title;?></i> 
														<a class="edit_poi_action" targetEditPoi="<?php echo $poi_data_set->map_assets_poi_id;?>" href="#">Editar</a>
														<a href="#">Eliminar</a>
													</li>
												<?php endforeach ?>
											</ul>
											<button type="button" id="create_new_poi" class="btn btn-primary">
												Crear Nuevo Punto de Interes
											</button>
										</div>
										<?php // POI List END ?>

										<?php // POI Creator Form ?>
										<div class="col-md-12" id="new_poi_form_holder" style="display: none;">
											<div class="row">
												<?php echo form_open('MapView/savenewpoi', 'class="col-md-12" id="checkout_form"');?>
													<input type="hidden" name="project_code" id="project_code" value="<?php echo $map_project_code;?>">
													<input type="hidden" name="map_assets_poi_map_id" id="map_assets_poi_map_id" value="<?php echo $current_map_ID;?>">
													<input type="hidden" id="enable_put_newpoi" value="0">
													<div class="row">
														<div class="col-md-12">
															<legend>Crear Nuevo Punto de Interes</legend>
														</div>
													</div>
													<div class="col-md-12">
														<label for="map_assets_poi_title" class="form-label">
															Titulo
														</label>
														<input type="text" name="map_assets_poi_title" class="form-control" value="" id="map_assets_poi_title">
													</div>
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-6">
																<label for="map_assets_poi_lat" class="form-label">
																	Latitud
																</label>
																<input type="text" name="map_assets_poi_lat" class="form-control" value="" id="map_assets_poi_lat">
															</div>
															<div class="col-md-6">
																<label for="map_assets_poi_lng" class="form-label">
																	Longitud
																</label>
																<input type="text" name="map_assets_poi_lng" class="form-control" value="" id="map_assets_poi_lng">
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<label for="map_assets_poi_txt" class="form-label">
															Cuerpo del Texto
														</label>
														<textarea class="form-control" name="map_assets_poi_txt" id="map_assets_poi_txt" rows="10"></textarea>
													</div>
													<div class="col-md-12">
														<label for="map_assets_poi_youtube" class="form-label">
															Codigo de Youtube
														</label>
														<input type="text" name="map_assets_poi_youtube" class="form-control" value="" id="map_assets_poi_youtube">
													</div>

													<div class="col-md-12">
														<label for="map_assets_poi_download_path" class="form-label">
															Pagina de Bibliogafia
														</label>
														<input type="text" name="map_assets_poi_download_path" class="form-control" value="" id="map_assets_poi_download_path">
													</div>

													
													<div class="col-md-12">
														<label for="map_assets_poi_ico" class="form-label">
															Icono
														</label>
														<select name="map_assets_poi_ico" id="map_assets_poi_ico" class="form-select">
														  <option value="1" selected>Marcador</option>
														  <option value="2">Ciudad</option>
														  <option value="3">Castillo</option>
														  <option value="4">Batalla</option>
														  <option value="5">Exclamacion</option>
														  <option value="6">Pregunta</option>
														</select>
													</div>
													<div class="col-md-12">
														<button type="submit" class="btn btn-primary">
															Guardar
														</button>
													</div>
												<?php echo form_close();?>
											</div>
										</div>
										<?php // POI Creator Form END ?>

										<?php // POI Creator Edit Form List ?>
										<?php foreach ($map_unit_list_assets_poi->result() as $poi_data_set): ?>
											<!-- <div class="col-md-12 edit_poi_specific_general" id="edit_poi_specific_" style="display: none;"> -->
											<div class="col-md-12 edit_poi_specific_general" id="edit_poi_specific_<?php echo $poi_data_set->map_assets_poi_id;?>" poinumber="<?php echo $poi_data_set->map_assets_poi_id;?>" style="display: none;">
												<div class="row">
													<?php echo form_open('MapView/savenewpoi', 'class="col-md-12" id="checkout_form"');?>
														<input type="hidden" name="project_code" id="project_code" value="<?php echo $map_project_code;?>">
														<input type="hidden" id="enable_put_newpoi" value="0">
														<div class="row">
															<div class="col-md-12">
																<legend>Editar Punto de Interes</legend>
															</div>
														</div>
														<div class="col-md-12">
															<label for="map_assets_poi_title" class="form-label">
																Titulo
															</label>
															<input type="text" name="map_assets_poi_title" class="form-control" value="<?php echo $poi_data_set->map_assets_poi_title;?>" id="map_assets_poi_title">
														</div>
														<div class="col-md-12">
															<div class="row">
																<div class="col-md-6">
																	<label for="map_assets_poi_lat" class="form-label">
																		Latitud
																	</label>
																	<input type="text" name="map_assets_poi_lat" class="form-control" value="<?php echo $poi_data_set->map_assets_poi_lat;?>" id="map_assets_poi_lat">
																</div>
																<div class="col-md-6">
																	<label for="map_assets_poi_lng" class="form-label">
																		Longitud
																	</label>
																	<input type="text" name="map_assets_poi_lng" class="form-control" value="<?php echo $poi_data_set->map_assets_poi_lng;?>" id="map_assets_poi_lng">
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<label for="map_assets_poi_txt" class="form-label">
																Cuerpo del Texto
															</label>
															<textarea class="form-control" name="map_assets_poi_txt" id="map_assets_poi_txt" rows="10"><?php echo $poi_data_set->map_assets_poi_txt;?></textarea>
														</div>
														<div class="col-md-12">
															<label for="map_assets_poi_youtube" class="form-label">
																Codigo de Youtube
															</label>
															<input type="text" name="map_assets_poi_youtube" class="form-control" value="<?php echo $poi_data_set->map_assets_poi_youtube;?>" id="map_assets_poi_youtube">
														</div>

														<div class="col-md-12">
															<label for="map_assets_poi_download_path" class="form-label">
																Pagina de Bibliogafia
															</label>
															<input type="text" name="map_assets_poi_download_path" class="form-control" value="<?php echo $poi_data_set->map_assets_poi_download_path;?>" id="map_assets_poi_download_path">
														</div>
														<div class="col-md-12">
															<label for="map_assets_poi_ico" class="form-label">
																Icono
															</label>
															<select name="map_assets_poi_ico" id="map_assets_poi_ico" class="form-select">
															  <option value="1" selected>Marcador</option>
															  <option value="2">Ciudad</option>
															  <option value="3">Castillo</option>
															  <option value="4">Batalla</option>
															  <option value="5">Exclamacion</option>
															  <option value="6">Pregunta</option>
															</select>
														</div>
														<div class="col-md-12">
															<button type="button" class="btn btn-primary">
																Activar Marcador
															</button>
															<button type="submit" class="btn btn-primary">
																Guardar
															</button>
														</div>
													<?php echo form_close();?>
												</div>
											</div>
										<?php endforeach ?>
										<?php // POI Creator Edit Form List END?>

									</div>
								</div>
								<!-- POI CONFIGURATION END -->


							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
		<div class="col-md-8">
			<div id="map" style="position: relative;width: 100%;height: 80vh;"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-11">
			<div class="row">
				<div class="col-md-10">
					<audio controls style="width: 100%;float: left;">
					  <source src="horse.ogg" type="audio/ogg">
					  <source src="horse.mp3" type="audio/mpeg">
					Your browser does not support the audio element.
					</audio>
				</div>
				<div class="col-md-2">
					<button type="button" class="btn btn-outline-info">Descargar Audio</button>
					<button type="button" class="btn btn-outline-info">Bibliografia</button>
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



<script>
	

	$(document).ready(function() {
		
		// Initial Vars for Rendering Map
		var lat = <?php echo $current_map_lat;?>;
		var lng = <?php echo $current_map_lon;?>;
		var zoom = <?php echo $current_map_zoom;?>;
		var mymap = L.map('map').setView([lat, lng], zoom);
		// Initial Vars for Rendering Map End

		// Load Tileset
		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			maxZoom: <?php echo $current_map_maxzoom;?>,
			id: 'mapbox/satellite-v9',
			tileSize: 512,
			zoomOffset: -1,
		}).addTo(mymap);
		// Load Tileset End

		// Fill Map with POI Markers
		<?php $flag_poi = 0;?>
		<?php foreach ($map_unit_list_assets_poi->result() as $poi_data): ?>
			var lat_marker_<?php echo $flag_poi;?> = <?php echo $poi_data->map_assets_poi_lat; ?>;
			var lng_marker_<?php echo $flag_poi;?> = <?php echo $poi_data->map_assets_poi_lng; ?>;
			var marker_title_<?php echo $flag_poi;?> = "<?php echo $poi_data->map_assets_poi_title; ?>";
			popup_<?php echo $flag_poi;?> = L.marker([lat_marker_<?php echo $flag_poi;?>, lng_marker_<?php echo $flag_poi;?>], {
				title: marker_title_<?php echo $flag_poi;?>,
				alt: <?php echo $poi_data->map_assets_poi_id;?>,
			}).addTo(mymap);
			var popupLocation_<?php echo $flag_poi;?> = new L.LatLng(lat_marker_<?php echo $flag_poi;?>, lng_marker_<?php echo $flag_poi;?>);
			var popupContent_<?php echo $flag_poi;?> = marker_title_<?php echo $flag_poi;?>,
			popup_<?php echo $flag_poi;?> = new L.Popup(
				{
					autoClose: false,
					closeOnClick: false,
					closeButton: false,
					className: 'map_popup_stl'
				}
			);
			popup_<?php echo $flag_poi;?>.setLatLng(popupLocation_<?php echo $flag_poi;?>);
			popup_<?php echo $flag_poi;?>.setContent(popupContent_<?php echo $flag_poi;?>);
			mymap.addLayer(popup_<?php echo $flag_poi;?>)
		<?php $flag_poi++; ?>
		<?php endforeach ?>
		// Fill Map with POI Markers End

		// Get initial Zoom in map
		mymap.on('zoomstart',function(e){
			var currZoom = mymap.getZoom();
			console.log(currZoom);
			$('#map_zoom_value').val(currZoom);
		});
		// Get initial Zoom in map End

		// Get Marker POI Information
		$('.leaflet-marker-icon').on('click', function() {
			var marker_id = $(this).attr('alt');
		  	console.log(marker_id);
		  	$('#poi_data_' + marker_id).modal()
		});
		// Get Marker POI Information End

		// Central Marker
		central_marker = L.marker(
			[
				lat, 
				lng
			], {
				title: '(Punto Central, este marcador no sera visto en el mapa final)',
				alt: '(Punto Central, este marcador no sera visto en el mapa final)',
				draggable: true
			}
		).addTo(mymap);
		// Central Marker End

		// Set Center Lat and Long
		central_marker.on('dragend', function (e) {
		    $('#map_center_lat').val(central_marker.getLatLng().lat);
		    $('#map_center_lng').val(central_marker.getLatLng().lat);
		});
		mymap.setView(new L.LatLng(lat, lng), zoom);
		// Set Center Lat and Long End


		$('#create_new_poi').on('click', function() {
			$('#enable_put_newpoi').val(1);
			$('#create_new_poi').attr('disabled', true);
			enabled_poi_creator();
		});

		function enabled_poi_creator() {
			$('#new_poi_form_holder').show();
			// Create POI Engine
			var newpoienabled = $('#enable_put_newpoi').val();
			if (newpoienabled == 1) {
				mymap.on("click", function(e){
					var newPoiTitle = $('#map_assets_poi_title').val();
					var mp = new L.Marker(
						[
							e.latlng.lat,
							e.latlng.lng
						], {
						title: newPoiTitle,
						alt: newPoiTitle,
						draggable: true
					}
					).addTo(mymap);
					$('#map_assets_poi_lat').val(e.latlng.lat);
				    $('#map_assets_poi_lng').val(e.latlng.lng);
					mp.on('dragend', function (e) {
					    $('#map_assets_poi_lat').val(mp.getLatLng().lat);
					    $('#map_assets_poi_lng').val(mp.getLatLng().lng);
					});
				});


			}else{
				console.log('no se habilito la adicion de poi');
			}
			// Create POI Engine End
		}

	});	
	
	$('.edit_poi_action').on('click', function() {
		var poiValue = $(this).attr('targetEditPoi');
		$('.edit_poi_specific_general').hide();
		$('#edit_poi_specific_' + poiValue).show();
		console.log(poiValue);
	});

</script>

<style>
	.map_popup_stl {
		margin-bottom: 50px;
	}
</style>

<?php foreach ($map_unit_list_assets_poi->result() as $poi_data_set): ?>
	<div class="modal fade" id="poi_data_<?php echo $poi_data_set->map_assets_poi_id;?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">
						<?php echo $poi_data_set->map_assets_poi_title;?>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo $poi_data_set->map_assets_poi_txt;?>
					<?php if ($poi_data_set->map_assets_poi_youtube != NULL): ?>
						<iframe width="100%" height="720" src="https://www.youtube.com/embed/<?php echo $poi_data_set->map_assets_poi_youtube ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>						
					<?php endif ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>