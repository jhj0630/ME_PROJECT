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
        $ENUM = $_GET['ENUM'];  
            $edit_Current1=$_POST['edit_current1'];

            $edit_Current2=$_POST['edit_current2'];
        
            $edit_Current3=$_POST['edit_current3'];
        
            $edit_Current4=$_POST['edit_current4'];

            $edit_Current5=$_POST['edit_current5'];

            $edit_Current6=$_POST['edit_current6'];

            $edit_Current7=$_POST['edit_current7'];
 
            $edit_Current8=$_POST['edit_current8'];

            $edit_Current9=$_POST['edit_current9'];

            $edit_Current10=$_POST['edit_current10'];

            $edit_Current11=$_POST['edit_current11'];

            $edit_Current12=$_POST['edit_current12'];

            $edit_Current13=$_POST['edit_current13'];

            $edit_Current14=$_POST['edit_current14'];

            $edit_Current15=$_POST['edit_current15'];

            $edit_Current16=$_POST['edit_current16'];

            $edit_Current17=$_POST['edit_current17'];

            $edit_Current18=$_POST['edit_current18'];

            $edit_Current19=$_POST['edit_current19'];

            $edit_Current20=$_POST['edit_current20'];

            $edit_Current21=$_POST['edit_current21'];

            $edit_Current22=$_POST['edit_current22'];

            $edit_Current23=$_POST['edit_current23'];

            $edit_Current24=$_POST['edit_current24'];

            $edit_DateTimeLocal=date('Y-m-d H:i:s', strtotime($_POST['edit_dateTimeLocal']));

            $edit_Sleep=$_POST['edit_sleep'];

            $edit_Body=$_POST['edit_body'];

            $edit_Smoke=$_POST['edit_smoke'];

            $edit_Drink=$_POST['edit_drink'];
        
        if(isset($edit_Current1)&&isset($edit_Current2)&&isset($edit_Current3)&&isset($edit_Current4)&&isset($edit_Current5)&&isset($edit_Current6)&&isset($edit_Current7)&&isset($edit_Current8)&&isset($edit_Current9)&&isset($edit_Current10)&&isset($edit_Current11)&&isset($edit_Current12)&&isset($edit_Current13)&&isset($edit_Current14)&&isset($edit_Current15)&&isset($edit_Current16)&&isset($edit_Current17)&&isset($edit_Current18)&&isset($edit_Current19)&&isset($edit_Current20)&&isset($edit_Current21)&&isset($edit_Current22)&&isset($edit_Current23)&&isset($edit_Current23)&&isset($edit_DateTimeLocal)&&isset($edit_Sleep)&&isset($edit_Body)&&isset($edit_Smoke)&&isset($edit_Drink)){
            $sql4="UPDATE CURRENTS 
            SET ID = '$id', CURRENT1 = $edit_Current1, CURRENT2 = $edit_Current2, CURRENT3 = $edit_Current3, CURRENT4 = $edit_Current4, CURRENT5 = $edit_Current5, CURRENT6 = $edit_Current6, CURRENT7 = $edit_Current7, CURRENT8 = $edit_Current8, CURRENT9 = $edit_Current9, CURRENT10 = $edit_Current10, CURRENT11 = $edit_Current11, CURRENT12 = $edit_Current12, CURRENT13 = $edit_Current13, CURRENT14 = $edit_Current14, CURRENT15 = $edit_Current15, CURRENT16 = $edit_Current16, CURRENT17 = $edit_Current17, CURRENT18 = $edit_Current18, CURRENT19 = $edit_Current19, CURRENT20 = $edit_Current20, CURRENT21 = $edit_Current21, CURRENT22 = $edit_Current22, CURRENT23 = $edit_Current23, CURRENT24 = $edit_Current24
            , INPUT_DATE = '$edit_DateTimeLocal'
            WHERE INPUT_DATE =
                (SELECT INPUTDATE
                FROM
                    (SELECT ROWNUM AS RNUM, INPUT_DATE AS INPUTDATE, ID
                    FROM CURRENTS
                    WHERE ID ='$id'
                    ORDER BY INPUTDATE DESC)
                WHERE RNUM = $ENUM)";
            $edit1=oci_parse($connect, $sql4);
            oci_execute($edit1);
            oci_free_statement($edit1);
            $sql5="UPDATE CONDITION 
            SET ID = '$id', SLEEP = $edit_Sleep, BODY = $edit_Body, SMOKE = '$edit_Smoke', DRINK = '$edit_Drink', INPUT_DATE = '$edit_DateTimeLocal'
            WHERE INPUT_DATE =
                (SELECT INPUTDATE
                FROM
                    (SELECT ROWNUM AS RNUM, INPUT_DATE AS INPUTDATE, ID
                    FROM CONDITION
                    WHERE ID ='$id'
                    ORDER BY INPUTDATE DESC)
                WHERE RNUM = $ENUM)";
            $edit2=oci_parse($connect, $sql5);
            oci_execute($edit2);
            oci_free_statement($edit2);
            
            echo "<script>alert('수정되었습니다!'); location.replace('current_input.php');</script>";
            
        }
        
    }
?>