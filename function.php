<?php
include "db.php";

?> 

<?php
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];

/*
save all kinds of username and password created by user to save a database file by hacker like $username= edwin's course are great also accepted*/


$username= mysqli_real_escape_string($conn, $username);
$password= mysqli_real_escape_string($conn, $password);


// hasing is used for converting password into somekind of the long code
$hashFormat ="$2y$10$";
$salt= "aashish22";

$hashF_and_salt= $hashFormat . $salt;

$password= crypt($password,$hashF_and_salt);




 $query = "INSERT INTO test(username,password)";

 $query .= "VALUES  ('$username' ,'$password')";

 $result= mysqli_query($conn,$query);


 if(!$result)
 {
 	die("Query failed");
 }
 else{
 	echo"Record Created";
 }


}

else{
	header("location:index.php");
}

 ?>