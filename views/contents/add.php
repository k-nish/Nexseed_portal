<div id="contact">
	<div class="contact fullscreen parallax">
		<div class="overlay02">
			<div class="container">
				<div class="row contact-row">
					<div class="col-sm-7 contact-right">
						<form method="post" id="contact-form" class="form-horizontal" action="/NexSeedPortal/contents/confirm"  enctype="multipart/form-data">
							<div class="btn-section dropdown01">
								<select class="category" name="category_id" required>
									<option value="">Category</option>
									<?php foreach ($this->categories as $category): ?>
										<?php if (isset($_SESSION['add']) && !empty($_SESSION['add'])): ?>
											<?php if ($_SESSION['add']['category_id'] == $category['category_id']): ?>
												<option value="<?php echo $_SESSION['add']['category_id'];?>" selected><?php echo $category['category_name']; ?></option>
											<?php else: ?>
												<option value="<?php echo $category['category_id'];?>"><?php echo $category['category_name']; ?></option>
											<?php endif; ?>
										<?php else: ?>
											<?php if ($category['category_id'] == $this->viewOptions['category_id']):?>
												<option value="<?php echo $category['category_id'];?>" selected><?php echo $category['category_name']; ?></option>
											<?php else: ?>
										 		<option value="<?php echo $category['category_id'];?>"><?php echo $category['category_name']; ?></option>
											<?php endif; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
							<?php if (isset($_SESSION['error']) && !empty($_SESSION['error']) && $_SESSION['error'] == 'category'): ?>
								<div class="abc">
									<br>
									<p class="danger">※カテゴリが選択されていません。</p>
								</div>
							<?php endif; ?>
							<!-- 店の名前 -->
							<div class="category">
								<?php if (isset($_SESSION['add']) && !empty($_SESSION['add'])): ?>
									<input type="text" name="shop_name" placeholder="Shop Name" class="form-control input-lg" value="<?php echo $_SESSION['add']['shop_name']; ?>" required>
								<?php else: ?>
									<input type="text" name="shop_name" class="form-control input-lg" placeholder="Shop Name" value="" required/>
								<?php endif; ?>
							<div class="abc">
								<span>Please Select Your Favorite Location!!</span>
								<!-- goolgle map API -->
		   						<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
								<?php require('webroot/asset/js/gmap_add.php'); ?>
								<div id="gmap" class="img-thumbnail center-block"></div>
								<?php if (isset($_SESSION['add']) && !empty($_SESSION['add'])): ?>
									<div id="lng">
										<input type="hidden" name="lng" id="lng" value="<?php echo $_SESSION['add']['lng']; ?>">
									</div>
									<div id="lat">
										<input type="hidden" name="lat" id="lat" value="<?php echo $_SESSION['add']['lat']; ?>">
									</div>
								<?php else: ?>
									 <div id="lng">
									 	<input type="hidden" name="lng" id="lng" value="123.90381932258606">
									 </div>
									 <div id="lat">
									 	<input type="hidden" name="lat" id="lat" value="10.329200473939935">
									 </div>
								<?php endif; ?>
							</div>
								<!-- 写真 -->
							 <div class="abc">
								<span>Photo:</span>
								<label><input type="file" name="picture_path" class="input-lg"></label>
								<?php if (isset($_SESSION['error']) && !empty($_SESSION['error']) && $_SESSION['error'] == 'error_prefix'): ?>
									<p class="danger">※画像の拡張子は".jpg"または".png"または".gif"のファイルを選択して下さい。</p>
								<?php elseif (isset($_SESSION['error']) && !empty($_SESSION['error']) && $_SESSION['error'] == 'select_again'): ?>
									<p class="danger">※恐れ入りますがもう一度画像ファイルを選択して下さい。</p>
								<?php elseif (isset($_SESSION['error']) && !empty($_SESSION['error']) && $_SESSION['error'] == 'no_error'): ?>
									<?php false; ?>
								<?php endif; ?>
								<br/>
								<span>Review:</span>
								<p class="abc01">
								<?php if(isset($_SESSION['add']) && !empty($_SESSION['add'])): ?>
									<?php for ($i=1; $i<=5; $i++):?>
										<?php if($i == $_SESSION['add']['review']): ?>
											<label for="<?php echo $i;?>"><?php echo $i; ?>&nbsp;</label><input type="radio" id="<?php echo $i;?>" name="review" value="<?php echo $i; ?>" checked required/>&nbsp;&nbsp;&nbsp;&nbsp;
										<?php else: ?>
											<label for="<?php echo $i;?>"><?php echo $i; ?>&nbsp;</label><input type="radio" id="<?php echo $i;?>" name="review" value="<?php echo $i; ?>" required/>&nbsp;&nbsp;&nbsp;&nbsp;
										<?php endif; ?>
									<?php endfor; ?>
								<?php else: ?>
									<?php for($i=1; $i<=5; $i++): ?>
										<label for="<?php echo $i;?>"><?php echo $i; ?>&nbsp;</label><input type="radio" id="<?php echo $i;?>" name="review" value="<?php echo $i; ?>" required/>&nbsp;&nbsp;&nbsp;&nbsp;
									<?php endfor; ?>
								<?php endif; ?>
								</p>
							</div>
							<div class="category">
								<?php if (isset($_SESSION['add']) && !empty($_SESSION['add'])): ?>
									<textarea name="comment" rows="5" cols="10" id="comment" class="form-control input-message fadeInUp"  placeholder="Comment" required><?php echo $_SESSION['add']['comment']; ?></textarea>
								<?php else: ?>
									<textarea name="comment" rows="5" cols="10" id="comment" class="form-control input-message wow fadeInUp"  placeholder="Comment" required></textarea>
								<?php endif; ?>
							</div>
								<!-- 戻るボタン -->
							<div class="col-sm-4 contact-right">
								<a href="/NexSeedPortal/contents/index/">
									<input type="button" name="button" value="Back"class="btn01 btn-success fadeInUp" />
								</a>
							</div>
								<!-- 確認ボタン -->
							<div class="col-sm-4 contact-left">
								<input type="submit" name="submit" value="Confirm" class="btn btn-success fadeInUp">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>