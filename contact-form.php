<?php
    $msg = '';
    $msgClass = '';
    
    if(filter_has_var(INPUT_POST, 'submit')) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
    }

    if(!empty($name) && !empty($email) && !empty($message)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            $toEmail = 'mikhailmcinally12@gmail.com';
            $subject = 'Contact Requestion From'.$name;
            $body = '<h2>Contact Request</h2>
                    <h4>Name</h4><p>'.$name.'</p>
                    <h4>Email</h4><p>'.$email.'</p>
                    <h4>Name</h4><p>'.$message.'</p>';

            $headers = "MIME-Version: 1.0"."\r\n";
            $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";
            $headers .= "From: ".$name.", Subject: ".$subject.", email: ".$email;

            if(mail($toEmail, $subject, $body, $headers)){
                $msg = 'Your message has been sent!';
                $msgClass = 'alert-success';
            } else {
                $msg = 'Something went wrong';
                $msgClass = 'alert-danger';
            }
        } else {
            $msg = 'Please submit a valid email!';
            $msgClass = 'alert-danger';
        }
    } else {
        $msg = 'Please fill in all fields!';
        $msgClass = 'alert-danger';
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">    
          <a class="navbar-brand" href="index.php">My Website</a>
        </div>
      </div>
    </nav>
    <div class="container">	
      <?php if($msg != ''):?>
          <div class="alert <?php echo $msgClass; ?>">
              <?php echo $msg; ?>
          </div>
      <?php endif; ?>

      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	      <div class="form-group">
		      <label>Name</label>
              <!-- echo isset($_POST['name']) ? $name : ''; -->
		      <input type="text" name="name" class="form-control" value="<?php echo isset($name) ? $name : ''; ?>">
	      </div>
	      <div class="form-group">
	      	<label>Email</label>
              <!-- echo isset($_POST['email']) ? $email : ''; -->
	      	<input type="text" name="email" class="form-control" value="<?php echo isset($email) ? $email : ''; ?>">
	      </div>
	      <div class="form-group">
	      	<label>Message</label>
              <!-- echo isset($_POST['message']) ? $message : ''; -->
	      	<textarea name="message" class="form-control"><?php echo isset($message) ? $message : ''; ?></textarea>
	      </div>
	      <br>
	      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</body>
</html>