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
$page_table = isset($page_table)? $page_table: 'page_table';
?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#"><?=$page_title?></a>
    </li>
    <li class="breadcrumb-item active"><?=$page_active?></li>
</ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> 系所代號</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>關連鍵值</th>
                    <th>英文縮寫</th>
                    <th>中文縮寫</th>
                    <th>英文全名</th>
                    <th>中文全名</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Update none</div>
    <div id="customForm">
    </div>
</div>
<style>
    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 500;
            margin: auto;
        }
    }
</style>
<script>

    // initialize DataTable.Editor
    var editor = new $.fn.dataTable.Editor( {
        ajax:  '<?=base_url()?>/admin/DataTableEditor/departments',
        table: '#dataTable',
        fields: [
            {label: '關連鍵值', name: 'id'},
            {label: '英文縮寫', name: 'eabbr'},
            {label: '中文縮寫', name: 'cabbr'},
            {label: '英文全名', name: 'ename'},
            {label: '中文全名', name: 'cname'}
            // etc
        ]
    } );
    // no error message.
    $.fn.DataTable.ext.errMode = 'none';
    // initialize DataTable
    var table = $('#dataTable').DataTable( {
        ajax: '<?=base_url()?>/admin/DataTableEditor/departments',
        dom: 'lBfrtip',
        columns: [
            { data: 'id', width:40  },
            { data: 'eabbr', width: 40},
            { data: 'cabbr', width: 40},
            { data: 'ename'},
            { data: 'cname'}
            // etc
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
</script>