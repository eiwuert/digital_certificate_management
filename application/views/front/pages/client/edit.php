<div id="client_e">
  <form class="" action="<?=base_url('client/procEdit')?>" method="post">
          <table border="1" cellspacing="1">
            <?php foreach ($client_e as $cl_e) { ?>
              <input type="hidden" name="client_id" value="<?=$this->uri->segment(3);?>">
              <tr>
                <td>Client Name</td>
                <td>
                  <input type="text" name="client_name" value="<?=$cl_e->client_name?>" placeholder="Client Name">
                </td>
              </tr>
              <tr>
                <td>Start Date</td>
                <td style="width:100%;position:relative;">
                  <input type='text' name="start_date" value="<?=$cl_e->start_date?>" class="form-control" id='datetimepicker4' />
                </td>
              </tr>
              <tr>
                <td>Description</td>
                <td>
                  <textarea name="desc" rows="8" cols="40"><?=$cl_e->desc?></textarea>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <input type="submit" class="btn" name="edit" value="Save"> <a class="btn" style="padding: 5px;background:#333;border: solid 1px #333;" href="<?=site_url('client')?>">Cancel</a>
                </td>
              </tr>
            <?php } ?>
          </table>
  </form>
</div>
<script type="text/javascript">
  $(function () {
    $('#datetimepicker4').datetimepicker({
      format: 'YYYY-MM-DD'
    });
  });
</script>
