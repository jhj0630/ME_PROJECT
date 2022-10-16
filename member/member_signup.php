<?php
session_start();
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

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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
        }
        header > .link > a{
            text-decoration: none;
            color: #7F7F7F;
            margin-right: 25px;
        }
        header > .link > a:hover{
            color: #7F7F7F;
            font-size: 20px;
        }
        a {
            margin: 0px;
            padding: 0px;
            text-decoration: none;
            font-family:sans-serif;
        }
        main{
            margin-bottom: 700px;
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
        .signup_box{
            position: absolute;
            width: 800px;
            height: 900px;
            top: 150px;
            left: 50%;
            transform: translate(-50%);
            text-align: center;
            font-size: 40;
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 5px 5px 5px #D0CECE;
        }
        .signup_box h1{
            text-align: left;
            margin-left: 50px;
            margin-top: 50px;
            margin-bottom: 25px;
            font-size: 30px;
            color: #404040
        }
        .signupForm {
            display: inline-block;
            width: 1000px;
            height:700px;
            padding: 30px;
            color: #404040;
            font-size: 15px;
        }
        th{
            padding-left: 15px;
            width: 150px;
        }
        td{
            width: 400px;
        }
        tr{
            height: 70px;
        }
        input{
            width: 500px;
            border: none;
            outline:none;
            font-size:16px;
            height:35px;
            background: none;
            background-color: #EAEAEA;
            box-shadow: none; 
            font-size: 15px;
            padding: 5px;
        }
        .IDcheck, .Emailcheck{
            width: 130px;
            background-color: #DBE9F9;
            border-radius: 10px;
        }
        .sex{
            width: 60px;
            height: 20px;
        }
        .signup_btn2 {
            margin-top: 20px;
            margin-right: 250px;
            width: 525px;
            height: 60px;
            color: white;
            background-color: #0062F2;
            background-size: 200%;
            border-radius: 10px;
            font-weight: bold;
            border:none;
            cursor:pointer;
            transition: 0.4s;
            display:inline;
        }
        .signup_btn2:hover {
            background-color: #0062F2;
            color: white;
        }
        .signup_btn2:active{
            background-color: white;
            color: #0062F2;
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
            <a href="mem_login.php" class="login_btn">로그인</a>
            <a href="member_signup.php" class="signup_btn" style="color: #404040; font-weight: bold">회원가입</a>
        <?php
        }
        else{?>
            <a href="current_input.php">전류입력 </a>
            <a href="#">마이페이지</a>
            <a href="member_logout.php" class="logout_btn">로그아웃</a>
        <?php
        }?>
            
    </div>
</header>
<main>
    <div class="main1"></div>
    <div class="signup_box">
        <h1> 회원가입 </h1>
        <form method="post" action="member_signup_check.php" class="signupForm">
            <table class="signupTable">
                <tr align="left">
                    <th><span style="color: red">*  </span>이름</th>
                    <td><input type="text" class="member_name" name="member_name" id="member_name" placeholder="이름"></td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>아이디</th>
                    <td><input type="text" class="id" id="id" name="id" placeholder="아이디" required></td>
                </tr>
                <tr style="height: 10px">
                    <th></th>
                    <td style="text-align: left">
                        <span id="idcheck"></span>
                    </td>
                </tr>
                <script src="http://code.jquery.com/jquery-latest.min.js"></script>
                <tr align="left">
                    <th><span style="color: red">*  </span>비밀번호</th>
                    <td><input type="password" class="pw" id="pw" name="pw" placeholder="비밀번호"></td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>비밀번호 확인</th>
                    <td><input type="password" class="pw" id="pw2" placeholder="비밀번호 확인"></td>
                </tr>
                <tr style="height: 10px">
                    <th></th>
                    <td style="text-align: left"><span id="alert-success" style="display: none; color: #0062F2">비밀번호가 일치합니다.</span>
                    <span id="alert-danger" style="display: none; color: #d92742; font-weight: bold; ">비밀번호가 일치하지 않습니다.</span><td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>생년월일</th>
                    <td><input type="text" class="age" id="age" name="age" placeholder="생년월일"></td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>전화번호</th>
                    <td><input type="text" class="phone" id="phone" name="phone" placeholder="전화번호"></td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>이메일</th>
                    <td><input type="text" class="email" id="email" name="email" placeholder="이메일" required></td>
                </tr>
                <tr style="height: 10px">
                    <th></th>
                    <td style="text-align: left">
                        <span id="emailcheck"></span>
                    </td>
                </tr>
                <tr align="left">
                    <th><span style="color: red">*  </span>성별</th>
                    <td style="margin-top: 20px; display: flex; align-items: center">
                        <input type="radio" class="sex" name="sex" id="sex" value="male">남성
                        <input type="radio" class="sex" name="sex" id="sex" value="female" style="margin-left: 30px;">여성
                    </td>
                </tr>
            </table>
            <div class="button">
                <button type="submit" class="signup_btn2">회원가입</button>
            </div>
        </form>
    </div>
    </div>
</main>
<div style="height: 50px"></div>
<div id="wrap">
</div>
<footer></footer>
<script>
        $(document).ready(function(e){
            $(".id").on("keyup",function(){    //$(".fadeInfirst").on("keyup",function()  form class를 입력하여 이벤트 발생  "keyup"키보드를 누르고 때면 발생하는 이벤트 keydown 키를 누르면 발생
                var self =$(this);                   //this는 일반적으로 메소드를 호출한 객체가 저장되어 있는 속성입니다.
                var id;
                var zero = 0;
                var one = 1;
                var two = 2;

                if(self.attr("id")==="id"){   //self.attr("id") id에 있는 속성값 가져오기
                    id=self.val();            //id 변수에 값 저장
                }
                $.post(                         //ajax를 post방식으로 받은 데이터값 넘김
                    "member_id_check.php",
                    {id : id},              //data 값 아이디
                    function(data){
                        if(data==zero){
                            console.log(data)      //data 값 찍어보면 숫자가 나옵니다
                            $('#idcheck').text('');
                            $('#idcheck').html("<font color='#0821F8'>사용가능한 아이디입니다.</font>");
                        }
                        else if(data==one){
                            $('#idcheck').text('');
                            $('#idcheck').html("<font color='#FF6600'>이미 사용중인 아이디입니다.</font>");
                        }
                        else if(data==two){
                            $('#idcheck').text('');
                            $('#idcheck').html("<font color='#FF6600'>아이디는 영문자or숫자로 6자리 이상 입력</font>");
                        }
                    }
                );//post
            });//on
            $(".email").on("keyup",function(){    //$(".fadeInfirst").on("keyup",function()  form class를 입력하여 이벤트 발생  "keyup"키보드를 누르고 때면 발생하는 이벤트 keydown 키를 누르면 발생
                var self =$(this);                   //this는 일반적으로 메소드를 호출한 객체가 저장되어 있는 속성입니다.
                var email;
                var zero = 0;
                var one = 1;
                var two = 2;

                if(self.attr("email")==="email"){   //self.attr("id") id에 있는 속성값 가져오기
                    email=self.val();            //id 변수에 값 저장
                }
                $.post(                         //ajax를 post방식으로 받은 데이터값 넘김
                    "member_email_check.php",
                    {email : email},              //data 값 아이디
                    function(data){
                        if(data==zero){
                            console.log(data)      //data 값 찍어보면 숫자가 나옵니다
                            $('#emailcheck').text('');
                            $('#emailcheck').html("<font color='#0821F8'>사용가능한 아이디입니다.</font>");
                        }
                        else if(data==one){
                            $('#emailcheck').text('');
                            $('#emailcheck').html("<font color='#FF6600'>이미 사용중인 아이디입니다.</font>");
                        }
                        else if(data==two){
                            $('#emailcheck').text('');
                            $('#emailcheck').html("<font color='#FF6600'>아이디는 영문자or숫자로 6자리 이상 입력</font>");
                        }
                    }
                );//post
            });//on
        }); //document
        $('.pw').focusout(function(){
            var pwd1 = $('#pw').val();
            var pwd2 = $('#pw2').val();

            if(pwd1 != '' && pwd2 == ''){
                null;
            } 
            else if(pwd1 != "" || pwd2 != "") {
                if(pwd1 == pwd2){
                    $("#alert-success").css('display', 'inline-block');
                    $("#alert-danger").css('display', 'none');
                } 
                else{
                    $("#alert-success").css('display', 'none');
                    $("#alert-danger").css('display', 'inline-block');
                }
            }
        });
    </script>
</body>
</html>
