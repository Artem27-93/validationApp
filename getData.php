<?php
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=root")
or die('Не удалось соединиться: ' . pg_last_error());
$query = "select count(*),\"Category\"
from \"Queue\"
where \"isValid?\" is null
group by \"Category\";";
$result = pg_query($dbconn,$query);
$res = pg_fetch_assoc($result);

echo json_encode($res);
pg_close($dbconn);
?>