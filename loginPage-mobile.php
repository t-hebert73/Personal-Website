<?php
/*
 * File Name: loginPage-mobile.php
 * Author: Trevor Hebert
 * Last Edited: March 29, 2013
 * 
 * This is the login page where you can login to go to the business contacts page.
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
			header("Location:business_contacts-mobile.php");
			
		}else{
			//set the error message in the session variable
			$_SESSION['error_message'] = "You must enter in a valid username and password.";		
		}

	} 

?>

 <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0 " />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <title>
        	Login Page
        </title>
        <!--Jquery Mobile-->
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
        <!-- Themeroller theme-->
        <link rel="stylesheet" href="themes/TrevorsPersonalWebsite.css" />
        <!--Google web font-->
        <link href='http://fonts.googleapis.com/css?family=Enriqueta:400,700' rel='stylesheet' type='text/css'>
        <!--swipe.js style sheet-->
        <link href='css/style.css' rel='stylesheet'/>
        <!-- user generated style sheet -->
        <link href='css/main-mobile.css' rel='stylesheet'/>
        
        <!--more jquery-->
        <script src="http://code.jquery.com/jquery-1.7.2.min.js">
        </script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js">
        </script>


<!-- Login Page
        	//////////////////////////////////////////////////
        	//////////////////////////////////////////////////
        	//////////////////////////////////////////////////
        	//////////////////////////////////////////////////-->
        <div data-role="page" id="loginpage" data-theme="a">
            
            <!-- show contact information -->
            <div data-role="content">
            	<div>
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
            	
            	
            	
            	</div>
            </div>
            <!-- nav bar-->
            <div data-role="navbar" data-iconpos="top">
                    <ul>
                        <li>
                            <a href="#home" data-transition="pop" data-theme="" data-icon="home" >
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#aboutme" data-transition="pop" data-theme="" data-icon="info">
                                About Me
                            </a>
                        </li>
                        <li>
                            <a href="#projects" data-transition="pop" data-theme="" data-icon="star">
                                Projects
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- lower nav bar-->
                <div data-role="navbar" data-iconpos="left">
                    <ul>
                        <li>
                            <a href="#services" data-transition="pop" data-theme="" data-icon="check">
                                Services
                            </a>
                        </li>
                        <li>
                            <a data-rel="back" data-transition="pop" data-theme="" data-icon="gear" class="ui-btn-active ui-state-persist">
                                Back
                            </a>
                        </li>
                    </ul>
                </div>
            <!-- Copyright footer -->
             <div data-role="footer" data-theme="a">
                <h3>Copyright &copy; 2013 - All Rights Reserved</h3>
                
            </div>    
            
            <!-- Logo footer -->
            <div data-role="footer2" data-theme="a">
            	
            	<img src="img/LogoMobile.jpg"  />
            </div>
        </div