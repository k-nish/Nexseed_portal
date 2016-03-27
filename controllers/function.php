<?php
//ログイン後にページ遷移したときにログインチェックを行う関数
function loginCheck($session,$db){
	if (isset($session['user_id']) && $session['time'] + 3600 > time()) {
		$sql = sprintf('SELECT * FROM `users` WHERE `user_id` = %d AND `user_name` = "%s"',
				mysqli_real_escape_string($db,$session['user_id']),
				mysqli_real_escape_string($db,$session['user_name']));
		$record = mysqli_query($db,$sql) or die(mysqli_error($db));
		if($member = mysqli_fetch_assoc($record)){
			$_SESSION['time'] = time();
		}else{
			header('Location: /NexSeedPortal/users/login/');
		}
	}else{
		header('Location: /NexSeedPortal/users/login/');
	}
}

//htmlspecialcharsの短縮
function h($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

?>