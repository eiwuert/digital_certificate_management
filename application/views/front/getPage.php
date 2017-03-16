<?php
  if ($file) {
    if (file_exists('application/views/front/pages/'.$file.'.php')==TRUE) {
      $this->load->view('front/pages/'.$file);
    } else {
      echo "Halamaan tidak ditemukan";
    }
  } else {
    echo "Halaman tidak ditemukan";
  }
?>
