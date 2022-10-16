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

$id = $_POST["id"];
$o_pwd = $_POST["old_pwd"];
$n_pwd = $_POST["new_pwd"];
$n_pwd_c = $_POST["new_pwd_check"];

$sql1 = oci_parse($connect,"SELECT PW FROM INFO WHERE ID = '$id'");
oci_execute($sql1);
$result = oci_fetch_array($sql1);

if($n_pwd==$n_pwd_c && $result["PW"]==$o_pwd ){
    $sql = oci_parse($connect,"UPDATE INFO SET PW = '$n_pwd' WHERE ID = '$id'");
    oci_execute($sql);
}



?>
