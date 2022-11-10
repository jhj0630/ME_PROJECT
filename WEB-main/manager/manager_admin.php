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

$id = $_POST["name"];
$sql = oci_parse($connect, "SELECT PW FROM REQUEST WHERE ID='$id'");
oci_execute($sql);
$result = oci_fetch_assoc($sql);
$pw = $result["PW"];



if($_POST["y"]){
    $sql1 = oci_parse($connect, "INSERT INTO MANAGER (M_ID, M_PW) VALUES ('$id', '$pw')");
    oci_execute($sql1);
    $sql2 = oci_parse($connect, "DELETE FROM REQUEST WHERE ID='$id'");
    oci_execute($sql2);
}
else if($_POST["n"]){
    $sql3 = oci_parse($connect, "DELETE FROM REQUEST WHERE ID='$id'");
    oci_execute($sql3);
}

//echo "<script>location.href='manager_main.php'</script>";
?>
