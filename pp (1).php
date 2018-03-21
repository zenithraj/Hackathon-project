protected function db_return_query($query_string)
{
$db_object = new mysqli(HOST,USER,PASSWORD,DATABASE);
if($db_object->connect_error)
{
die("Connection error".$db_object->connect_error);
}
$result= $db_object->query($query_string);
if(@$result->num_rows >0)
{
$db_object->close();
return $result->fetch_assoc();
}
else
{
$db_object->close();
return 0;
}

$db_object->close();
}
protected function db_insert_query($query_string)
{
$db_object= new mysqli(HOST, USER, PASSWORD, DATABASE);
if($db_object->connect_error)
{
die("Connection error".$db_object->connect_error);
}
if($db_object->query($query_string)===TRUE)
{
$db_object->close();
return 1;
}
else
{
$db_object->close();
die("Insertion error".$db_object->error);

}
$db_object->close();
}
protected function db_return_query_multi($query_string)
{
$db_object=new mysqli(HOST,USER,PASSWORD,DATABASE);
if($db_object->connect_error)
{
die("connection error".$db_object->connect_error);
}
$result= $db_object->query($query_string);
if(@$result ->num_rows >0)
{
while($return_array[]=$result->fetch_assoc())
{
}
$db_object->close();
array_pop($return_array);
return $return_array;
}
else
{
$db_object->close();
return 0;
}

$db_object->close();
}