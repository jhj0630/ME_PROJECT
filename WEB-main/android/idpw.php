<?php
    session_start();
$db='';
$username = "";
$password = "";
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
