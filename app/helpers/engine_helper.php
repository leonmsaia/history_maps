<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Core Engine for History Maps
// Created by Leonardo Saia
// All Rights Reserved.
// 2021

function getMyID()
{
    $ci =& get_instance();
    $user = $ci->ion_auth->user()->row();
    if(isset($user->id)) {
        return $user->id;
    }else{
    	return null;
    }
}

function format_date($date)
{
  $formatted_date = date('d/m/Y', strtotime($date));
  return $formatted_date;
}

function checkIfAuthorAreTheSame($user_id, $project_id)
{
  $ci =& get_instance();
  $ci->db->where('map_project_id', $project_id);
  $ci->db->from('map_project');
  $result = $ci->db->get();
  $author_id = $result->result()[0]->map_project_author;
  if ($author_id == $user_id) {
    return TRUE;
  }else {
    return FALSE;
  }
}

function getUserIDByUsername($username)
{
  $ci =& get_instance();
  $ci->db->where('username', $username);
  $ci->db->from('users');
  $result = $ci->db->get();
  $author_id = $result->result()[0]->id;
  return $author_id;
}

function getUsernameByUserID($user_id)
{
  $ci =& get_instance();
  $ci->db->where('id', $user_id);
  $ci->db->from('users');
  $result = $ci->db->get();
  $user_id = $result->result()[0]->username;
  return $user_id;
}

function getProjectMapsTitles($project_id)
{
  $ci =& get_instance();
  $ci->db->where('map_unit_project_id', $project_id);
  $ci->db->from('map_unit');
  $result = $ci->db->get();
  return $result;
}

function getProjectMapsCodeByProjectMapsID($project_id)
{
  $ci =& get_instance();
  $ci->db->where('map_project_id', $project_id);
  $ci->db->from('map_project');
  $result = $ci->db->get();
  return $result->result()[0]->map_project_code;
}

function getProjectStatusType($status_val)
{
  if ($status_val == 1) {
    $response = 'Activo';
  }elseif ($status_val == 2) {
    $response = 'Inactivo';
  }elseif ($status_val == 3) {
    $response = 'Por habilitar';
  }elseif ($status_val == 4) {
    $response = 'Borrado';
  }
  return $response;
}

function getProjectStatusPrivacity($privacity_val)
{
  if ($privacity_val == 1) {
    $response = 'Privado';
  }elseif ($privacity_val == 2) {
    $response = 'Publico';
  }
  return $response;
}
