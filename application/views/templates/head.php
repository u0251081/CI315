<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Moderna - Bootstrap 3 flat corporate template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!--basic css -->
<link href="<?php echo base_url('userfile/tests/css/bootstrap.min.css') ?>" rel="stylesheet" />
<link href="<?php echo base_url('userfile/tests/css/style.css') ?>" rel="stylesheet" />
<link href="<?php echo base_url('userfile/tests/css/defaults.css') ?>" rel="stylesheet" />
<link href="<?php echo base_url('userfile/tests/css/flexslider.css') ?>" rel="stylesheet" />
<link href="<?php echo base_url('userfile/tests/css/jcarousel.css') ?>" rel="stylesheet" />
<link href="<?php echo base_url('userfile/tests/css/jquery.fancybox.css') ?>" rel="stylesheet" />


<link href="<?php echo base_url('userfile/lib/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('userfile/lib/owlcarousel/owl.carousel.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('userfile/lib/owlcarousel/owl.theme.min.css') ?>" rel="stylesheet">

<!--infovis css-->
<link href="<?php echo base_url('userfile/infovis/css/base.css') ?>" rel="stylesheet" />
<link href="<?php echo base_url('userfile/infovis/css/RGraph.css') ?>" rel="stylesheet" />


<!-- JIT Library File -->
<script language="javascript" type="text/javascript" src="<?php echo base_url('userfile/infovis/jit.js') ?>"></script>

<!-- Example File -->
<script language="javascript" type="text/javascript" src="<?php echo base_url('userfile/infovis/example12.js') ?>"></script>




<link rel="icon" href="<?php echo base_url('userfile/images/favicon.ico') ?>">
<link rel="shortcut icon" href="<?php echo base_url('userfile/images/favicon.ico') ?>">

<!-- =======================================================w
    Theme Name: Moderna
    Theme URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
======================================================= -->

</head>



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
         function(data) { console.log(data); json = data;},
         function(xhr) { console.error(xhr); }
);
    // var json2 = $.getJSON('http://163.18.53.149/IICwebsite/ci315/index.php/search/jsont');
    // var s = JSON.parse(json2);
   // window.alert(window.jsons);
   // console.log('fuck me');

</script>

<body >
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url('index.php')?>" ><img src='<?php echo base_url('userfile/images/logo02.jpg')?>'></a>

                </div>
                <div class="navbar-collapse collapse ">
                    
                    <ul class="nav navbar-nav">
                        <li id="menu-button-index" ><a href="<?php echo base_url('index.php')?>">首頁</a></li>
                        <li id="menu-button-descript" ><a href="<?php echo base_url('index.php/description')?>">中心簡介</a></li>
                        <li id="menu-button-new"><a  href="<?php echo base_url('index.php/news')?>">最新消息</a></li>
                        <li id="menu-button-team"><a  href="<?php echo base_url('index.php/team')?>">服務團隊</a></li>
                        <li id="menu-button-search"><a href="<?php echo base_url('index.php/search')?>">人才搜尋</a></li>
                        <li id="menu-button-coorp" ><a href="<?php echo base_url('index.php/coorp')?>">進駐辦法</a></li>
                        <li id="menu-button-manufacter" ><a href="<?php echo base_url('index.php/manufacture')?>">廠商櫥窗</a></li>
                        <li id="menu-button-activity" ><a href="<?php echo base_url('index.php/portfolio')?>">活動花絮</a></li>
                        <li id="menu-button-patner" ><a href="<?php echo base_url('index.php/patner')?>">策略夥伴</a></li>
                        <li id="menu-button-location"><a href="<?php echo base_url('index.php/location')?>">地理位置</a></li>

                        <!-- Menu Button active controller -->
                        <script type="text/javascript">
                        
                            var loc = window.location.pathname.split('/');
                            lastSegment = loc.pop() || loc.pop();
                           
                            switch (lastSegment){
                                case 'IICwebsite':
                                    document.getElementById("menu-button-index").classList.add("active");
                                    break;
                                case 'index.php':
                                    document.getElementById("menu-button-index").classList.add("active");
                                    break;
                                case 'description':
                                    document.getElementById("menu-button-descript").classList.add("active");
                                    break;
                                case 'news':
                                    document.getElementById("menu-button-new").classList.add("active");
                                    break;
                                case 'team':
                                    document.getElementById("menu-button-team").classList.add("active");
                                    break;
                                case 'search':
                                    document.getElementById("menu-button-search").classList.add("active");
                                    break;
                                case 'coorp':
                                    document.getElementById("menu-button-coorp").classList.add("active");
                                    break;
                                case 'manufacture':
                                    document.getElementById("menu-button-manufacter").classList.add("active");
                                    break;
                                case 'portfolio':
                                    document.getElementById("menu-button-activity").classList.add("active");
                                    break;
                                case 'patner':
                                    document.getElementById("menu-button-patner").classList.add("active");
                                    break;
                                case 'location':
                                    document.getElementById("menu-button-location").classList.add("active");
                                    break;


                            }

                           


                        </script>


                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->