<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Login extends CI_Controller
{

  // function __construct()
  // {
  //
  // }
  public function index() {
    $this->load->view('front/pages/login');
  }

  public function cekLogin() {
    $username = trim(htmlentities($this->input->post('username', TRUE), ENT_QUOTES, 'utf-8'));
    $password = md5(sha1(base64_encode(trim(htmlentities($this->input->post('password', TRUE), ENT_QUOTES, 'utf-8')))));
    // password_hash(md5(sha1(base64_encode(trim(htmlentities($this->input->post('password', TRUE), ENT_QUOTES, 'utf-8'))))), PASSWORD_BCRYPT);
    $this->dc_model->actLogin($username, $password);
  }

  public function dest() {
    $this->session->sess_destroy();
    redirect();
  }
}
