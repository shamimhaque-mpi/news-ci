    <?php 
        $settings = read('settings');
    ?>
    <div class="__print-border hide">
        <div class="__info">
    	    <h1 class="site_name"><?php echo ($settings?$settings[0]->site_name:"");?></h1>
    	    <h4><?php echo ($settings?$settings[0]->address:"");?></h4>
    	    <p>Mobile: <?php echo ($settings?$settings[0]->phone:"");?></p>
        </div>
    </div>
    
    <style>
        .__print-border {margin-bottom: 20px;}
        .hide {display: none;}
        .__info {text-align: center;}
        .__info h4 {font-size: 21px;}
        .__info p {font-size: 17px;}
        @page {
            margin-bottom: 25px;
            margin-top: 25px;
            size: auto;
        }
        @media print{
            .panel-body {padding: 15px 0 !important;}
            aside, nav, .none, .panel-footer, .print_none, .panel-heading, 
            .alert, .dataTables_length, .dataTables_filter, 
            .pagination,.block-hide, title {
        		display: none !important;
        	}
            .panel {
        		border: 1px solid transparent !important;
        		position: absolute !important;
        		width: 100% !important;
        		left: 0px !important;
        		top: 0px !important;
        	}
            .hide {display: block !important;}
            .site_name {
                text-transform: capitalize !important;
                color: #000 !important;
                margin-bottom: 0px;
                font-weight: 400;
                margin-top: 0px;
                font-size: 28px;
            }
            .table-bordered>tbody>tr>td, 
            .table-bordered>tbody>tr>th, 
            .table-bordered>tfoot>tr>td, 
            .table-bordered>tfoot>tr>th, 
            .table-bordered>thead>tr>td, 
            .table-bordered>thead>tr>th {
                border: 1px solid #515151 !important;
                padding: 8px;
            }
        }
    </style>