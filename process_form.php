<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$HOST = "ec2-107-21-255-181.compute-1.amazonaws.com";
$PORT = "5432";
$DBNAME = "d69acd8leq4v0c";
$USER = "gpzpokwwiitgwz";
$PASSWORD = "50c502f726bc61052e7337d64d1fe9b8bac3a783cef2486f07d92642cbc58f18";

$link = pg_connect("dbname=d69acd8leq4v0c host=ec2-107-21-255-181.compute-1.amazonaws.com
port=5432 user=gpzpokwwiitgwz password=50c502f726bc61052e7337d64d1fe9b8bac3a783cef2486f07d92642cbc58f18 sslmode=require");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect.");
}
else {echo "Connected";}

// Escape user inputs for security

$id =  pg_escape_string($link,$_REQUEST['id']);
$name = pg_escape_string($link,$_REQUEST['name']);
$cat = pg_escape_string($link,$_REQUEST['cat']);
$date =  pg_escape_string($link,$_REQUEST['date']);
$price =  pg_escape_string($link,$_REQUEST['price']);
$description = pg_escape_string($link,$_REQUEST['description']);
echo "<br>";
echo "Product ID: " ;
echo $id."<br>";
echo "Product Name: " ;
echo $name."<br>";
echo "Category: " ;
echo $cat."<br>";
echo "Date: " ;
echo $date."<br>";
echo "Price: " ;
echo $price."USD <br>";
echo "Description: " ;
echo $description."<br>";


$sql4 = 'INSERT INTO public."Product" (
"Date", "Id", "Product_Name", "Catergory", "Descriptions", "Price") VALUES ('."
'$date'::date, '$id'::character varying(20), '$name'::character varying(100), '$cat'::character varying(40), '$description'::character varying(200), '$price'::integer)".
 'returning "Id"';
echo $sql4;

$result = pg_query($link, $sql4);
echo $result;

if($result){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . pg_error($link);
}

// Close connection

pg_close($link);
?>