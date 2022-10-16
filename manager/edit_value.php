<?php
$db = '
(DESCRIPTION =
(ADDRESS_LIST =
        (ADDRESS = (PROTOCOL = TCP)(HOST = 203.249.87.57)(PORT = 1521))
)
(CONNECT_DATA =
(SID = orcl
))
)';
//enter user name & password

$username = "db501group5";
$password = "test1234";

//connect with oracle_db
$connect = oci_connect($username, $password, $db);
if(!$connect){
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$c1 = $_POST["CURRENT1"];
$c2 = $_POST["CURRENT2"];
$c3 = $_POST["CURRENT3"];
$c4 = $_POST["CURRENT4"];
$c5 = $_POST["CURRENT5"];
$c6 = $_POST["CURRENT6"];
$c7 = $_POST["CURRENT7"];
$c8 = $_POST["CURRENT8"];
$c9 = $_POST["CURRENT9"];
$c10 = $_POST["CURRENT10"];
$c11 = $_POST["CURRENT11"];
$c12 = $_POST["CURRENT12"];
$c13 = $_POST["CURRENT13"];
$c14 = $_POST["CURRENT14"];
$c15 = $_POST["CURRENT15"];
$c16 = $_POST["CURRENT16"];
$c17 = $_POST["CURRENT17"];
$c18 = $_POST["CURRENT18"];
$c19 = $_POST["CURRENT19"];
$c20 = $_POST["CURRENT20"];
$c21 = $_POST["CURRENT21"];
$c22 = $_POST["CURRENT22"];
$c23 = $_POST["CURRENT23"];
$c24 = $_POST["CURRENT24"];
$no = $_POST["no"];

$sql = oci_parse($connect,"UPDATE CURRENTS SET CURRENT1 = '$c1', CURRENT2 = '$c2', CURRENT3 = '$c3', CURRENT4 = '$c4', CURRENT5 = '$c5', CURRENT6 = '$c6', CURRENT7 = '$c7', CURRENT8 = '$c8', CURRENT9 = '$c9', CURRENT10 = '$c10', CURRENT11 = '$c11', CURRENT12 = '$c12', CURRENT13 = '$c13', CURRENT14 = '$c14', CURRENT15= '$c15', CURRENT16 = '$c16', CURRENT17 = '$c17', CURRENT18 = '$c18', CURRENT19= '$c19', CURRENT20 = '$c20', CURRENT21 = '$c21', CURRENT22 = '$c22', CURRENT23 = '$c23', CURRENT24 = '$c24' WHERE CURRENT_NO = '$no'");
oci_execute($sql);
echo "<script>location.href='edit.html'</script>";
?>
