    <?= $this->load->view('layout/header', '', TRUE) ?>
    <?= $this->load->view('layout/top', '', TRUE) ?>

	<div class="col-lg-12 container">
                <?php if (isset($success)) { ?>
                    <div class="alert alert-success margin alert-sm" role="alert">
                        <b> <?php echo $success; ?> </b>
                    </div>
               <?php } elseif (isset($error)) {?>
                    <div class="alert alert-danger margin alert-sm" role="alert">
                        <b> <?php echo $error; ?> </b>
                    </div>
               <?php } ?>
            
		<!-- ADD VALUES -->
		<h4> Contact us using the form below! </h4>
		<div class="col-lg-4 col-md-4">

                    <?php echo form_open('contact/new_message');?>
                        <input type="hidden" class="input" name="message_id" id="message_id" value="<?php if ( isset($msg) ) { echo $msg->ID; } ?>">
                        
                        <label for="subject"> Subject </label>
                        <input type="text" class="form-control" name="subject" value="<?php if ( isset($msg) ) { echo $msg->subject; } ?>" id="subject">

                        <label for="message"> Message </label>
                        <textarea type="text" class="form-control" name="message" id="message" rows="5"><?php if ( isset($msg) ) { echo $msg->message; } ?></textarea>
                        
                        <button type="submit" class="btn btn-primary no-radius"><span class="glyphicon glyphicon-send"></span></button>
                    <?php echo form_close(); ?>
                   
		</div>

		<!-- DISPLAY VALUES -->
                <?php if( isset($messages) ) {  ?>
                <h4> Messages:  </h4>
                    <?php foreach ( $messages as $message ) { ?>
                    <div class="col-lg-2 col-md-4 messages">
                        <div class="panel panel-primary">
                            <label class='output' name='subject'> Subject: <?php echo $message->subject ?> </label>
                            <label class='output' name='message'> Message: <?php echo $message->message; ?> </label>
                            <small><label class='output' name='sender'> By: <?php echo $message->username; ?></label></small>

                            <?php echo form_open('contact/validate');?>
                                <input type="hidden" class="input" name="message_id" id="message_id" value="<?php echo $message->ID ?>">
                                <button type="submit" name="action" value="delete" class="btn btn-danger no-radius"><span class="glyphicon glyphicon-trash"></span></button>
                                <button type="submit" name="action" value="update" class="btn btn-primary no-radius"><span class="glyphicon glyphicon-edit"></span></button>
                            <?php echo form_close(); ?>

                        </div>
                    </div>
                    <?php } ?>
                
                <?php } ?>
                
                
	</div>
    
<?= $this->load->view('layout/footer', '', TRUE) ?>
