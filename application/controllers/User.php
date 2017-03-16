<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class User extends CI_Controller
{

  public function index($page=NULL) {
    is_login();
    $data['title']  = "User Management";
    $data['st']     = "front";
    $data['file']   = "user";
    $config['base_url'] = base_url().'/user/index';
    $config['first_link'] = true;
    $config['last_link']  = true;
    $config['full_tag_open'] = '<div id="paging">';
    $config['full_tag_close'] = '</div>';
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['first_tag_open'] = '<span>';
    $config['first_tag_close'] = '</span>';
    $config['last_tag_open'] = '<span>';
    $config['last_tag_close'] = '</span>';
    $config['prev_tag_open'] = '<span>';
    $config['prev_tag_close'] = '</span>';
    $config['next_tag_open'] = '<span>';
    $config['next_tag_close'] = '</span>';
    $config['cur_tag_open'] = '<span class="cur">';
    $config['cur_tag_close'] = '</span>';
    $config['num_tag_open'] = '<span>';
    $config['num_tag_close'] = '</span>';
    $config['prev_link'] = '<i class="fa fa-caret-left"></i>';
    $config['next_link'] = '<i class="fa fa-caret-right"></i>';
    $config['total_rows'] = $this->dc_model->ccountRowUser();
    $config['per_page'] = 10;
    $config['use_page_number'] = TRUE;
    $config['num_links'] = 1;
    $config['uri_segment'] = $this->uri->total_segments();
    $this->pagination->initialize($config);
    $data['paging'] = $this->pagination->create_links();
    $data['per_page'] = $config['per_page'];
    $data['user_l'] = $this->dc_model->getUserList($config['per_page'], $page);
    $this->dc_model->getPage($data);
  }

  public function procAdd() {
    $username = $this->input->post('username');
    $password = md5(sha1(base64_encode(trim(htmlentities($this->input->post('password', TRUE), ENT_QUOTES, 'utf-8')))));
    $email    = $this->input->post('email');
    $status   = $this->input->post('status');
    if ($this->dc_model->procAddUser($username, $password, $email, $status)) {
      $this->session->set_flashdata('suskes', "Data User berhasil ditambah!");
      redirect('user');
    } else {
      $this->session->set_flashdata('gagal', "Data User gagal ditambah!");
      redirect('user');
    }
  }

  public function delete() {
    $user_id = $this->uri->segment(3);
    if ($this->dc_model->deleteUser($user_id)) {
      $this->session->set_flashdata('sukses', "Data User berhasil dihapus");
      redirect('user');
    } else {
      $this->session->set_flashdata('gagal', "Data User gagal dihapus");
      redirect('user');
    }
  }

  public function edit() {
    is_login();
    $data['title']    = "Edit User Detail";
    $data['st']       = "front";
    $data['file']     = "user/edit";
    $id_u             = $this->uri->segment(3);
    $data['user_e']   = $this->dc_model->getUserDet($id_u);
    $this->dc_model->getPage($data);
  }

  public function procEdit() {
    $user_id  = $this->input->post('user_id');
    $username = $this->input->post('username');
    if ($this->input->post('password') != "") {
      $password = md5(sha1(base64_encode(trim(htmlentities($this->input->post('password', TRUE), ENT_QUOTES, 'utf-8')))));
    } else {
      $password = $this->session->userdata('pass');
    }
    $email    = $this->input->post('email');
    $status   = $this->input->post('status');
    if ($this->dc_model->procEditUser($user_id, $username, $password, $email, $status)) {
      $this->session->set_flashdata('sukses', "Data User berhasil diubah!");
      redirect('user');
    } else {
      $this->session->set_flashdata('gagal', "Data User gagal diubah!");
      redirect('user');
    }
  }
}
