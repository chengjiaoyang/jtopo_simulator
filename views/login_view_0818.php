<!doctype html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<title>登录</title>
<link href="<?php echo base_url(); ?>styles/share.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>styles/login.css" rel="stylesheet" type="text/css">

<script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
<!--
if(top.location!==self.location){ 
    top.location.href="<?php echo site_url("login"); ?>"; 
} 


function login() {
    var username = $("#username").val();
    var password = $("#password").val();
    sessionStorage.setItem('cpu_val',50);
    sessionStorage.setItem('mem_val',50);    


    if(username != "" && password != "") {
        $.post('<?php echo site_url("login/check_login"); ?>',{'username':username,'password':password},function(result) {      
            if(result == "error1" ) {
                alert("用户名和密码错误!");
            }
            else {
                window.location.href = "<?php echo site_url('topo_manage/topo_manage'); ?>";
            }
           
        });  
    }
    else {
        alert("请输入用户名或密码!");
        return false;
    }
}

function key_login(event) {
    if(event.keyCode==13){
        $("#login_button").click(); 
    }
}



-->
</script>
</head>

<body  onkeydown="key_login(event);">
<div class="login-content">
    <div class="login-content-left">
        <h3 class="login-title"><a href="#"><img src="<?php echo base_url(); ?>images/logo_login.png"></a>中国电信云计算研究室</h3>
        <h2 class="login-name">网络模拟平台</h2>
        <div class="login-form">
            <dl>
                <dt>账号</dt>
                <dd><input  id = "username" value = "" type="text" placeholder="请输入账号" class="ipt-text"></dd>
            </dl>
            <dl>
                <dt>密码</dt>
                <dd><input id = "password" value = "" type="password" placeholder="请输入密码" class="ipt-text"></dd>
            </dl>
            <dl>
                <dt>&nbsp;</dt>
                <dd><label><input type="checkbox" class="ipt-check"> 记住密码</label></dd>
            </dl>
            
            <a href="###" id="login_button"   class="login-submit"  onclick="login();">登 录</a>
        </div>
        
        
    </div>
    


</div>


</body>
</html>
