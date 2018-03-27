<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p style='font-size: 20px'>
							<?php echo $title; ?>
						</p>
						<div class="clearfix">
						</div>
						<div class="row">
							<section id="projects">
								<ul id="thumbs" class="portfolio" style="height: 225px;">
									<?php
										foreach($img as $im) {
											$imp = base_url('userfile/images/portfolio/').$im;
											echo '<li class="item-thumbs col-lg-3 design" data-id="id-0" data-type="web">';
											echo '<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Portfolio name" href="'.$imp.'">';
											echo '<span class="overlay-img"></span>';
											echo '<span class="overlay-img-thumb font-icon-plus"></span>';
											echo '</a>';
											echo '<img src="'.$imp.'" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">';
											echo '</li>';
										}
									?>
								</ul>
							</section>
						</div>
					</div>
				</div>
			</div>
		</section>