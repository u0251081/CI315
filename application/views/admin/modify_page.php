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
$contents = isset($file_contents)? $file_contents:'';
?>
<!-- Breadcrumbs-->
<script src="<?=base_url('userFile/adminSet/ckEditor/ckEditor.js')?>"></script>
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
        <h1><?=$page_active?></h1>
<!--        <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>-->
<!--        <form action="#" method="post" onsubmit="false">-->
        <?=form_open('admin/modify_page/update_page')?>
            <input type="button" value="save" onclick="" />
            <input type="hidden" name="file_path" value="<?=$file_path?>">
            <textarea name="file_contents" id="content" rows="80" cols="80" >
                <?=$contents?>
            </textarea>
        </form>
    </div>
</div>
<script>
    CKEDITOR.replace( 'file_contents', {});
    function processData(){
        // getting data
        var data = CKEDITOR.instances.content.getData()
        alert(data);
        return false;
    }
</script>