	<section id="content">
	<div class="container">
		<div class="row">


			
						<div class="blog">
					
								<div class="extra_wrapper">
									 <img src="img/showcase/project2.png" alt="Project 2 image" class="img-responsive underlay">
									<h1 class="blog_head color1"><a href="#"> <?php echo $profile[0]['name'].' '.$profile[0]['PP']; ?> </a></h1>

									
									<p>
									
									<h4><b>個人簡介 : </b></h4>

										<span class="pullquote-left">
										<b>隸屬 :</b> <?php echo $profile[0]['c_cname'].' '.$profile[0]['d_cname']; ?> <br> 
										<b>電話 : </b><?php echo $profile[0]['phone']; ?> <br>
										<b>Email :</b> <?php echo $profile[0]['email']; ?> <br>
										

										</span>
									<h4><b>專長 : </b></h4> 
									<span class="pullquote-left"><span class="pullquote-right">
									<?php echo $profile[0]['specialized'];?>

									
									





									</p>
	
									</span></span>
									<h4><b>領域及相關教師 : </b></h4>
								</div>
						</div>
					
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											<?php echo $profile[0]['classify']?>
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
									<div class="item-carousel" data-toggle="owlcarousel" data-owlcarousel-settings='{"items":8, "pagination":true, "navigation":true, "itemsScaleUp":true}'>


											<?php foreach ($expertise as $relation_item):
													if($relation_item['id'] != $profile[0]['id']){ ?>

												<div class="item">
										              <a href="#" class="overlay-wrapper">
										             
										                <span class="overlay">
										                  <span class="overlay-content"><span></span> </span>
										                </span>
										              </a>
										              <div class="item-details bg-noise">
										                <h4 class="item-title"><a href="<?php echo base_url('index.php').'/members/memberid/'.$relation_item['id']?>"><?php echo $relation_item['name']?></a></h4>
										                <a href="<?php echo base_url('index.php').'/members/memberid/'.$relation_item['id']?>" class="btn btn-more"><i class="fa fa-plus"></i>Read more</a>
										              </div>
								            	</div>

										
											<?php }
												endforeach ?>



            								
            								<!-- <div class="item">
									              <a href="#" class="overlay-wrapper">
									                <img src="img/showcase/project2.png" alt="Project 2 image" class="img-responsive underlay">
									                <span class="overlay">
									                  <span class="overlay-content"> <span class="h4">Project 2</span> </span>
									                </span>
									              </a>
									              <div class="item-details bg-noise">
									                <h4 class="item-title">
									                  <a href="#">徐偉智 教授</a>
									                </h4>
									                <a href="#" class="btn btn-more"><i class="fa fa-plus"></i>Read more</a>
									              </div>
            								</div> -->
            								
           
       								</div>
									</div>
								</div>
							</div>
							
						</div>
							



				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
											曾參與計畫
										</a>
									</h4>
								</div>
						<div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
							<div class="item-carousel" data-toggle="owlcarousel" data-owlcarousel-settings='{"items":1, "pagination":true, "navigation":true, "itemsScaleUp":true}'>

										<?php foreach ($project as $project_item):
													if(@$relation_item['id'] != $profile[0]['id']){ ?>

												<div class="item">
										              <a href="#" class="overlay-wrapper">
										             
										                <span class="overlay">
										                  <span class="overlay-content"><span></span> </span>
										                </span>
										              </a>
										              <div class="item-details bg-noise">
										                <h4 class="item-title"><a href=""><?php echo $project_item['project_name']?></a></h4>
										                <a href="" class="btn btn-more"><i class="fa fa-plus"></i>Read more</a>
										              </div>
								            	</div>

										
											<?php }
												endforeach ?>
   
								</div>
							</div>
						</div>
							</div>
									</div>
								</div>
							</div>
							
						</div>
							
						
					
				

					

						

			
				
    </section><!--/#nino-whatWeDo-->
