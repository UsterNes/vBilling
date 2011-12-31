<br/>
<div class="success" id="success_div" style="display:none;"></div>

<!--POP UP ATTRIBUTES-->
<?php 
    $atts = array(
                  'width'      => '800',
                  'height'     => '600',
                  'scrollbars' => 'yes',
                  'status'     => 'yes',
                  'resizable'  => 'yes',
                  'screenx'    => '0',
                  'screeny'    => '0'
                );
?>
<!--END POP UP ATTRIBUTES-->

<!--********************************FILTER BOX************************-->
<div style="text-align:center;padding:10px">
    <div class="button white">
    <div style="color:green; font-weight:bold;">
        <?php echo $msg_records_found;?> 
    </div>
    
    <div style="margin-top:5px;margin-bottom:-5px;">
        <a href="#" alt="Export As PDF" title="Export As PDF" class="exp_pdf"><img src="<?php echo base_url();?>assets/images/export-pdf.gif"/></a>
        <a href="#" alt="Export As EXCEL" title="Export As EXCEL" class="exp_exl"><img src="<?php echo base_url();?>assets/images/export-excel.png"/></a>
        <a href="#" alt="Export As CSV" title="Export As CSV" class="exp_csv"><img src="<?php echo base_url();?>assets/images/export-csv.png"/></a>
    </div>
    
    <form method="get" action="<?php echo base_url();?>cdr/" id="filterForm"> 
        <table width="100%" cellspacing="0" cellpadding="0" border="0" id="filter_table">
             
                <tr>
                    <td width="8%">
                        Date From
                    </td>

                    <td width="8%">
                        Date To
                    </td>
                    
                    <td width="8%">
                        Quick Filter
                    </td>
                    
                    <td width="8%">
                        Duration From
                    </td>

                    <td width="8%">
                        Duration To
                    </td>

                    <td width="8%">
                        Phone Num
                    </td>

                    <td width="8%">
                        Caller IP
                    </td>
                    
                    <td width="8%">
                        Customers
                    </td>
                    
                    <td width="8%">
                        Groups
                    </td>
.
                    <td width="8%">
                        Gateways
                    </td>

                    <td width="8%">
                        Call Type
                    </td>
                    
                    <td width="8%">
                        Display Results In
                    </td>

                    <td width="8%" rowspan="2">
                        <input type="submit" id="searchFilter" name="searchFilter" value="SEARCH" class="button blue" style="float:right;margin-top:5px;margin-right:10px" />
                    </td>
                    
                    <td width="6%" rowspan="2">
                        <a href="#" id="reset" class="button orange" style="float:left;margin-top:5px;">RESET</a>
                    </td>
                
                </tr>
            
                <tr>
                    <td><input type="text" name="filter_date_from" id="filter_date_from" value="<?php echo $filter_date_from;?>" class="datepicker" readonly></td>
                    <td><input type="text" name="filter_date_to" id="filter_date_to" value="<?php echo $filter_date_to;?>" class="datepicker" readonly></td>
                    
                    <td>
                        <select name="filter_quick" id="filter_quick">
                            <option value="">Select</option>
                            <option value="today" <?php if($filter_quick == 'today'){ echo "selected";}?>>Today</option>
                            <option value="last_hour" <?php if($filter_quick == 'last_hour'){ echo "selected";}?>>Last Hour</option>
                            <option value="last_24_hour" <?php if($filter_quick == 'last_24_hour'){ echo "selected";}?>>Last 24 Hour</option>
                        </select>
                    </td>
                    
                    <td><input type="text" name="duration_from" value="<?php echo $duration_from;?>" class="numeric" maxlength="4"></td>
                    <td><input type="text" name="duration_to" value="<?php echo $duration_to;?>" class="numeric" maxlength="4"></td>
                    
                    <td><input type="text" name="filter_phonenum" value="<?php echo $filter_phonenum;?>" class="numeric"></td>
                    <td><input type="text" name="filter_caller_ip" value="<?php echo $filter_caller_ip;?>" class="ip"></td>
                    
                    <td>
                        <select name="filter_customers">
                            <?php echo customer_drop_down($filter_customers);?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="filter_groups">
                            <?php echo show_group_select_box($filter_groups);?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="filter_gateways">
                            <?php 
                                if($filter_gateways != '')
                                {
                                    if (strpos($filter_gateways,'|') !== false) {
                                        $explode = explode('|', $filter_gateways);
                                        $gateway = $explode[0];
                                        $profile = $explode[1];
                                        if(isset($gateway) && isset($profile))
                                        {
                                            if(!is_numeric($profile))
                                            {
                                                $gateway = '';
                                                $profile = '';
                                            }
                                        }
                                        else
                                        {
                                            $gateway = '';
                                            $profile = '';
                                        }
                                    }
                                    else
                                    {
                                        $gateway = '';
                                        $profile = '';
                                    }
                                }
                                else
                                {
                                    $gateway = '';
                                    $profile = '';
                                }
                            ?>
                            <?php echo gateways_drop_down($gateway, $profile);?>
                        </select>
                    </td>

                    <td>
                        <select name="filter_call_type">
                            <?php echo hangup_causes_drop_down($filter_call_type);?>
                        </select>
                    </td>
                    
                    <td>
                        <select name="filter_display_results">
                            <option value="min" <?php if($filter_display_results == 'min'){ echo "selected";}?>>Minutes</option>
                            <option value="sec" <?php if($filter_display_results == 'sec'){ echo "selected";}?>>Seconds</option>
                        </select>
                    </td>
                    
                </tr>
            
        </table>
    </form>
    </div>
</div>
<!--***************** END FILTER BOX ****************************-->

