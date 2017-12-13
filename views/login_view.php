<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>登录</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>css/login.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert.css"/>
    <script src="<?php echo base_url(); ?>js/jquery-1.11.3.js"></script>
    <script src="<?php echo base_url(); ?>js/alert.js"></script>
    <script src="<?php echo base_url(); ?>js/windows.js"></script>
    
<?php
include $this->config->item('abs_path').'/public/header.php'; 
?>
</head>

<script type="text/javascript">
if(top.location!==self.location){ 
    top.location.href="<?php echo site_url("login"); ?>"; 
} 


function login_go() {
    var username = $("#txt").val();
    var password = $("#pwd").val();
    sessionStorage.setItem('cpu_val',50);
    sessionStorage.setItem('mem_val',50);    
//alert(username);alert(password);return;

    if(username != "" && password != "") {
        $.post('<?php echo site_url("login/check_login"); ?>',{'username':username,'password':password},function(result) {      
          var results = eval("(" + result + ")");
                  
            if(results.retCode == "0" ) {
            	window.location.href = "<?php echo site_url('panel/panel'); ?>";
            }
            else {
            	alert_func.error(results.retMsg);
            } 
        });  
    }
    else {
    	alert_func.error("请输入用户名或密码!");
        return false;
    }
}

function key_login(event) {
    if(event.keyCode==13){
        $("#login").click(); 
    }
}
	
</script>

<body onkeydown="key_login(event);" >
    <div id="container">
        <div id="left-container">
            <div>
                <img src="<?php echo base_url(); ?>images/u27.png" alt=""/>
                <p>中国电信云计算实验室</p>
                <span>网络模拟平台</span>
            </div>
            <form action="">
                <div>
                    <span>
                        <img src="<?php echo base_url(); ?>images/user.png" alt=""/>
                    </span>
                    <input type="text" placeholder="请输入用户名" id="txt" name="uname" value="admin"/><br/>
                </div>
                <div>
                    <span>
                        <img src="<?php echo base_url(); ?>images/password.png" alt=""/>
                    </span>
                    <input type="password" placeholder="请输入密码" id="pwd" name="upwd" value="admin"/>
                </div>
                <input type="button" value="登录" onclick="login_go();"  id="login">

            </form>
        </div>
        <div id="right-container">

        </div>
        <div class="mask"></div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/login.js"></script>
</body>
</html>
