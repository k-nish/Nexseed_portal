<?php
	session_start();
	require('models/content.php');

	//ログインチェックを実装
	require('controllers/function.php');
	require('dbconnect.php');
	if (isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])) {
		loginCheck($_SESSION,$db);
	}else{
		header('Location: /NexSeedPortal/users/login/');
	}
	//コントローラのクラスをインスタンス化
	$controller = new ContentsController();

	switch ($action) {
		case 'index';
			if(isset($_SESSION['add'])){
				unset($_SESSION['add']);
			}
			if (isset($_SESSION['edit'])) {
				unset($_SESSION['edit']);
			}
			if (isset($_SESSION['error'])) {
				unset($_SESSION['errot']);
			}
			$controller->index($id,$post);
			break;

		case 'add':
			$controller->add();
			break;

		case 'confirm':
			if($id == 0) {
				unset($_SESSION['error']);
				$_SESSION['add'] = $post;
				$controller->addConfirm($_SESSION['add']);
			} else {
				$_SESSION['edit'] = $post;
				$controller->editConfirm($id, $fileName, $files);
			}
			break;

		case 'create':
			$controller->create();
			unset($_SESSION['add']);
			unset($_SESSION['error']);
	   		header('Location:/NexSeedPortal/contents/index');
	   		break;

		case 'show':
			$controller->show($id);
			unset($_SESSION['edit']);
			unset($_SESSION['error']);
			break;

		case 'edit':
			$controller->edit($id);
			break;

		case 'delete':
			$controller->delete($id);
			break;

		case 'update':
			$controller->update($id);
			unset($_SESSION['edit']);
			unset($_SESSION['error']);
			break;

		default:
			break;
	}

	class ContentsController {
		private $content = '';
		private $action = '';
		private $resource = '';
		private $viewOptions = '';
		private $categories = '';
		private $files = '';
		private $post = array();

		public function __construct() {
			$this->content = new Content();
		}

		public function index($id,$post){
			//indexメソッドを呼び出す
			$this->viewOptions = $this->content->index($id,$post);
			//アクション名を設定
			$this->resource = 'contents';
			$this->action = 'index';
			//ビューを呼び出す
			require('views/layout/application.php');
		}

		public function add(){
 			$this->categories = $this->content->selectCategories();
 			$this->action='add';
 			$this->resource='contents';

			include('views/layout/application.php');
		}

		public function addConfirm($session) {
			if (isset($_FILES['picture_path']['name']) && !empty($_FILES['picture_path']['name'])) {
				$fileName = $_FILES['picture_path']['name'];
				$files = $_FILES['picture_path'];
				if (!empty($fileName)) {
					$ext = substr($fileName, -3);
					if ($ext != 'jpg' && $ext != 'gif' && $ext != 'png' && $ext != 'JPG' && $ext != 'GIF' && $ext != 'PNG'){
						$_SESSION['error'] = 'error_prefix';
						header('Location: /NexSeedPortal/contents/add/');
					} else {
						$_SESSION['error'] = 'select_again';
						$picture_path = date('YmdHis') . $fileName;
						move_uploaded_file($_FILES['picture_path']['tmp_name'], 'webroot/asset/images/post_images/'. $picture_path);
						$files = $picture_path;
					}
					$this->files = $files;
				} else {
					$_SESSION['error'] = 'no_error';
				}
			}
			if(empty($session['category_id'])) {
				$_SESSION['error'] = 'category';
				header('Location: /NexSeedPortal/contents/add/');
			}
			$_SESSION['add'] += array('picture_path'=>$this->files);
			$this->categories = $this->content->selectCategories();
			$this->resource = 'contents';
			$this->action = 'add_confirm';

			include('views/layout/application.php');
		}

		public function create() {
			$this->content->create();
		}

		public function show($id) {
			$this->viewOptions = $this->content->show($id);
			$this->resource = 'contents';
			$this->action = 'show';

			include('views/layout/application.php');
		}

		public function edit($id) {
			$this->viewOptions = $this->content->selectContents($id);
			$this->categories = $this->content->selectCategories();
			$this->resource = 'contents';
			$this->action = 'edit';

			include('views/layout/application.php');
		}

		public function editConfirm($id, $fileName, $files) {
			if (isset($_FILES['picture_path']['name']) && !empty($_FILES['picture_path']['name'])) {
				$fileName = $_FILES['picture_path']['name'];
				$files = $_FILES['picture_path'];
				if (!empty($fileName)) {
					$ext = substr($fileName, -3);
					if ($ext != 'jpg' && $ext != 'gif' && $ext != 'png' && $ext != 'JPG' && $ext != 'GIF' && $ext != 'PNG'){
						$_SESSION['error'] = 'error_prefix';
						header('Location: /NexSeedPortal/contents/edit/'. $id);
					} else {
						$_SESSION['error'] = 'select_again';
						$picture_path = date('YmdHis') . $fileName;
						move_uploaded_file($_FILES['picture_path']['tmp_name'], 'webroot/asset/images/post_images/'. $picture_path);
						$files = $picture_path;
					}
				} else {
					$_SESSION['error'] = 'no_error';
				}
				$_SESSION['edit'] += array('picture_path'=>$files);
			}
			$this->categories = $this->content->selectCategories();
			$this->files = $files;
			$this->resource = 'contents';
			$this->action = 'edit_confirm';

			include('views/layout/application.php');
		}

		public function update($id) {
			$this->content->update($id);

			header('Location: /NexSeedPortal/contents/show/'.$id);
		}

		public function delete($id) {
			$this->content->delete($id);

			header('Location: /NexSeedPortal/contents/index');
		}
	}
 ?>