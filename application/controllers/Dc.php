<?php

/**
 *
 */
class Dc extends CI_Controller
{

  public function detail() {
    $id_c = $this->uri->segment(3);
    $data['get_detail'] = $this->dc_model->getClientDet($id_c);
    $this->load->view('front/pages/external/digital_certificate.php', $data);
  }
}
