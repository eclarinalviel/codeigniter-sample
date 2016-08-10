    <?= $this->load->view('layout/header', '', TRUE) ?>
    <?= $this->load->view('layout/top', '', TRUE) ?>

<div class="container">

  
   <?php if (isset($error)) {?>
        <div class="alert alert-danger margin alert-sm" role="alert">
            <b> <?php echo $error; ?> </b>
        </div>
   <?php } ?>
            
    
<div class="resume">
    <header class="page-header">
    <?php if ( $this->session->has_userdata('logged_in') ) { $user = $_SESSION['logged_in']; ?>
        <h1 class="page-title">Profile of <?php echo $user['username']; ?></h1>
    <?php } ?>
    <small> <i class="fa fa-clock-o"></i> Last Updated on: <time>Sunday, October 05, 2014</time></small>
  </header>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-xs-12 col-sm-4">
              <figure>
                <?php if ( isset($image->file) && !empty($image->file) ):  ?>
                  <img class="img-circle img-responsive img-lg" alt="" src="<?= base_url('uploads/'. $image->file) ?>">
                  <?php else: ?>
                  <img class="img-circle img-responsive img-lg" alt="" src="http://placehold.it/300x300">
                <?php endif; ?>
              </figure>

            </div>
            <div class="col-xs-12 col-sm-4">
                <?php echo form_open_multipart('account/do_upload');?>
                <input type="file" name="userfile" size="20"/>
                <input type="submit" name="upload" value="UPLOAD" class="btn btn-success btn-block margin" />

                <?php echo form_close(); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
            <?php $user = $_SESSION['logged_in']; 
               if ( isset($user) && !empty($user) ) : ?>
                <ul class="list-group">
                    <li class="list-group-item">User Number: <?php echo $user['ID']; ?></li>
                    <li class="list-group-item">Username: <?php echo $user['username']; ?> </li>
                    <li class="list-group-item">Registration Date: <?php echo $user['registration_date']; ?> </li>
                </ul>
                <?php endif; ?>
                
            </div>
          </div>
        </div>
      </div>
        
    </div>
  </div>
</div>
</div>
</div>