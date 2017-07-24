<!DOCTYPE html>
<html style="height: auto;" lang="es">
<head>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta charset="utf-8">
	<meta lang="es">
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="resources/page.ico" type="image/x-icon">
	<!--<base href="/mvcTest/">	-->
	<!--Also work adding /mvcTest/ in the begin of src and href-->
	<link rel="stylesheet" href="resources/bootstrap/css/bootstrap.min.css"/>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
    <link rel="stylesheet" href="resources/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="resources/ionicons/ionicons.min.css"> 
	<link rel="stylesheet" href="resources/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="resources/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="resources/dist/css/skins/_all-skins.min.css">
	<script src="resources/plugins/jQuery/jquery-3.1.1.min.js"></script>
    <script src="resources/bootstrap/js/bootstrap.min.js"></script>
    <script>
        /*$(document).ready(function(){
            alert("ready!");
        });*/
        function deleteUser(id){
            // alert("deleting..."+id);
            // return false;
            $.post("http://localhost/mvcTest/user/delete2",
            {
                id: id,
            },
            function(message, status){
                //alert("Msg: " + message);
                $("#userTable").html(message);
            }); 
        }
    </script>
</head>
<body class="sidebar-mini skin-blue-light" style="height: auto;">
	<div class="wrapper" style="height: auto;">
        <header class="main-header">
            <?php require 'header.tpl.php';?>
        </header>
        <aside class="main-sidebar">
            <?php require 'menu.tpl.php';?>
        </aside>
        <div class="content-wrapper" style="min-height: 916.3px;">
            <section class="content">
                <?php echo $tplContent; ?>
            </section>
        </div>
        <footer class="main-footer">
            <?php require 'footer.tpl.php';?>
        </footer>
	</div>
    <script src="resources/dist/js/adminlte.min.js"></script>
    <!--<script src="resources/dist/js/pages/dashboard.js"></script>-->
    <!--<script src="resources/dist/js/demo.js"></script>-->
</body>
</html>