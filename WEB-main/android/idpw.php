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
$connect = oci_connect($username, $password, $db, 'AL32UTF8');

$userID = $_POST["userID"];
$userPassword = $_POST["userPassword"];


$information= "SELECT * FROM INFO WHERE ID = '$userID' AND PW = '$userPassword'";

$result=oci_parse($connect, $information);
oci_execute($result);

$row=oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS);

$id=$row['ID'];
$pw=$row['PW'];
if(isset($row)){
    echo "$id,$pw";
;
}
else{
        echo "no";
}
oci_free_statement($result);
oci_close($connect);
?>
