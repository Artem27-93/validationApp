<?php
$input = $_REQUEST;

 $id = $input['id'];
 $res =$input['res'];
  
$dbconn = pg_connect("host=ec2-54-76-215-139.eu-west-1.compute.amazonaws.com dbname=dcbpsp0k5sldbg user=rnqvwmovcyqzod password=46cef4c9e7ac99a7752b9dfad18047e3c49cc77e4edaf279748d5456ca09b4a7")
or die('Не удалось соединиться: ' . pg_last_error());
$query = "update \"Queue\" set  \"isValid?\" = '$res' where id = '$id'";

$result = pg_query($dbconn,$query);
$data = array();
while($row = pg_fetch_assoc($result)) {
    $data[] = $row;
}
die(json_encode($data));
pg_close($dbconn);

?>
