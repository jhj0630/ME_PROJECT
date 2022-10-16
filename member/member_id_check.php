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
    echo "이미 존재하는 아이디입니다.";
}
else if(!preg_match("/^[a-zA-z0-9]{6,12}$/",$id)){    //preg 정규식 체크를 하기 위한 php 함수
    echo "영문자 또는 숫자 3자리 이상 입력해주세요.";
}
else if((preg_match("/^[a-zA-z0-9]{6,12}$/",$id))){
    echo "사용가능한 아이디입니다";
}
oci_free_statement($result);
oci_close($connect);
?>