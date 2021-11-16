<div class="widgets-wrapper">
  <div class="streaming-table">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>N° de Proyecto</th>
                <th>Titulo</th>
                <th>Codigo</th>
                <th>Autor</th>
                <th>Fecha de Publicacion</th>
                <th>Acceso</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($projects_data->result() as $prj_lst): ?>
            <tr>
              <td><?php echo $prj_lst->map_project_id;?></td>
              <td><?php echo $prj_lst->map_project_title;?></td>
              <td><?php echo $prj_lst->map_project_code;?></td>
              <td><?php echo $prj_lst->first_name .' '. $prj_lst->last_name;?></td>
              <td><?php echo format_date($prj_lst->map_project_date);?></td>
              <td>
                <a href="<?php echo base_url() . 'project/' . $prj_lst->map_project_code;?>">Ver Mapa</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>N° de Proyecto</th>
                <th>Titulo</th>
                <th>Codigo</th>
                <th>Autor</th>
                <th>Fecha de Publicacion</th>
                <th>Acceso</th>
            </tr>
        </tfoot>
    </table>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
<script src="<?php echo base_url();?>assets/js/libs/datatables/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/libs/datatables/datatables.min.css" />
