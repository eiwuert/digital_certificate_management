<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Client extends CI_Controller
{

  public function index($page=NULL) {
    is_login();
    $data['title']    = "Client List";
    $data['st']       = "front";
    $data['file']     = "client";
    $config['base_url'] = base_url().'/client/index';
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
    $config['total_rows'] = $this->dc_model->ccountRow();
    $config['per_page'] = 10;
    $config['use_page_number'] = TRUE;
    $config['num_links'] = 1;
    $config['uri_segment'] = $this->uri->total_segments();
    $this->pagination->initialize($config);
    $data['paging'] = $this->pagination->create_links();
    $data['per_page'] = $config['per_page'];
    $data['client_l'] = $this->dc_model->getClientList($config['per_page'], $page);
    $this->dc_model->getPage($data);
  }

  public function add() {
    $data['title']    = "Add Client";
    $data['st']       = "front";
    $data['file']     = "client/add";
    $this->dc_model->getPage($data);
    is_login();
  }

  public function procAdd() {
    $client_name  = $this->input->post('client_name');
    $desc         = $this->input->post('desc');
    $start_date   = $this->input->post('start_date');
    if ($this->dc_model->procAddClient($client_name, $desc, $start_date)) {
      $this->session->set_flashdata('sukses', "Data Client berhasil ditambah!");
      redirect('client');
    } else {
      $this->session->set_flashdata('gagal', "Data Client gagal ditambah!");
      redirect('client');
    }
  }

  public function edit() {
    $data['title']    = "Edit Client";
    $data['st']       = "front";
    $data['file']     = "client/edit";
    $id_c             = $this->uri->segment(3);
    $data['client_e'] = $this->dc_model->getClientDet($id_c);
    $this->dc_model->getPage($data);
    is_login();
  }

  public function delete() {
    $client_id = $this->uri->segment(3);
    if ($this->dc_model->deleteClient($client_id)) {
      $this->session->set_flashdata('sukses', "Data Client berhasil dihapus");
      redirect('client');
    } else {
      $this->session->set_flashdata('gagal', "Data Client gagal dihapus");
      redirect('client');
    }
  }

  public function procEdit() {
    $client_id    = $this->input->post('client_id');
    $client_name  = $this->input->post('client_name');
    $start_date   = $this->input->post('start_date');
    $desc         = $this->input->post('desc');
    if ($this->dc_model->procEditClient($client_id, $client_name, $start_date, $desc)) {
      $this->session->set_flashdata('sukses', "Data Client berhasil diubah");
      redirect('client');
    } else {
      $this->session->set_flashdata('gagal', "Data Client gagal diubah");
      redirect('client');
    }
  }

  public function hoverDet() {
    $client_id = $this->input->post('userid');
    $this->dc_model->hoverDet($client_id);
    // echo "OK";
  }

  public function filter($page=NULL) {
    is_login();
    $client_name = $this->input->post('client_name');
    $data['title']    = "Filtered Client";
    $data['st']       = "front";
    $data['file']     = "client/filter";
    $config['base_url'] = base_url().'/client/index';
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
    $config['total_rows'] = $this->dc_model->ccountRowClientFiltered($client_name);
    $config['per_page'] = 10;
    $config['use_page_number'] = TRUE;
    $config['num_links'] = 1;
    $config['uri_segment'] = $this->uri->total_segments();
    $this->pagination->initialize($config);
    $data['paging'] = $this->pagination->create_links();
    $data['per_page'] = $config['per_page'];
    $data['data_f']   = $this->dc_model->doFilterClient($client_name, $config['per_page'], $page);
    $this->dc_model->getPage($data);
  }

  public function generate() {
    $client_id = decode_url($this->uri->segment(3));
    $data['generated_data'] = $this->dc_model->generateCode($client_id);
    $this->load->view('front/pages/client/generatedCode', $data);
  }
}
