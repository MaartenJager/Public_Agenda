<?php
	require("inc-dbcon.php");
	
	
	$Password;
	$Email;
	
	function SetEmail($email)
    {
        return mysql_real_escape_string($email);
    }
	
	function SetPassword($password)
    {
        return sha1(mysql_real_escape_string($password));
    }
    
        function CheckLogin()
        {
            
            $stmt = $this->dbh->prepare("SELECT email, password FROM users
            WHERE email = :email AND password = :password
            ");
            $stmt->bindParam('email', $this->Email);
            $stmt->bindParam(':password', $this->Password);
            $stmt->execute();
            
            if($stmt->rowCount() > 0 )
            {    
                
            
            	$_SESSION['email'] = $this->Email;
                
            }
            else
            {
                return false;
            }
            
        }
    
	function Logout()
	{
		session_start();
		unset($_SESSION['userName']);
	}
    


SetEmail($_POST['userName']);
SetPassword($_POST['userPass']);
CheckLogin(); 

echo $error;


session_start();
if(isset($_SESSION['userName']))
{
	echo "user {$_SESSION['userName']} loged in  ";
}
else
{
	echo "niet ingelogd LUL";
}
?>
