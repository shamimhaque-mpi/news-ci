<style>
    @media screen and (min-width: 768px) {
        .control-label {text-align: right;}
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Menu</h1>
                </div>
            </div>

            <div class="panel-body">
                <?=msg(); ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-1">
                            <div class="row">
                                <label class="col-sm-3 control-label">Menu Name <span class="req">*</span></label>
                                <div class="col-sm-9 form-group">
                                    <input type="text" name="name" value="<?=($menu->name)?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label">Menu URL <span class="req">*</span></label>
                                <div class="col-sm-9 form-group">
                                    <input type="text" name="url" value="<?=($menu->url)?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
