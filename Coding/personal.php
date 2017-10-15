<?php require_once('../include/config.inc.php');
$sql = 'SELECT * FROM userstable WHERE id='.$_GET['id'];
$data = $db->execute_dql($sql);
$data = $data[0];

$sql = 'SELECT * FROM generalizationtable WHERE generalization_type=1 AND from_account="'.$data['account_number'].'"';
$data_reacharge = $db->execute_dql($sql);
if(!empty($data_reacharge))
{
    foreach ($data_reacharge as $i=>$d)
    {
        $sql = ' SELECT * FROM userstable WHERE account_number="'.$d['from_account'].'"';
        $touser = $db->execute_dql($sql);
        $touser = $touser[0];
        $data_reacharge[$i]['user'] = $touser;
    }
}

//
$sql = 'SELECT * FROM generalizationtable WHERE generalization_type=2 AND from_account="'.$data['account_number'].'"';
$data_tot = $db->execute_dql($sql);
if(!empty($data_tot))
{
    foreach ($data_tot as $i=>$d)
    {
        $sql = ' SELECT * FROM userstable WHERE account_number="'.$d['from_account'].'"';
        $fromuser = $db->execute_dql($sql);
        $fromuser = $fromuser[0];
        $data_fromt[$i]['fromuser'] = $fromuser;

        $sql = ' SELECT * FROM userstable WHERE account_number="'.$d['to_account'].'"';
        $touser = $db->execute_dql($sql);
        $touser = $touser[0];
        $data_fromt[$i]['touser'] = $touser;
    }
}

//
$sql = 'SELECT * FROM generalizationtable WHERE generalization_type=2 AND to_account="'.$data['account_number'].'"';
$data_fromt = $db->execute_dql($sql);
if(!empty($data_fromt))
{
    foreach ($data_fromt as $i=>$d)
    {
        $sql = ' SELECT * FROM userstable WHERE account_number="'.$d['from_account'].'"';
        $fromuser = $db->execute_dql($sql);
        $fromuser = $fromuser[0];
        $data_fromt[$i]['fromuser'] = $fromuser;

        $sql = ' SELECT * FROM userstable WHERE account_number="'.$d['to_account'].'"';
        $touser = $db->execute_dql($sql);
        $touser = $touser[0];
        $data_fromt[$i]['touser'] = $touser;
    }
}

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/css/matrix-style.css" />
    <link rel="stylesheet" href="/css/matrix-media.css" />
    <link rel="stylesheet" href="/css/select2.css" />
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/jquery.gritter.css" />

    <!--    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->
    <link rel="stylesheet" href="/css/overwrite.css"/>

    <style>
        body,html{background:none;padding:10px;height:90%;min-height:1500px;}
    </style>
</head>
<body>
<form id="form1" runat="server">
    <!--breadcrumbs-->

    <!--Action boxes-->
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Transfer Records</h5>
                    <a href="List.aspx" style="display:inline-block;margin-top:10px;">
                        <i class="icon icon-refresh"></i>
                    </a>
                </div>
                <div class="widget-content padding">

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>From Account</th>
                            <th>To Account</th>
                            <th>Amount（$）</th>
                            <th>Before/After（$）</th>
                            <th>Remarks</th>
                            <th>CreateTime</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($data_tot))
                        {
                            foreach ($data_tot as $d)
                            {?>

                                <tr>
                                    <td><?php echo $d['from_account'];?>(<?php echo $d['fromuser']['first_name']?>.<?php echo $d['fromuser']['middle_name']?>.<?php echo $d['fromuser']['last_name']?>)</td>
                                    <td><?php echo $d['to_account'];?>(<?php echo $d['touser']['first_name']?>.<?php echo $d['touser']['middle_name']?>.<?php echo $d['touser']['last_name']?>)</td>
                                    <td><?php echo $d['amount']?></td>
                                    <td><?php echo $d['generalization_amount1']?>/<?php echo $d['generalization_amount2']?></td>
                                    <td><?php echo $d['description']?></td>
                                    <td><?php echo date('Y/m/d H:i:s',$d['created'])?></td>
                                </tr>

                            <?php }
                        }else{
                            ?>
                            <td colspan="6">No Data.</td>
                        <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Receivables</h5>
                    <a href="" style="display:inline-block;margin-top:10px;">
                        <i class="icon icon-refresh"></i>
                    </a>
                </div>
                <div class="widget-content padding">

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>From Account</th>
                            <th>To Account</th>
                            <th>Amount（$）</th>
                            <th>Before/After（$）</th>
                            <th>Remarks</th>
                            <th>CreateTime</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($data_fromt))
                        {
                            foreach ($data_fromt as $d)
                            {?>

                                <tr>
                                    <td><?php echo $d['from_account'];?>(<?php echo $d['fromuser']['first_name']?>.<?php echo $d['fromuser']['middle_name']?>.<?php echo $d['fromuser']['last_name']?>)</td>
                                    <td><?php echo $d['to_account'];?>(<?php echo $d['touser']['first_name']?>.<?php echo $d['touser']['middle_name']?>.<?php echo $d['touser']['last_name']?>)</td>
                                    <td><?php echo $d['amount']?></td>
                                    <td><?php echo $d['generalization_amount1']?>/<?php echo $d['generalization_amount2']?></td>
                                    <td><?php echo $d['description']?></td>
                                    <td><?php echo date('Y/m/d H:i:s',$d['created'])?></td>
                                </tr>

                            <?php }
                        }else{
                        ?>
                            <td colspan="6">No Data.</td>
                        <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Recharge Table</h5>
                    <a href="" style="display:inline-block;margin-top:10px;">
                        <i class="icon icon-refresh"></i>
                    </a>
                </div>
                <div class="widget-content padding">

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Recharge account</th>
                            <th>Amount（$）</th>
                            <th>Before / After（$）</th>
                            <th>Remarks</th>
                            <th>CreateTime</th>
                        </tr>
                        </thead>
                        <tbody>
                       <?php
                       if(!empty($data_reacharge))
                       {
                           foreach ($data_reacharge as $d)
                           {?>

                               <tr>
                                   <td><?php echo $d['user']['first_name']?>.<?php echo $d['user']['middle_name']?>.<?php echo $d['user']['last_name']?></td>
                                   <td><?php echo $d['user']['account_number']?></td>
                                   <td><?php echo $d['amount']?></td>
                                   <td><?php echo $d['generalization_amount1']?>/<?php echo $d['generalization_amount2']?></td>
                                   <td><?php echo $d['description']?></td>
                                   <td><?php echo date('Y/m/d H:i:s',$d['created'])?></td>
                               </tr>

                           <?php }
                       }else{
                       ?>
                           <td colspan="6">No Data.</td>
                        <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

</form>
<!--end-Footer-part-->

<script src="/js/excanvas.min.js"></script>
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.ui.custom.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.flot.min.js"></script>
<script src="/js/jquery.flot.resize.min.js"></script>
<script src="/js/jquery.peity.min.js"></script>
<script src="/js/fullcalendar.min.js"></script>
<script src="/js/matrix.js"></script>
<script src="/js/matrix.dashboard.js"></script>


<script src="/js/jquery.validate.js"></script>
<script src="/js/matrix.form_validation.js"></script>
<script src="/js/jquery.wizard.js"></script>
<script src="/js/jquery.uniform.js"></script>
<script src="/js/select2.min.js"></script>
<script src="/js/matrix.popover.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/matrix.tables.js"></script>

<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage(newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-") {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
<script src="/js/delete.js"></script>
</body>
</html>