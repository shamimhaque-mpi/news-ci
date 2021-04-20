<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Trash Sub Menu List</h1>
                </div>
            </div>

            <div class="panel-body">
                <?=msg(); ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="50">SL</th>
                            <th>Menu Name</th>
                            <th>Sub Menu</th>
                            <th>URL</th>
                            <th width="110" class="text-right">Action</th>
                        </tr>
                        <?php foreach ($sub_menus as $key => $row) { ?>
                        <tr>
                            <td> <?=(++$key)?> </td>
                            <td> <?=($row->name) ?> </td>
                            <td> <?=($row->menu) ?> </td>
                            <td> <?=($row->url ? $row->url : 'N/A') ?> </td>
                            <td class="text-right">
                                <a class="btn btn-danger"  onclick="return confirm('Are you sure to Restore this data?');" href="<?php echo site_url('menu/Menu/delete/'.$row->id); ?>"><i class="fa fa-history"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

