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
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
    <style>
        @keyframes flash { 0%, 20%, 40%, to { opacity: 1; } 30%, 30% { opacity: 0; } }
        html, body{
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        body{
            position: relative;
        }
        header{
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 75px;
            width: 100%;
            background-color: white;
            display: flex;
            align-items: center;
            z-index: 1;
        }
        header > .logo{
            margin-left: 100px;
            height: 75px;
            display: flex;
            font-size: 25px;
            align-items: center;
        }
        header > .logo > a{
            text-decoration: none;
            color: #0062F2;
            font-weight: bold;
        }
        header > .link{
            width: 500px;
            margin-left: auto;
            margin-right: 100px;
            height: 75px;
            display: flex;
            align-items: center;   
            justify-content: flex-end;       
        }
        header > .link > a{
            text-align: right;
            text-decoration: none;
            color: #7F7F7F;
            margin-right: 25px;
        }
        header > .link > a:hover{
            font-size: 20px;
        }
        .main_top > .main1{
            position: absolute;
            top: 75px;
            width: 100%;
            height: 500px;
            background-color: #F2F6FC;
            border-bottom-right-radius: 800px 60px;
            border-bottom-left-radius: 800px 60px;
        }
        .main_top > .main1 > a{
            position: relative;
            top: 300px;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            color: #0062F2;
            background-color: #DBE9F9;
            border-radius: 10px;
        }
        .main_top > .main1 > a.login_btn{
            margin-left: 200px;
        }
        .main_top > .main1 > a.signup_btn{
            margin-left: 5px;
        }
        .main_top > .main1 > a:hover{
            background-color: #0062F2;
            color: white;
        }
        .main_top > .main1 > a:active{
            background-color: white;
            color: #0062F2;
        }
        .main_top > .main1 > .contents{
            position: relative;
            top: 100px;
            margin-left: 200px;
            margin-right: 200px;
            height: 300px;
            color: #404040;
        }
        .main_top > .main1 > .contents h1{
            color: #0062F2;
            text-shadow: 2px 2px 4px gray;
        }
        .main_top > .main1 > .contents > .content1{
            margin-left: 10px;
        }
        .current_input{
            top: 500px;
            position: relative;
            height: 1800px;
            width: 100%;
            background-color: #fff;
            margin-right: 100px;
        }
        .imgs{
            height: 500px;
            width: 80%;
        }
        .dot{
            position: relative;
            color: red;
            text-shadow: 0 0.1em, 0 0 .3em;
            animation: flash 2s infinite;
            top: 188px;
            left: 454px;
        }
        .imgs > .hand > .hand_img{
            position: relative;
            margin-bottom: 50px;
            max-width: 500px;
            max-height: 500px;
            float: left;
        }
        .imgs > .body_img{
            position: relative;
            margin-bottom: 50px;
            max-width: 400px;
            max-height: 500px;
            float: right;
        }
        .current_input > .Input{  
            top: 200px;
            position: relative;
            align-items: center;
            clear: right;
            width: 100%;
        }
        .current_input > .Input > .InputData input{
            background-color: #eee;
        }
        .current_input > .Input > .InputData{
            width: 100%;
            font-size: 20px;
            color: #404040;
        }
        .Input > .InputData > .table5{
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
        }
        .Input > .InputData > .table1234{
            display: flex;
            justify-content: center;
        }
        .Input > .InputData > .table1234 > .table12{
            margin-right: 50px;
        }
        .Input > .InputData > .table1234 > .table12,
        .Input > .InputData > .table1234 > .table34{
            display: flex;
            margin-bottom: 10px;
            border-radius: 10px;
            box-shadow: 5px 5px 5px 5px #eee;
            height: 200px;
            padding: 20px;
            align-items: center;
        }
        .Input > .InputData > .table1234 table{
            border-radius: 5px;
            border-collapse: collapse;
            border-spacing: 10px;
            width: 580px;
            border: none;
        }
        .Input > .InputData > .table5 > .InputTable5{
            border-collapse: collapse;
            border-spacing: 10px;
            display: inline-block;
        }
        .Input > .InputData > .table5{
            border-radius: 5px;
            border-collapse: collapse;
            border-spacing: 10px;
            display: flex;
            align-items: center;
            margin-bottom: 50px;
            border-radius: 10px;
            height: 150px;
            width: 100%;
            box-shadow: 5px 5px 5px 5px #eee;
        }
        .Input > .InputData > .InputTable5 th,
        .Input > .InputData > .InputTable5 td{
            text-align: center;
        }
        .Input > .InputData > .InputTable5 > input{
            width: 200px;
        }
        .Input > .InputData > .table1234 > .table12 > .InputTable1 tr th,
        .Input > .InputData > .table1234 > .table34 > .InputTable2 tr th,
        .Input > .InputData > .table5 > .InputTable5 tr th{
            background-color: #fff;
        }
        .Input > .InputData > .table1234 > .table12 > .InputTable1 tr,
        .Input > .InputData > .table1234 > .table34 > .InputTable2 tr,
        .Input > .InputData > .table5 > .InputTable5 tr{
            border-bottom: 1px solid #eee;
        }
        .Input input{
            width: 80px;
            height: 30px;
            border: none;
        }
        .Input select{
            width: 100px;
            height: 30px;
        }
        .Input > .InputData > .inputBtn{
            position: relative;
            display: flex;
            justify-content : center;
        }
        .Input > .InputData > .inputBtn > .inputDataBtn{
            margin-top: 30px;
            text-align: center;
            background-color: #0062F2;
            color: #ffffff;
            width: 100px;
            height: 50px;
            font-size: 20px;
            border-radius: 25px;
            border: none;
        }
        .main2 > .result{
            margin-top: 100px;
            position: relative;
            text-align: center;
            padding: 10px;
        } 
        .main2 > .result > .result_table{
            width: 100%;
            background-color: #ffffff;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            border-radius: 5px;
        }
        .main2 > .result > .result_table tr{
            border-bottom: 1px solid #eee;
        }
        .main2 > .result > .result_table tr:last-child{
            border: none;
        }
        .main2 > .result > .result_table tbody tr:nth-child(even){
            background-color: #eee;
        }
        .main2 > .result > .result_table th,
        .main2 > .result > .result_table td{
            padding: 5px;
            text-align: center;
        }
        .main2 > .result > .result_table tr th{
            background-color: #DBE9F9;
            color: #404040;
        }
        .main2 > .result > .result_table input{
            width: 30px;
        }
        .main2 > .result > .result_table select{
            width: 40px;
        }
        .main2{
            margin-left: 100px;
            margin-right: 100px;
        }
        #wrap{
            height: auto;
            min-height: 100%;
            width: 100%;
            position: relative;
            padding-bottom: 300px;
            background-color: #0062F2;
        }
        footer{
            width: 100%;
            height: 300px;
            bottom: 0px;
            position: absolute;
            background-color: #404040;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo"><a href="member_main.php">생체전류와 MBTI</a></div>
        <div class="link">
            <a href="member_main.php">Home</a>
            <?php
            if(!isset($id)){?>

            <?php
            }
            else{?>
                <a href="current_input.php" style="color: #404040; font-weight: bold">전류입력 </a>
                <a href="mypage.php">마이페이지</a>
                <a href="member_logout.php" class="logout_btn">로그아웃</a>
            <?php
            }?>
            
        </div>
    </header>
    <main>
        <div class="main_top">
            <div class="main1">
            <?php
                if(!isset($id)){
            ?>
                    <a href="mem_login.php" class="login_btn">로그인</a>
                    <a href="member_signup.php" class="signup_btn">회원가입</a>
            <?php
                }
                else{
            ?>
                <div class="contents">
                    <h1>전류 측정 방법</h1>
                    <div class="content1">
                        좌수: 왼손 손바닥<span style="margin-right: 30px"></span>우수: 오른손 손바닥<br>
                        좌측: 왼손 손등<span style="margin-right: 45px"></span>우측: 오른손 손등
                    </div>
                </div>  
                
                <?php
                }?>
            </div>
        </div>
    </main>
    <div class="main2">
        <div style="margin-top: 250px"></div>
        <div class="current_input">
            <div class="imgs">
                <div class="hand">
                    <div class="dot" id="dot">●</div>
                    <img src = "leftpalm0.png" alt="hand img" class="hand_img">
                </div>
                <img src = "body0.png" alt="body img" class="body_img">
            </div>
            <div class="Input">
                <form class="InputData" method="POST">
                    <div class="table5">
                        <table class="InputTable5" style="width: 100%">
                            <tr style="width: 100%">
                                <th rowspan="3" style="width: 500px">🕓 <span id="clock"></th>
                                <th></th>
                                <th style="width: 200px">측정시간</th>            <th>피로도</th>
                                <th>몸상태</th>
                                <th style="width: 90px">흡연여부</th>
                                <th style="width: 90px">음주여부</th>
                            </tr>

                            <tr>
                                <td style="font-size: 18px; text-align: center; width: 100px">컨디션</td>
                                <td><input type="datetime-local" name="dateTimeLocal" step="1" placeholder="측정시간" style="width: 200px"></td>
                                <td><input type="number" name="sleep" min="0" max="10" placeholder="피로도"></td>
                                <td><input type="number" name="body" min="0" max="10" placeholder="몸상태"></td>
                                <td style="text-align: center; width: 100px">
                                    <select name="smoke">
                                        <option value="no">아니오</option>
                                        <option value="yes">예</option>
                                    </select>
                                </td>
                                <td style="text-align: center; width: 100px">
                                    <select name="drink">
                                        <option value="no">아니오</option>
                                        <option value="moderate">적당한 음주</option>
                                        <option value="heavy">과음</option>
                                    </select>
                                </td>                   
                            </tr>
                        </table>
                    </div>
                    <div class="table1234">
                        <div class="table12">
                            <table class="InputTable1">
                                <thead>
                                    <tr>
                                        <th>좌수</th>
                                        <th>폐</th>
                                        <th>심포</th>
                                        <th>심장</th>
                                        <th>간</th>
                                        <th>췌장</th>
                                        <th>위</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size: 18px; text-align: center">전류</td>
                                        <td><input type="number" name="current1" id="current1" min="0" max="99" placeholder="1"></td>
                                        <td><input type="number" name="current2" id="current2" min="0" max="99" placeholder="2"></td>
                                        <td><input type="number" name="current3" id="current3" min="0" max="99" placeholder="3"></td>     
                                        <td><input type="number" name="current4" min="0" max="99" placeholder="4"></td>
                                        <td><input type="number" name="current5" min="0" max="99" placeholder="5"></td>
                                        <td><input type="number" name="current6" min="0" max="99" placeholder="6"></td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>좌측</th>
                                        <th>삼초</th>
                                        <th>소장</th>
                                        <th>대장</th>
                                        <th>쓸개</th>
                                        <th>방광</th>
                                        <th>신장</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size: 18px; text-align: center">전류</td>
                                        <td><input type="number" name="current7" min="0" max="99" placeholder="7"></td>
                                        <td><input type="number" name="current8" min="0" max="99" placeholder="8"></td>
                                        <td><input type="number" name="current9" min="0" max="99" placeholder="9"></td>
                                        <td><input type="number" name="current10" min="0" max="99" placeholder="10"></td>
                                        <td><input type="number" name="current11" min="0" max="99" placeholder="11"></td>
                                        <td><input type="number" name="current12" min="0" max="99" placeholder="12"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table34">
                            <table class="InputTable2">
                                <thead>
                                    <tr>
                                        <th>우수</th>
                                        <th>폐</th>
                                        <th>심포</th>
                                        <th>심장</th>
                                        <th>간</th>
                                        <th>췌장</th>
                                        <th>위</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size: 18px; text-align: center">전류</td>
                                        <td><input type="number" name="current13" min="0" max="99" placeholder="13"></td>
                                        <td><input type="number" name="current14" min="0" max="99" placeholder="14"></td>
                                        <td><input type="number" name="current15" min="0" max="99" placeholder="15"></td>
                                        <td><input type="number" name="current16" min="0" max="99" placeholder="16"></td>
                                        <td><input type="number" name="current17" min="0" max="99" placeholder="17"></td>
                                        <td><input type="number" name="current18" min="0" max="99" placeholder="18"></td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>우측</th>
                                        <th>삼초</th>
                                        <th>소장</th>
                                        <th>대장</th>
                                        <th>쓸개</th>
                                        <th>방광</th>
                                        <th>신장</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size: 18px; text-align: center">전류</td>
                                        <td><input type="number" name="current19" min="0" max="99" placeholder="19"></td>
                                        <td><input type="number" name="current20" min="0" max="99" placeholder="20"></td>
                                        <td><input type="number" name="current21" min="0" max="99" placeholder="21"></td>
                                        <td><input type="number" name="current22" min="0" max="99" placeholder="22"></td>
                                        <td><input type="number" name="current23" min="0" max="99" placeholder="23"></td>
                                        <td><input type="number" name="current24" min="0" max="99" placeholder="24"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="inputBtn"><button type="submit" class="inputDataBtn" id="inputData">입력</button></div>
                </form>
                <?php
                    if(isset($_POST['current1'])){
                        $Current1=$_POST['current1'];
                    }
                    if(isset($_POST['current2'])){
                        $Current2=$_POST['current2'];
                    }
                    if(isset($_POST['current3'])){
                        $Current3=$_POST['current3'];
                    }
                    if(isset($_POST['current4'])){
                        $Current4=$_POST['current4'];
                    }
                    if(isset($_POST['current5'])){
                        $Current5=$_POST['current5'];
                    }
                    if(isset($_POST['current6'])){
                        $Current6=$_POST['current6'];
                    }
                    if(isset($_POST['current7'])){
                        $Current7=$_POST['current7'];
                    }
                    if(isset($_POST['current8'])){
                        $Current8=$_POST['current8'];
                    }
                    if(isset($_POST['current9'])){
                        $Current9=$_POST['current9'];
                    }
                    if(isset($_POST['current10'])){
                        $Current10=$_POST['current10'];
                    }
                    if(isset($_POST['current11'])){
                        $Current11=$_POST['current11'];
                    }
                    if(isset($_POST['current12'])){
                        $Current12=$_POST['current12'];
                    }
                    if(isset($_POST['current13'])){
                        $Current13=$_POST['current13'];
                    }
                    if(isset($_POST['current14'])){
                        $Current14=$_POST['current14'];
                    }
                    if(isset($_POST['current15'])){
                        $Current15=$_POST['current15'];
                    }
                    if(isset($_POST['current16'])){
                        $Current16=$_POST['current16'];
                    }
                    if(isset($_POST['current17'])){
                        $Current17=$_POST['current17'];
                    }
                    if(isset($_POST['current18'])){
                        $Current18=$_POST['current18'];
                    }
                    if(isset($_POST['current19'])){
                        $Current19=$_POST['current19'];
                    }
                    if(isset($_POST['current20'])){
                        $Current20=$_POST['current20'];
                    }
                    if(isset($_POST['current21'])){
                        $Current21=$_POST['current21'];
                    }
                    if(isset($_POST['current22'])){
                        $Current22=$_POST['current22'];
                    }
                    if(isset($_POST['current23'])){
                        $Current23=$_POST['current23'];
                    }
                    if(isset($_POST['current24'])){
                        $Current24=$_POST['current24'];
                    }
                    if(isset($_POST['dateTimeLocal'])){
                        $DateTimeLocal=date('Y-m-d H:i:s', strtotime($_POST['dateTimeLocal']));
                    }
                    if(isset($_POST['sleep'])){
                        $Sleep=$_POST['sleep'];
                    }
                    if(isset($_POST['body'])){
                        $Body=$_POST['body'];
                    }
                    if(isset($_POST['smoke'])){
                        $Smoke=$_POST['smoke'];
                    }
                    if(isset($_POST['drink'])){
                        $Drink=$_POST['drink'];
                    }
                    if(isset($Current1)&&isset($Current2)&&isset($Current3)&&isset($Current4)&&isset($Current5)&&isset($Current6)&&isset($Current7)&&isset($Current8)&&isset($Current9)&&isset($Current10)&&isset($Current11)&&isset($Current12)&&isset($Current13)&&isset($Current14)&&isset($Current15)&&isset($Current16)&&isset($Current17)&&isset($Current18)&&isset($Current19)&&isset($Current20)&&isset($Current21)&&isset($Current22)&&isset($Current23)&&isset($Current23)&&isset($DateTimeLocal)&&isset($Sleep)&&isset($Body)&&isset($Smoke)&&isset($Drink)){
                        $sql1="INSERT INTO CURRENTS(ID, CURRENT1, CURRENT2, CURRENT3, CURRENT4, CURRENT5, CURRENT6, CURRENT7, CURRENT8, CURRENT9, CURRENT10, CURRENT11, CURRENT12, CURRENT13, CURRENT14, CURRENT15, CURRENT16, CURRENT17, CURRENT18, CURRENT19, CURRENT20, CURRENT21, CURRENT22, CURRENT23, CURRENT24, INPUT_DATE)
                        VALUES
                        (
                            '$id'
                            ,  $Current1, $Current2, $Current3, $Current4, $Current5, $Current6, $Current7, $Current8, $Current9, $Current10, $Current11, $Current12, $Current13, $Current14, $Current15, $Current16, $Current17, $Current18, $Current19, $Current20, $Current21, $Current22, $Current23, $Current24
                            , '$DateTimeLocal'
                        )";
                        $input1=oci_parse($connect, $sql1);
                        oci_execute($input1);
                        oci_free_statement($input1);
                        $sql2="INSERT INTO CONDITION(ID, SLEEP, BODY, SMOKE, DRINK, INPUT_DATE)
                        VALUES
                        (
                            '$id'
                            , $Sleep
                            , $Body 
                            , '$Smoke'
                            , '$Drink'
                            , '$DateTimeLocal'
                        )";
                        $input2=oci_parse($connect, $sql2);
                        oci_execute($input2);
                        oci_free_statement($input2);
                    }
                ?>
            </div>
        </div>
        <div class="result" style="height: 500px; overflow-y: auto">
                <table class="result_table">
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>     
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>측정시간</th>
                            <th>피로도</th>
                            <th>몸상태</th>
                            <th>흡연여부</th>
                            <th>음주여부</th>
                            <th>수정</th>
                            <th>삭제</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $ENUM = (isset($_GET["ENUM"]) && $_GET["ENUM"]) ? $_GET["ENUM"] : NULL;
                        $num=1;
                        $sql3="SELECT * FROM
                        (SELECT
                        ROWNUM AS NUM, CURRENTS.ID, CURRENTS.CURRENT1, CURRENTS.CURRENT2, CURRENTS.CURRENT3, CURRENTS.CURRENT4, CURRENTS.CURRENT5, CURRENTS.CURRENT6, CURRENTS.CURRENT7, CURRENTS.CURRENT8, CURRENTS.CURRENT9, CURRENTS.CURRENT10, CURRENTS.CURRENT11, CURRENTS.CURRENT12, CURRENTS.CURRENT13, CURRENTS.CURRENT14, CURRENTS.CURRENT15, CURRENTS.CURRENT16, CURRENTS.CURRENT17, CURRENTS.CURRENT18, CURRENTS.CURRENT19, CURRENTS.CURRENT20, CURRENTS.CURRENT21, CURRENTS.CURRENT22, CURRENTS.CURRENT23, CURRENTS.CURRENT24, CURRENTS.INPUT_DATE
                        , CONDITION.SLEEP, CONDITION.BODY, CONDITION.SMOKE, CONDITION.DRINK
                        FROM CURRENTS, CONDITION
                        WHERE CURRENTS.ID=CONDITION.ID
                        AND CURRENTS.INPUT_DATE=CONDITION.INPUT_DATE
                        AND CURRENTS.ID='$id'
                        ORDER BY INPUT_DATE DESC) A";
                        $all=oci_parse($connect, $sql3);
                        oci_execute($all);

                        $num_rows = oci_num_rows($all);
                        if(!$all)
                            echo "데이터가 없습니다!";
                        else
                        {
                            while($row=oci_fetch_array($all, OCI_ASSOC+OCI_RETURN_NULLS))
                            {
                                $NUM=$row['NUM'];
                                $CURRENT1=$row['CURRENT1'];
                                $CURRENT2=$row['CURRENT2'];
                                $CURRENT3=$row['CURRENT3'];
                                $CURRENT4=$row['CURRENT4'];
                                $CURRENT5=$row['CURRENT5'];
                                $CURRENT6=$row['CURRENT6'];
                                $CURRENT7=$row['CURRENT7'];
                                $CURRENT8=$row['CURRENT8'];
                                $CURRENT9=$row['CURRENT9'];
                                $CURRENT10=$row['CURRENT10'];
                                $CURRENT11=$row['CURRENT11'];                        
                                $CURRENT12=$row['CURRENT12'];
                                $CURRENT13=$row['CURRENT13'];
                                $CURRENT14=$row['CURRENT14'];
                                $CURRENT15=$row['CURRENT15'];
                                $CURRENT16=$row['CURRENT16'];
                                $CURRENT17=$row['CURRENT17'];
                                $CURRENT18=$row['CURRENT18'];
                                $CURRENT19=$row['CURRENT19'];
                                $CURRENT20=$row['CURRENT20'];
                                $CURRENT21=$row['CURRENT21'];
                                $CURRENT22=$row['CURRENT22'];
                                $CURRENT23=$row['CURRENT23'];
                                $CURRENT24=$row['CURRENT24'];
                                $DATETIME=$row['INPUT_DATE'];
                                $SLEEP=$row['SLEEP'];
                                $BODY=$row['BODY'];
                                $SMOKE=$row['SMOKE'];
                                $DRINK=$row['DRINK'];
                                if(isset($ENUM) && $NUM == $ENUM){
                                    if($SMOKE=='yes'){
                                        $smoke_val = '예';
                                    }
                                    else if($SMOKE=='no'){
                                        $smoke_val = '아니오';
                                    }
                            
                                    if($DRINK=='no'){
                                        $drink_val = '아니오';
                                    }
                                    else if($DRINK=='moderate'){
                                        $drink_val = '적당한 음주';
                                    }
                                    else if($DRINK=='heavy'){
                                        $drink_val = '과음';
                                    }
                    ?>
                        <form class="edit_current_form" method="POST" action="currents_data_edit.php?ENUM=<?=$NUM?>">
                            <tr style="width: 100%">         
                                <td><?=$NUM?></td>           
                                <td><input type="number" name="edit_current1" value="<?=$CURRENT1?>" min="0" max="99" placeholder="1" oninput="c1()"></td>
                                <td><input type="number" name="edit_current2" value="<?=$CURRENT2?>" min="0" max="99" placeholder="2"></td>
                                <td><input type="number" name="edit_current3" value="<?=$CURRENT3?>" min="0" max="99" placeholder="3"></td>     
                                <td><input type="number" name="edit_current4" value="<?=$CURRENT4?>" min="0" max="99" placeholder="4"></td>
                                <td><input type="number" name="edit_current5" value="<?=$CURRENT5?>" min="0" max="99" placeholder="5"></td>
                                <td><input type="number" name="edit_current6" value="<?=$CURRENT6?>" min="0" max="99" placeholder="6"></td>
                                <td><input type="number" name="edit_current7" value="<?=$CURRENT7?>" min="0" max="99" placeholder="7"></td>
                                <td><input type="number" name="edit_current8" value="<?=$CURRENT8?>" min="0" max="99" placeholder="8"></td>
                                <td><input type="number" name="edit_current9" value="<?=$CURRENT9?>" min="0" max="99" placeholder="9"></td>
                                <td><input type="number" name="edit_current10" value="<?=$CURRENT10?>" min="0" max="99" placeholder="10"></td>
                                <td><input type="number" name="edit_current11" value="<?=$CURRENT11?>" min="0" max="99" placeholder="11"></td>
                                <td><input type="number" name="edit_current12" value="<?=$CURRENT12?>" min="0" max="99" placeholder="12"></td>
                                <td><input type="number" name="edit_current13" value="<?=$CURRENT13?>" min="0" max="99" placeholder="13"></td>
                                <td><input type="number" name="edit_current14" value="<?=$CURRENT14?>" min="0" max="99" placeholder="14"></td>
                                <td><input type="number" name="edit_current15" value="<?=$CURRENT15?>" min="0" max="99" placeholder="15"></td>
                                <td><input type="number" name="edit_current16" value="<?=$CURRENT16?>" min="0" max="99" placeholder="16"></td>
                                <td><input type="number" name="edit_current17" value="<?=$CURRENT17?>" min="0" max="99" placeholder="17"></td>
                                <td><input type="number" name="edit_current18" value="<?=$CURRENT18?>" min="0" max="99" placeholder="18"></td>
                                <td><input type="number" name="edit_current19" value="<?=$CURRENT19?>" min="0" max="99" placeholder="19"></td>
                                <td><input type="number" name="edit_current20" value="<?=$CURRENT20?>" min="0" max="99" placeholder="20"></td>
                                <td><input type="number" name="edit_current21" value="<?=$CURRENT21?>" min="0" max="99" placeholder="21"></td>
                                <td><input type="number" name="edit_current22" value="<?=$CURRENT22?>" min="0" max="99" placeholder="22"></td>
                                <td><input type="number" name="edit_current23" value="<?=$CURRENT23?>" min="0" max="99" placeholder="23"></td>
                                <td><input type="number" name="edit_current24" value="<?=$CURRENT24?>" min="0" max="99" placeholder="24"></td>
                                <td><input type="datetime-local" name="edit_dateTimeLocal" step="1" value="<?=$DATETIME?>" placeholder="측정시간" style="width: 100px"></td>
                                <td><input type="number" name="edit_sleep" min="0" max="10" value="<?=$SLEEP?>" placeholder="피로도"></td>
                                <td><input type="number" name="edit_body" min="0" max="10" value="<?=$BODY?>" placeholder="몸상태"></td>
                                <td>
                                    <select name="edit_smoke">
                                        <option value="<?=$SMOKE?>" selected><?=$smoke_val?></option>
                                        <option value="yes">예</option>
                                        <option value="no">아니오</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="edit_drink">
                                    <option value="<?=$DRINK?>" selected><?=$drink_val?></option>
                                        <option value="no">아니오</option>
                                        <option value="moderate">적당한 음주</option>
                                        <option value="heavy">과음</option>
                                    </select>
                                </td>
                                <td><button type = "submit" style="border:none; color: #0062F2; font-size: 16px">완료</button></td>
                            </tr>
                        </form>
                        <?php
                                }
                                else{
                        ?>
                        <tr>
                            <td> <?=$NUM?> </td>
                            <td> <?=$CURRENT1?> </td>
                            <td> <?=$CURRENT2?> </td>
                            <td> <?=$CURRENT3?> </td>
                            <td> <?=$CURRENT4?> </td>
                            <td> <?=$CURRENT5?> </td>
                            <td> <?=$CURRENT6?> </td>
                            <td> <?=$CURRENT7?> </td>
                            <td> <?=$CURRENT8?> </td>
                            <td> <?=$CURRENT9?> </td>
                            <td> <?=$CURRENT10?> </td>
                            <td> <?=$CURRENT11?> </td>
                            <td> <?=$CURRENT12?> </td>
                            <td> <?=$CURRENT13?> </td>
                            <td> <?=$CURRENT14?> </td>
                            <td> <?=$CURRENT15?> </td>
                            <td> <?=$CURRENT16?> </td>
                            <td> <?=$CURRENT17?> </td>
                            <td> <?=$CURRENT18?> </td>
                            <td> <?=$CURRENT19?> </td>
                            <td> <?=$CURRENT20?> </td>
                            <td> <?=$CURRENT21?> </td>
                            <td> <?=$CURRENT22?> </td>
                            <td> <?=$CURRENT23?> </td>
                            <td> <?=$CURRENT24?> </td>
                            <td> <?=$DATETIME?> </td>
                            <td> <?=$SLEEP?> </td>
                            <td> <?=$BODY?> </td>
                            <td> <?=$SMOKE?> </td>
                            <td> <?=$DRINK?> </td>
                            <td> <a href="current_input.php?ENUM=<?=$NUM?>" style="text-decoration: none; color: #0062F2">수정</a></td>
                            <td> <a href="currents_data_delete.php?num=<?=$NUM?>" onclick="return confirm('삭제하시겠습니까?')" style="text-decoration: none; color: #0062F2">삭제</a></td>
                        </tr>
                    <?php
                                }
                                $num++;
                            }
                        }
                    ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div style="height: 300px"></div>
    <div id="wrap">
    </div>
    <footer></footer>
<?php
oci_free_statement($all);
oci_close($connect);
?>
    <script type="text/javascript">
        var c1 = $('#current1');
        var c2 = $('#current2');
        var c3 = $('#current3');
        $( document ).ready( function() {
            var Target = document.getElementById("clock");
            function clock() {
                var time = new Date();
                var year = time.getFullYear();
                var month = time.getMonth();
                var date = time.getDate();
                var day = time.getDay();                    
                var week = ['일', '월', '화', '수', '목', '금', '토'];

                var hours = time.getHours();
                var minutes = time.getMinutes();
                var seconds = time.getSeconds();

                Target.innerText = 
                `${year}년`+
                ` ${month + 1}월 ${date}일 ${week[day]}요일 ` +
                `${hours < 10 ? `0${hours}` : hours}:${minutes < 10 ? `0${minutes}` : minutes}:${seconds < 10 ? `0${seconds}` : seconds}`;
                        
            }
            clock();
            setInterval(clock, 1000); // 1초마다 실행
            c1.focus(function(){
                $('#dot').offset({top: 1200, left:343});
            });
            c2.focus(function(){
                $('#dot').offset({top: 1210, left:454});
            }); 
            c3.focus(function(){
                $('#dot').offset({top: 1210, left:754});
            });                
        });

    </script>
</body>
</html>