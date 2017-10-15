<?php require_once('../include/config.inc.php');


if($_POST)
{


    //var_dump($_POST);
    $sql = 'INSERT INTO userstable
(first_name,middle_name,last_name,age,sex,address,SSN,email,
tel_home,tel_cell,tel_business,account_number,password,password_pay,created,usertype)
 VALUES("'.$_POST['first_name'].'",
"'.$_POST['middle_name'].'",
"'.$_POST['last_name'].'",
"'.$_POST['age'].'",
"'.$_POST['sex'].'",
"'.$_POST['address'].'",
"'.$_POST['SSN'].'",
"'.$_POST['email'].'",
"'.$_POST['tel_home'].'",
"'.$_POST['tel_cell'].'",
"'.$_POST['tel_business'].'",
 "'.$_POST['account_number'].'",
 "'.$_POST['password'].'",
 "'.$_POST['password_pay'].'",
 "'.time().'",
 "'.$_POST['usertype'].'");';
    // echo $sql;exit;
    $db->execute_dml($sql);
    echo '<script>';
    echo 'alert("add user success.");';
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
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Add User</h5>
                </div>
                <div class="widget-content padding">
                    <table style="width: 100%;" cellpadding="2" cellspacing="1" class="border">
                        <tr>
                            <td class="tdbg">

                                <table cellSpacing="0" cellPadding="0" width="100%" border="0">
                                    <tr>
                                        <td height="25" width="30%" align="right">
                                            Account number
                                            ：</td>
                                        <td height="25" width="*" align="left">
                                            <input type="text" name="account_number" required>
                                        </td></tr>
                                    <tr>
                                        <td height="25" width="30%" align="right">
                                            Name
                                            ：</td>
                                        <td height="25" width="*" align="left">
                                            <input type="text" style="width: 100px;" name="first_name" value="First Name" required>
                                            <input type="text" style="width: 100px;" name="middle_name" value="Middle Name" required>
                                            <input type="text" style="width: 100px;" name="last_name" value="Last Name" required>
                                        </td></tr>
                                    <tr>
                                        <td height="25" width="30%" align="right">
                                            Password
                                            ：</td>
                                        <td height="25" width="*" align="left">
                                            <input type="password" name="password" required>
                                        </td></tr>

                                    <tr>
                                        <td height="25" width="30%" align="right">
                                            Pay Password
                                            ：</td>
                                        <td height="25" width="*" align="left">
                                            <input type="password" name="password_pay" required>
                                        </td></tr>
                                    <tr>
                                        <td height="25" width="30%" align="right">
                                            Sex
                                            ：</td>
                                        <td height="25" width="*" align="left">
                                            <input checked type="radio" name="sex" value="Male"> Male
                                            <input  type="radio" name="sex" value="FeMale"> FeMale
                                        </td></tr>
                                    <tr>
                                        <td height="25" width="30%" align="right">
                                            Age
                                            ：</td>
                                        <td height="25" width="*" align="left">
                                            <input type="number" name="age" required>
                                        </td></tr>
                                    <tr>
                                        <td height="25" width="30%" align="right">
                                            SSN
                                            ：</td>
                                        <td height="25" width="*" align="left">
                                            <input type="text" name="SSN" required>
                                        </td></tr>
                                    <tr>
                                        <td height="25" width="30%" align="right">
                                            Email
                                            ：</td>
                                        <td height="25" width="*" align="left">
                                            <input type="text" name="email" required>
                                        </td></tr>

                                    <tr>
                                        <td height="25" width="30%" align="right">
                                            Address
                                            ：</td>
                                        <td height="25" width="*" align="left">
                                            <input type="text" name="address" required>
                                        </td></tr>

                                    <tr>
                                        <td height="25" width="30%" align="right">
                                            Home phone
                                            ：</td>
                                        <td height="25" width="*" align="left">
                                            <input type="TEXT" name="tel_home" value="">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td height="25" width="30%" align="right">
                                            Business phone
                                            ：</td>
                                        <td height="25" width="*" align="left">
                                            <input type="TEXT" name="tel_business" value="">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td height="25" width="30%" align="right">
                                            Cell phone
                                            ：</td>
                                        <td height="25" width="*" align="left">
                                            <input type="TEXT" name="tel_cell" value="">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td height="25" width="30%" align="right">
                                            UserType
                                            ：</td>
                                        <td height="25" width="*" align="left">
                                            <select name="usertype" id="">
                                                <option value="1">Customer</option>
                                                <option value="3">Manager</option>
                                            </select>
                                        </td>

                                    </tr>
                                </table>

                                <div class="form-actions">
                                    <button class="btn btn-success" type="submit">Submit</button>
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

<script src="/js/kindeditor-4.1.10/kindeditor-min.js"></script>
<script>
    var editor;
    KindEditor.ready(function (K) {
        editor = K.create('textarea[name="content"]', {
            uploadJson: '/js/kindeditor-4.1.10/php/upload_json.php',
            fileManagerJson: '/js/kindeditor-4.1.10/php/file_manager_json.php',
            allowFileManager: true,
            items: ['source',
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'fullscreen'],
            afterBlur: function () {
                this.sync();
            }
        });
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