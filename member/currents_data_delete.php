<?php
    putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
    session_start();
    //oracle data base address
    //enter HOST & PORT
    $db='
    (DESCRIPTION=
        (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)(HOST=203.249.87.57)(PORT=1521))
        )
        (CONNECT_DATA=
        (SID=orcl)
        )
    )';

    //enter user name & password
    $username = 'db501group5';
    $password = 'test1234';

    //connect with orable_db
    $connect = oci_connect($username, $password, $db);

    if(!isset($_SESSION['ID'])){
        echo "<script>alert('로그인 후 이용하세요.');location.replace('mem_login.php');</script>";
    }
    else
    {
        $id = $_SESSION['ID'];
        $pw = $_SESSION['PW'];
    }
?>
<?php
        $num = $_GET['num'];  
        $sql1="DELETE 
        FROM CURRENTS
        WHERE INPUT_DATE =
            (SELECT INPUTDATE
            FROM
                (SELECT ROWNUM AS RNUM, INPUT_DATE AS INPUTDATE, ID
                FROM CURRENTS
                WHERE ID ='$id'
                ORDER BY CURRENTS.INPUT_DATE DESC)
            WHERE RNUM = $num)
        ";
        $result1 = oci_parse($connect, $sql1);

        $sql2="DELETE 
        FROM CONDITION
        WHERE INPUT_DATE =
            (SELECT INPUTDATE
            FROM
                (SELECT ROWNUM AS RNUM, INPUT_DATE AS INPUTDATE, ID
                FROM CONDITION
                WHERE ID ='$id'
                ORDER BY CONDITION.INPUT_DATE DESC)
            WHERE RNUM = $num)
        ";
        $result1 = oci_parse($connect, $sql1);
        $result2 = oci_parse($connect, $sql2);

        if(!$result1 || !$result2){
            echo "
            <script>
                alert('삭제되지 않았습니다.');location.replace('current_input.php');
            </script>
        ";  
        }
        else{
            oci_execute($result1);
            oci_execute($result2);
            oci_free_statement($result1);
            oci_free_statement($result2);
            oci_close($connect);
            echo "
                <script>
                    alert('삭제되었습니다.');location.replace('current_input.php');
                </script>
            ";              
        }

?>
