
		</div> <!--tab pane one-->
		<div class="tab-pane" id="three">
			
			<div id="container">
				

				<div id="left-container">
				    <div id="infovis"></div> 
				</div>

				
					<div id="inner-details">
						   
					</div>
				

				<div id="log"></div>

			</div>
<script type="text/javascript" >
    var json;
    function loadJSON(path, success, error){
            
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function()
            {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        if (success)
                            success(JSON.parse(xhr.responseText));
                    } else {
                        if (error)
                            error(xhr);
                    }
                }
            };
            xhr.open("GET", path, true);
            xhr.send();
        };
    loadJSON('http://163.18.53.149/IICwebsite/index.php/Search/jsont',
         function(data) { console.log(data); json = data;init(json);},
         function(xhr) { console.error(xhr); }
);
    // var json2 = $.getJSON('http://163.18.53.149/IICwebsite/ci315/index.php/search/jsont');
    // var s = JSON.parse(json2);
   // window.alert(window.jsons);
   // console.log('fuck me');

</script>
			<!-- <article>
			  <div class="blog">
			    <img src="<?php echo base_url('userfile/') ?>images/member.png" alt="" class="img_inner fleft">
			    <div class="extra_wrapper">
			      <h3 class="blog_head color1"><a href="<?php echo base_url('index.php').'/members/memberid/'.$facultymembers[$i]['id']?>"><?php echo $facultymembers[$i]['name'].' '.$facultymembers[$i]['PP'] ?></a></h3>
			      <p><b>隸屬 :</b> <?php echo $facultymembers[$i]['c_cname'].' '.$facultymembers[$i]['d_cabbr'] ?> <br> <b>專長領域 : </b> <?php echo $facultymembers[$i]['specialized'] ?></p>
			    </div>
			  </div>


			  <div class="bottom-article">
			    <ul class="meta-post">
			      <li><i class="icon-calendar"></i><a href="#"><?php echo $facultymembers[$i]['phone'] ?></a></li>
			      <li><i class="icon-comments"></i><a href="#">weichih@ccms.nkfust.edu.tw </a></li>
			    </ul>
			    <a href="<?php echo base_url('index.php').'/members/memberid/'.$facultymembers[$i]['id']?>" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
			  </div>

			    

			</article> -->
			

			    
		<article>
			  <div class="blog">
			    <img src="" alt="" class="img_inner fleft">
			    <div class="extra_wrapper">
			      <h3 class="blog_head color1"><a href="">TEST</a></h3>
			      <p><b>隸屬 :</b>  <br> <b>專長領域 : </b> </p>
			    </div>
			  </div>


			  <div class="bottom-article">
			    <ul class="meta-post">
			      <li><i class="icon-calendar"></i><a href="#"></a></li>
			      <li><i class="icon-comments"></i><a href="#">weichih@ccms.nkfust.edu.tw </a></li>
			    </ul>
			    <a href="" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
			  </div>
		</article>
			
		</div> <!--tab pane two-->

		</div> <!--tab content-->
		</div> <!--col-->