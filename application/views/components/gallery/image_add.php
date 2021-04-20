<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Gallery</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="<?php echo get_url("gallery/Gallery/add_image"); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Image Title <span class="req">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="img_name" placeholder="Enter Image Title..." class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Short Description <span class="req">*</span></label>
                        <div class="col-md-7">
                            <textarea name="short_description" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Photos <span class="req">*</span></label>
                        <div class="col-md-7">
                            <input type="file" name="img" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
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
                    <h1>All Image</h1>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="50">SL</th>
                        <th>Img</th>
                        <th>Name Title</th>
                        <th>Description</th>
                        <th width="115" class="text-right">Action</th>
                    </tr>

                    <?php if($img){ foreach($img as $key => $value){ ?>
                    <tr>
                        <td><?php echo ++$key; ?></td>
                        <td><?php echo isset($value->img_path) ? "<img height='60' src='".site_url($value->img_path)."' alt=''" : ''; ?></td>
                        <td><?php echo isset($value->img_name) ? $value->img_name : ''; ?></td>
                        <td><?php echo isset($value->short_description) ? $value->short_description : ''; ?></td>
                        <td class="text-right">
                            <a class="btn btn-warning" href="<?php echo get_url("gallery/Gallery/img_edit/{$value->id}"); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="btn btn-danger" href="<?php echo get_url("gallery/Gallery/img_delete/{$value->id}"); ?>" onclick="return confirm('Are your sure to proccess this action ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php }}else{ echo "<h2 class='text-center'>No Data</h2>";} ?>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
