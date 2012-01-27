<?php
	require("inc-dbcon.php");
	
	
	protected $Password;
	protected $Email;
	
	function SetEmail($email)
    {
        return $this->Email = mysql_real_escape_string($email);
    }
	
	function SetPassword($password)
    {
        return $this->Password = sha1(mysql_real_escape_string($password));
    }
    
    function GetEmail()
    {
        return $this->Email;
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
    
$logout = new ChangeSetting;
$logout->Logout();
	function Logout()
	{
		session_start();
		unset($_SESSION['userName']);
	}
    

$login = new login;
$login->SetEmail($_POST['userName']);
$login->SetPassword($_POST['userPass']);
$error = $login->CheckLogin(); 

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
