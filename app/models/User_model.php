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

  public function get_complete_user_by_id($user_id)
  {
      $this->db->where('id', $user_id);
      $this->db->join('user_data_associated', 'users.id = user_data_associated.user_data_associated_user_id');
      $result = $this->db->get('users');
      return $result;
  }

  public function get_user_by_username($username)
  {
    $this->db->where('username', $username);
    $this->db->join('user_data_associated', 'users.id = user_data_associated.user_data_associated_user_id');
    $result = $this->db->get('users');
    return $result;
  }


}
