<?php
$db='
(DESCRIPTION=
    (ADDRESS_LIST=
        (ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521))
    )
    (CONNECT_DATA=
    (SID=orcl)
    )
)';

$username = 'db501group5';
$password = 'test1234';

//connect with orable_db
$connect = oci_connect($username, $password, $db);
$DateTime=$_GET['dateTime'];

$sql1="SELECT * FROM CURRENTS WHERE TO_DATE(INPUT_DATE, 'YYYY-MM-DD HH24:MI:SS')=TO_DATE('$DateTime', 'YYYY-MM-DD HH24:MI:SS')";
$input1=oci_parse($connect, $sql1);

$sql2="SELECT * FROM CONDITION WHERE TO_DATE(INPUT_DATE, 'YYYY-MM-DD HH24:MI:SS')=TO_DATE('$DateTime', 'YYYY-MM-DD HH24:MI:SS')";
$input2=oci_parse($connect, $sql2);

oci_execute($input1);
oci_execute($input2);

while($row=oci_fetch_array($input1, OCI_ASSOC+OCI_RETURN_NULLS)){
    $date=$row['INPUT_DATE'];
    echo "$date";
}

oci_free_statement($input1);
oci_free_statement($input2);
?>
