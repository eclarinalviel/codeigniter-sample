<html>
<head>
	<title> Let's try CodeIgniter </title>
</head>
<body>
	<div class="container">
		
		<!-- ADD VALUES -->
		<h4> Contact us using the form below! </h4>
		<div class="input-fields">
                    <form action="contact/new_message" method="POST">
                        <label for="subject"> Subject </label>
                        <input type="text" class="input" name="subject" id="subject">

                        <label for="message"> Message </label>
                        <input type="text" class="input" name="message" id="message">	
                        
                        <button type="submit">Submit</button>
                    </form>

		</div>

		<!-- DISPLAY VALUES -->
                <?php if( isset($data) ) {  ?>
		<div class="display">
                        
                    <?php foreach ( $data as $the_data ) { ?>
                        <hr>
			<?php echo "<label class='output'> Subject: " .$the_data->subject ; ?>
			<?php echo "<label class='output'> Message: " .$the_data->message; ?>	
                    <?php } ?>
                </div>
                <?php } ?>
	</div>

</body>
</html>