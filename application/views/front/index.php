<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?=$title?> - Digital Certificate</title>
    <meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
  	<link rel="stylesheet" href="<?=base_url()?>assets/sidebar/css/reset.css"> <!-- CSS reset -->
  	<link rel="stylesheet" href="<?=base_url()?>assets/sidebar/css/style.css"> <!-- Resource style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/font-awesome/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>
    <header class="cd-main-header">

		<a href="#0" class="cd-nav-trigger"><span></span></a>

		<nav class="cd-nav">
			<ul class="cd-top-nav">
				<li class="has-children account">
					<a href="#0">
						<?=$this->session->userdata('username')?>
					</a>
					<ul>
						<!-- <li><a href="<?=site_url('user/setting/'.encode_url($this->session->userdata('id_user')))?>">Edit Account</a></li> -->
						<li><a href="<?=site_url('login/dest')?>">Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header> <!-- .cd-main-header -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
			<ul>
				<li class="cd-label">Main</li>
				<li class="overview">
					<a href="<?=site_url('')?>">HomePage</a>
				</li>
        <li class="overview">
					<a href="<?=site_url('client')?>">Client</a>
				</li>
        <li class="overview">
					<a href="<?=site_url('user')?>">User Management</a>
				</li>
			</ul>
		</nav>

		<div class="content-wrapper">
      <br>
      <?php $this->load->view('front/getPage', FALSE) ?>
		</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
  <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?=base_url()?>assets/sidebar/js/jquery.menu-aim.js"></script>
  <script src="<?=base_url()?>assets/sidebar/js/main.js"></script> <!-- Resource jQuery -->
  <script src="<?=base_url()?>assets/sidebar/js/modernizr.js"></script> <!-- Modernizr -->
  </body>
</html>
