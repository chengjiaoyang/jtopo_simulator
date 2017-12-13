<!doctype html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<title>管理账号列表</title>
<!-- <link href="<?php echo base_url(); ?>styles/share.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>styles/index.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>js/public.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script>
 -->

<script type="text/javascript">
  var cpu_session = sessionStorage.getItem("cpu_val");
var mem_session = sessionStorage.getItem("mem_val");

$(function(){
    $("#set_cpu").val(cpu_session);
    $("#set_memery").val(mem_session);
    check_cpu();
    check_mem();
   
});

function check_cpu(){
    var cpu ="<?php echo $sys_info['cpu'];?>"; 
    var set_cpu = $("#set_cpu").val();
    if(set_cpu == ""){
        return false; 
    }
    if(set_cpu != cpu_session){
        sessionStorage.setItem("cpu_val",set_cpu);
    }
    
    if(cpu*100 > set_cpu){
        alert("报警!");
    }
 
}

function check_mem(){
    var mem ="<?php echo $sys_info['mem'];?>"; 
    var set_mem = $("#set_memery").val();

    if(set_mem == ""){
        return false; 
    }
    if(set_mem != mem_session){
        sessionStorage.setItem("mem_val",set_mem);
    }
    
    if(mem*100 > set_mem){
        alert("报警!");
    }
    
   
}

</script>
</head>

<body>
<div class="content">
    <div class="header">
    <a href="#"><img src="<?php echo base_url(); ?>images/logo.png"></a>中国电信云计算实验室 <span>网络模拟平台</span>
	<?php include $this->config->item('abs_path').'/public/net_header.php'; ?>
    </div>
    <?php include $this->config->item('abs_path').'/public/leftside.php'; ?>

    <!--left end-->
    <div class="content-body">
<?php var_dump($sys_info);?>
    <div class="msgbox">
        <div class="msgbox-header">
            <h2 class="msgbox-title">系统配置</h2>
        </div>
        <div class="msgbox-body">
            <h4 class="msgbox-info">cpu设置</h4>
            <dl>
                <dt>CPU使用率</dt>
                <dd><div class="msgbox-linear" style = "width:<?php echo $sys_info['cpu'];?>px;"></div></dd>
            </dl>
            <dl>
                <dt>CPU阈值</dt>
                <dd><input id = "set_cpu" type="text" value = ""  class="precent" onkeyup="value=value.replace(/[^\d.]/g,'')" onafterpaste="value=value.replace(/[^\d.]/g,'')" onchange="check_cpu()"> %</dd>
            </dl>
            
            <h4 class="msgbox-info">内存设置</h4>
            <dl>
                <dt>内存使用率</dt>
                <dd><div class="msgbox-linear" style = "width:<?php echo $sys_info['mem'];?>px;" ></div></dd>
            </dl>
            <dl>
                <dt>内存阈值</dt>
                <dd><input id = "set_memery" type="text" value = ""  class="precent" onkeyup="value=value.replace(/[^\d.]/g,'')" onafterpaste="value=value.replace(/[^\d.]/g,'')" onchange="check_mem()"> %</dd>
            </dl>
            
        </div>
      
        <div class="msgbox-footer">
        </div>
      
    </div>




    </div>
</div>
<!--

<div class="alert-error"><span class="alert-close">&times;</span>aaaa</div>
<div class="alert-false">aaaa</div>
<div class="alert-normal">aaaa</div>
<div class="alert-success">aaaa</div>
<div class="alert-warning">aaaaa</div>

-->





</body>
<script src="<?php echo base_url(); ?>js/common.js"></script>
</html>