<table style="border: 1px groove;" width="100%" cellpadding="0" cellspacing="0">
        <tbody><tr>
            <td>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    
                    <tr class="bottom_link">
                        <td height="20" width="8%" align="center">Date/Time</td>
                        <td width="7%" align="center">Destination</td>
                        <td width="7%" align="center">Bill Duration</td>
                        <td width="7%" align="center">Hangup Cause</td>
                        <td width="7%" align="center">IP Address</td>
                        <td width="7%" align="center">Username</td>
                        <td width="7%" align="center">Sell Rate</td>
                        <td width="7%" align="center">Sell Init Block</td>
                        <td width="7%" align="center">Cost Rate</td>
                        <td width="7%" align="center">Buy Init Block</td>
                        <td width="7%" align="center">Total Charges</td>
                        <td width="7%" align="center">Total Cost</td>
                        <td width="7%" align="center">Margin</td>
                        <td width="7%" align="center">Markup</td>
                    </tr>
                    
                    <?php if($cdr->num_rows() > 0) {?>
                        
                        <?php foreach ($cdr->result() as $row): ?>
                            <tr class="main_text">
                                <td align="center" height="30"><?php echo date("Y-m-d H:i:s", $row->created_time/1000000); ?></td>
                                <td align="center"><?php echo $row->destination_number; ?></td>
                                
                                <?php 
                                    if($filter_display_results == 'sec')
                                    {
                                        $billsec        = $row->billsec; // by default bill is in sec
                                        
                                        $sellrate       = $row->sell_rate / 60; // sell rate per sec
                                        $sellrate       = round($sellrate, 4);
                                        
                                        $costrate       = $row->cost_rate / 60; // cost rate per sec
                                        $costrate       = round($costrate, 4);
                                    }
                                    else
                                    {
                                        $billsec        = $row->billsec / 60; // convert to min
                                        $billsec        = round($billsec, 4);
                                        
                                        $sellrate       = $row->sell_rate; // sell rate by default is in min 
                                        $costrate       = $row->cost_rate; // cost rate by default is in min
                                    }
                                ?>
                                <td align="center"><?php echo $billsec.'&nbsp;'.$filter_display_results; ?></td>
                                <td align="center"><?php echo $row->hangup_cause; ?></td>
                                <td align="center"><?php echo $row->network_addr; ?></td>
                                <td align="center"><?php echo anchor_popup('customers/edit_customer/'.$row->customer_id.'', $row->username, $atts); ?></td>
                                <td align="center"><?php echo $sellrate.'&nbsp;/&nbsp'.$filter_display_results; ?></td>
                                <td align="center"><?php echo $row->sell_initblock; ?></td>
                                <td align="center"><?php echo $costrate.'&nbsp;/&nbsp'.$filter_display_results; ?></td>
                                <td align="center"><?php echo $row->buy_initblock; ?></td>
                                
                                <?php if(($row->hangup_cause == 'NORMAL_CLEARING' || $row->hangup_cause == 'ALLOTTED_TIMEOUT') && $row->billsec > 0) {?>
                                    <td align="center"><?php echo $row->total_sell_cost; ?></td>
                                <?php } else { ?>
                                    <td align="center">0</td>
                                <?php } ?>
                                
                                <?php if(($row->hangup_cause == 'NORMAL_CLEARING' || $row->hangup_cause == 'ALLOTTED_TIMEOUT') && $row->billsec > 0) {?>
                                    <td align="center"><?php echo $row->total_buy_cost; ?></td>
                                <?php } else { ?>
                                    <td align="center">0</td>
                                <?php } ?>
                                
                                
                                <td align="center">&nbsp;</td>
                                <td align="center">&nbsp;</td>
                            </tr>
                        <?php endforeach;?>
                           
                    <?php } else { echo '<tr><td align="center" style="color:red;" colspan="14">No Results Found</td></tr>'; } ?>
                    </tbody>
                </table>
            </td>
        </tr>
        
        <tr>
            <td id="paginationWKTOP">
                <?php echo $this->pagination->create_links();?>
            </td>
        </tr>
        
    </tbody></table>
    
    <script type="text/javascript">
        $('.datepicker').datetimepicker({
            showSecond: true,
            showMillisec: false,
            timeFormat: 'hh:mm:ss',
            dateFormat: 'yy-mm-dd'
        });
        
        $('.ip').numeric({allow:"."});
        $('.numeric').numeric({allow:"."});
        
        $('#reset').live('click', function(){
            $('#filter_table input[type="text"]').val('');
            $('#filter_table select').val('');
            return false;
        });
        
        $('#filter_quick').live('change', function(){
            var val = $(this).val();
            $.ajax({
                type: "POST",
                url: base_url+"cdr/get_calculated_date_time",
                data: 'val='+val,
                success: function(html){
                    var split = html.split('|');
                    $('#filter_date_from').val(split[0]);
                    $('#filter_date_to').val(split[1]);
                }
            });
        });
        
        $('.exp_pdf').live('click', function(){
            $('#filterForm').attr('action', ''+base_url+'cdr/export_pdf/');
            $('#filterForm').submit();
            return false;
        });
        
        $('.exp_exl').live('click', function(){
            $('#filterForm').attr('action', ''+base_url+'cdr/export_excel/');
            $('#filterForm').submit();
            return false;
        });
        
        $('.exp_csv').live('click', function(){
            $('#filterForm').attr('action', ''+base_url+'cdr/export_csv/');
            $('#filterForm').submit();
            return false;
        });
        
        
        $('#searchFilter').click(function(){
            $('#filterForm').attr('action', ''+base_url+'cdr/');
        });
    </script>