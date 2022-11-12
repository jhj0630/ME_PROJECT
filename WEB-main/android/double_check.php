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

$id=$_POST["id"];

$sql = "SELECT EMAIL, PHONE FROM INFO WHERE ID!='$id'";
$result = oci_parse($connect, $sql);
oci_execute($result);
while($row = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS)){
        $email=$row['EMAIL'];
        $phone=$row['PHONE'];
        echo "$email,$phone,";

}
?>
