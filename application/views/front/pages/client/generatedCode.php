<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
    * {
      margin-top: 10px;
    }
    table {
      border: solid 1px #ccc;
      border-collapse: collapse;
      margin: 0 auto;
      padding: 10px;
    }

    table th {
      width: 10%;
    }
  </style>
  <body>
    <?php foreach ($generated_data as $gen) { ?>
      <table border="1">
        <tr>
          <th>
            CSS
          </th>
          <td>
              <xmp>
                <link rel="stylesheet" href="http://localhost/ci/digital_certificate/assets/mhover/jquery-ui.css" media="screen" title="no title" charset="utf-8">
              </xmp>
          </td>
        </tr>

        <tr>
          <th>
            JS
          </th>
          <td>
              <xmp>
                //Require jquery.js, https://jquery.com/
                <script type="text/javascript" src="http://localhost/ci/digital_certificate/assets/mhover/jquery-ui.js"></script>
              </xmp>
          </td>
        </tr>

        <tr>
          <th>
            HTML
          </th>
          <td>
              <xmp>
              <div id="dc" class="content">
                <span title="Please Wait" id="<?=decode_url($this->uri->segment(3))?>">
                  <a target="_blank" href="http://localhost/ci/digital_certificate/dc/detail/<?=$this->uri->segment(3)?>">
                    <img src="https://www.comodo.com/images/comodo_secure_104x59_transp.png" alt="" />
                  </a>
                </span>
              </div>
            </xmp>
          </td>
        </tr>

        <tr>
          <th>
            JS<br>
            (bottom)
          </th>
          <td>
              <xmp>
                ...
                </body>
                <script type="text/javascript">
                  $(document).ready(function(){
                    $( document ).tooltip();

                    $( ".content span" ).tooltip({
                       track:true,
                       open: function( event, ui ) {
                       var id = this.id;

                       $.ajax({
                          url:'<?=base_url()?>client/hoverDet',
                          type:'post',
                          data:{userid:id},
                          success: function(response){
                          $("#"+id).tooltip('option','content',response);
                       }
                      });
                      }
                    });

                    $(".content span").mouseout(function(){
                       $(this).attr('title','Please wait...');
                       $(this).tooltip();
                       $('.ui-tooltip').hide();
                    });
                  });
                </script>
              </xmp>
          </td>
        </tr>

      </table>
    <?php } ?>
  </body>
</html>
