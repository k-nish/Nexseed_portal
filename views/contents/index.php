<div id="preloader"></div>
<div id="top"></div>

<!-- /.parallax full screen background image -->
<div class="fullscreen landing parallax" style="background-image:url('/NexSeedPortal/webroot/asset/images/top_image.jpg');" data-img-width="2000" data-img-height="1333" data-diff="100">

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
			</div>
		</div>
	</div>
</div>
<!-- /.intro section -->
<div id="intro">
	<div class="container">
		<div class="row">
			<!-- /.intro content -->
			<form method="post" action="/NexSeedPortal/contents/index/" role="form" name="search">
				<div class="new-post col-md-6 wow slideInRight">
					<h2>Let's Post Your Idea!</h2>
					<div class="download-cta wow">
					<a class="btn-secondary slideInRight" href="/NexSeedPortal/contents/add">New Post</a>
					</div>
				</div>
				<div class="search col-md-6 wow slideInRight">
					<h2>Search Information</h2>
					<div class="btn-section dropdown fadeInLeft">
						<select class="category" name="category">
							<option name="id" value="">Category (not necessary)</option>
							<?php foreach ($this->viewOptions['category'] as $category) { ?>
								<?php if (isset($this->viewOptions['post']['category'])&&!empty($this->viewOptions['post']['category'])
												&&$category['category_id'] == $this->viewOptions['post']['category']) { ?>
									<option value="<?php echo $category['category_id']; ?>" selected><?php echo $category['category_name']; ?></option>
								<?php }else{ ?>
									<option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
						<?php if (isset($this->viewOptions['post']['search'])&&!empty($this->viewOptions['post']['search'])) { ?>
							<input type="text" name="search" placeholder="Search Word" class="form-control input-lg" value="<?php echo $this->viewOptions['post']['search']; ?>">
						<?php }else{ ?>
							<input type="text" name="search" placeholder="Search Word" class="form-control input-lg" value="">
						<?php } ?>
						<?php if (isset($this->viewOptions['post'])&&!empty($this->viewOptions['post'])&&empty($this->viewOptions['contents'])) { ?>
							<p class="error">*検索結果がありませんでした。</p>
							<a href="/NexSeedPortal/contents/index/"><input type="submit" class="btn-default" value="Search"></a>
							<a href="/NexSeedPortal/contents/index/"><input type="button" class="btn-default" value="Back"></a>
						<?php }else{ ?>
							<a href="/NexSeedPortal/contents/index/"><input type="submit" class="btn-default" value="Search"></a>
						<?php } ?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- /.feature section -->
<?php if (isset($this->viewOptions['post'])&&!empty($this->viewOptions['post'])&&empty($this->viewOptions['contents'])) { ?>
<?php }else{ ?>
<div id="feature">
	<div class="container">
		<div class="text-center">
			<h2 id="1st" class="wow fadeInLeft">Latest Posts</h2>
			<div class="title-line wow fadeInRight"></div>
		</div>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
			   <div id="owl-testi" class="owl-carousel owl-theme wow fadeInUp">
					<!-- /.testimonial 1 -->
					<div class="testi-item">
						<div class="box">
							<table class="list">
								<thead>
									<tr>
										<th>Shop</th>
										<th>Review</th>
										<th>Comment</th>
									</tr>
								</thead>
								<tbody class="list-body text-overflow">
									<?php if (isset($this->viewOptions['contents'])&&!empty($this->viewOptions['contents'])) {
									foreach ($this->viewOptions['contents'] as $content) {?>
									<tr data-href="/NexSeedPortal/contents/show/<?php echo $content['content_id']; ?>">
										<td data-label="shop"><?php echo $content['shop_name']; ?></td>
										<td id="review" data-label="review"><?php echo $content['review']; ?></td>
										<td data-label="comment"><?php echo $content['comment']; ?></td>
									</tr>
									<?php }} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="btn-section">
					<?php if ($this->viewOptions['maxpage'][0] > 1) {?>
						<?php if((isset($this->viewOptions['post']['category'])&&!empty($this->viewOptions['post']['category']))||
									(isset($this->viewOptions['post']['search'])&&!empty($this->viewOptions['post']['search']))){ ?>
						<!-- 検索中のページング -->
							<?php if($this->viewOptions['page'][0] == 1) {?>
								<form method="post" action="/NexSeedPortal/contents/index/<?php echo $this->viewOptions['page'][0] + 1; ?>" role="form" name="post">
									<input type="hidden" value="<?php echo $this->viewOptions['post']['category']; ?>" name="category">
									<input type="hidden" value="<?php echo $this->viewOptions['post']['search']; ?>" name="search">
									<input type="submit" class="btn-default" style="float:right" value="&nbsp;&nbsp;&nbsp;&nbsp;Next&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
								</form>
							<?php }elseif($this->viewOptions['page'][0] == $this->viewOptions['maxpage'][0]){ ?>
								<form method="post" action="/NexSeedPortal/contents/index/<?php echo $this->viewOptions['page'][0] - 1; ?>" role="form" name="post">
									<input type="hidden" value="<?php echo $this->viewOptions['post']['category']; ?>" name="category">
									<input type="hidden" value="<?php echo $this->viewOptions['post']['search']; ?>" name="search">
									<input type="submit" class="btn-default" style="float:right" value="Previous">
								</form>
							<?php }else{ ?>
								<form method="post" action="/NexSeedPortal/contents/index/<?php echo $this->viewOptions['page'][0] + 1; ?>" role="form" name="post">
									<input type="hidden" value="<?php echo $this->viewOptions['post']['category']; ?>" name="category">
									<input type="hidden" value="<?php echo $this->viewOptions['post']['search']; ?>" name="search">
									<input type="submit" class="btn-default" style="float:right" value="&nbsp;&nbsp;&nbsp;&nbsp;Next&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
								</form>
								<form method="post" action="/NexSeedPortal/contents/index/<?php echo $this->viewOptions['page'][0] - 1; ?>" role="form" name="post">
									<input type="hidden" value="<?php echo $this->viewOptions['post']['category']; ?>" name="category">
									<input type="hidden" value="<?php echo $this->viewOptions['post']['search']; ?>" name="search">
									<input type="submit" class="btn-default" style="float:right" value="Previous">
								</form>
							<?php } ?>
						<?php }else{ ?>
							<?php if($this->viewOptions['page'][0] == 1) {?>
								<a href="/NexSeedPortal/contents/index/<?php echo $this->viewOptions['page'][0] + 1; ?>" class="btn-default" style="float:right">&nbsp;&nbsp;&nbsp;&nbsp;Next&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
							<?php }elseif($this->viewOptions['page'][0] == $this->viewOptions['maxpage'][0]){ ?>
								<a href="/NexSeedPortal/contents/index/<?php echo $this->viewOptions['page'][0] - 1; ?>" class="btn-default" style="float:right">Previous</a>
							<?php }else{ ?>
								<a href="/NexSeedPortal/contents/index/<?php echo $this->viewOptions['page'][0] + 1; ?>" class="btn-default" style="float:right">&nbsp;&nbsp;&nbsp;&nbsp;Next&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
								<a href="/NexSeedPortal/contents/index/<?php echo $this->viewOptions['page'][0] - 1; ?>" class="btn-default" style="float:right">Previous</a>
							<?php } ?>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>