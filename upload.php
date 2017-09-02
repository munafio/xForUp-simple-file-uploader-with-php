<!-- This script created by : munaf aqeel mahdi | iraq-babil -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>XForUP | Simple way to upload your files.</title>
	    <link rel="stylesheet" type="text/css" href="css/style.css" />
         <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" />
	    <script src="js/jquery.min.js"></script>
        <script src="js/jquery.form.min.js"></script>
	    <script language="JavaScript" src="js/javascript.js"></script>

	</head>
<body>
<center>
	    <div class="main_section" style="height: auto;">
	    <div class="nav_bar">
	    	<a href=""><img align="left" src="images/logo.png" class="logo" /></a>
        <ul class="nav_bar_menu">
        	<a href="index"><li style="box-shadow: inset 0px -5px 0px #2196f3;">HOME</li></a>
        	<a href="alowed"><li>ALLOWED FILES</li></a>
        	<a href="terms"><li>TERMS</li></a>
        	<a href="about_us"><li>ABOUT US</li></a>
        </ul>
	    </div>
	    </div>
	    <div class="upload_section" id="upload_f_section">
	    	<form action="include/up_func.php" id="uploadForm" method="post" enctype="multipart/form-data">
	    		<h1 style="color: #1e81d0;text-shadow: 5px 5px 1px #e8e8e8;"><span class="fa fa-cloud-download"></span> Upload Your Files</h1>
    	<div class="upload_box">
    	<input class="upload_feild" type="file" name="fileToUpload"/>
    	<p><input class="upload_btn" type="submit" value="Upload" name="uploadFile"></p>
        <p id="uploading" style="display:none;"><span style="padding: 7px 15px;background: #fff;border-radius: 3px;color: #2196f3;" id="uploadingTXT">Uploading...</span></p>	
    	</div>
        </form>
        <div id="uploaded_result">
        </div>
    	</div>
    	<div class="footer">
    		<span class="social_networks" style="float: right">
    			<a href="#"><img class="fb" /></a>
    			<a href="#"><img class="fl" /></a>
    			<a href="#"><img class="la" /></a>
    			<a href="#"><img class="tw" /></a>
    			<a href="#"><img class="vi" /></a>
    		</span>
    		<span style="float: left">&nbsp;&nbsp;© XFORUP 2016, ALL RIGHTS RESERVED</span> 
    	</div>
</form>
	    </div>
</center>
<script>
$(document).ready(function(){
$("#uploadForm").on('submit',function(e){
e.preventDefault();
$(this).ajaxSubmit({
beforeSend:function(){
$("#uploadingTXT").html("Wait..");
$("#uploading").show();
$(".upload_btn").hide();
},
uploadProgress:function(event,position,total,percentCompelete){
$("#uploadingTXT").html("uploading... [ "+percentCompelete+"% ]");
},
success:function(data){
$("#uploadingTXT").html("Done");
$("#uploading").hide();
$(".upload_btn").show();
$("#uploaded_result").html(data);
}});
});
});
</script>
</body>
</html>