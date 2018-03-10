
<!--=====================Content======================-->

			<div class="col-lg-8">
				
				<ul class="nav nav-tabs">
					
					<li class="active"><a href="#two" data-toggle="tab"> 列表示搜尋</a></li>
					<li><button class="infovisActive a"><a class="infovisActive" href="#three" data-toggle="tab"> 圖形化搜尋</a></button></li>
							
				</ul>
				<div class="tab-content">
<script type="text/javascript">
	console.log('fuck');
	var header = document.getElementById("nav nav-tabs");
	var btn = header.getElementsByClassName("infovisActive a");
	btn[0].addEventListener("click", function(){
		console.log("active");
		init(window.json);
	});
</script>
				

					<div class="tab-pane active"" id="two">
						
						