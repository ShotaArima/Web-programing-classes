<?php
	$passlist = array( 'hogehoge' => 'hogepass', 'hoge2' => 'hoge2pass');
	if (!array_key_exists('user', $_POST))
	{
		echo_auth_page("ログイン");
		exit;
	}
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	if ( (!array_key_exists($user, $passlist)) || $passlist[$user] != $pass)
	{
		echo_auth_page("パスワードが違います");
		exit;
	}
	echo_hello_page($user);
////////////////////////////////////////////////////////////////////////

	function echo_auth_page($msg)
	{
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>ページタイトル</title>
	</head>
	<body>
		$msg
		<form method="POST" action="test11-2.php">
			username <input type="text" name="user" value=""><br>
			password <input type="password" name="pass" value=""><br>
			<button type="submit" name="login" value="login">Login</button>
		</form>
	</body>
</html>
EOT;
	}
////////////////////////////////////////////////////////////////////////

	function echo_hello_page($who)
	{
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>ページタイトル</title>
	</head>
	<body> こんにちは $who さん
	</body>
</html>
EOT;
}
?>