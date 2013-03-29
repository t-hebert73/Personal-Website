<?php
/*
 * File Name: business_contacts-mobile.php
 * Author: Trevor Hebert
 * Last Edited: March 29, 2013
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

 <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0 " />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <title>
        	Business Contacts Page
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
        






<!-- Business contacts page
        	//////////////////////////////////////////////////
        	//////////////////////////////////////////////////
        	//////////////////////////////////////////////////
        	//////////////////////////////////////////////////-->
        <div data-role="page" id="businesscontactspage" data-theme="a">
            
            <!-- show contact information -->
            <div data-role="content">
            	<div>
            		
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
                    <a href='loginPage-mobile.php' onclick="logout()"><button onclick="logout()">Logout</button></a>  
                    
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