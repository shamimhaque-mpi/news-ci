<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
<style>
    .control-label input[type="checkbox"] {
        margin: 4px 6px 6px 5px;
        display: inline-block;
        vertical-align: middle;
    }
    .tags_file .bootstrap-tagsinput {
        display: block;
        width: 100%;
        padding: 6px 12px;
        font-size: 14px;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 0;
    }
    @media screen and (min-width: 768px) {
        .control-label {text-align: right;}
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Post</h1>
                </div>
            </div>

            <?=msg(); ?>
            <div class="panel-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-9 col-lg-offset-1">
                            <div class="row">
                                <label class="col-sm-3 control-label">Title <span class="req">*</span></label>
                                <div class="col-sm-9 form-group">
                                    <input type="text" name="title" value="<?=($news->title)?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label">Menu <span class="req">*</span></label>
                                <div class="col-sm-9 form-group">
                                    <select name="menu_id" id="menu_id" class="form-control menu_selectpicker" data-show-subtext="true" data-live-search="true" required>
                                        <option value="" disabled>Select Menu</option>
                                        <?php if($menus) foreach($menus as $key=>$row){ ?>
                                        <option value="<?=($row->id)?>" <?=($row->id==$news->menu_id ? 'selected':'')?>><?=($row->name)?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label">Sub Menu</label>
                                <div class="col-sm-9 form-group">
                                    <div id="submenu">
                                        <select name="submenu_id" id="sub_menu_id" class="form-control menu_selectpicker" data-show-subtext="true" data-live-search="true">
                                            <option value="" disabled>Select Sub Menu</option>
                                            <?php if($sub_menus) foreach($sub_menus as $key=>$row){ ?>
                                            <option value="<?=($row->id)?>" <?=($row->id==$news->submenu_id ? 'selected':'')?>><?=($row->name)?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label">Tags</label>
                                <div class="col-sm-9 form-group tags_file">
                                    <input type="text" name="tags" id="tags" data-role="tagsinput" value="<?=($news->tags)?>" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label">Description <span class="req">*</span></label>
                                <div class="col-sm-9 form-group">
                                    <textarea  name="description" rows="10" placeholder="Enter Description..." class="form-control" required><?=($news->description)?></textarea>
                                    <!--<textarea  name="description" rows="10" placeholder="Enter Description..." class="form-control" id="mytextarea" required></textarea>-->
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 control-label">Photos </label>
                                <div class="col-md-9 form-group">
                                    <input type="file" name="img" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3"></label>
                                <div class="col-sm-6 form-group">
                                    <label class="control-label"><input type="checkbox" name="is_latest" value="1" <?=($news->is_latest == 1 ? 'checked':'')?>>This Latest News?</label>
                                    <label class="control-label"><input type="checkbox" name="is_feature" value="1" <?=($news->is_feature == 1 ? 'checked':'')?>>Feature</label>
                                    <label class="control-label"><input type="checkbox" name="is_publish" value="1" <?=($news->is_publish == 1 ? 'checked':'')?>>Publish</label>
                                </div>
                                <div class="col-sm-3 form-group text-right">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script>

    (()=>{
        window.addEventListener('load', ()=>{
            _x('#menu_id').onchange = ()=>{
                var menu_id = _x('#menu_id').value;
                var data = new FormData();
                data.append('menu_id', menu_id);
                http(data, 'category');
            };
        });
        
        function submenu(response){
            var options = '';
            Object.values(response).forEach((row)=>{
                options += `<option value="${row.id}">${row.name}</option>`;
            });
            var tag = `
                <select name="submenu_id" id="submenu_id" class="form-control" data-show-subtext="true" data-live-search="true">
                    <option value="">Select Sub-Menu</option>
                    ${options}
                </select>
            `;
            _x('#submenu').innerHTML = tag;
            $('#submenu_id').selectpicker();
        }
        
        function http(data, type){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  if(type=='category'){
                      submenu(JSON.parse(this.responseText));
                  }
                }
            };
            xhttp.open("POST", "<?=site_url('post/post/ajax')?>", true);
            xhttp.send(data);
        }
        var _x = (x)=>document.querySelector(x);
    })();
    
    
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    
	tinymce.init({
		selector: '#mytextarea'
	});
	
	
    $('.menu_selectpicker').selectpicker();
    
    // https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/
    $("#tags").val();
    $("#tags").tagsinput('items');
</script>