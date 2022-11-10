<?php
session_start();
$db='
(DESCRIPTION =
        (ADDRESS_LIST=
                (ADDRESS = (PROTOCOL = TCP)(HOST = 203.249.87.57)(PORT = 1521))
        )
        (CONNECT_DATA =
        (SID = orcl)
        )
)';

$username = "db501group5";
$password = "test1234";
$connect = oci_connect($username, $password, $db);

$id = $_POST["id"];
//$id = "htkim";
//$date = "2022-07-13 17:04:00";

$select_info = "SELECT * FROM INFO WHERE ID='$id'";
$result1=oci_parse($connect, $select_info);
oci_execute($result1);

while($row=oci_fetch_array($result1, OCI_ASSOC+OCI_RETURN_NULLS)){
    $name=$row['NAME'];
    $email=$row['EMAIL'];
    $phone=$row['PHONE'];
    $age=$row['AGE'];
}

echo "$name, $email, $phone, $age";
oci_free_statement($result1);
oci_close($connect);
?>