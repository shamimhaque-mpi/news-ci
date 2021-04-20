<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Video</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="<?php echo get_url("gallery/Gallery/add_video"); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Video Name <span class="req">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="video_name" placeholder="Enter video Name..." class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Video Link <span class="req">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="video_path" placeholder="Enter Video extension..." class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="pull-right">
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Video</h1>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="50">SL</th>
                        <th>Img</th>
                        <th>Name</th>
                        <th>video_path</th>
                        <th width="115" class="text-right">Action</th>
                    </tr>

                    <?php if($video){ foreach($video as $key => $value){ ?>
                    <tr>
                        <td><?php echo ++$key; ?></td>
                        <td>
                            <img src="https://img.youtube.com/vi/<?=($value->video_path) ?>/mqdefault.jpg" height='60'>
                        </td>
                        <td><?php echo isset($value->video_name) ? $value->video_name : ''; ?></td>
                        <td><?php echo isset($value->video_path) ? $value->video_path : ''; ?></td>
                        <td class="text-right">
                            <a class="btn btn-warning" href="<?php echo get_url("gallery/Gallery/vdo_edit/{$value->id}"); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="btn btn-danger" href="<?php echo get_url("gallery/Gallery/vdo_delete/{$value->id}"); ?>" onclick="return confirm('Are your sure to proccess this action ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php }}else{ echo "<h2 class='text-center'>no data</h2>";} ?>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
