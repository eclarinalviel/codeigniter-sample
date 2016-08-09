<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">MSG</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li> 
      <li><a href="#">Page 3</a></li> 
    </ul>
      
    <?php if ( $this->session->has_userdata('logged_in') ) {
        $user = $_SESSION['logged_in']; ?>
         
        
        <?php echo form_open('auth/logout');?>
            <label>Welcome, <?php echo $user['username']; ?>!</label>
            <button type="submit" class="btn btn-danger no-radius"><span class="glyphicon glyphicon-user"> Logout</span></button>
        <?php echo form_close(); ?>

    <?php } else { ?>
        <button type="submit" class="btn btn-primary no-radius" data-toggle="modal" data-target="#modal-login"><span class="glyphicon glyphicon-user"> Login</span></button>
        <button type="submit" class="btn btn-primary no-radius" data-toggle="modal" data-target="#modal-signup"><span class="glyphicon glyphicon-user"> Signup</span></button>
    
      <?php } ?>
  </div>
    
    <?php echo form_open('contact/search');?>
    <div class="col-lg-2">
        <div class="input-group">
            <input type="text" class="form-control" name="keyword" placeholder="Search for...">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default">Go!</button>
            </span>
        </div>
    </div>
    <?php echo form_close(); ?>
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