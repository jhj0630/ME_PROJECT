<?php
session_start();
session_destroy();		//모든 세션 변수 지우기
echo "
	<script>
		alert('로그아웃');location.href='manager_main.php';
	</script>
";	//로그아웃 성공 시 로그인 페이지로 이동

?>