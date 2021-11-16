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
