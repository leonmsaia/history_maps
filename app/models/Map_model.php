<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map_model extends CI_Model
{

  public function get_all_projects_list()
  {
      $this->db->join('users', 'users.id = map_project.map_project_author');
      $result = $this->db->get('map_project');
      return $result;
  }

  public function get_map_project_class_by_id($map_project_id)
  {
    $this->db->where('map_project_id', $map_project_id);
    $result = $this->db->get('map_project');
    return $result;
  }

  public function get_map_project_class_by_code($map_project_code)
  {
    $this->db->where('map_project_code', $map_project_code);
    $result = $this->db->get('map_project');
    return $result;
  }

  public function get_map_unit_list_class($map_project_id)
  {
    $this->db->where('map_unit_project_id', $map_project_id);
    // $this->db->join('wp_term_relationships', 'wp_term_relationships.object_id = wp_posts.ID');
    $this->db->order_by('map_unit_order', 'ASC');
    $result = $this->db->get('map_unit');
    return $result;
  }

  public function get_map_assets_poi_by_map_id($map_id)
  {
    $this->db->where('map_assets_poi_map_id', $map_id);
    $result = $this->db->get('map_assets_poi');
    return $result;
  }


}
