<?php
	foreach ($map_unit_list_data->result() as $map_data) {
		$current_map_title = $map_data->map_unit_title;
		$current_map_lat = $map_data->map_unit_center_lat;
		$current_map_lon = $map_data->map_unit_center_lgn;
		$current_map_zoom = $map_data->map_unit_center_zoom;
		$current_map_maxzoom = $map_data->map_unit_center_zoom_max;
		$current_map_project_id = $map_data->map_unit_project_id;
	}
	foreach ($map_author_data->result() as $atr) {
		$author_name = $atr->first_name . ' ' . $atr->last_name;
		$author_id = $atr->id;
	}
	$user_id = getMyID();
?>

<?php if (checkIfAuthorAreTheSame($user_id, $current_map_project_id) == TRUE): ?>
	<div class="col s12">
		<div class="widget z-depth-1">
			<a href="#" class="btn btn-outline-info">Editar Mapa</a>
		</div>
	</div>
<?php endif; ?>

<div class="col s12">
	<div class="widget z-depth-1">
		<div class="loader"></div>
		<div class="widget-title">
			<h3>Proyecto: <?php echo $map_project_data->result()[0]->map_project_title;?></h3>
			<p>Autor: <?php echo $author_name;?> | Mapa: <?php echo $current_map_title;?></p>
			<a class="options dropdown-button waves-effect" href="#" title="" data-activates='dropdown4'><i class="ti-more-alt"></i></a>
			<ul id='dropdown4' class='dropdown-content'>
				<li><a class="rld" href="#!" title="">Recargar</a></li>
				<li><a class="fl-scr" href="#!" title="">Pantalla Completa</a></li>
			</ul>
		</div>
		<div class="map">
			<div id="map" style="position: relative; width: 100%; height: 80vh;"></div>
		</div>
	</div>

	<div class="widget z-depth-1">
		<div class="loader"></div>
		<div class="widget-title">
			<h3>Soporte</h3>
			<p>Archivo de Audio y Bibliografia</p>
		</div>
		<div class="col s12">
			<audio controls style="width: 100%;float: left;">
				<source src="horse.ogg" type="audio/ogg">
				<source src="horse.mp3" type="audio/mpeg">
				Your browser does not support the audio element.
			</audio>
		</div>
		<div class="col s12">
			<button type="button" class="btn btn-outline-info">Descargar Audio</button>
			<a href="#map_assets_component_biblos" class="btn btn-outline-info">Bibliografia</a>
		</div>
	</div>

	<div id="map_assets_component_biblos" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4>Bibliografia Sugerida</h4>
			<span>
					<?php foreach ($map_unit_list_assets_components->result() as $cmpnt): ?>
						<?php if ($cmpnt->map_assets_components_type == 1): ?>
							<?php if ($cmpnt->map_assets_components_path != NULL): ?>
								<a href="#">
									<?php echo $cmpnt->map_assets_components_map_title;?>
								</a>
							<?php else: ?>
								<?php echo $cmpnt->map_assets_components_map_title;?>
							<?php endif; ?>
							<br>
						<?php endif; ?>
					<?php endforeach; ?>
			</span>
		</div>
		<div class="modal-footer">
		</div>
	</div>

	<?php foreach ($map_unit_list_assets_poi->result() as $poi_data_set): ?>
		<div id="poi_data_<?php echo $poi_data_set->map_assets_poi_id;?>" class="modal modal-fixed-footer">
			<div class="modal-content">
				<h4><?php echo $poi_data_set->map_assets_poi_title;?></h4>
				<span>
					<?php echo $poi_data_set->map_assets_poi_txt;?>
				</span>
				<?php if ($poi_data_set->map_assets_poi_youtube != NULL): ?>
					<iframe class="youtube_holder" width="100%" height="720" src="https://www.youtube.com/embed/<?php echo $poi_data_set->map_assets_poi_youtube ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<?php endif ?>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	<?php endforeach ?>

	<?php // $this->load->view('pages/ViewMap/modules/comments_module');?>

</div>



<script>
	function init_map() {
		var lat = <?php echo $current_map_lat;?>;
		var lng = <?php echo $current_map_lon;?>;
		var zoom = <?php echo $current_map_zoom;?>;

		var mymap = L.map('map').setView([lat, lng], zoom);

		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			maxZoom: <?php echo $current_map_maxzoom;?>,
			id: 'mapbox/satellite-v9',
			tileSize: 512,
			zoomOffset: -1,
		}).addTo(mymap);

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



	}

	$(document).ready(function() {
		init_map();

		// Get Marker POI Information
		$('.leaflet-marker-icon').on('click', function() {
			var marker_id = $(this).attr('alt');
		  	console.log(marker_id);
		  	$('#poi_data_' + marker_id).modal()

		});
	});

</script>
