<?php

/**
 *
 */
class Dc_model extends CI_Model
{

  public function getPage($data) {
    if ($data['st']=="front") {
      $this->load->view('front/index', $data, FALSE);
    }
  }

  public function actLogin($username, $password) {
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $que = $this->db->get('user');
    $count_row = $que->num_rows();
    $res = $que->row();

    if ($count_row === 1) {
      if ($res->status == "Aktif") {
        $this->sessionStart($res);
      } else {
        echo "Maaf akun anda tidak aktif";
      }
    } else {
      echo "Username dan Password salah!";
    }
  }

  public function sessionStart($res='') {
    $data['username'] = $res->username;
    $data['pass']     = $res->password;
    $data['is_loggedin'] = TRUE;

    $this->session->set_userdata($data);
    echo "Sukses Login";
    redirect();
  }

  public function getClientList($limit, $id) {
    $this->db->order_by('id_client', 'desc');
    $get = $this->db->get('client', $limit, $id)->result();
    return $get;
  }

  public function getClientDet($id) {
    $this->db->where('id_client', decode_url($id));
    $res = $this->db->get('client')->result();
    return $res;
  }

  public function procAddClient($client_name, $desc, $start_date) {
    $end_date    = date('Y-m-d', strtotime('+1 year', strtotime($start_date)));
    $data = array(
      'client_name' => $client_name,
      'desc'        => $desc,
      'start_date'  => $start_date,
      'end_date'    => $end_date
    );
    $fin = $this->db->insert('client', $data);
    return $fin;
  }

  public function ccountRow() {
    $dbc = $this->db->get('client');
    return $count_row = $dbc->num_rows();
  }

  public function ccountRowUser() {
    $dbc = $this->db->get('user');
    return $count_row = $dbc->num_rows();
  }

  public function deleteClient($client_id) {
    $this->db->where('id_client', decode_url($client_id));
    $res = $this->db->delete('client');
    return $res;
  }

  public function procEditClient($client_id, $client_name, $start_date, $desc) {
    $exp_date = date('Y-m-d', strtotime('+1 year', strtotime($start_date)));
    $data     = array(
      'client_name' => $client_name,
      'start_date'  => $start_date,
      'end_date'    => $exp_date,
      'desc'        => $desc
    );
    $this->db->where('id_client', decode_url($client_id));
    $fin = $this->db->update('client', $data);
    return $fin;
  }

  public function getUserList($limit, $id) {
    $this->db->order_by('id_user', 'desc');
    $res = $this->db->get('user', $limit, $id)->result();
    return $res;
  }

  public function procAddUser($username, $password, $email, $status) {
    $data = array(
      'username'  => $username,
      'password'  => $password,
      'email'     => $email,
      'status'    => $status
    );
    $fin = $this->db->insert('user', $data);
    return $fin;
  }

  public function deleteUser($user_id) {
    $this->db->where('id_user', decode_url($user_id));
    $res = $this->db->delete('user');
    return $res;
  }

  public function getUserDet($id_u) {
    $this->db->where('id_user', decode_url($id_u));
    $res = $this->db->get('user')->result();
    return $res;
  }

  public function procEditUser($user_id, $username, $password, $email, $status) {
    $data     = array(
      'username'    => $username,
      'password'    => $password,
      'email'       => $email,
      'status'      => $status
    );
    $this->db->where('id_user', decode_url($user_id));
    $fin = $this->db->update('user', $data);
    return $fin;
  }

  public function hoverDet($client_id) {
    $this->db->where('id_client', $client_id);
    $que = $this->db->get('client');
    $res = $que->row();
    echo "<div style='font-size: 12px;line-height: 20px;background: #3aa729;padding:10px;color: #fff'>";
    echo "<span style='font-weight:bold;'>Secure and Authentic Website</span><br>";
    echo "<div style='border-bottom: solid 1px #fff;width:100%;padding: 2px 0px;'></div>";
    echo "<div style='padding-top: 5px;'></div><span style=''> Client : ".$res->client_name . "</span><br>";
    echo "<span> Verified : ".$res->start_date . "</span><br>";
    echo "<span> Expired at : ".$res->end_date . "</span><br>";
    echo "</div>";
  }

  public function doFilterClient($client_name, $limit_id, $id) {
    $this->db->like('client_name', $client_name);
    $res_f = $this->db->get('client', $limit_id, $id)->result();
    return $res_f;
  }

  public function ccountRowClientFiltered($client_name) {
    $this->db->like('client_name', $client_name);
    $row = $this->db->get('client');
    return $count_row = $row->num_rows();
  }

  public function generateCode($client_id) {
    $this->db->where('id_client', $client_id);
    return $this->db->get('client')->result();
  }
}
