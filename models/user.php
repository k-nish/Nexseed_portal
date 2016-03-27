<?php
	class User {
		private $dbconnect = '';
		private $error = '';

		public function __construct() {
			require('dbconnect.php');
			// DB接続の値を代入
			$this->dbconnect = $db;
		}

		public function getError(){
			return $this->error;
		}

		public function setError($error) {
			$this->error = $error;
		}

		public function login($post) {
			if (!empty($post)) {
				if ($post['email'] != '' && $post['password'] != '') {
					$sql = sprintf('SELECT COUNT(*) AS cnt FROM users WHERE email="%s"',
							mysqli_real_escape_string($this->dbconnect, $post['email']));
					$record = mysqli_query($this->dbconnect, $sql);
					$table = mysqli_fetch_assoc($record);
					if ($table['cnt'] == 0) {
						$error['login'] = 'noexist';
					} elseif (strlen($post['password']) < 4 || strlen($post['password']) > 16) {
						$error['login'] = 'length';
					} else {
						$sql = sprintf('SELECT * FROM users WHERE email="%s" AND password="%s"',
								mysqli_real_escape_string($this->dbconnect, $post['email']),
								mysqli_real_escape_string($this->dbconnect, sha1($post['password'])));
						$record = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
						if ($table = mysqli_fetch_assoc($record)) {
							//ログイン成功
							$_SESSION['user_name'] = $table['user_name'];
							$_SESSION['user_id'] = $table['user_id'];
							$_SESSION['time'] = time();
							if ($post['save'] == 'on' && !isset($_COOKIE['email']) && !isset($_COOKIE['password'])) {
							  	setcookie('email', $post['email'], time()+60*60*24*14);
							  	setcookie('password', $post['password'], time()+60*60*24*14);
							}
							return true;
					  	} else {
							$error['login'] = 'failed';
					  	}
					}
				} else {
			  		$error['login'] = 'blank';
				}
			}

			$this->error = $error;
			return false;
		}

		public function add($post) {
			$error = array();

			if(isset($post) && !empty($post)) {
				$name = htmlspecialchars($post['name'], ENT_QUOTES, 'UTF-8');
				$email = htmlspecialchars($post['email'], ENT_QUOTES, 'UTF-8');
				$password = htmlspecialchars($post['password1'], ENT_QUOTES, 'UTF-8');
				if($post['name']=='') {
					$error['name'] = 'blank';
				}
				if($post['email']=='') {
					$error['email'] = 'blank';
				}
				if($post['password1']=='') {
					$error['password'] = 'blank';
				} elseif (strlen($post['password1']) < 4 || strlen($post['password1']) > 16) {
					$error['password'] = 'length';
				} elseif ($post['password1'] != $post['password2']) {
					$error['password'] = 'incorrect';
				}

				if (empty($error)) {
					//重複アカウントのチェック
					$sql = sprintf('SELECT COUNT(*) AS cnt FROM users WHERE email="%s"',
							mysqli_real_escape_string($this->dbconnect, $post['email']));

					$record = mysqli_query($this->dbconnect, $sql);
					$table = mysqli_fetch_assoc($record);
					if ($table['cnt'] > 0) {
						$error['email'] = 'duplicate';
					} else {
						$_SESSION['join'] = $post;
						return true;
					}
				}
				$_SESSION['join'] = $post;
			}

			$this->error = $error;
			return false;
		}

		public function create($post) {
			//登録処理
			$sql = sprintf('INSERT INTO users SET user_name="%s", email="%s", password="%s", created=now()',
					mysqli_real_escape_string($this->dbconnect, $post['name']),
					mysqli_real_escape_string($this->dbconnect, $post['email']),
					mysqli_real_escape_string($this->dbconnect, sha1($post['password1'])));
			mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
		}

	}

?>