<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['upload_path'] = FCPATH . "assets/images/products";
$config['allowed_types'] = 'gif|jpg|jpeg|png';
$config['overwrite'] = TRUE;
$config['max_size'] = '1000';
$config['max_width']  = '1024';
$config['max_height']  = '1024';

$config['image_library']  = 'gd2';
$config['maintain_ratio'] = TRUE;
$config['height'] = 200;
$config['width']  = 200;


$config["per_page"] = 12;
$config['use_page_numbers'] = TRUE;
$config['cur_tag_open'] = '&nbsp;<a class="current"><strong><u>';
$config['cur_tag_close'] = '</u></strong></a>';
$config['next_link'] = 'Next';
$config['prev_link'] = 'Previous';
?>