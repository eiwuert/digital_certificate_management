<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <div class="outer">
      <div class="middle">
        <div class="inner">
            <div id="login_area" class="">
              <form class="" action="<?=base_url('login/cekLogin')?>" method="post">
                <table>
                  <tr>
                    <td>Username</td>
                    <td>
                      <input type="text" name="username" placeholder="Username" value=""><br>
                    </td>
                  </tr>

                  <tr>
                    <td>Password</td>
                    <td>
                      <input type="password" name="password" placeholder="Password" value=""><br>
                    </td>
                  </tr>

                  <tr>
                    <td></td>
                    <td>
                      <input type="submit" name="login" class="btn" value="LOGIN">
                    </td>
                  </tr>

                </table>
              </form>
            </div>
        </div>
      </div>
    </div>

  </body>
</html>
