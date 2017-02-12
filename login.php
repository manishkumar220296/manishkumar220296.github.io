<?php
// Sample SELECT using PDO query()
$email=$_GET['email'];
$password=$_GET['password'];
// database username
$user = 'class';
// database password
$pass = 'password';
// data source = mysql driver, localhost, database = class
$dsn = 'mysql:host=localhost;dbname=class';
$usrath=0;

// PDO class represents the connection
$dbh = new PDO($dsn, $user, $pass);

// SQL statement
$sql = 'SELECT * FROM `user_deatils` ;';

// Use query() for "one-time" SQL requests
// PDO::FETCH_ASSOC = return results in the form of an associative array

foreach ($dbh->query($sql, PDO::FETCH_ASSOC) as $row) {
	// each $row = an associative array representing one row in the database
	// the key = the column name
    if(($row['email']==$email)&&($row['password']==$password))
    {
		$usrath=1;
        break;
    }
}
if ($usrath!=1)
{
    echo 'You are not signed up';
    echo '</br>';
    echo 'Sign up plaeae';
    echo '<a href="index.php">Sign up</a>';
    
}
else if($usrath==1)
{
    echo 
	
}
// closes the database connection
$dbh = NULL;