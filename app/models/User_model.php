<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{

  public function get_all_users()
  {
      $result = $this->db->get('users');
      return $result;
  }

  public function get_user_by_id($user_id)
  {
      $this->db->where('id', $user_id);
      $result = $this->db->get('users');
      return $result;
  }



}
