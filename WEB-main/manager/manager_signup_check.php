<?php
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

$id = $_POST['id'];
$pw= $_POST['pw'];

$sql = "INSERT INTO REQUEST(ID, PW)
VALUES
(
    '$id', '$pw'
)";
$result = oci_parse($connect, $sql);
oci_execute($result);
oci_free_statement($result);

$sql1 = "SELECT COUNT(*) AS CNT FROM REQUEST WHERE ID='$id'";
$result1 = oci_parse($connect, $sql1);
oci_execute($result1);
$row = oci_fetch_array($result1, OCI_ASSOC+OCI_RETURN_NULLS);
$num = $row['CNT'];
oci_free_statement($result1);
if($num == 1){
    echo "<script>alert('회원가입 신청이 되었습니다!'); location.replace('manager_login.php');</script>";
}
?>

