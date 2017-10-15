
<!DOCTYPE html>
<?php require_once('../include/config.inc.php');

$sql = 'SELECT * FROM userstable WHERE id='.$_GET['id'];
$data = $db->execute_dql($sql);
$data = $data[0];
if($_POST)
{

    $sql = 'SELECT * FROM userstable WHERE id='.$_GET['id'];
    $data = $db->execute_dql($sql);
    $data = $data[0];

    $amount = $_POST['amount'];

    $sql = ' INSERT INTO generalizationtable
 (from_account,to_account,amount,generalization_code,description,
 generalization_type,generalization_amount1,generalization_amount2,
 created,status,YEAR,MOUTH,DAY) VALUES(
 "'.$data['account_number'].'",
 "'.$data['account_number'].'",
 "'.$amount.'",
 "'.mt_rand(1000,99999).'",
 "Personal recharge ['.$_POST['rt'].'] $'.$amount.'",
 "1",
 "'.$data['balance'].'",
 "'.($data['balance']+$amount).'",
 "'.time().'",
 "success",
  "'.date('Y').'",
  "'.date('m').'",
  "'.date('d').'"
 ) ;';

    $db->execute_dml($sql);


    //var_dump($_POST);
    $sql = 'UPDATE userstable SET balance="'.($_POST['cmoney']+$_POST['amount']).'" WHERE id='.$_POST['id'];
    // echo $sql;exit;
    $db->execute_dml($sql);
    echo '<script>';
    echo 'alert("deposit success.");';
    echo 'window.location.href="recharge.php?id='.$_POST['id'].'";';
    echo '</script>';
    die();
}
?>
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
<form id="form1" method="post" runat="server">
    <!--breadcrumbs-->

    <!--Action boxes-->
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Online Deposit</h5>
                </div>
                <div class="widget-content padding">

                    <div class="control-group">
                        <label class="control-label">Balance</label>
                        <div class="controls">
                            <input readonly name="cmoney" type="text" class="span11" placeholder="" value="<?php echo $data['balance'];?>">
                            <input type="hidden" id="userid" name="id" value="<?php echo $data['id'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Deposit Type</label>
                        <div class="controls">
                            <select name="rt" id="">
                            <option value="ATM">ATM</option>
                            <option value="Counter">Counter</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Amount</label>
                        <div class="controls">
                            <input id="money" required name="amount" type="text" class="span11" placeholder="" value="0.0001">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" id="postBtn" class="btn btn-success">Submit</button>
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
<script src="js/jquery.peity.min.js"></script>
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
<script src="/js/matrix.interface.js"></script>


<script>

    $("#postBtn").click(function (e) {
        e.preventDefault();
        var money = $("#money").val();
        if(money==""||money<0)
        {
            alert("amount incorrect.");
            return;
        }
        //$("#siteModal",parent.document).modal();
        $("#viewModal", parent.document).click();
    });
</script>

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
