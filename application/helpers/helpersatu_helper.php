<?php

function is_login() {
  $CI =& get_instance();
  if (!sess()) {
    $CI->session->set_flashdata(md5('notification'), "Anda harus login terlebih dahulu");
    redirect('login');
    die;
  }
}


function sess() {
  $CI =& get_instance();
  $session = $CI->session->userdata('is_loggedin')==TRUE;
  if (!empty($session)) {
    return true;
  }
  return false;
}

function encode_url($string, $key="", $url_safe=TRUE) {
    if($key==null || $key=="")
    {
        $key="awd2412d12d1d12r21f122125";
    }
    $CI =& get_instance();
    $ret = $CI->encrypt->encode($string, $key);

    if ($url_safe)
    {
        $ret = strtr(
                $ret,
                array(
                    '+' => '.',
                    '=' => '-',
                    '/' => '~'
                )
            );
    }

    return $ret;
}

function decode_url($string, $key="") {
    if($key==null || $key=="")
    {
      $key="awd2412d12d1d12r21f122125";
    }
    $CI =& get_instance();
    $string = strtr(
    $string,
      array(
        '.' => '+',
        '-' => '=',
        '~' => '/'
      )
    );

    return $CI->encrypt->decode($string, $key);
}
