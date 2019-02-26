<!DOCTYPE html>
<?php
session_start();

// 必須項目のチェック
// 送られてくるのはname, email, maintext, num
if(
	$_POST['name']=='' ||
	$_POST['email']=='' ||
	$_POST['maintext']==''
){
	header('Location: index.php');
	exit();
}

// 変数をセッションに保存
$_SESSION['name']=$_POST['name'];
$_SESSION['email']=$_POST['email'];
$_SESSION['maintext']=$_POST['maintext'];

?>

<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>文文文庫：mailCheck</title>
<link href="style.css" rel="stylesheet" media="all">
</head>
<body>
	<div id="wrap">
		<section class="sec" id="mailcheck">
			<h2>内容をご確認ください</h2>
			<div class="container">
				<div id="check_lead">
					<p>下記の内容で送信します。よろしいですか？</p>
					<p><a href="index.php">>>前のページに戻る</a></p>
				</div>
				<hr>
			 	<div id="check_box">
					<p>お名前：</p>
					<p><?php echo htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8'); ?></p>
					<p>返信用アドレス：</p>
					<p><?php echo htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8'); ?></p>
					<p>本文：</p>
					<p><?php echo nl2br(htmlspecialchars($_SESSION['maintext'], ENT_QUOTES, 'UTF-8'), false);?></p>
					<p>
						<a href="index.php" class="btns btn_clear">前のページに戻る</a>
						<a href="mailCheck_on.php" class="btns btn_send">この内容で送信する</a><br>
						<small>※前のページに戻ると書いた内容が消去されるので事前にコピーしてください。</small>
					</p>
				</div>
			</div>
		</section>
		<p id="copyright">Copyright &copy; bunbunbunko All Right Reserved.</p>
	</div>
</body>
</html>
