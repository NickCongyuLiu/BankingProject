<?php
require_once('../include/config.inc.php');
if($_POST)
{
	
	$verify = $_POST['verify'];
	
    $sql = ' SELECT * FROM userstable WHERE account_number="'.$_POST['username'].'"
    AND password="'.$_POST['password'].'";';
    $data = $db->execute_dql($sql);
	
    if(empty($data))
    {
        echo '<script>';
        echo 'alert("AccountNo or password incorrect.");';
        echo 'window.location.href="login.php";';
        echo '</script>';
        die();
    }else{
        $row = $data[0];
		
		
		if($row['verify']!=$verify)
		{
			 echo '<script>';
        echo 'alert("verify imgs incorrect.");';
        echo 'window.location.href="login.php";';
        echo '</script>';
        die();
		}
			
		
        $_SESSION['login_user'] = $row;
        //$_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['usertype'] = $row['usertype'];
        //$_SESSION['thumb'] = $row['thumb'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        echo '<script>
                    location.href = "index.php";
                </script>';
    }

}



$sql = 'SELECT * FROM img';
$data = $db->execute_dql($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Banking</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../css/matrix-login.css" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!--		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->
    <style>
        body, html {
            font-family: Arial, "微軟正黑體", "微软雅黑", "メイリオ", '맑은 고딕', sans-serif;
            margin:0;padding:0;
            background:url("/images/bg1.jpg");
            background-size:cover;

        }

        #loginbox{padding-top:55px;}
        #loginbox form,#loginbox .normal_text {
            background:rgba(0,0,0,.6);
        }
        #loginbox .main_input_box input
        {
            margin-top:1px;
            background:rgba(255,255,255,.1);
            color:#000;
        }
		
		.vimg{border:1px solid rgba(0,0,0,.0);}				
		.vimg.act{border:1px solid #c00;}
    </style>
</head>
<body>
<div id="loginbox">
    <form id="loginform" class="form-vertical" action="" method="post" runat="server">
        <div class="control-group normal_text"> <h3><img src="../img/logo_login.png" alt="Logo" />
                Online Banking User Login</h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" name="username" required id="UserName" placeholder="account no" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" id="Password" required placeholder="account password" />
                </div>
            </div>
        </div>
		<div class="control-group">
            <div class="controls">
                <div class="main_input_box">
						<h2>Verify Image</h2>
						<input type="hidden" name="verify" id="verify" value=""/>
							<?php
							if(!empty($data))
							{
								foreach($data as $d)
								{?>
									<img data="<?php echo $d['id'];?>" class="vimg" style="width:30px;height:30px;" src="../<?php echo  $d['path'];?>">
								<?php }
							}
							?>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <label for="" style="color: #c00" id="Msg">

                </label>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left"><a type="submit" href="reg.php" class="btn btn-danger" id="" /> create a account</a></span>
            <span class="pull-right"><a type="submit" href="javascript:;" class="btn btn-success" id="LoginBtn" /> Login in</a></span>
        </div>

    </form>
    <input type="hidden" name="cuId" id="cuId" value="1" />
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/matrix.login.js"></script>

<script>

$(".vimg").click(function(){
	$("#verify").val("");
	if($(this).hasClass("act"))
	{
		$(this).removeClass("act");
	}else{
		$(this).addClass("act");
	}
	$imgs = $(".vimg.act");
	var val = '';
	$imgs.each(function(){
		
		val+=$(this).attr("data")+",";
	});
	
	$("#verify").val(val);
	
});

    $(document).ready(function () {
        $("#LoginBtn").click(function () {

            var userName = $("#UserName").val();
            var password = $("#Password").val();
			var verify = $("#verify").val();
            if (userName == ""||password==""||verify=="") {
                $("#Msg").html("Form information incorrect.all field required");
                return false;
            }

            $("#loginform").submit();

        });



        setInterval("changeBg()",3000);

    });



    function changeBg()
    {
        //console.log(111);
        var cuId = parseInt($("#cuId").val());
        $("body,html").css({ "backgroundImage": "url(/images/bg"+cuId+".jpg)" });
        if (cuId > 0 && cuId < 5) {
            $("#cuId").val(cuId + 1);
        } else {
            $("#cuId").val(1);
        }

    }

</script>

</body>

</html>
