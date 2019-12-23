<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$HOST = "ec2-107-21-255-181.compute-1.amazonaws.com";
$PORT = "5432";
$DBNAME = "d69acd8leq4v0c";
$USER = "gpzpokwwiitgwz";
$PASSWORD = "50c502f726bc61052e7337d64d1fe9b8bac3a783cef2486f07d92642cbc58f18"

$link = pg_connect("dbname=d69acd8leq4v0c host=ec2-107-21-255-181.compute-1.amazonaws.com
port=5432 user=gpzpokwwiitgwz password=50c502f726bc61052e7337d64d1fe9b8bac3a783cef2486f07d92642cbc58f18 sslmode=require");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect.");
}
 
// Escape user inputs for security
$id = pg_escape_string ($link, $_REQUEST['id']);
$name = pg_escape_string ($link, $_REQUEST['name']);
$cat = pg_escape_string ($link, $_REQUEST['cat']);
$date = pg_escape_string ($link, $_REQUEST['date']);
$price = pg_escape_string ($link, $_REQUEST['price']);
$desc = pg_escape_string ($link, $_REQUEST['desc']);

echo $id;
echo "";
echo $name;
echo "";
echo $cat;
echo "";
echo $date;
echo "";
echo $price;
echo "";
echo $desc;
echo "";

// Attempt insert query execution
$sql = "INSERT INTO Product (Id, Product_Name, Category, Date, Price, Descriptions) 
VALUES ('$id', '$name', '$cat','$date','$price','$desc')";
echo $sql;

$sql2 = "INSERT INTO Product (Id, Product_Name, Category, Date, Price, Descriptions) 
VALUES ('02', 'Me', 'CatX','2019-12-20','11','abc')";

$sql3 = 'INSERT INTO public."Product" (
"Id", "Product_Name", "Category", "Date", "Price", "Descriptions") VALUES ('."

'121210'::character varying(20),
'my product XYZ'::character varying(100),
'kit'::character varying(40),
'2019-12-20'::date, 
'12'::character varying(10) 
'my product xyz'::character varying(200) ".'
returning "Id"';
echo $sql3;

$result = pg_query($link, $sql3);
echo $result;

if($result){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . pg_error($link);
}
 
// Close connection
pg_close($link);
?>