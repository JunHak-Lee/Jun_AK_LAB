<?php header("Content-Type: text/html; charset=UTF-8");?>
<?php include_once "include/common/declare.php";?>
<?php include_once "../request_log_ssrf2.php";?>
<?php
	

$user =	nvl( $_GET['title'],'1');

if ( $_SESSION["ADMIN_YN"] === "Y" ){ 
echo $_SESSION["ADMIN_YN"];

?>
<!doctype html>
<html lang="ko" style="height:100%;">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<title>EQST ë³´ìêµì¡ì¼í°</title>
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="../css/style.css" />
		<script type="text/javascript" src="../js/libs/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="../js/libs/jquery-ui.js"></script>
		<script type="text/javascript" src="../js/libs/jquery.bxslider.min.js"></script>
		<script type="text/javascript" src="../js/libs/nice-select/nice-select.js"></script>
		<script type="text/javascript" src="../js/libs/dotdotdot/dotdotdot.js"></script>
		<script type="text/javascript" src="../js/libs/datepicker.js"></script>
		<!--<script type="text/javascript" src="./commons.js"></script>-->
		<link rel="stylesheet" href="../css/libs/jquery-ui.css" />
		<script type="text/javascript">
			$(function() {
				
				$.customFn = {
					
					boardReg : function(){
						$("#searchForm").submit();
					},
					
					sortingProcess : function(){
						$('#pageIndex').val('1');
						$("#searchForm").attr("action", "notice.php");
						$("#searchForm").submit();
					},
					
					searchProcess : function(){
						$('#pageIndex').val('1');
						if($("#startDt").val() != ""){
							if($("#endDt").val() == ""){
								alert("ìì±ì¼ì ìë ¥í´ì£¼ì¸ì.");
								return false;
							}
						}
						if($("#endDt").val() != ""){
							if($("#startDt").val() == ""){
								alert("ìì±ì¼ì ìë ¥í´ì£¼ì¸ì.");
								return false;
							}
						}
						$("#searchForm").submit();
					}
				
				};
				
				$(document).ready(function() {
					if($("#userName").val() == ''){
						alert("ë¡ê·¸ì¸ì´ íìí©ëë¤.");
						location.href = "/login.php"; 
						return;
					}
					var query  = '';
					if($("#keyword").val() != ''){
						query  = query + '&searchType='+$("#searchType").val()+'&keyword='+$("#keyword").val();
					}
					if($("#startDt").val() != ''){
						query  = query + '&startDt='+$("#startDt").val()+'&endDt='+$("#endDt").val();
					}
					if($("#sorting").val() != ''){
						query  = query + '&sorting='+$("#sorting").val();
					}
					
				});
				
				btnReg = $("#btnReg");
				
				btnSearch = $("#btnSearch");
				
				sortingTitle = $("#sortingTitle");
				
				sortingRegUserNm = $("#sortingRegUserNm");
				
				sortingRegDt = $("#sortingRegDt");

				sortingTitle2 = $("#sortingTitle2");
				
				sortingRegUserNm2 = $("#sortingRegUserNm2");
				
				sortingRegDt2 = $("#sortingRegDt2");
				
				//ê²ìë¬¼ ë±ë¡
				btnReg.click(function(e) {
					e.preventDefault();
					$.customFn.boardReg();
				});
				/*
				//search ë²í¼ í´ë¦­ì
				btnSearch.click(function(e){
					e.preventDefault();
					$.customFn.searchProcess();
				});
				*/
				
				sortingTitle.click(function(e){
					e.preventDefault();
					$('#sorting').val('title');
					$("#sotingAd").val("ASC");
					/*if ($("#sotingAd").val() == "" ){
						$("#sotingAd").val("ASC");
					}else if ($("#sotingAd").val() == "DESC" ) {
						$("#sotingAd").val("ASC");
					}else{
						$("#sotingAd").val("DESC");
					}*/
					$.customFn.sortingProcess();
				});

				sortingTitle2.click(function(e){
					e.preventDefault();
					$('#sorting').val('title');
					$("#sotingAd").val("DESC");
					$.customFn.sortingProcess();
				});
				
				sortingRegUserNm.click(function(e){
					e.preventDefault();
					$('#sorting').val('regUserNm');
					$("#sotingAd").val("ASC");
					/*if ($("#sotingAd").val() == "" ){
						$("#sotingAd").val("ASC");
					}else if ($("#sotingAd").val() == "DESC" ) {
						$("#sotingAd").val("ASC");
					}else{
						$("#sotingAd").val("DESC");
					}*/
					$.customFn.sortingProcess();
				});

				sortingRegUserNm2.click(function(e){
					e.preventDefault();
					$('#sorting').val('regUserNm');
					$("#sotingAd").val("DESC");
					$.customFn.sortingProcess();
				});
				
				sortingRegDt.click(function(e){
					e.preventDefault();
					$('#sorting').val('REG_DT');
					$("#sotingAd").val("ASC");
					/*if ($("#sotingAd").val() == "" ){
						$("#sotingAd").val("ASC");
					}else if ($("#sotingAd").val() == "DESC" ) {
						$("#sotingAd").val("ASC");
					}else{
						$("#sotingAd").val("DESC");
					}*/
					$.customFn.sortingProcess();
				});

				sortingRegDt2.click(function(e){
					e.preventDefault();
					$('#sorting').val('REG_DT');
					$("#sotingAd").val("DESC");
					$.customFn.sortingProcess();
				});
				
			});
			function search(){
				
				if (window.event.keyCode == 13) {
					$.customFn.searchProcess();
				}
				
			}
			function goView(ol){
				document.searchForm.board_id.value=ol;
				document.searchForm.action = "noticeview.php";
				document.searchForm.method = "GET";
				document.searchForm.submit();
			}
		</script>
    </head>
    <body class="set_size">
        <!--[s] header -->
		<?php include_once('./include/header.php') ?>
        <!--[e] header -->

        <!--[s] main-container-->
        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>

            
            <!--[s] main-content-->
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="page-content">
                        <div class="page-header">
                            <h1>
                                <i class="ace-icon fa fa-ellipsis-v orange"></i>
                               DB ì°ê²° íì´ì§(ë¹ê³µê°)
                            </h1><br>
							<span id="search_word"></span>	
                        </div>
                                    
                        <div class="hr10"></div>



<font size=3 >
<table width=30% >
<form method=post>
<tr ><td width=50% align=right style="padding: 10px;"> <font color=#ff9933>Remote Host IP: </td><td width=50% align=center> <font color=#ff9933><input type=text name=host value="127.0.0.1"></td></tr>
<tr><td width=50% align=right> <font color=#ff9933>DB Username: </td><td width=50% align=center> <font color=#ff9933><input type=text name=uname value=></td></tr>
<tr><td width=50% align=right> <font color=#ff9933>DB Password: </td><td width=50% align=center> <font color=#ff9933><input type=text name=pass value=></td></tr>


</table>
<br>
<input type=submit name=sbmt value="DB ì ìíê¸°">
</form>

<?php
if(isset($_POST['sbmt']))
{
	$host=trim($_POST['host']);
	$uname=trim($_POST['uname']);
	$pass=trim($_POST['pass']);

	$db = db::getInstance($host, $uname, $pass);
	$return = $db->getanswer();
	echo '<br><br>'.$return;
}
?>


	<script>
	
	$('#keyword').on('keyup', function(e) {
		e.preventDefault();
