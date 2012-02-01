<?php

    /* Geleend van http://www.phpro.org/tutorials/Basic-Login-Authentication-with-PHP-and-MySQL.html */
	require("inc-dbcon.php");

	session_start();
	echo "sessie gestart <br><br>";
	
	if(isset( $_SESSION['accessLevel'] ))
    {
        echo 'Users is already logged in';
        echo $_SESSION['accessLevel'];
        
    } 
    
    else{	
    	$email = $_POST['email'];    	
    	$password = sha1($_POST['password']);
    	    	
    	try
        {            
            /*** prepare the select statement ***/
            $sth = $dbh->prepare("SELECT id, accessLevel, email, password FROM users 
                        WHERE email = :email AND password = :password");

            /*** bind the parameters ***/
            $sth->setFetchMode(PDO::FETCH_OBJ);
            
            
            $sth->bindParam(':email', $email, PDO::PARAM_STR);
            $sth->bindParam(':password', $password, PDO::PARAM_STR, 40);

            /*** execute the prepared statement ***/
            $sth->execute();

            /*** check for a result ***/            
            $userRow = $sth->fetch();
            $accessLevel = $userRow->accessLevel;
            echo "accessLevel is:"; 
            echo $userRow->accessLevel;            
            echo "<br><br>";
            
            

            /*** if we have no result then fail boat ***/
            if($accessLevel == false)
            {
                    echo "Login failed<br><br>";
                    $message = 'Login Failed';
            }
            /*** if we do have a result, all is well ***/
            else
            {
                    /*** set the session user_id variable ***/
                    $_SESSION['accessLevel'] = $accessLevel;
                    $_SESSION['userId'] = $userRow->id;
                    $_SESSION['email'] = $email;

                    /*** tell the user we are logged in ***/
                    echo "You are now logged in<br><br>"; 
                    $message = 'You are now logged in';
                    echo '<a href="http://websec.science.uva.nl/webdb1241">Click here to return to the page '
                    . $email . '</a>'; 
            }
        }
        catch(Exception $e)
        {
            /*** if we are here, something has gone wrong with the database ***/
            echo $e;
        }
	}
	
    $dbh = null;
?>
