<?php
	
	
	$email = $_POST['userName'];
	$password = $_POST['userPass'];
	
	
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
		require("inc-dbcon.php");
		$sth = $dbh->prepare("SELECT email, password FROM users
		WHERE email = :email AND password = :password
		");
		$sth->bindParam(':email', $email);
		$sth->bindParam(':password', $password);
		$sth->execute();
		
		//er is een correcte login en password combinatie
		if($sth->rowCount() > 0 )
		{    
			$_SESSION['username'] = $email;
		}
		else
		{
			return false;
		}
	}
    
	function Logout()
	{
		session_start();
		unset($_SESSION['username']);
	}
    

/*
SetEmail($_POST['userName']);
SetPassword($_POST['userPass']);
*/


CheckLogin(); 
session_start();
require("inc-dbcon.php");
//als combo goed is ga naar login 
if(isset($_SESSION['username']))
{
	
	echo "user {$_SESSION['username']} loged in  ";
}
else
{
	echo "niet ingelogd LUL";
}
$dbh = null;
?>
