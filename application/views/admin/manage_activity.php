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
        <i class="fa fa-table"></i> Data Table Example</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>關連鍵值</th>
                        <th>活動標題</th>
                        <th>活動日期</th>
                        <th>活動內容</th>
                        <th>活動照片</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    <div id="customForm">
    </div>
</div>
<style>
    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 500px;
            margin: 1.75rem auto;
        }
    }
</style>
<script>

    // initialize DataTable.Editor
    var editor = new $.fn.dataTable.Editor( {
        ajax:  '<?=base_url()?>/admin/DataTableEditor/activity',
        table: '#dataTable',
        fields: [
            {label: '關連鍵值', name: 'ac_id', type: 'readonly'},
            {label: '活動標題', name: 'ac_title'},
            {label: '活動日期', name: 'ac_date', type: 'date'},
            {label: '活動內容', name: 'ac_cont', type: 'textarea'},
            {label: '活動照片', name: 'ac_img[].id',
                type: 'uploadMany', display: function (fileID, counter) {
                    var display = '<img src="<?=base_url('uploads/')?>'
                        + editor.file('ac_img', fileID).img + '"/>';
                    return display
                },
                noFileText: 'No images'
            }
            // etc
        ]
    } );
    // no error message.
        $.fn.DataTable.ext.errMode = 'none';
    // initialize DataTable
    var table = $('#dataTable').DataTable( {
        ajax: '<?=base_url()?>/admin/DataTableEditor/activity',
        dom: 'lBfrtip',
        columns: [
            { data: 'ac_id', width:70  },
            { data: 'ac_title'  },
            { data: 'ac_date'  },
            { data: 'ac_cont'  },
            {
                data: 'ac_img',
                render: function (d) {
                    return d.length ?
                        d.length + 'image(s)':
                        'No image';
                },
                title: 'activity_Image'
            }
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