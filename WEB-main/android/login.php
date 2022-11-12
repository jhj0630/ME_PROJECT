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
$pw = $_POST['pw'];

$sql = "SELECT * FROM INFO WHERE ID='$id'";
$result = oci_parse($connect, $sql);
oci_execute($result);
$row = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS);
$hashpw = $row['PW'];
if($pw == $hashpw)
{
  session_start();
  $_SESSION['ID'] = $row['ID'];
  $_SESSION['PW'] = $row['PW'];
  echo "ok";
  echo "<script>alert('ok');</script>";
}
else
{
  echo "<script>alert('no');</script>";
}
?>
