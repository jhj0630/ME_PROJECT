<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        html, body{
            margin: 0;
            padding: 0;
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
            margin-left: auto;
            margin-right: 100px;
            height: 75px;
            display: flex;
            align-items: center;   
            justify-content: flex-end;  
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
            margin-bottom: 400px;
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
        main > .main1 > a{
            position: relative;
            top: 300px;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            color: #0062F2;
            background-color: #DBE9F9;
            border-radius: 10px;
        }
        main > .main1 > a.login_btn{
            margin-left: 200px;
        }
        main > .main1 > a.signup_btn{
            margin-left: 5px;
        }
        main > .main1 > a.current_input_btn{
            margin-left: 200px;
        }
        main > .main1 > a:hover{
            background-color: #0062F2;
            color: white;
        }
        main > .main1 > a:active{
            background-color: white;
            color: #0062F2;
        }
        body{
            background-color: #FFFFFF;
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

    }
    else
    {
        $id = $_SESSION['ID'];
        $pw = $_SESSION['PW'];
    }
    ?>
    <header>
        <div class="logo"><a href="member_main.php">생체전류와 MBTI</a></div>
        <div class="link">
            <a href="member_main.php" style="color: #404040; font-weight: bold">Home</a>
            <?php
            if(!isset($id)){?>
                <a href="mem_login.php" class="login_btn">로그인</a>
                <a href="member_signup.php" class="signup_btn">회원가입</a>
            <?php
            }
            else{?>
                <a href="current_input.php">전류입력 </a>
                <a href="mypage.php">마이페이지</a>
                <a href="member_logout.php" class="logout_btn">로그아웃</a>
            <?php
            }?>

        </div>
    </header>
    <main>
        <div class="main1">
        <?php
            if(!isset($id)){
        ?>
                <a href="mem_login.php" class="login_btn">로그인 ➜</a>
                <a href="member_signup.php" class="signup_btn">회원가입 ➜</a>
        <?php
            }
            else{
        ?>
                <a href="current_input.php" class="current_input_btn">전류입력 ➜</a>
            <?php
            }?>
        </div>
    </main>
    <div style="height: 50px"></div>
    <div id="wrap">
    </div>
    <footer></footer>
</body>
</html>
