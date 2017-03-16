<div id="client">
  <button class="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add User</button>
  <br>
  <?php if ($this->session->flashdata('sukses')) {
    echo "<br><div class='sukses_i'>".$this->session->flashdata('sukses')."<span><a style='color:#fff;float:right' title='close' href='".base_url('user')."'>x</a></span></div>";
  } else if ($this->session->flashdata('error')) {
    echo "<br><div class='sukses_i'>".$this->session->flashdata('error')."<span><a style='color:#fff;float:right' title='close' href='".base_url('user')."'>x</a></span></div>";
  }
  ?>
  <table border="1" cellspacing="0">
    <tr>
      <th width="10">No.</th>
      <th>Username</th>
      <th>Email</th>
      <th>Status</th>
      <th>Act</th>
    </tr>

    <?php
    if ($this->uri->segment(3)) {
      $no = $this->uri->segment(3) + 1;
    } else {
      $no = 1;
    }
    foreach ($user_l as $usr) {
    ?>
      <tr>
        <td><?=$no;?></td>
        <td><?=$usr->username?></td>
        <td><?=$usr->email?></td>
        <td width="30%"><?=$usr->status;?></td>
        <td class="t-center">
          <a href="<?=site_url('user/edit/'.encode_url($usr->id_user))?>">
            <i class="fa fa-pencil custom_fa_icon" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
          </a>
           &nbsp;&nbsp;
          <a href="<?=site_url('user/delete/'.encode_url($usr->id_user))?>">
            <i class="fa fa-trash custom_fa_icon" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Delete"></i>
          </a>
        </td>
      </tr>
    <?php $no++; } ?>
  </table>
  <div class="">
    <?php echo $paging; ?>
  </div>
</div>
<!-- MODAL -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Client</h4>
      </div>
      <div class="modal-body">
        <div id="add_c_modal">
          <form class="" action="<?=site_url('user/procAdd')?>" method="post">
            <table>
              <tr>
                <td>Username</td>
              </tr>
              <tr>
                <td style="width:100%;">
                  <input type="text" name="username" value="" placeholder="Client Name" style="width:100%;">
                </td>
              </tr>
              <tr>
                <td>Email</td>
              </tr>
              <tr>
                <td style="width:100%;">
                  <input type="email" name="email" value="" placeholder="Email" style="width:100%;">
                </td>
              </tr>
              <tr>
                <td>Password</td>
              </tr>
              <tr>
                <td style="width:100%;">
                  <input type="password" name="password" value="" placeholder="Password" style="width:100%;">
                </td>
              </tr>
              <tr>
                <td>Status</td>
              </tr>
              <tr>
                <td>
                  <select class="" name="status">
                    <option readonly disabled>SELECT STATUS</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                  </select>
                </td>
              </tr>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn_custom" value="Add">
      </div>
    </form>
    </div>

  </div>
</div>
<script type="text/javascript">
  $('#myModal').appendTo("body");
  $(function () {
    $('#datetimepicker4').datetimepicker({
      format: 'YYYY-MM-DD'
    });
  });
</script>
<script type="text/javascript">
  $(".hover").hover(
  function(){
      $('.show-info').html('<div style="position:fixed;width:400px;float:left;">Tes</div>');
  },
  function(){
      $('.show-info').html('');
  }
  );
</script>
