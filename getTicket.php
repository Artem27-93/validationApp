<?php
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=root")
or die('Не удалось соединиться: ' . pg_last_error());
$query = "select C.\"Category\", t1.\"Path2File\",\"Question\",\"CorrectVariant\"
from (select * from \"public\".\"Queue\" where \"isValid?\" is null
      order by \"CreateDT\" desc limit 1) t1
    left join \"Category\" C on t1.\"Category\" = C.\"Category\";";

$result = pg_query($dbconn,$query);
$data = array();
while($row = pg_fetch_assoc($result)) {
    $data[] = $row;
}
die(json_encode($data));
pg_close($dbconn);

?>