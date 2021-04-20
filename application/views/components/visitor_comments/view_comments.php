<style>
    @media print{
        aside{
            display: none !important;
        }
        nav{
            display: none;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .panel-heading{
            display: none;
        }
        
        .panel-footer{
            display: none;
        }
        .panel .hide{
            display: block !important;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">View Messages</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <h4 style="margin: 0 0 15px 0;">
                            <strong>Subject: </strong><?php echo $messages[0]->subject; ?>
                        </h4>
                        <h5>
                            <strong>Name: </strong><?php echo $messages[0]->name; ?> | 
                            <small><strong>From:</strong><?php echo $messages[0]->email; ?></small>
                        </h5>
                        <strong>Message:</strong>
                        <p><?php echo $messages[0]->message; ?></p>     
                    </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>