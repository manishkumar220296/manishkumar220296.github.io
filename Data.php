<?php
// Sample INSERT of one row

// database username
$user = 'class';
// database password
$pass = 'password';
// data source = mysql driver, localhost, database = class
$dsn = 'mysql:host=localhost;dbname=class';

$user_name=$_GET['name'];
$password=$_GET['passkey'];
$DOB=$_GET['DOB'];
// data to be inserted
$data = array('user_name'=> $user_name,
              'password'=> $password,
              'DOB'=> $DOB
	      );

// use try { // code } catch (PDOException $e) { // code } to trap errors
try {
	// PDO class represents the connection
	$pdo = new PDO($dsn, $user, $pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	// SQL
	$sql = 'INSERT INTO `user`(`user_name`, `password`, `DOB`) '
		 . 'VALUES (:user_name, :password, :DOB)';
	
	// prepare
	$stmt = $pdo->prepare($sql);
	
	// execute
	$result = $stmt->execute($data);

	if($result){
        echo 'Congrats! Successfully Sign up ';
        echo '<a href="index.php">';
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
