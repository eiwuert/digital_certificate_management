<div id="client_e">
  <form class="" action="<?=base_url('user/procEdit')?>" method="post">
          <table border="1" cellspacing="1">
            <?php foreach ($user_e as $usr_e) { ?>
              <input type="hidden" name="user_id" value="<?=$this->uri->segment(3);?>">
              <tr>
                <td>Username</th>
                <td>
                  <input type="text" name="username" value="<?=$usr_e->username?>" placeholder="Username">
                </td>
              </tr>
              <tr>
                <td>New Password</th>
                <td>
                  <input type="password" name="password" value="" placeholder="New Password"/>
                </td>
              </tr>
              <tr>
                <td>Email</th>
                <td>
                  <input type="email" name="email" value="<?=$usr_e->email?>" placeholder="Email">
                </td>
              </tr>
              <tr>
                <td>Status</th>
                <td>
                  <select class="" name="status">
                    <option value="<?=$usr_e->status?>" disabled readonly><?=$usr_e->status?></option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <input type="submit" class="btn" name="edit" value="Save">
                </td>
              </tr>
            <?php } ?>
          </table>
  </form>
</div>
