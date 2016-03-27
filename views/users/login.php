<!-- /.preloader -->
<div id="preloader"></div>
<div id="top"></div>

<!-- /.parallax full screen background image -->
<div class="fullscreen landing parallax top-image" data-img-width="2000" data-img-height="1333" data-diff="100">
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<!-- /.main title -->
					<h1 class="wow fadeInLeft">
						NexSeed Portal Site<br>New Open!!
					</h1>

					<!-- /.header paragraph -->
					<div class="landing-text wow fadeInUp">
						<p>留学生活を有意義にするために、是非このサイトをご活用下さい。<br>
						皆さんが作り上げていくポータルサイトです。<br>
						使い方は自由自在！！<br>
						おすすめレストラン、ローカル情報、レジャー情報<br>
						特に日常生活に関連する情報満載です！<br>
						よろしくお願いします！</p>
					</div>

				</div>

				<!-- /.signup form -->
				<div class="col-md-5">
					<div class="signup-header wow fadeInUp">
						<h3 class="form-title text-center">Let's HACK!</h3>
						<form class="form-header" action="" role="form" method="post" id="#">
							<div class="form-group">
								<input class="form-control input-lg" name="email" id="email" type="email" placeholder="Email Address" value="<?php echo $this->email; ?>" required>
								<?php if(isset($this->error['login']) && $this->error['login'] == 'blank'): ?>
									<p class="error">* メールアドレスとパスワードをご記入ください。</p>
								<?php elseif(isset($this->error['login']) && $this->error['login'] == 'noexist'): ?>
									<p class="error">* メールアドレスかパスワードが間違っています。</p>
								<?php elseif(isset($this->error['login']) && $this->error['login'] == 'failed'): ?>
									<p class="error">* メールアドレスかパスワードが間違っています。</p>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<input class="form-control input-lg" name="password" id="password" type="password" placeholder="Password (4文字以上16文字以下)" required>
								<?php if(isset($this->error['login']) && $this->error['login'] == 'length'): ?>
									<p class="error">* パスワードは4文字以上16文字以下で入力してください。</p>
								<?php endif; ?>
							</div>
							<div class="form-group last">
									<!-- チェックボックス追加 -->
									<div class="form-group">
										<div class="col-xs-7">
											<label class="checkbox-inline">
												<input type="checkbox" name="save">Auto Login
											</label>
										</div>
									</div>
								<a href="/NexSeedPortal/users/add"><input type="button" class="btn btn-warning btn-block btn-lg btn-reg-l" value="Register"></a>
 								<input type="submit" class="btn btn-warning btn-block btn-lg btn-reg-r" value="Login">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>