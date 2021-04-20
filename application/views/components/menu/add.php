<style>
    .control-label input[type="checkbox"] {
        margin: 4px 6px 6px 5px;
        display: inline-block;
        vertical-align: middle;
    }
    @media screen and (min-width: 768px) {
        .control-label {text-align: right;}
    }
</style>

<div class="container-fluid">
    <div class="row">
        <?=msg(); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Menu</h1>
                </div>
            </div>

            <div class="panel-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-1">
                            <div class="row">
                                <label class="col-sm-3 control-label">Menu Name <span class="req">*</span></label>
                                <div class="col-sm-9 form-group">
                                    <input type="text" name="name"  class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label">Menu URL <span class="req">*</span></label>
                                <div class="col-sm-9 form-group">
                                    <input type="text" name="url"  class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label">Is Home Page? <span class="req">*</span></label>
                                <div class="col-sm-3 form-group">
                                    <select name="news_sizse" class="form-control" required>
                                        <option value="" disabled>Select Condition</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <select name="news_sizse" class="form-control" required>
                                        <option value="" disabled>Select Size</option>
                                        <option value="large">large</option>
                                        <option value="medium">Medium</option>
                                        <option value="small">Small</option>
                                    </select>
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
