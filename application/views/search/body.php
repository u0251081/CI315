<?php
$startNum = ($page-1)*5; 
for( $i=$startNum ; $i<=$startNum + 4 ; $i++ ){ 
if( !isset($facultymembers[$i])) break;
  ?>

<article>
  <div class="blog">
    <!-- <img src="<?php echo base_url('uploads/').$facultymembers[$i]['img'] ?>images/member.png" alt="" class="img_inner fleft"> -->
    <div class="extra_wrapper">
      <h3 class="blog_head color1"><a href="<?php echo base_url('index.php').'/members/memberid/'.$facultymembers[$i]['id']?>"><?php echo $facultymembers[$i]['name'].' '.$facultymembers[$i]['PP'] ?></a></h3>
      <p><b>隸屬 :</b> <?php echo $facultymembers[$i]['c_cname'].' '.$facultymembers[$i]['d_cabbr'] ?> <br> <b>專長領域 : </b> <?php echo $facultymembers[$i]['specialized'] ?></p>
    </div>
  </div>


  <div class="bottom-article">
    <ul class="meta-post">
      <li><i class="icon-calendar"></i><a href="#"><?php echo $facultymembers[$i]['phone'] ?></a></li>
      <li><i class="icon-comments"></i><a href="#"><?php echo $facultymembers[$i]['email'] ?></a></li>
    </ul>
    <a href="<?php echo base_url('index.php').'/members/memberid/'.$facultymembers[$i]['id']?>" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
  </div>

    

</article>

<?php } ?>




