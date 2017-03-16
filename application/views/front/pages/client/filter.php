<script type="text/javascript" src="<?=base_url('assets/mhover/jquery-ui.js')?>"></script>
<link rel="stylesheet" href="<?=base_url('assets/mhover/jquery-ui.css')?>" media="screen" title="no title" charset="utf-8">
<div id="client">
  <button class="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add Client</button>
  <br>
  <?php if ($this->session->flashdata('sukses')) {
    echo "<br><div class='sukses_i'>".$this->session->flashdata('sukses')."<span><a style='color:#fff;float:right' title='close' href='".base_url('client')."'>x</a></span></div>";
  } else if ($this->session->flashdata('error')) {
    echo "<br><div class='sukses_i'>".$this->session->flashdata('error')."<span><a style='color:#fff;float:right' title='close' href='".base_url('client')."'>x</a></span></div>";
  }
  ?>
  <br>
  <form class="" action="<?=base_url('client/filter')?>" method="post">
    <input type="text" name="client_name" value="" placeholder="Client Name" size="40">
    <input type="submit" name="filter" class="button" value="Filter">
  </form>
  <table border="1" cellspacing="0">
    <tr>
      <th width="10">No.</th>
      <th>Client Name</th>
      <th>Start Date</th>
      <th>Exp Date</th>
      <th>Description</th>
      <th>Act</th>
      <th width="20"></th>
    </tr>

    <?php
    if ($this->uri->segment(3)) {
      $no = $this->uri->segment(3) + 1;
    } else {
      $no = 1;
    }
    foreach ($data_f as $cl) {
    ?>
      <tr>
        <td><?=$no;?></td>
        <td>
          <?php
          $year1 = date('Y', time());
          $year2 = date('Y', strtotime($cl->end_date));

          $month1 = date('m', time());
          $month2 = date('m', strtotime($cl->end_date));

          $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

          if ($diff == "-1") {
          ?>
            <i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Grace Period"></i>&nbsp;
          <?php } ?>
          <?=$cl->client_name;?>
        </td>
        <td><?=date('D, d-m-Y', strtotime($cl->start_date))?></td>
        <td><?=date('D, d-m-Y', strtotime($cl->end_date))?></td>
        <td width="30%"><?=$cl->desc;?></td>
        <td class="t-center">
          <a href="<?=site_url('client/edit/'.encode_url($cl->id_client))?>">
            <i class="fa fa-pencil custom_fa_icon" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
          </a>
           &nbsp;&nbsp;
          <a href="<?=site_url('client/delete/'.encode_url($cl->id_client))?>">
            <i class="fa fa-trash custom_fa_icon" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Delete"></i>
          </a>
        </td>
        <td>
          <a target="_blank" href="<?=base_url('dc/detail/'.(encode_url($cl->id_client)))?>">
            <div class="content">
              <span title="Tunggu" id="<?php echo $cl->id_client?>">
                <!-- <img src="<?=base_url('assets/images/dc_icon.jpg')?>" alt="" width="40" class="hover"/> -->
                <img src="<?=base_url('assets/images/dc_icon.jpg')?>" alt="" width="40"/>
              </span>
            </div>
          </a>
          <!-- <div class='show-info'></div> -->
        </td>
      </tr>
    <?php $no++; } ?>
  </table>
  <div class="">
    <?php echo $paging; ?>
  </div>
  <br><br>
  <div class="">
    <a href="<?=site_url('client')?>" class="button">Back</a>
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
          <form class="" action="<?=site_url('client/procAdd')?>" method="post">
            <table>
              <tr>
                <td>Client Name</td>
              </tr>
              <tr>
                <td style="width:100%;">
                  <input type="text" name="client_name" value="" placeholder="Client Name" style="width:100%;">
                </td>
              </tr>
              <tr>
                <td>Start Date</td>
              </tr>
              <tr>
                <td style="width:100%;">
                  <input type='text' name="start_date" class="form-control" id='datetimepicker4'/>
                </td>
              </tr>
              <tr>
                <td>Description</td>
              </tr>
              <tr>
                <td><textarea name="desc" rows="8" cols="40" style="width:100%;" placeholder="Description"></textarea></td>
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
$(document).ready(function(){

$( document ).tooltip(); // initialize tooltip

$( ".content span" ).tooltip({
 track:true,
 open: function( event, ui ) {
 var id = this.id;

 $.ajax({
  url:'<?=base_url('')?>client/hoverDet',
  type:'post',
  data:{userid:id},
  success: function(response){
  // Setting content option
  $("#"+id).tooltip('option','content',response);

 }
});
}
});

$(".content span").mouseout(function(){
 // re-initializing tooltip
 $(this).attr('title','Please wait...');
 $(this).tooltip();
 $('.ui-tooltip').hide();
});

});
</script>
