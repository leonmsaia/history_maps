<?php
	foreach ($map_unit_list_data->result() as $map_data) {
		$current_map_title = $map_data->map_unit_title;
		$current_map_lat = $map_data->map_unit_center_lat;
		$current_map_lon = $map_data->map_unit_center_lgn;
		$current_map_zoom = $map_data->map_unit_center_zoom;
		$current_map_maxzoom = $map_data->map_unit_center_zoom_max;
	}
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center;">Sistema Interactivo de Visualización de Mapas Historicos</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-1">
					<h3 style="text-align: center;">Listado de Mapas</h3>
				</div>
				<div class="col-md-11">
					<h1 style="text-align: center;">
						<?php echo $map_project_data->result()[0]->map_project_title;?>:
						<?php echo $current_map_title;?>
					</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1">
			<div class="row">
				<?php foreach ($map_unit_list_data->result() as $unit_render): ?>
					<div class="col-md-12">
						<button type="button" class="btn btn-outline-info" style="width: 100%;">
							<?php echo $unit_render->map_unit_title;?>
						</button>
					</div>
				<?php endforeach ?>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>Leyenda</h3>
					<ul class="legend_poi_map">
						<?php foreach ($map_unit_list_assets_poi->result() as $legend_elemnt): ?>
							<li><?php echo $legend_elemnt->map_assets_poi_title;?></li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-11">
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
						<iframe class="youtube_holder" width="100%" height="720" src="https://www.youtube.com/embed/<?php echo $poi_data_set->map_assets_poi_youtube ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<?php endif ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>
