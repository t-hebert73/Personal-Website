<?php
/*
 * File Name: loginPage.php
 * Author: Trevor Hebert
 * Last Edited: March 29, 2013
 * 
 * This is the login page where you can log in to go to the business contacts list.
 * 
 */
	include "databaseConnect.php"; //this file connects to the database
	//start the session
	session_start();
	
	//grab the username and password that was entered
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
	if(isset($_POST) && isset($_POST["user_login"])){
		//set the current user data row 
		$user_data_row = null;
		//create the query to check if the user exists with the entered username and password
		$user_query = "SELECT * FROM admin WHERE userName='".$username."' AND password='".$password."'";
		//hold the results of the query
		$result = mysql_query($user_query);
		//holds the users data
		$user_data_row = mysql_fetch_assoc($result);
		
		if(is_array($user_data_row)){
			//puts the username in a user_name session variable
			$_SESSION['user_name'] = $user_data_row['userName'];
			//congrats on logging in; redirect to the business contacts page
			header("Location:business_contacts.php");
		
		}else{
			//set the error message in the session variable
			$_SESSION['error_message'] = "You must enter in a valid username and password.";		
		}

	} 

?>

<!DOCTYPE html>


<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Trevor's Personal Portfolio - Login </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body id="login">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Trevor Hebert</h1>
                <nav>
                    <ul>
                        <li id="nav-home"><a href="index.html" >Home</a></li>
                        <li id="nav-about-me"><a href="about_me.html">About Me</a></li>
                        <li id="nav-projects"><a href="projects.html" >Projects</a></li>
                        <li id="nav-services"><a href="services.html">Services</a></li>
                        <li id="nav-github"><a href="https://github.com/t-hebert73/Personal-Website" >GitHub</a></li>
                        <li id="nav-contact-me"><a href="contact_me.html">Contact Me</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">

                <article style="margin-top:30px;">
                    
                    
                    <?php 
                    	//check if there is an error set
                    	if(isset($_SESSION['error_message'])){
                    		//display the error
                    		?> <!--popup an alert dialog--><script>alert("<?php echo $_SESSION['error_message'] ?>");</script><?php
                    		echo "<p class='error-message'>".$_SESSION['error_message']."</p>";
							unset($_SESSION['error_message']); //unset the session variable
                    	}
                    
                    ?>
                    
                    <div>
                    	<!-- shows the login form -->
                    	<form action="" method="post">
							<table>
								<tr><td><label for="username">Username :</label></td><td><input id="username" type="text" name="username"></td></tr>
								<tr><td><label for="password">Password :</label></td><td><input id="password" type="password" name="password"></td></tr>
								<tr><td><input type="submit" value="Login" name="user_login"></td></tr>
							</table>
						</form>
                    	
                    	
                    	</div>
                    
                </article>

                <aside>
                	<img src="img/Logo.jpg" title="Hebert Software" alt="Hebert Software" height="265" width="290">
                </aside>

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
            	<ul class="footer-list">
                <li><p>Copyright &copy; 2013 - All Rights Reserved - Powered by Aliens </p> </li>
                <li>Stay Connected - <a href="https://www.facebook.com/trevor.hebert.35"><img src="img/facebook.jpg" alt="Facebook" title="Facebook"></a></li>
            	</ul>
            </footer>
        </div>

       <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

		<script src="js/slides.min.jquery.js"></script>
        <script src="js/main.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/detectmobilebrowser.js"></script>

       
    </body>
</html>