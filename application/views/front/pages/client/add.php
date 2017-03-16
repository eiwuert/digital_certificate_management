<div class="head">
  <a href="<?=site_url()?>">Home</a>
  &nbsp;<i style="font-size:10px;" class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
  <a href="<?=site_url('client')?>"><?=ucfirst($this->uri->segment(1))?></a>
  &nbsp;<i style="font-size:10px;" class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
  <?=ucfirst($this->uri->segment(2))?> Client
</div>
<br>
<div id="client">
  <form class="" action="index.html" method="post">
    <table>
      <tr>
        <td>Client Name</td>
        <td>
          <input type="text" name="client_name" value="" placeholder="Client Name">
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </table>
  </form>
</div>
