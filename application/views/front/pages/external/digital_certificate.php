<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?=base_url()?>assets/font-awesome/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <style media="screen">
      body {
        color: #fff;
      }
    </style>
  </head>
  <body style="background=#eee;">
    <?php
    $ID_cl = decode_url($this->uri->segment(3));
    ?>

    <div class="outer">
      <div class="middle">
        <div class="inner">
          <?php foreach ($get_detail as $cl_d) { ?>
          <?php

          $year1 = date('Y', time());
          $year2 = date('Y', strtotime($cl_d->end_date));

          $month1 = date('m', time());
          $month2 = date('m', strtotime($cl_d->end_date));

          $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

          if ($diff == "1") {
            echo "<div id='dc_d' style='background: #2bba35'>";
          } else if (date('Y-m-d', time()) > date('Y-m-d', strtotime($cl_d->end_date))) {
            echo "<div id='dc_d' style='background: #d04141'>";
          } else {
            echo "<div id='dc_d' style='background: #2bba35'>";
          }?>
          <!-- <div id="dc_d"> -->
            <table>
                <tr>
                  <th>CLIENT NAME :</th>
                  <td>
                    <?=$cl_d->client_name?>
                  </td>
                </tr>


                <tr>
                  <th>START DATE :</th>
                  <td>
                    <?=date('M-d-Y', strtotime($cl_d->start_date))?>
                  </td>
                </tr>

                <tr>
                  <th>EXP DATE :</th>
                  <td>
                    <?=date('M-d-Y', strtotime($cl_d->end_date));

                    $year1 = date('Y', time());
                    $year2 = date('Y', strtotime($cl_d->end_date));

                    $month1 = date('m', time());
                    $month2 = date('m', strtotime($cl_d->end_date));

                    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

                    if ($diff == "1" ) {
                      echo "<br><span style='font-size:10px;color:#920b0b;font-weight:bold;font-style:italic;'>
                      <i class='fa fa-exclamation-triangle' aria-hidden='true' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='Grace Period' style=''></i>&nbsp;
                      Grace Period</span>";
                    }
                    ?>
                  </td>
                </tr>

                <tr>
                  <th valign="top">DESC :</th>
                  <td><?=$cl_d->desc;?></td>
                </tr>
            </table>
            <br>
            <div class="" style="width:60%;margin:0 auto;font-size: 12px;">
              DISCLAIMER:	ControlCase makes no representation or warranty as to whether <?=$cl_d->client_name?> is secure from either an internal or external attack or whether cardholder data is at risk of being compromised. ControlCase makes no representations or warranties regarding this company's business activities or operations.
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
