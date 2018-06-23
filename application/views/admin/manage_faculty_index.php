<?php
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/5/17
 * Time: 上午 10:34
 */
// blank template
$page_title = isset($title)? $title: 'title';
$page_active = isset($active)? $active: 'active';
$colleges = isset($colleges)? $colleges:'';
$departments = isset($departments)? $departments:'';
$faculty = isset($faculty)? $faculty:'';
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?=base_url('admin');?>">
            <?= $page_title?>
        </a>
    </li>
    <li class="breadcrumb-item active">
        <?= $page_active?>
    </li>
</ol>
<div class="row">
    <div class="col-12">
        <h1><?=$page_title?></h1>
        <p>教師相關資訊管理</p>
    </div>
</div>
<div class="card mb-3">
    <a href="<?=$colleges?>" >學院代號管理</a>
    <a href="<?=$departments?>" >系所代號管理</a>
    <a href="<?=$faculty?>" >教師資訊管理</a>
    <div class="card-footer small text-muted"></div>
</div>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>