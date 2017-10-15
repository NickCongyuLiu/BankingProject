<?php require_once('../include/config.inc.php');

$sql = 'SELECT * FROM userstable WHERE id='.$_GET['id'];
$data = $db->execute_dql($sql);
$data = $data[0];
if($_POST)
{


    //var_dump($_POST);
    $sql = 'UPDATE userstable SET 
first_name="'.$_POST['first_name'].'",
middle_name="'.$_POST['middle_name'].'",
last_name="'.$_POST['last_name'].'",
age="'.$_POST['age'].'",
sex="'.$_POST['sex'].'",
address="'.$_POST['address'].'",
SSN="'.$_POST['SSN'].'",
email="'.$_POST['email'].'",
tel_home="'.$_POST['tel_home'].'",
tel_cell="'.$_POST['tel_cell'].'",
tel_business="'.$_POST['tel_business'].'" WHERE id='.$_POST['id'];
   // echo $sql;exit;
    $db->execute_dml($sql);
    echo '<script>';
    echo 'alert("update profile success.");';
    echo 'window.location.href="profile.php?id='.$_POST['id'].'";';
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
    <script src="../js/My97DatePicker/WdatePicker.js"></script>
    <style>
        body,html{background:none;padding:10px;height:90%;}
    </style>
</head>
<body>
<form id="form1" method="post" enctype="multipart/form-data">
    <!--breadcrumbs-->

    <!--Action boxes-->
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Update Profile</h5>
                </div>
                <div class="widget-content padding">


                    <table cellSpacing="0" cellPadding="0" width="100%" border="0">
                        <tr>
                            <td height="25" width="30%" align="right">
                                UserId
                                ：</td>
                            <td height="25" width="*" align="left">
                                <?php echo $data['id'];?>
                            </td></tr>

                        <tr>
                            <td height="25" width="30%" align="right">
                               Name
                                ：</td>
                            <td height="25" width="*" align="left">
                                <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                <input type="text" style="width: 100px;" name="first_name" value="<?php echo $data['first_name'];?>">
                                <input type="text" style="width: 100px;" name="middle_name" value="<?php echo $data['middle_name'];?>">
                                <input type="text" style="width: 100px;" name="last_name" value="<?php echo $data['last_name'];?>">
                            </td>
                        </tr>


                        <tr>
                            <td height="25" width="30%" align="right">
                                Account Number
                                ：</td>
                            <td height="25" width="*" align="left">
                                <input type="text" readonly name="account_number" value="<?php echo $data['account_number'];?>">
                            </td></tr>
                        <tr>
                            <td height="25" width="30%" align="right">
                                Sex
                                ：</td>
                            <td height="25" width="*" align="left">
                                <input <?php if($data['sex']=='Male') echo 'checked'; ?> type="radio" name="sex" value="Male"> Male
                                <input <?php if($data['sex']=='FeMale') echo 'checked'; ?> type="radio" name="sex" value="FeMale"> FeMale
                            </td></tr>
                        <tr>
                            <td height="25" width="30%" align="right">
                                Age
                                ：</td>
                            <td height="25" width="*" align="left">
                                <input type="number" name="age" value="<?php echo $data['age'];?>">
                            </td></tr>
                        <tr>
                            <td height="25" width="30%" align="right">
                                SSN
                                ：</td>
                            <td height="25" width="*" align="left">
                                <input type="TEXT" name="SSN" value="<?php echo $data['SSN'];?>">
                            </td></tr>
                        <tr>
                            <td height="25" width="30%" align="right">
                                Email
                                ：</td>
                            <td height="25" width="*" align="left">
                                <input type="TEXT" name="email" value="<?php echo $data['email'];?>">
                            </td></tr>
                        <tr>
                            <td height="25" width="30%" align="right">
                                Home phone
                                ：</td>
                            <td height="25" width="*" align="left">
                                <input type="TEXT" name="tel_home" value="<?php echo $data['tel_home'];?>">
                            </td>
                        </tr>

                        <tr>
                            <td height="25" width="30%" align="right">
                                Business phone
                                ：</td>
                            <td height="25" width="*" align="left">
                                <input type="TEXT" name="tel_business" value="<?php echo $data['tel_business'];?>">
                            </td>
                        </tr>

                        <tr>
                            <td height="25" width="30%" align="right">
                                Cell phone
                                ：</td>
                            <td height="25" width="*" align="left">
                                <input type="TEXT" name="tel_cell" value="<?php echo $data['tel_cell'];?>">
                            </td>
                        </tr>

                        <tr>
                            <td height="25" width="30%" align="right">
                                Address
                                ：</td>
                            <td height="25" width="*" align="left">
                                <input type="TEXT" name="address" value="<?php echo $data['address'];?>">
                            </td></tr>
                        <tr>
                            <td height="25" width="30%" align="right">
                                Balance
                                ：</td>
                            <td height="25" width="*" align="left">
                                <input type="TEXT" readonly name="balance" value="<?php echo $data['balance'];?>">
                            </td></tr>

                    </table>

                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>

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