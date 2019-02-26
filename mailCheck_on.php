<!DOCTYPE html>
<?php
session_start();

// 必須項目のチェック
// 送られてくるのはname, email, maintext
if(
	$_SESSION['name']=='' ||
	$_SESSION['email']=='' ||
	$_SESSION['maintext']==''
){
	header('Location: index.php');
	exit();
}

// メール用変数格納
$name=htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
$maintext=nl2br(htmlspecialchars($_SESSION['maintext'], ENT_QUOTES, 'UTF-8'));
$to='bunbunbunko893@gmail.com';
$num=date('ymdHis')."-".rand();

// メール送信
mb_language("Japanese");
mb_internal_encoding("UTF-8");
if(mb_send_mail($to, $name."_".$num, $maintext)){
  $send_messa="メールを送信しました";
} else {
  $send_messa="メールの送信に失敗しました";
};
?>

<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>文文文庫：mailCheck-on</title>
	<link href="style.css" rel="stylesheet" media="all">
</head>
<body>
	<div id="wrap">
		<section class="sec" id="send_box">
			<div class="container">
				<h3><?php echo $send_messa; ?></h3>
				<p><a href="index.php">トップページに戻る</a></p>
				<p><?php echo "問い合わせNo.".$num ?></p>
			</div>
		</section>
		<p id="copyright">Copyright &copy; bunbunbunko All Right Reserved.</p>
	</div>
</body>
</html>
