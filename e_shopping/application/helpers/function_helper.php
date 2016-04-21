<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function create_password($password)
{
    //Hashing of password
    return md5(md5(SALT) + md5($password));
}   

function input_array($name, $id, $class, $placeholder)
{
    //Makes array of attributes
    $data = array(
			'name' => $name,
		    'id' => $id,
		   	'class' => $class,
		   	'placeholder' => $placeholder
		);
    return $data;
}
function control_array($name, $id, $class)
{
    //Makes array of attributes
    $data = array(
			'name' => $name,
		    'id' => $id,
		   	'class' => $class
		);
    return $data;
}

function image_thumb($image_path) 
{
    // Get the CodeIgniter super object
    $CI =& get_instance();
    // Path to image thumbnail
    $image_thumb = dirname( $image_path ) . '/thumbnails/' . basename($image_path);
    // LOAD LIBRARY
    $CI->load->library('image_lib');
    // CONFIGURE IMAGE LIBRARY
    $values = $CI->config->config;
    $values['source_image'] = $image_path;
    $values['new_image'] = $image_thumb;    
    $CI->image_lib->initialize($values);
    $CI->image_lib->resize();
    $CI->image_lib->clear();
    
    return true;
}