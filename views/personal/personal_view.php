<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>个人中心</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/personal.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert.css"/>
     <script src="<?php echo base_url(); ?>js/jquery-1.11.3.js"></script>
    <script src="<?php echo base_url(); ?>js/alert.js"></script>
    <script src="<?php echo base_url(); ?>js/windows.js"></script>
    <script src="<?php echo base_url(); ?>js/vue.js"></script>
   
   <?php
include $this->config->item('abs_path').'/public/header.php'; 
?>
</head>
<body>
<div id="container">
    <!-- 左侧边栏-->
   <div id="left-navigation">
        <ul>
            <li>
                <img src="<?php echo base_url(); ?>images/u470.png" alt=""/>
                <img src="<?php echo base_url(); ?>images/u468.png" alt=""/>
            </li>
            <a href="<?php echo site_url('panel/panel'); ?>">
                <li>

                    <span class="glyphicon glyphicon-home" style="font-size: 20px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180433.png" alt=""/>-->
                    </span>
                    <p>仪表面板</p>

                </li>
            </a>
            <a href="<?php echo site_url('quick_avigation/quick_avigation'); ?>">
                <li>
                    <span class="glyphicon glyphicon-flag" style="font-size: 22px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180453.png" alt=""/>-->
                    </span>
                    <p>快速向导</p>
                </li>
            </a>
            <a href="<?php echo site_url('topo_manage/topo_manage'); ?>">
                <li >
                    <span class="glyphicon glyphicon-calendar" style="font-size: 22px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180506.png" alt=""/>-->
                    </span>
                    <p>拓扑管理</p>
                </li>
            </a>
            <?php if ($this->session->userdata('root') == 'True') {?>
            <a href="<?php echo site_url('net_log/log'); ?>">
                <li >
                    <span class="glyphicon glyphicon-list-alt" style="font-size: 22px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180522.png" alt=""/>-->
                    </span>
                    <p>日志管理</p>
                </li>
            </a>
            
            
            <a href="<?php echo site_url('sys_manage/sys_manage'); ?>">
                <li >
                    <span class="glyphicon glyphicon-cog" style="font-size: 22px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180543.png" alt=""/>-->
                    </span>
                    <p>系统管理</p>
                </li>
            </a>
            <a href="<?php echo site_url('admin_manage/admin_manage'); ?>">
                <li >
                    <span class="glyphicon glyphicon-user" style="font-size: 22px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-14_124435.png" alt=""/>-->
                    </span>
                    <p>用户管理</p>
                </li>
            </a>
            
            <?php }?>
            
         
            <a href="<?php echo site_url('personal/personal'); ?>" style="transform:scale(1.15);">
                <li >
                    <span class="glyphicon glyphicon-envelope" style="font-size: 22px;color: #0288D1;">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-14_124507.png" alt=""/>-->
                    </span>
                    <p style="color: #0288D1" class="animated bounce">个人中心</p>
                </li>
            </a>
        </ul>
    </div>
    <!-- top导航-->
    <div id="top-navigation">
        <ul id="top-navigation-left">
            <li>中国电信云计算实验室</li>
            <li class="animated rubberBand">网络模拟平台</li>
        </ul>
        <ul id="top-navigation-right">
            <li class="animated tada"><img src="<?php echo base_url(); ?>images/u74.png" alt=""/></li>
            <li>Welcome, <span id="user" class="user"><?php echo $this->session->userdata('username');?></span></li>
            <li>
                    <span>
                        <a href="<?php echo site_url('login/logout'); ?>" >
                            <img src="<?php echo base_url(); ?>images/exit.png" alt="" id="exit" title="退出系统"/>
                        </a>
                    </span>
            </li>
        </ul>
    </div>
    <!-- 主面板-->
    <div id="section">
        <div id="user-manage">
            <ul>
                <li class="animated fadeInRight">个人中心</li>

            </ul>
        </div>
        <div id="create-newUsers">
            <my-label v-for="todo in msg" :input1="todo" class="animated fadeInRight" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInRight;"></my-label>
            <div class="animated fadeInRight" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInRight;">
                <ul>
                    <li>用 户 账 号</li>
                </ul>
                <input type="text" style="margin-right:200px;" id="name_n" readonly placeholder="<?php echo "";echo  $this->session->userdata('username');?>"/>
            </div>
            <div class="animated fadeInRight" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInRight;">
                <ul>
                    <li>原登录密码</li>
                </ul>
                <input type="password" id="name"  name="name" style="margin-right: 120px;"/>
                <ul>

                </ul>
            </div>

            <div class="animated fadeInRight" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight; ">
                <ul>
                    <li>输入新密码</li>
                    <li></li>
                </ul>
                <input type="password" id="name1"  name="name1" style="margin-right:200px;"/>

            </div>

            <div class="animated fadeInRight" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInRight;">
                <ul>
                    <li>确认新密码</li>
                    <li></li>
                </ul>
                <input type="password" id="name2"  name="name2" style="margin-right:200px;"/>

            </div>
            <div class="animated fadeInRight" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
                <button id="change-psw" style="margin-right: 255px;margin-top: 10px;">修改密码</button>
            </div>


            <!--<div id="last" class="animated fadeInRight" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">-->
                <!--<ul>-->
                    <!--<li>账号头像</li>-->
                    <!--<li>设置完毕将于右上角显示</li>-->
                <!--</ul>-->
                <!--<img src="<?php echo base_url(); ?>images/u74.png" alt=""/>-->
                <!--<ul>-->
                    <!--<button id="change-head">更改头像</button>-->
                <!--</ul>-->
            <!--</div>-->
        </div>
    </div>
</div>
<script>
   

	$("#change-psw").click(function(){
		var psw = $("#name").val();
		var psw1 = $("#name1").val();
		var psw2 = $("#name2").val();
		//alert(psw);alert(psw1);alert(psw2);return;
		if (psw == '' || psw1 == '' || psw2 == '') {
			alert_func.error("密码不能为空！！！"); return;
		}


		if (psw == psw1) {
			alert_func.error("新密码不能与原密码相同！！！"); return;
		}

		if (psw1 != psw2) {
			alert_func.error("两次输入的新密码不一致！！！"); return;
		}

		var obj = {
				"old_passwd":psw,
				"new_passwd":psw1
			};
		
		$.post('<?php echo site_url("admin_manage/admin_manage/reset_passwd"); ?>',obj,function(result) {  
				var results = eval("(" + result + ")");
               
	            if(results.retCode == "0" ) {
					
	            	alert_func.success("密码修改成功,下次登录时生效",1000);
//	         
	            }
	            else {
	            	alert_func.error(results.retMsg);
	            }
	            
	     }); 
		
    });
    
</script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
</body>
</html>