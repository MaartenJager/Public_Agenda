<?php

    /* Geleend van http://www.phpro.org/tutorials/Basic-Login-Authentication-with-PHP-and-MySQL.html */
	require("inc-dbcon.php");

	session_start();
	echo "sessie gestart <br><br>";
	
	if(isset( $_SESSION['user_id'] ))
    {
        $message = 'Users is already logged in<br><br>';
    }
    
    else{
        echo "user is nog niet ingelogd<br><br>";
	
    	$email = $_POST['email'];
    	$password = $_POST['password'];
    	echo $password;
    	$password = sha1($password);
    	echo $password;
    	    	
    	try
        {
            echo "in try lus<br><br>";
            
            /*** prepare the select statement ***/
            $sth = $dbh->prepare("SELECT email, password, FROM users 
                        WHERE email = :email AND password = :password");
                        
            echo "query voorbereid<br><br>";

            /*** bind the parameters ***/
            $sth->bindParam(':email', $email, PDO::PARAM_STR);
            $sth->bindParam(':password', $password, PDO::PARAM_STR, 40);

            /*** execute the prepared statement ***/
            $sth->execute();
            echo "query uitgevoerd<br><br>";

            /*** check for a result ***/
            $user_id = $sth->fetchColumn();

            /*** if we have no result then fail boat ***/
            if($user_id == false)
            {
                    echo "Login failed<br><br>";
                    $message = 'Login Failed';
            }
            /*** if we do have a result, all is well ***/
            else
            {
                    /*** set the session user_id variable ***/
                    $_SESSION['user_id'] = $user_id;

                    /*** tell the user we are logged in ***/
                    echo "You are now logged in<br><br>"; 
                    $message = 'You are now logged in';
            }


        }
        catch(Exception $e)
        {
            /*** if we are here, something has gone wrong with the database ***/
            $message = 'We are unable to process your request. Please try again later';
            echo $e;
        }
	}
	
	
	
	
	
	/*
			
	$sth = $dbh->prepare("SELECT email, password FROM users
	WHERE email = :email AND password = :password
	");
	$sth->bindParam(':email', $email);
	$sth->bindParam(':password', $password);
	$sth->execute();
	
	//er is een correcte login en password combinatie
	if($sth->rowCount() > 0 )
	{    
		echo "er is een combo?<br />";
		$_SESSION['email'] = $email;
	}
    /*
	    function Logout()
	    {
		    session_start();
		    unset($_SESSION['userName']);
	    }
        */

    /*
    SetEmail($_POST['userName']);
    SetPassword($_POST['userPass']);
    */


    //CheckLogin(); 

    //als combo goed is ga naar login 
    /*
    if(isset($_SESSION['email']))
    {
	    echo "user {$_SESSION['email']} loged in  ";
    }
    
    else
    {
	    echo "niet ingelogd LUL";
    }
    */
    $dbh = null;
?>
