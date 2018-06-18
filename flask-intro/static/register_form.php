<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost1234", "root", "Shqiperi1!", "user accounts");

//the form has been submitted with post
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
    //two passwords are equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']) 
	{
        //set all the post variables
        $firstname = $mysqli->real_escape_string($_POST['firstname']);
		$lastname = $mysqli->real_escape_string($_POST['lastname']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = md5($_POST['password']); //md5 has password for security
        
                //set session variables
                $_SESSION['firstname'] = $firstname;
				$_SESSION['lastname'] = $lastname;
				
                //insert user data into database
                $sql = "INSERT INTO users (firstname, lastname, email, password) "
                        . "VALUES ('$firstname', '$lastname', '$email', '$password')";
                
                //if the query is successsful, redirect to welcome.php page, done!
                if ($mysqli->query($sql) === true)
				{
                    $_SESSION['message'] = "Registration succesful! Welcome $firstname!";
                    header("location: welcome.php");
                }
                else 
				{
                    $_SESSION['message'] = 'User could not be added to the database!';
                }
                $mysqli->close();          
    }
    else 
	{
        $_SESSION['message'] = 'Two passwords do not match!';
    }
}
?>