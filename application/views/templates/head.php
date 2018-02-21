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
<link href="<?php echo base_url('userfile/') ?>tests/css/style.css" rel="stylesheet" />
<link href="<?php echo base_url('userfile/') ?>tests/css/defaults.css" rel="stylesheet" />
<link href="<?php echo base_url('userfile/tests/css/flexslider.css') ?>" rel="stylesheet" />

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
    var json
    function loadJSON(path, success, error)
        {
            
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
    loadJSON('http://163.18.53.149/IICwebsite/ci315/index.php/home/jsont',
         function(data) { console.log(data); json = data;},
         function(xhr) { console.error(xhr); }
);
    // var json2 = $.getJSON('http://163.18.53.149/IICwebsite/ci315/index.php/search/jsont');
    // var s = JSON.parse(json2);
   // window.alert(window.jsons);
   // console.log('fuck me');

</script>

<body onload="init(window.json);">
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
                        <li><a href="<?php echo base_url('index.php')?>">首頁</a></li>
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">中心簡介 <b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('index.php')?>">創立緣起</a></li>
                                <li><a href="<?php echo base_url('index.php')?>">中心任務</a></li>
								<li><a href="<?php echo base_url('index.php')?>">組織架構</a></li>
								<li><a href="<?php echo base_url('index.php')?>">培育領域</a></li>
								<li><a href="<?php echo base_url('index.php')?>">培育資源</a></li>
								<li><a href="<?php echo base_url('index.php')?>">空間租用</a></li>

                            </ul>
                        </li>
                        <li><a href="<?php echo base_url('index.php')?>">最新消息</a></li>
                        <li><a href="<?php echo base_url('index.php/home/about')?>">服務團隊</a></li>
                        <li class="active"><a href="<?php echo base_url('index.php')?>">人才搜尋</a></li>
                        <li><a href="<?php echo base_url('index.php')?>">進駐辦法</a></li>
                        <li><a href="<?php echo base_url('index.php')?>">廠商櫥窗</a></li>
                        <li><a href="<?php echo base_url('index.php')?>">活動花絮</a></li>
                        <li><a href="<?php echo base_url('index.php')?>">策略夥伴</a></li>
                        <li><a href="<?php echo base_url('index.php')?>">地理位置</a></li>
                       
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->