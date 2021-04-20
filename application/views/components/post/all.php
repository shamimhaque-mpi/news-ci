<style>
    .table img {transition: all .2s;}
    .table img:hover {transform: scale(2.5);}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Post</h1>
                </div>
            </div>

            <div class="panel-body">
                <?=msg(); ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="50">SL</th>
                            <th>Date</th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Menu</th>
                            <th>Sub Menu</th>
                            <th>Total Visitors</th>
                            <th width="110" class="text-right">Action</th>
                        </tr>
                        <?php if($news) foreach($news as $key=>$row) { ?>
                        <tr>
                            <td><?=(++$key)?></td>
                            <td><?=($row->date)?></td>
                            <td>
                                <img src="<?=site_url($row->img)?>" height="25">
                            </td>
                            <td><?=($row->title)?></td>
                            <td><?=($row->menu)?></td>
                            <td><?=($row->submenu_id ? get_name('sub_menus', 'name', ['id'=>$row->submenu_id]) : 'N/A')?></td>
                            <td>000</td>
                            <td class="text-right">
                                <a class="btn btn-primary" href="<?php echo site_url('post/Post/edit/'.$row->id.'?system_id=NjdfMTIy') ;?>"><i class="fa fa-pencil-square-o"></i></a>
                                <a class="btn btn-danger"  onclick="return confirm('Are you sure to delete this data?');" href="<?php echo site_url('post/Post/delete/'.$row->id); ?>"><i class="fa fa-trash"></i></a>
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
