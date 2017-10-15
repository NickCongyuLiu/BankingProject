<?php require_once('../include/config.inc.php');

$sql = 'SELECT * FROM userstable WHERE id='.$_GET['id'];
$data = $db->execute_dql($sql);
$data = $data[0];
if($_POST)
{


    //var_dump($_POST);
    $sql = 'UPDATE userstable SET 
password_pay="'.$_POST['password'].'" WHERE id='.$_POST['id'];
    // echo $sql;exit;
    $db->execute_dml($sql);
    echo '<script>';
    echo 'alert("update password success.");';
    echo 'window.location.href="password_pay.php?id='.$_POST['id'].'";';
    echo '</script>';
    die();
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
<form id="form1" method="post" runat="server">
    <!--breadcrumbs-->

    <!--Action boxes-->
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Update Password</h5>
                </div>
                <div class="widget-content padding">
                    <div class="control-group">
                        <label class="control-label">Account Number</label>
                        <div class="controls">
                            <input required name="Account" readonly type="text" class="span11" placeholder="" value="<?php echo $data['account_number'];?>">
                            <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input required name="password" type="password" class="span11" placeholder="" value="">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Re-enter Password</label>
                        <div class="controls">
                            <input required name="password2" type="password" class="span11" placeholder="" value="">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Submit</button>
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