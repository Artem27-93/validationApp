<?php
$dbconn = pg_connect("host=ec2-54-76-215-139.eu-west-1.compute.amazonaws.com dbname=dcbpsp0k5sldbg user=rnqvwmovcyqzod password=46cef4c9e7ac99a7752b9dfad18047e3c49cc77e4edaf279748d5456ca09b4a7")
or die('Не удалось соединиться: ' . pg_last_error());
$query = "select count ,t1.\"Category\"
from (select distinct \"Category\" from \"Category\") t1 left join (
select count(*),t1.\"Category\"
from \"Queue\" t1
where \"isValid?\" is null
group by t1.\"Category\") t2 on t1.\"Category\"=t2.\"Category\";";
$result = pg_query($dbconn,$query);
$data = array();
while($row = pg_fetch_assoc($result)) {
    $data[] = $row;
}
pg_close($dbconn);

echo json_encode($data);
?>
