<?php
$db = '';
//enter user name & password

$username = "";
$password = "";

//connect with oracle_db
$connect = oci_connect($username, $password, $db);
if(!$connect){
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
session_start();
if(!isset($_SESSION['ID'])){
    echo "<script>alert('로그인 후 이용하세요.');location.replace('mem_login.php');</script>";
}
else
{
    $id = $_SESSION['ID'];
    $pw = $_SESSION['PW'];
}
$date = date("Y-m-d H:i:s");
$sql1 = oci_parse($connect, "INSERT INTO INFO_BACKUP(ID, PW, AGE, SEX, PHONE, EMAIL, NAME) SELECT ID, PW, AGE, SEX, PHONE, EMAIL, NAME FROM INFO WHERE ID='$id'");
$sql0 = oci_parse($connect, "UPDATE INFO_BACKUP SET DELETE_DATE = '$date' WHERE ID='$id'");
oci_execute($sql1);
oci_execute($sql0);

$sql2 = oci_parse($connect, "INSERT INTO CURRENTS_BACKUP SELECT * FROM CURRENTS WHERE ID='$id'");
oci_execute($sql2);
$sql3 = oci_parse($connect, "INSERT INTO CONDITION_BACKUP SELECT * FROM CONDITION WHERE ID='$id'");
oci_execute($sql3);
$sql4 = oci_parse($connect, "INSERT INTO BODY_TYPE_BACKUP SELECT * FROM BODY_TYPE WHERE ID='$id'");
oci_execute($sql4);
$sql5 = oci_parse($connect,"DELETE FROM CURRENTS WHERE ID='$id'");
oci_execute($sql5);
$sql7 = oci_parse($connect,"DELETE FROM CONDITION WHERE ID='$id'");
oci_execute($sql7);
$sql8 = oci_parse($connect,"DELETE FROM BODY_TYPE WHERE ID='$id'");
oci_execute($sql8);
$sql6 = oci_parse($connect,"DELETE FROM INFO WHERE ID='$id'");
oci_execute($sql6);

oci_free_statement($sql0);
oci_free_statement($sql1);
oci_free_statement($sql2);
oci_free_statement($sql3);
oci_free_statement($sql4);
oci_free_statement($sql5);
oci_free_statement($sql6);
oci_free_statement($sql7);
oci_free_statement($sql8);

session_destroy();
echo "<script>alert('회원 탈퇴되었습니다.');location.href='member_main.php'</script>";
?>
