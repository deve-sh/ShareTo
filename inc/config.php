<?

$host = "localhost";
$password = "password";
$user = "userr";
$dbname = "test";
$subscript = "shareto_";
include('inc/connector.php');

$db = new dbdriver();

$db -> connect($host,$user,$password,$dbname);
?>