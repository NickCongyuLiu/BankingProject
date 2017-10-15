<?php require_once('../include/config.inc.php');
$sql = 'SELECT * FROM userstable WHERE id='.$_GET['id'];
$data = $db->execute_dql($sql);
$data = $data[0];

$varr = explode(',',$data['verify']);

$sql = 'SELECT * FROM img';
$data2 = $db->execute_dql($sql);

if($_POST)
{


   
   $insert = $_POST['id'];
	$imgs = $_POST['verify'];
	
	$sql = 'UPDATE userstable SET verify="'.$imgs.'" WHERE id='.$insert;
	$db->execute_dml($sql);
	
	$imgs = explode(',',$imgs);
	//var_dump($imgs);
	for($i=0;$i<(count($imgs)-1);$i++)
	{
			$sql = 'INSERT INTO verify(userid,imgid) VALUES("'.$insert.'","'.$imgs[$i].'");';
			$db->execute_dml($sql);
	}
   
   
    echo '<script>';
    echo 'alert("upadte verify image success.");';
    echo 'window.location.href=window.location.href;';
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
			.vimg{border:1px solid rgba(0,0,0,.0);}				
		.vimg.act{border:1px solid #c00;}
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
                    <h5>Update User Verify Image</h5>
                </div>
                <div class="widget-content padding">
                    <div class="main_input_box">
						<h2>Verify Image</h2>
						<input type="hidden" name="id" id="" value="<?php echo $data['id'];?>"/>
						<input type="hidden" name="verify" id="verify" value="<?php echo $data['verify'];?>"/>
							<?php
							if(!empty($data2))
							{
								foreach($data2 as $d)
								{
									$act = '';
									if(!empty($varr))
									{
										foreach($varr as $v)										
										{
											if($d['id']==$v)
											{ $act="act";}
										}
									}
									?>
									<img data="<?php echo $d['id'];?>" class="vimg <?php echo $act;?>" style="width:30px;height:30px;" src="../<?php echo  $d['path'];?>">
								<?php }
							}
							?>
                </div>

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
	
});</script>
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