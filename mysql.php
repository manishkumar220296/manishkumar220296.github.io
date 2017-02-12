<?php
// Sample INSERT of one row
// database username
$users = 'class';
// database password
$pass = 'password';
// data source = mysql driver, localhost, database = class
$dsn = 'mysql:host=localhost;dbname=class';
$f_name=$_GET['f_name'];
$l_name=$_GET['l_name'];
$email=$_GET['email'];
$password=$_GET['password'];



// data to be inserted
$data = array('f_name' 	=> $f_name,
			  'l_name' 	=> $l_name,
			  'email' 	=> $email,
			  'password'  => $password);

// use try { // code } catch (PDOException $e) { // code } to trap errors
try {
	// PDO class represents the connection
	$pdo = new PDO($dsn, $users, $pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	// SQL
	$sql = 'INSERT INTO `user_deatils`(`f_name`, `l_name`, `email`, `password`) '
		 . 'VALUES (:f_name, :l_name, :email, :password)';
	
	// prepare
	$stmt = $pdo->prepare($sql);
	
	// execute
	$result = $stmt->execute($data);

	if($result){
        echo 'Congrats! Successfully Sign up ';
        echo '<a href="index.html">';
        echo 'Click here to return home';
        echo '</a>';
    }
	
	// closes the database connection
	$pdo = NULL;

// traps any exceptions which might be thrown
} catch (PDOException $e) {
	echo $e->getMessage();
	echo $e->getTraceAsString();
}