<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Dchome_controller extends CI_Controller
{

  public function __construct() {
    parent::__construct();
    is_login();
  }

  public function index() {
    if ($this->session->userdata('is_loggedin') == TRUE) {
      $data['title']    = "Homepage";
      $data['st']       = "front";
      $data['file']     = "home";
      $this->dc_model->getPage($data);
      is_login();
    } else {
      $this->load->view('front/login');
    }
  }
}
