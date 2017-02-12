<?php
// Sample INSERT of one row
// database username
$users = 'class';
// database password
$pass = 'password';
// data source = mysql driver, localhost, database = class
$dsn = 'mysql:host=localhost;dbname=class';
$name=$_GET['name'];
$email=$_GET['email'];
$pn=$_GET['pn'];
$csn=$_GET['csn'];
$add=$_GET['add'];
$pin=$_GET['pin'];
$bn=$_GET['bw'];
$bw=$_GET['bw'];
$price=$_GET['price'];
$day=$_GET['day'];
$cat=$_GET['cat'];
$dis=$_GET['dis'];
$img=$_GET['img'];



// data to be inserted
$data = array('name' 	=> $name,
			  'email' 	=> $email,
			  'pn' 	=> $pn,
			  'csn'  => $csn,
			  'add' 	=> $add,
			  'pin' 	=> $pin,
			  'bn' 	=> $bn,
			  'bw'  => $bw,
			  'price' 	=> $price,
			  'day' 	=> $day,
			  'cat' 	=> $cat,
			  'dis'  => $dis,
			  'img' => $img);

// use try { // code } catch (PDOException $e) { // code } to trap errors
try {
	// PDO class represents the connection
	$pdo = new PDO($dsn, $users, $pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	// SQL
	$sql = 'INSERT INTO `submit_ads`(`name`, `email`, `pn`, `csn`,`add`, `pin`, `bn`, `bw`,`price`, `day`, `cat`, `dis`,`img`) '
		 . 'VALUES (:name, :email, :pn, :csn ,:add, :pin, :bn, :bw ,:price, :day, :cat, :dis, :img)';
	
	// prepare
	$stmt = $pdo->prepare($sql);
	
	// execute
	$result = $stmt->execute($data);

	if($result){
        echo 'Congrats! Successfully Submit Your Ads ';
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