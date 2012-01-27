<?php
	
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	require("inc-dbcon.php");
	
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
    /*
	function CheckLogin()
	{
	
	}
	*/	session_start();
		
				
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
if(isset($_SESSION['email']))
{
	echo "user {$_SESSION['email']} loged in  ";
}
else
{
	echo "niet ingelogd LUL";
}
$dbh = null;
?>
