<style type="text/css">
    #sending-img{
        display: none;
        width: 40px;
        height: 40px;
    }
    #sms_report{
        display: none;
        color: #00A8FF;
        font-weight: bold;
        font-size: 16px;
    }
</style>
<div class="container-fluid">
    <div class="row">
    <?php
        msg();
     ?>    
      <?php if($messages != NULL) { ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>All Message</h1>
                </div>
            </div>

            <div class="panel-body">
            <div class="panel-heading panal-header">
                <div class="panal-header-title">
                  
              
                    <div class="pull-left">
                      <label class="btn2">Check All&nbsp;<input type="checkbox" name="" id="check-all"/></label>&nbsp;
                    <?php /*  <button onclick="return confirm('Are You Sure To Restore Selected Data?');" form="trash-form" value="restore_all" name="restore_all" class="btn1" id="restore-all"><i class="fa fa-undo" aria-hidden="true"></i></button> */ ?>
                      
                     <button onclick="return confirm('Are You Sure To Delete Selected Comments?');" form="trash-form" value="delete_all" name="delete_all" class="btn1" id="delete-all"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                      
                    </div>
                    <h1 class="pull-right">Trash </h1>
                </div>
            </div>
            <?php
              $attr = array("id" => "trash-form");
            ?>
            <?php echo form_open("",$attr); ?>
            
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                <?php foreach ($messages as $key => $message) { ?>
                    <tr>
                        <td><input type="checkbox" name="id[]" value="<?php echo $message->id; ?>"  class="trash_check" id="trash_check"</td>
                        <td><?php echo $message->name;?> </td>
                        <td><?php echo $message->email;?></td>
                        <td><?php echo $message->subject;?></td>
                        <td class="none" style="width: 160px;">
                            <a title="View" class="btn btn-primary" href="<?php echo base_url('visitors/comments/view_comments')?>?id=<?php echo $message->id; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a title="Delect" onclick="return confirm('Are you sure want to delete this Data?');" class="btn btn-danger" href="?id=<?php echo $message->id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </table>
                

              </div>
            <div class="panel-footer">&nbsp;</div>
          </div>
           <?php echo form_close(); ?> 
        <?php } ?> 
         
    </div>
</div>


    <script>
        
        $(document).ready(function(){
          $("#check-all").on('change', function(event) {
              if($("#check-all").is(":checked")){
                $(".trash_check").prop("checked", true);
              }else{
                $(".trash_check").prop("checked", false);
              }
          });
        });
        
        
        

    
    
    
    
    </script>