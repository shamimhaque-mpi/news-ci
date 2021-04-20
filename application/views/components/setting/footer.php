<style>
    fieldset {
        padding: .35em .625em .75em;
        margin: 0 2px 20px 0;
        border: 1px solid #ccc;
    }
    legend {
        line-height: inherit;
        margin-bottom: 20px;
        font-size: 21px;
        display: block;
        color: #333;
        padding: 0;
        border: 0;
        width: auto;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add footer</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="<?php echo get_url("setting/setting/add_footer"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend>Contact Info :</legend>
                                <div class="col-md-6">
                                    <label class="control-label">Location</label>
                                    <div class="form-group">
                                        <input type="text" value="<?php echo isset($footer[0]->location) ? $footer[0]->location : ''; ?>" name="location" placeholder="Enter location..." class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Email</label>
                                    <div class="form-group">
                                        <input type="text" value="<?php echo isset($footer[0]->email) ? $footer[0]->email : ''; ?>" name="email" placeholder="Enter email..." class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Phone</label>
                                    <div class="form-group">
                                        <input type="text" value="<?php echo isset($footer[0]->phone) ? $footer[0]->phone : ''; ?>" name="phone" placeholder="Enter phone..." class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Facebook Link</label>
                                    <div class="form-group">
                                        <input type="text" value="<?php echo isset($footer[0]->fb_link) ? $footer[0]->fb_link : ''; ?>" name="fb_link" placeholder="Enter fb link..." class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Twitter Link</label>
                                    <div class="form-group">
                                        <input type="text" value="<?php echo isset($footer[0]->tw_link) ? $footer[0]->tw_link : ''; ?>" name="tw_link" placeholder="Enter Twitter link..." class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Youtube Link</label>
                                    <div class="form-group">
                                        <input type="text" value="<?php echo isset($footer[0]->youtube) ? $footer[0]->youtube : ''; ?>" name="youtube" placeholder="Enter youtube link..." class="form-control">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Sampadaka :</legend>
                                <div class="col-md-12">
                                    <label class="control-label">Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="editor_name" value="<?php echo isset($footer[0]->editor_name) ? $footer[0]->editor_name : ''; ?>" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Phone Number</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="editor_mobile" value="<?php echo isset($footer[0]->editor_mobile) ? $footer[0]->editor_mobile : ''; ?>" placeholder="Phone Number">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Prakasak :</legend>
                                <div class="col-md-12">
                                    <label class="control-label">Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="publisher_name" value="<?php echo isset($footer[0]->publisher_name) ? $footer[0]->publisher_name : ''; ?>" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Phone Number</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="publisher_mobile" value="<?php echo isset($footer[0]->publisher_mobile) ? $footer[0]->publisher_mobile : ''; ?>" placeholder="Phone Number">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>