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
$num = 0;
$num1 = 1;
$num2 = 2;
if($_POST['id'] != NULL){
    $id = $_POST['id'];
}

$id_check="SELECT COUNT(*) AS CNT FROM INFO WHERE ID='$id'";
$result=oci_parse($connect, $id_check);
oci_execute($result);
$row=oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS);
$total=$row['CNT'];

if($total>0){                       //total이 0보다 크면 레코드 안에 id입력값이 존재 하기 때문에 아이디는 중복이 된다
    echo "exist";
}

else{
    echo "ok";
}

oci_free_statement($result);
oci_close($connect);
?>
