<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= base_url('index.php/contact'); ?>">MSG</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
      </ul>
        
        <?php echo form_open('contact/search');?>
        <div class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" name="keyword" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      <?php echo form_close(); ?>

      
     <?php if ( $this->session->has_userdata('logged_in') ) {
     $user = $_SESSION['logged_in']; ?>
      <ul class="nav navbar-nav navbar-right">
          <li>
            <figure>
            <?php if ( isset($image->file) && !empty($image->file) ): ?>
              <img class="img-circle img-sm" alt="" src="<?= base_url('uploads/'. $image->file) ?>">
              <?php else:?>
              <img class="img-circle img-sm" alt="" src="http://placehold.it/300x300">
            <?php endif; ?>
          </figure>
          </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, <?php echo $user['username']; ?>!<span class="caret"></span></a>
          <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('account/manage') ?>">Manage Account</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo site_url('auth/logout') ?>">Logout</a></li>
          </ul>
        </li>
      </ul>
         
    <?php } else { ?>
        <button type="submit" class="btn btn-primary no-radius" data-toggle="modal" data-target="#modal-login"><span class="glyphicon glyphicon-user"> Login</span></button>
        <button type="submit" class="btn btn-primary no-radius" data-toggle="modal" data-target="#modal-signup"><span class="glyphicon glyphicon-user"> Signup</span></button>
      <?php } ?>
        
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- SIGNUP Modal -->
<div id="modal-signup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Account Registration</h4>
      </div>
       
        <div class="modal-body">
            <?php echo form_open('auth/signup');?>
            <input type="text" class="form-control" name="username">
            <input type="password" class="form-control" name="password">
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php echo form_close(); ?>
        </div>
    </div>

  </div>
</div>

<!-- LOGIN Modal -->
<!-- Modal -->
<div id="modal-login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Account Login</h4>
      </div>
       
        <div class="modal-body">
            <?php echo form_open('auth/login');?>
            <input type="text" class="form-control" name="username">
            <input type="password" class="form-control" name="password">
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php echo form_close(); ?>
        </div>
    </div>

  </div>
</div>