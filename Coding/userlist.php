<?php require_once('../include/config.inc.php');

$sql = 'SELECT * FROM userstable WHERE userstate=1';
$data = $db->execute_dql($sql);

if(!empty($_GET['id']))
{
    $sql = 'UPDATE userstable SET userstate=2 WHERE id='.$_GET['id'];
    $db->execute_dml($sql);
    echo '<script>';
    echo 'alert("block user success.");';
    echo 'window.location.href="userlist.php";';
    echo '</script>';
    die();
}

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../css/matrix-style.css" />
    <link rel="stylesheet" href="../css/matrix-media.css" />
    <link rel="stylesheet" href="../css/select2.css" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/jquery.gritter.css" />

    <!--    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->
    <link rel="stylesheet" href="../css/overwrite.css"/>

    <style>
        body,html{background:none;padding:10px;height:90%;padding-top:25px;min-height:1500px;}
    </style>
</head>
<body>
<form id="form1" runat="server">
    <!--breadcrumbs-->

    <!--Action boxes-->
    <div class="alert alert-info">
        <h2>User List</h2>
    </div>
    <dic class="row">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>account number</th>
                <th>name</th>
                <th>phone(home/cell/business)</th>
                <th>balance</th>
                <th>usertype</th>
                <th>action</th>
            </tr>
            </thead>

            <?php
            if(!empty($data))
            {
                foreach ($data as $d)
                { ?>
                    <tr>
                        <td>
                        <?php echo $d['account_number'];?>
                        </td>
                        <td>
                            <?php echo $d['first_name'];?>.<?php echo $d['middle_name'];?>.<?php echo $d['last_name'];?>
                        </td>
                        <td>
                            <?php echo $d['tel_home'];?>/
                            <?php echo $d['tel_cell'];?>/
                            <?php echo $d['tel_business'];?>
                        </td>
                        <td>
                            <?php echo $d['balance'];?>
                        </td>
                        <td>
                            <?php if($d['usertype']==1) echo 'customer'; else echo 'manager';?>
                        </td>
                        <td>
                            <a href="recharge.php?id=<?php echo $d['id'];?>">Deposit</a>
                            |
                            <a href="profile.php?id=<?php echo $d['id'];?>">Edit</a>
                            |
                            <a href="password_login.php?id=<?php echo $d['id'];?>">Password</a>
                            |
                            <a href="password_pay.php?id=<?php echo $d['id'];?>">Password Pay</a>
                            <?php
                            if($d['id']!=$_SESSION['id'])
                            {
                            ?>
                            |
                            <a href="userlist.php?id=<?php echo $d['id'];?>">Trash</a>

                                <?php } ?>

                        </td>
                    </tr>
                <?php }
            }
            ?>
        </table>
    </dic>
</form>
<!--end-Footer-part-->

<script src="../js/excanvas.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.flot.min.js"></script>
<script src="../js/jquery.flot.resize.min.js"></script>
<script src="../js/jquery.peity.min.js"></script>
<script src="../js/fullcalendar.min.js"></script>
<script src="../js/matrix.js"></script>
<script src="../js/matrix.dashboard.js"></script>


<script src="../js/jquery.validate.js"></script>
<script src="../js/matrix.form_validation.js"></script>
<script src="../js/jquery.wizard.js"></script>
<script src="../js/jquery.uniform.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/matrix.popover.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/matrix.tables.js"></script>

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
<script src="../js/delete.js"></script>
</body>
</html>
