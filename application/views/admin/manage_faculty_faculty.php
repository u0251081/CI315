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
        <i class="fa fa-table"></i> 教師資訊</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>學院</th>
                    <th>系所</th>
                    <th>姓名</th>
                    <th>職銜</th>
                    <th>分機</th>
                    <!--<th>傳真</th>-->
                    <th>e-mail</th>
                    <th>classify</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Update none</div>
    <div id="customForm">
        <fieldset class="idarea">
            <editor-field name="a.id"></editor-field>
        </fieldset>
        <fieldset class="office">
            <legend>College and Department</legend>
            <editor-field name="a.college"></editor-field>
            <editor-field name="a.department"></editor-field>
        </fieldset>
        <fieldset class="name">
            <legend>Name and Title</legend>
            <editor-field name="a.name"></editor-field>
            <editor-field name="a.PP"></editor-field>
        </fieldset>
        <fieldset class="contact">
            <legend>Contact Way</legend>
            <editor-field name="a.phone"></editor-field>
            <editor-field name="a.extension"></editor-field>
            <editor-field name="a.fax"></editor-field>
            <editor-field name="a.email"></editor-field>
        </fieldset>
        <fieldset class="moreInfo">
            <legend>More Information</legend>
            <editor-field name="a.classify"></editor-field>
            <editor-field name="a.specialized"></editor-field>
        </fieldset>
    </div>
</div>
<style>
    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 1000px;
            margin: 1.75rem auto;
        }
    }
    #customForm {
        display: flex;
        flex-flow: row wrap;
    }

    #customForm fieldset {
        flex: 1;
        border: 1px solid #aaa;
        margin: 0.5em;
    }

    #customForm fieldset legend {
        padding: 5px 20px;
        border: 1px solid #aaa;
        font-weight: bold;
    }
    #customForm fieldset.idarea {
        flex: 2 100%;
    }
    #customForm fieldset.office fieldset.name {
        flex: 1 48%;
    }

    #customForm fieldset.contact {
        flex: 1 100%;
    }

    #customForm fieldset.name legend {
        background: #bfffbf;
    }

    #customForm fieldset.office legend {
        background: #ffffbf;
    }

    #customForm fieldset.hr legend {
        background: #ffbfbf;
    }

    #customForm div.DTE_Field {
        padding: 5px;
    }
</style>
<script>

    // initialize DataTable.Editor
    var editor = new $.fn.dataTable.Editor( {
        ajax:  '<?=base_url()?>/admin/DataTableEditor/faculty',
        table: '#dataTable',
        template: '#customForm',
        fields: [
            {label: '關連鍵值', name: 'a.id', type:'readonly'},
            {label: '學院', name: 'a.college', type: 'select'},
            {label: '系所', name: 'a.department', type: 'select'},
            {label: '姓名', name: 'a.name'},
            {label: '職銜', name: 'a.PP'},
            {label: '電話', name: 'a.phone'},
            {label: '分機', name: 'a.extension'},
            {label: '傳真', name: 'a.fax'},
            {label: 'E-mail', name: 'a.email'},
            {label: '研究專長', name: 'a.specialized', type: 'textarea'},
            {label: '學門分類', name: 'a.classify'}
            // etc
        ]
    } );
    // no error message.
    $.fn.DataTable.ext.errMode = 'none';
    // initialize DataTable
    var table = $('#dataTable').DataTable( {
        ajax: '<?=base_url()?>/admin/DataTableEditor/faculty',
        dom: 'lBfrtip',
        columns: [
            { data: 'b.c_cname', width:40  },
            { data: 'c.d_cabbr', width:40 },
            { data: 'a.name', width:40  },
            { data: 'a.PP', width:40  },
            // { data: 'phone'  },
            { data: 'a.extension'  },
            // { data: 'a.fax'  },
            { data: 'a.email'  },
            // { data: 'specialized'  },
            { data: 'a.classify'  }
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