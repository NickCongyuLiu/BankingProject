<?php
require_once('../include/config.inc.php');
if(empty($_SESSION['login_user']))
{

        echo '<script>';
        echo 'alert("access forbidden.");';
        echo 'window.location.href="login.php";';
        echo '</script>';
        die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Banking</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        body, html {
            font-family: Arial, "微軟正黑體", "微软雅黑", "メイリオ", '맑은 고딕', sans-serif;
            font-size:14px;
        }

    </style>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="../" style="display:block;"></a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" >
            <a title="" href="javascript:;" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">
                    >> <?php echo $_SESSION['first_name'];?>.<?php echo $_SESSION['last_name'];?>
        </span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a target="main" href="profile.php?id=<?php echo $_SESSION['id'];?>"><i class="icon-user"></i> Profile</a></li>
                <li class="divider"></li>
                <li><a target="main" href="password_login.php?id=<?php echo $_SESSION['id'];?>"><i class="icon-check"></i> Password</a></li>
                <li class="divider"></li>
                <li><a target="main" href="password_pay.php?id=<?php echo $_SESSION['id'];?>"><i class="icon-check"></i> Pay Password</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="icon-key"></i> Logout</a></li>
            </ul>
        </li>
        <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
        <li>
            <a href="../">
                <i class="icon icon-arrow-left"></i>
                Home</a>
        </li>
    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Menus</a>
    <ul id="Nav">
        <li id="Home" class="active"><a href="index.php"><i class="icon icon-home"></i> <span>Menus</span></a> </li>
        <?php
        if($_SESSION['usertype']==3)
        {
        ?>

        <li id="Hotel" class="submenu"> <a href="#"><i class="icon icon-th-list"></i>
                <span>User Management</span> </a>
            <ul>
                <li><a target="main" href="userlist.php">User List</a></li>
                <li><a target="main" href="adduser.php">Add User</a></li>
            </ul>
        </li>
        <li id="User" class="submenu"><a href="javascript:;"><i class="icon icon-th"></i>
                <span>Statement </span></a>
            <ul>
                <li><a target="main" href="recharge.php?id=<?php echo $_SESSION['id'];?>">Deposit</a></li>
                <li><a target="main" href="giro.php?id=<?php echo $_SESSION['id'];?>">Transfer</a></li>
                <li><a target="main" href="personal.php?id=<?php echo $_SESSION['id'];?>">My Statement</a></li>
                <li><a target="main" href="sys_gh.php">Statement History</a></li>
            </ul>
        </li>
        <?php } ?>


        <?php
        if($_SESSION['usertype']==1)
        {
        ?>
        <li id="User" class="submenu"><a href="javascript:;"><i class="icon icon-user"></i>
                <span>Statement</span></a>
            <ul style="display:block;">
                <li><a target="main" href="recharge.php?id=<?php echo $_SESSION['id'];?>">Deposit</a></li>
                <li><a target="main" href="giro.php?id=<?php echo $_SESSION['id'];?>">Transfer</a></li>
                <li><a target="main" href="personal.php?id=<?php echo $_SESSION['id'];?>">My Statement</a></li>
            </ul>
        </li>
        <?php } ?>
		
		
		<li id="Verify" class="submenu"><a href="javascript:;"><i class="icon icon-cog"></i>
                <span>Account</span></a>
            <ul style="display:block;">
                <li><a target="main" href="verify2.php?id=<?php echo $_SESSION['id'];?>">Verify Img</a></li>
                <li><a id="MyLink" href="close.php?id=<?php echo $_SESSION['id'];?>">Close Account</a></li>                
            </ul>
        </li>
		
		
    </ul>
</div>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="BANK ONLINE" class="tip-bottom">
                <i class="icon-home"></i> BANK ONLINE</a></div>
        <!--            <h1>欢饮使用.</h1>-->
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid" style="padding-top:25px;min-height:1800px;">
        <iframe style="border:none;min-height:1600px;" width="100%" height="100%" name="main" id="main" src="welcome.php"></iframe>
    </div>
</div>

<a href="javascript:;" id="viewModal" onclick="javascript:;viewModal()"></a>
<!--Footer-part-->
<div id="siteModal" class="modal  hide" style="width:250px;">
    <div class="modal-header">
        <button data-dismiss="modal" id="closeModal" class="close" onclick="closeModal()" type="button">×</button>
        <h3>
            <i class="icon icon-lock"></i>
            You should input your pay password.</h3>
    </div>
    <div class="modal-body">
        <p>
            <input type="password" name="password" id="password" placeholder="pay password" style="width:204px;" value="" />
        </p>
    </div>
    <div class="modal-footer">
        <p>
            <a href="javascript:;" class="btn btn-danger" id="verPasswordBtn">Verify</a>
        </p>
    </div>
</div>
<div class="row-fluid">
    <div id="footer" class="span12"> <?php echo date('Y-m-d');?> Online Banking All Rights Reserved </div>
</div>

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
<script>
$("#MyLink").click(function(e){
	e.preventDefault(e);
	var r=confirm("Are you sure to close this account?");
	if(r==true)
  {
		window.location.href=$("#MyLink").attr("href");
  }
	else
  {
	return;
  }
});
</script>
</html>
<script>
    var modal;
    function closeModal() {
        $("#siteModal").addClass("hide");
    }

    function viewModal() {
        modal = $("#siteModal").modal();
    }

    $("#verPasswordBtn").click(function (e) {
        e.preventDefault();
        var password = $("#password").val();
        var userid = $("#userid", window.frames["main"].document).val();
        //var userid = $("#userid").val();
        if(password=="")
        {
            alert("pay password required.");
            return;
        }
        $.get("verify.php?userid="+userid+"&password=" + password + "&t=" + Math.random(), function (data) {
            if(data==1)
            {
                $("#closeModal").click();
                //modal.close();
                //$("#siteModal").addClass("hide");
                //console.log(window.frames["main"]);
                $("#form1", window.frames["main"].document).submit();
            } else {
                alert("password incorrect.");
            }
        });
    });

</script>
