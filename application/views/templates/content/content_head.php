
<!--=====================Content======================-->

			<div class="col-lg-8">
				
				<ul class="nav nav-tabs">

					<li><a href="#asd" data-toggle="tab"><i class="icon-briefcase"></i> 首頁</a></li>
					<li class="active"><a href="#two" data-toggle="tab"> 列表示搜尋</a></li>
					<li><a href="#three" data-toggle="tab"> 圖形化搜尋</a></li>
									
				</ul>
				<div class="tab-content">

					<div class="tab-pane" id="asd">


						<?php
						
						foreach ($Comments as $key => $value) {
							
						  ?>

						<article>
							<div class="post-image">
								<div class="post-heading">
									<h3><a href="#"><?php echo $value['title']?></a></h3>
								</div>


								

								<div id="post-slider" class="flexslider">
									<ul class="slides">
										
										<?php 
											if(isset($value['img']))
												foreach ($value['img'] as $key => $img) {
										?>
													<li><img src="<?php echo base_url('uploads/'.$img)?>" alt="" /></li>
										<?php		}
												
										?>


									</ul>
								</div>

								


								
							</div>
							<p>
								<?php echo $value['context']?>
							</p>
							<div class="bottom-article">
								<ul class="meta-post">
									<li><i class="icon-calendar"></i><a href="#"> <?php echo $value['ac_date']?></a></li>
								</ul>
								<a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
							</div>
						</article>

						<?php } ?>







						
						<article>
							<div class="post-image">
								<div class="post-heading">
									<h3><a href="#">首頁廠商消息範例(一張圖)</a></h3>
								</div>
								<img src="<?php echo base_url('userfile/images/slides/9.jpg')?>" alt="" />
							</div>
							<p>
								Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius
								ea. Usu ea justo malis, pri quando everti electram ei, ex homero omittam salutatus sed.
							</p>
							<div class="bottom-article">
								<ul class="meta-post">
									<li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
									<li><i class="icon-user"></i><a href="#"> Admin</a></li>
									<li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
									<li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
								</ul>
								<a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
							</div>
						</article>

						<article>
							<div class="post-image">
								<div class="post-heading">
									<h3><a href="#">首頁廠商消息範例(多張圖)</a></h3>
								</div>
								<!-- start flexslider -->
								<div id="post-image" class="flexslider">
									<ul class="slides">
										<li><img src="<?php echo base_url('uploads/9.jpg')?>" alt="" /></li>
										<li><img src="<?php echo base_url('uploads/107.png')?>" alt="" /></li>
										<li><img src="<?php echo base_url('uploads/108.jpg')?>" alt="" /></li>
									</ul>
								</div>
								<!-- end flexslider -->
							</div>
							<p>
								Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius
								ea. Usu ea justo malis, pri quando everti electram ei, ex homero omittam salutatus sed.
							</p>
							<div class="bottom-article">
								<ul class="meta-post">
									<li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
									<li><i class="icon-user"></i><a href="#"> Admin</a></li>
									<li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
									<li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
								</ul>
								<a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
							</div>
						</article>

						<article>
							<div class="post-quote">
								<div class="post-heading">
									<h3><a href="#">首頁廠商消息範例(無圖)</a></h3>
								</div>
								<blockquote>
									<i class="icon-quote-left"></i> Lorem ipsum dolor sit amet, ei quod constituto qui. Summo labores expetendis ad quo, lorem luptatum et vis. No qui vidisse signiferumque...
								</blockquote>
							</div>
							<div class="bottom-article">
								<ul class="meta-post">
									<li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
									<li><i class="icon-user"></i><a href="#"> Admin</a></li>
									<li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
									<li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
								</ul>
								<a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
							</div>
						</article>

						<article>
							<div class="post-video">
								<div class="post-heading">
									<h3><a href="#">首頁廠商消息範例(影片)</a></h3>
								</div>
								<div class="video-container">
									<iframe src="http://player.vimeo.com/video/30585464?title=0&amp;byline=0">
								</iframe>
								</div>
							</div>
							<p>
								Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius
								ea. Usu ea justo malis, pri quando everti electram ei.
							</p>
							<div class="bottom-article">
								<ul class="meta-post">
									<li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
									<li><i class="icon-user"></i><a href="#"> Admin</a></li>
									<li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
									<li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
								</ul>
								<a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
							</div>
						</article>
					</div>

					<div class="tab-pane active"" id="two">
						
						