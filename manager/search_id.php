<html><body>

    <form method="post" class="searchIDForm">
        <h2>ID찾기</h2>
        <div class="nameForm">
            <input type="text" name="name" placeholder="이름 입력" required>
        </div>
        <div class="phoneForm">
            <input type="text" name="phone" placeholder="핸드폰번호 입력" required>
        </div>
        <div class="button">
            <button type="submit">찾기</button>
        </div>
    </form>
</body>
</html>
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

$S_NAME = $_POST['name'];
$S_PHONE = $_POST['phone'];

if($S_NAME=="" ||$S_PHONE==""){
        echo "<script> alert('항목을 입력하세요'); </script>";
}

$sql = "SELECT * FROM TESTING WHERE NAME='$S_NAME' AND PHONE='$S_PHONE'";
$result = oci_parse($connect, $sql);
oci_execute($result);

$row = oci_fetch_array($result, OCI_ASSOC);
$hashphone=$row['PHONE'];
$hashname=$row['NAME'];

if($hashname==$S_NAME && $S_PHONE==$hashphone && $S_PHONE!=NULL)
{
        session_start();
        echo "searched!\n";
        echo $row['ID'],"#";
}
else
{       echo "<script>alert('존재하는 아이디가 없습니다.');</script>";
}
?>
