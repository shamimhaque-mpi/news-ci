<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
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
                    <h1>Add Sub Menu</h1>
                </div>
            </div>

            <div class="panel-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-1">
                            <div class="row">
                                <label class="col-sm-3 control-label">Select Menu Name <span class="req">*</span></label>
                                <div class="col-sm-9 form-group">
                                    <select name="menu_id" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required>
                                        <option value="" disabled>Select Menu</option>
                                        <?php if($menus) foreach($menus as $key=>$row){ ?>
                                        <option value="<?=($row->id)?>"><?=($row->name)?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label">Sub Menu Name <span class="req">*</span></label>
                                <div class="col-sm-9 form-group">
                                    <input type="text" name="name"  class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label">Menu URL </label>
                                <div class="col-sm-9 form-group">
                                    <input type="text" name="url"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>