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
$ei=$_POST["ei"];
$ns=$_POST["ns"];
$ft=$_POST["ft"];
$jp=$_POST["jp"];

$insert_mbti = "INSERT INTO BODY_TYPE(ID, EI, NS, FT, JP) VALUES ('$id', '$ei', '$ns', '$ft', '$jp')";

$result=oci_parse($connect, $insert_mbti);
oci_execute($result);
oci_free_statement($result);
oci_close($connect);
?>