<!--
				<article>
						<div class="blog">
								<img src="<?php echo base_url('userfile/') ?>images/weichih.jpg" alt="" class="img_inner fleft">
								<div class="extra_wrapper">
									<h3 class="blog_head color1"><a href="#">徐偉智 教授</a></h3>
									<p><b>隸屬 :</b> 工學院 電通系 <br> <b>電話 : </b>(07)601-1012 <br> <b>Email :</b> weichih@ccms.nkfust.edu.tw <br><br>  <b>專長領域 : </b> 網際網路與Java技術、影像與語音處理、多媒體與3D圖學、電腦網路與資訊安全、數位信號處理與通訊系統、信號處理晶片與單晶片應用、軟體工程、Web-Based資訊系統開發、物件導向分析與設計、專案管理、網路電話、嵌入式系統、J2EE與Web-Service、電子商務資料技術</p>
	
									
								
								</div>
						</div>
						<div class="showcase block block-border-bottom-grey">
          					<h4 class="block-title">Showcase</h4>
         
		<div class="item-carousel" data-toggle="owlcarousel" data-owlcarousel-settings='{"items":4, "pagination":true, "navigation":true, "itemsScaleUp":true}'>
            <div class="item">
              <a href="#" class="overlay-wrapper">
                <img src="<?php echo base_url('userfile/') ?>img/showcase/project1.png" alt="Project 1 image" class="img-responsive underlay">
                <span class="overlay">
                  <span class="overlay-content"><span>I am mother fucker handsome</span> </span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title"><a href="#">Project 1</a></h4>
                <a href="#" class="btn btn-more"><i class="fa fa-plus"></i>Read more</a>
              </div>
            </div>

            <div class="item">
              <a href="#" class="overlay-wrapper">
                <img src="<?php echo base_url('userfile/') ?>img/showcase/project2.png" alt="Project 2 image" class="img-responsive underlay">
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4">Project 2</span> </span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title">
                  <a href="#">Project 2</a>
                </h4>
                <a href="#" class="btn btn-more"><i class="fa fa-plus"></i>Read more</a>
              </div>
            </div>
            <div class="item">
              <a href="#" class="overlay-wrapper">
                <img src="<?php echo base_url('userfile/') ?>img/showcase/project3.png" alt="Project 3 image" class="img-responsive underlay">
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4">Project 3</span> </span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title">
                  <a href="#">Project 3</a>
                </h4>
                <a href="#" class="btn btn-more"><i class="fa fa-plus"></i>Read more</a>
              </div>
            </div>
            <div class="item">
              <a href="#" class="overlay-wrapper">
                <img src="<?php echo base_url('userfile/') ?>img/showcase/project4.png" alt="Project 4 image" class="img-responsive underlay">
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4">Project 4</span> </span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title">
                  <a href="#">Project 4</a>
                </h4>
                <a href="#" class="btn btn-more"><i class="fa fa-plus"></i>Read more</a>
              </div>
            </div>
            <div class="item">
              <a href="#" class="overlay-wrapper">
                <img src="<?php echo base_url('userfile/') ?>img/showcase/project5.png" alt="Project 5 image" class="img-responsive underlay">
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4">Project 5</span> </span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title">
                  <a href="#">Project 5</a>
                </h4>
                <a href="#" class="btn btn-more"><i class="fa fa-plus"></i>Read more</a>
              </div>
            </div>
            <div class="item">
              <a href="#" class="overlay-wrapper">
                <img src="<?php echo base_url('userfile/') ?>img/showcase/project6.png" alt="Project 6 image" class="img-responsive underlay">
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4">Project 6</span> </span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title">
                  <a href="#">Project 6</a>
                </h4>
                <a href="#" class="btn btn-more"><i class="fa fa-plus"></i>Read more</a>
              </div>
            </div>
           
        </div>
        	
      					</div>

						<div class="bottom-article">
							<ul class="meta-post">
								<li><i class="icon-calendar"></i><a href="#">工學院</a></li>
								<li><i class="icon-user"></i><a href="#">電通系</a></li>
								<li><i class="icon-folder-open"></i><a href="#">工程技術類</a></li>
								<li><i class="icon-comments"></i><a href="#">weichih@ccms.nkfust.edu.tw </a></li>
							</ul>
							<a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
						</div>

						

				</article>
				<article>
						<div class="blog">
								<img src="<?php echo base_url('userfile/') ?>images/poww.jpg" alt="" class="img_inner fleft">
								<div class="extra_wrapper">
									<h3 class="blog_head color1"><a href="#">黃世勳 教授</a></h3>
									<p><b>專長領域 : </b> 網際網路與Java技術、影像與語音處理、多媒體與3D圖學、電腦網路與資訊安全、數位信號處理與通訊系統、信號處理晶片與單晶片應用、軟體工程、Web-Based資訊系統開發、物件導向分析與設計、專案管理、網路電話、嵌入式系統、J2EE與Web-Service、電子商務資料技術</p>
								</div>
						</div>
						<div class="bottom-article">
							<ul class="meta-post">
								<li><i class="icon-calendar"></i><a href="#">工學院</a></li>
								<li><i class="icon-user"></i><a href="#">電通系</a></li>
								<li><i class="icon-folder-open"></i><a href="#">工程技術類</a></li>
								<li><i class="icon-comments"></i><a href="#">weichih@ccms.nkfust.edu.tw </a></li>
							</ul>
							<a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
						</div>
				</article>
				<article>
						<div class="blog">						
								<img src="<?php echo base_url('userfile/') ?>images/hswang.jpg" alt="" class="img_inner fleft">
								<div class="extra_wrapper">
									<h3 class="blog_head color1"><a href="#">汪桓生 教授</a></h3>
									<p><b>專長領域 : </b> 網際網路與Java技術、影像與語音處理、多媒體與3D圖學、電腦網路與資訊安全、數位信號處理與通訊系統、信號處理晶片與單晶片應用、軟體工程、Web-Based資訊系統開發、物件導向分析與設計、專案管理、網路電話、嵌入式系統、J2EE與Web-Service、電子商務資料技術</p>

									
								</div>
						</div>
						<div class="bottom-article">
							<ul class="meta-post">
								<li><i class="icon-calendar"></i><a href="#">工學院</a></li>
								<li><i class="icon-user"></i><a href="#">電通系</a></li>
								<li><i class="icon-folder-open"></i><a href="#">工程技術類</a></li>
								<li><i class="icon-comments"></i><a href="#">weichih@ccms.nkfust.edu.tw </a></li>
							</ul>
							<a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
						</div>
				</article>
-->