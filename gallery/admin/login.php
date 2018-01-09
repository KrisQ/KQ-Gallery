<?php require_once ("includes/header.php"); ?>

<?php 

if ($session->is_signed_in()) {
	redirect("index.php");
}

if (isset($_POST['login'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

// Method to check the database user

$user_found = User::verify_user($username, $password);

if ($user_found) {
	$session->login($user_found);
	redirect("index.php");
} else {
	$the_message = "Your password or username are incorrect";
}

} else {
	$username = "";
	$password = "";
}


?>

    <div class="col-md-4 col-md-offset-3 margin-top-login">
        <div class="well">
       	<?php if (isset($the_message)) {
        		echo '<div class="alert alert-dismissible alert-danger">
  <strong>Login failed!</strong> Your username or your password is wrong.
</div>';
        		} ?>
            <form action="login.php" method="post">
                <h4>Login</h4>
                    
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Enter Username" value="<?php echo htmlentities($username); ?>">
                </div>
                    
                <div class="input-group">
                  	<input name="password" type="password" class="form-control" placeholder="Enter Password" value="<?php echo htmlentities($password); ?>">
                       	<span class="input-group-btn">
                           <button class="btn btn-primary" name="login" type="submit">Login</button>
                        </span>
                </div>
                    
            </form>
                    <!-- /.input-group -->
        </div>
    </div>
