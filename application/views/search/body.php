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
