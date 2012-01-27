<?php
	require("inc-dbcon.php");
	
	
	$password = $_POST['userPass'];
	$email = $_POST['userName'];
	
	/*
	function SetEmail($email)
    {
        return mysql_real_escape_string($email);
    }
	
	function SetPassword($password)
    {
        return sha1(mysql_real_escape_string($password));
    }
    */
    
        function CheckLogin()
        {
            
            $stmt = $dbh->prepare("SELECT email, password FROM users
            WHERE email = :email AND password = :password
            ");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            
            //er is een correct login en password combinatie
            if($stmt->rowCount() > 0 )
            {    
                
            
            	$_SESSION['email'] = $email;
                
            }
            else
            {
                return false;
            }
            
        }
    
	function Logout()
	{
		session_start();
		unset($_SESSION['email']);
	}
    

/*
SetEmail($_POST['userName']);
SetPassword($_POST['userPass']);
*/


CheckLogin(); 




session_start();

//als combo goed is ga naar login pagina
if(isset($_SESSION['email']))
{
	echo "user {$_SESSION['email']} loged in  ";
}
else
{
	echo "niet ingelogd LUL";
}
?>
