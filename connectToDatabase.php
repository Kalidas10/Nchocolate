<?$connection = new mysqli('localhost','root','kali','chocolate');
if($connection->connect_error){
  echo "$connection->connect_error";
  die("connection Failed : ".$connection->connect_error);
}



?>