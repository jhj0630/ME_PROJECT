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
session_start();
if(!isset($_SESSION['M_ID'])){
    echo "<script>alert('로그인 후 이용하세요.');location.href='manager_login.php';</script>";
}
else
{
    $m_id = $_SESSION['M_ID'];
    $m_pw = $_SESSION['M_PW'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search page</title>
    <link rel = "stylesheet" href="style.css">
    <style>
        html, body{
            margin: 0;
            padding: 0;
        }
        body{
            position: relative;
            background-color: #fff;
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
        header > .logo > .logo_min > a{
            text-decoration: none;
            color: #0062F2;
            font-size: 15px;
            font-weight: bold;
            margin-left: 7px;
        }
        header > .link{
            margin-left: auto;
            margin-right: 100px;
            height: 75px;
            display: flex;
            align-items: center;
        }
        header > .link > a{
            text-decoration: none;
            color: #7F7F7F;
            margin-right: 25px;
        }
        header > .link > a:hover{
            font-size: 20px;
        }
        main{
            margin-bottom: 200px;
        }
        main > .main1{
            position: relative;
            top: 75px;
            width: 100%;
            height: 500px;
            background-color: #F2F6FC;
            border-bottom-right-radius: 800px 60px;
            border-bottom-left-radius: 800px 60px;
        }
        main > .main1 > .req_text{
            position: absolute;
            display: flex;
            left: 230px;
            font-size: 20px;
            font-weight: bold;
            color: #0062F2;
            top: 30%;
            transform: translatey(-50%);
        }
        main > .main1 > .request{
            position: absolute;
            display: flex;
            right: 80px;
            top: 30%;
            transform: translatey(-50%);
        }
        main > .main1 > .request > .search_req > .search_req_id{
            display: flex;
            position: relative;
            right: 150px;
        }
        main > .main1 > .request > .search_req > .search_req_id input{
            border: none;
            outline: none;
            font-size: 15px;
            padding: 5px;
        }
        main > .main1 > .request > .search_req > .search_req_id > .search_req_btn{
            text-align: center;
            background-color: #0062F2;
            color: #ffffff;
            width: 50px;
            height: 30px;
            font-size: 15px;
            border-radius: 25px;
            border: none;
            margin-left: 10px;
        }
        main > .main1 > .manager_request{
            position: absolute;
            display: flex;
            height: 200px; 
            overflow-y: auto;
            overflow-x: hidden;
            left: 280px;
            top: 120px;
        }
        .manager_request_table{
            width: 600px;
            margin-left: 100px;
            background-color: #ffffff;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            border-radius: 5px;
            border: none;
            color: #404040;
        }
        .y_btn, .n_btn{
            background-color: #ffffff;
            color: #0062F2;
            border: none;
            outline: none;
            border-radius: 5px;
        }
        .manager_request_table tr{
            border-bottom: 1px solid #eee;
        }
        .manager_request_table tr:last-child,
        .manager_request_table th{
            border: none;
        }
        .manager_request_table tbody tr:nth-child(even){
            background-color: #eee;
        }
        .manager_request_table th,
        .manager_request_table td{
            padding: 5px;
        }
        .manager_request_table tr th{
            color: #404040;
            background-color: #DBE9F9;
        }
        .member{
            margin-left: 100px;
            margin-right: 100px;
            position: relative;
            background-color: #ffffff;
            border-radius: 10px;
            height: 700px;
            box-shadow: 5px 5px 5px 5px #D0CECE; 
            display: flex;
            justify-content: center;
        }
        .member > .search > .search_id{
            display: block;
            margin-top: 100px;
            position: absolute;
            right: 150px;
        }
        .member > .search > .search_id > .search_btn{
            text-align: center;
            background-color: #DBE9F9;
            color: #404040;
            width: 45px;
            height: 22px;
            font-size: 15px;
            border-radius: 25px;
            border: none;
        }
        .member_info{
            position: absolute;
            display: inline-block;
            height: 500px; 
            overflow-y: auto;
            overflow-x: hidden;
            top: 650px;
            left: 50%;
            transform: translate(-50%, 0%);
        }
        .member_info > .member_info_table{
            width: 1000px;
            margin-left: 50px;
            margin-right: 50px;
            background-color: #ffffff;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            border-radius: 5px;
            border: none;
        }
        .member_info >  .member_info_table tr{
            border-bottom: 1px solid #eee;
        }
        .member_info >  .member_info_table tr:last-child,
        .member_info >  .member_info_table th{
            border: none;
        }
        .member_info >  .member_info_table tbody tr:nth-child(even){
            background-color: #eee;
        }
        .member_info >  .member_info_table th,
        .member_info >  .member_info_table td{
            padding: 5px;
        }
        .member_info >  .member_info_table tr th{
            background-color: #F2F6FC;
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
    <div class="logo"><a href="member_main.php">생체전류와 MBTI  </a><span class="logo_min"><a href="manager_main.php">관리자 페이지</span></a></div>
        <div class="link">
            <a href="manager_main.php">Home</a>
            <?php
            if(!isset($m_id)){?>
                <a href="manager_login.php" class="login_btn">login</a>
            <?php
            }
            else{?>
                <a href="manager_search.php" style="color: #404040; font-weight: bold">manage</a>
                <a href="manager_logout.php" class="logout_btn">logout</a>
            <?php
            }?>

        </div>
    </header>
    <main>
        <div class="main1">
            <div class="req_text">매니저 요청</div>
            <div class="request">
                <div class="search_req">
                    <form method="POST" class="search_req_id">
                        <input type="text" name="req_search_id" placeholder="검색할 ID">
                        <input type="submit" value="검색" class="search_req_btn">
                    </form>
                </div>
            </div>
            <div class="manager_request">
                <form method = "post" action = "manager_admin.php">
                    <table class="manager_request_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>승인</th>
                                <th>거절</th>
                            </tr>
                        </thead>
                        <?php                    
                        if(isset($_POST['req_search_id'])){
                            $req_search_ID=$_POST['req_search_id'];
                            $req_num=1;
                            $sql = "SELECT * FROM REQUEST WHERE ID='$req_search_ID'";
                            $req = oci_parse($connect, $sql);
                            oci_execute($req);
                            while($result = oci_fetch_array($req,OCI_ASSOC+OCI_RETURN_NULLS)){
                                $req_search_ID = $result['ID']; 
                        ?>
                        <tbody>
                            <tr>
                                <td><?=$req_search_ID?></td>
                                <td style="text-align: center; width: 100px"><input type="submit" name= "y" value = "승인" class="y_btn"></td>
                                <td style="text-align: center; width: 100px"><input type="submit" name= "n" value = "거절" class="n_btn"></td>
                            </tr>
                        <?php
                            $req_num++;
                            }
                            if($req_num==1){
                                echo "<script>alert('권한 요청되지 않은 ID입니다.');location.replace('manager_search.php');</script>";
                            }
                        }
                        else{
                            $req_num = 1;
                            $sql = oci_parse($connect, "SELECT * FROM REQUEST");
                            oci_execute($sql);
                            while($result = oci_fetch_array($sql,OCI_ASSOC+OCI_RETURN_NULLS)){
                                $req_search_ID = $result['ID'];                             
                        
                        ?>
                        <tbody>
                            <tr>
                                <td><?=$req_search_ID?></td>
                                <td style="text-align: center; width: 100px"><input type="submit" name= "y" value = "승인" class="y_btn"></td>
                                <td style="text-align: center; width: 100px"><input type="submit" name= "n" value = "거절" class="n_btn"></td>
                            </tr>
                        <?php
                                $req_num++;
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <div class="member">
            <div class="search">
                <form method="POST" class="search_id">
                    <input type="text" name="id" placeholder="검색할 ID">
                    <input type="submit" value="검색" class="search_btn">
                </form>
            </div>
        </div>
        <div class="member_info">
                <table class="member_info_table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>AGE</th>
                            <th>SEX</th>
                            <th>PHONE</th>     
                            <th>EMAIL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php                    
                        if(isset($_POST['id'])){
                            $ID=$_POST['id'];
                            $num=1;
                            $sql1 = "SELECT * FROM
                            (SELECT ROWNUM AS NUM, ID, AGE, SEX, PHONE, EMAIL 
                            FROM INFO
                            ORDER BY AGE ASC) A WHERE ID='$ID'";
                            $all = oci_parse($connect, $sql1);
                            oci_execute($all);
                            while($result = oci_fetch_array($all,OCI_ASSOC+OCI_RETURN_NULLS)){
                                $NUM=$result['NUM'];
                                $ID=$result['ID'];
                                $AGE=$result['AGE'];
                                $SEX=$result['SEX'];
                                $PHONE=$result['PHONE'];
                                $EMAIL=$result['EMAIL'];
                            
                    ?>
                        <tr>
                            <td style="text-align: center"><?=$NUM?></td>
                            <td><?=$ID?></td>
                            <td style="text-align: center"><?=$AGE?></td>
                            <td><?=$SEX?></td>
                            <td style="text-align: center"><?=$PHONE?></td>
                            <td><?=$EMAIL?></td>
                            <td><a style="text-decoration: none; color: #0062F2" href="delete_Member.php?num=<?=$NUM?>" onclick="return confirm('회원 정보를 삭제하시겠습니까?')">삭제</a></td>
                        </tr>
                    <?php
                                $num++;
                            }
                            if($num==1){
                                echo "<script>alert('존재하지 않는 ID입니다.');location.replace('manager_search.php');</script>";
                            }
                        }
                        else{
                            $num=1;
                            $sql2 = "SELECT * FROM
                            (SELECT ROWNUM AS NUM, ID, AGE, SEX, PHONE, EMAIL 
                            FROM INFO
                            ORDER BY AGE ASC) A";
                            $all = oci_parse($connect, $sql2);
                            oci_execute($all);
                            while($result = oci_fetch_array($all,OCI_ASSOC+OCI_RETURN_NULLS)){
                                $NUM=$result['NUM'];
                                $ID=$result['ID'];
                                $AGE=$result['AGE'];
                                $SEX=$result['SEX'];
                                $PHONE=$result['PHONE'];
                                $EMAIL=$result['EMAIL'];
                            
                    ?>
                        <tr>
                            <td style="text-align: center"><?=$NUM?></td>
                            <td><?=$ID?></td>
                            <td style="text-align: center"><?=$AGE?></td>
                            <td><?=$SEX?></td>
                            <td style="text-align: center"><?=$PHONE?></td>
                            <td><?=$EMAIL?></td>
                            <td><a style="text-decoration: none; color: #0062F2" href="delete_Member.php?num=<?=$NUM?>" onclick="return confirm('회원 정보를 삭제하시겠습니까?')">삭제</a></td>
                        </tr>
                    <?php
                            $num++;
                            }
                        }
                    ?>
                    </tbody>
                </table>
        </div>

    </main>

    <div style="height: 50px"></div>
    <div id="wrap">
    </div>
    <footer></footer>
</body>
</html>

