<?php
/*
 * File Name: business_contacts.php
 * Author: Trevor Hebert
 * Last Edited: March 28, 2013
 * 
 * This is the business contact page that has the list of business contacts.
 * 
 */
	include "databaseConnect.php"; //this file connects to the database
	
	//start the session
	session_start();
	
	if(!isset($_SESSION['user_name'])){ // if user isn't logged in
		//set the error message in the session variable
		$_SESSION['error_message'] = "Please login to view the business contacts page.";	
		header("Location:loginPage.php");	
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
        <title>Trevor's Personal Portfolio - Contact Me</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body id="business-contacts">
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

                <article>
                	
                	<h1> Business Contacts </h1>
                	
                	<?php
                	//gets the first name last name contact number and address from the database
					$contactsQuery = "select firstName, lastName, contactNumber, address From contacts ORDER BY firstName ASC ";
					$queryResult = mysql_query($contactsQuery);
					$numberOfRows = mysql_num_rows($queryResult);
                 
				 	echo "<ul class='business-contact-list'>";	//create a list				
					//echo "<li style='font-size:15px; font-weight:bold;'> Full Name | - | Contact Number | - | Address </li>"; //set up the list header with quick style
					while ($row = mysql_fetch_array($queryResult)) //while there is data in the array create list items
						{
						echo "<li>"; //open list item
						$firstName = $row['firstName'];
						$lastName = $row['lastName'];
						$contactNumber = $row['contactNumber'];
						$address = $row['address'];

						//display the name and assigns an onclick function to them
						?>
						<a onclick="showContactInfo('<?php echo $firstName ?>','<?php echo $lastName ?>','<?php echo $contactNumber ?>','<?php echo $address ?>')"> <?php echo $firstName. " " .$lastName ?></a>
						
						<?php
						
						
						echo "</li>"; //close list item
						}
					echo "</ul>"; // close list
                
                    ?>
                    
                    <!-- logout button, calls the logout function and redirects to the login page. -->
                    <a href='loginPage.php' onclick="logout()"><button>Logout</button></a>  
                    
                   <script type="text/javascript">
                   //this function takes in the first name last name contact information and address and displays it in a alert box.
                   function showContactInfo(firstName, lastName, contactInfo, address)
                   {
                   	alert("Name: " + firstName + " " + lastName + "\n" +
                   		  "Contact Number: " + contactInfo + "\n" +
                   		  "Address: " + address);
                   }
                   
                   //this function unsets the user name session variable effectivly logging out the user.
                   function logout()
                   {
                   	//unset the user name variable
                    <?php unset($_SESSION['user_name']); ?>
                   }
                   </script>
                    
                   
                    
                </article>

                

            </div> <!-- #main -->
        </div> <!-- #main-container -->

		<!-- footer -->
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