<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>系统管理</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>css/system-manage.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/honeySwitch.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert.css"/>
    <script src="<?php echo base_url(); ?>js/jquery-1.11.3.js"></script>
    <script src="<?php echo base_url(); ?>js/alert.js"></script>
    <script src="<?php echo base_url(); ?>js/windows.js"></script>
    
    <script src="<?php echo base_url(); ?>js/system-manage.js"></script>
    <script src="<?php echo base_url(); ?>js/honeySwitch.js"></script>
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
            
            <a href="<?php echo site_url('sys_manage/sys_manage'); ?>" style="transform:scale(1.15);">
                <li >
                    <span class="glyphicon glyphicon-cog" style="font-size: 22px;color: #0288D1;">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180543.png" alt=""/>-->
                    </span>
                    <p style="color: #0288D1" class="animated bounce">系统管理</p>
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
            

            <a href="<?php echo site_url('personal/personal'); ?>">
                <li >
                    <span class="glyphicon glyphicon-envelope" style="font-size: 22px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-14_124507.png" alt=""/>-->
                    </span>
                    <p>个人中心</p>
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
        <!-- 切换面板-->
        <div id="top-navigation-tab">
            <ul>
                <li><a href="#login-log">系统配置</a></li>
                <!--<li><a href="#operate-log">网元预设</a></li>-->
                <li><a href="#system-log">网管配置</a></li>
            </ul>
        </div>
    </div>
    <!-- 主面板-->
    <div id="boxall">
        <div id="login-log">
            <div id="login-log-box">
                <div class="value deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.1s; animation-name: bounceInUp;">
                    <p>CPU使用率告警阈值设置</p>
                    <ul id="cpusy">
                        <li>
                            <img src="<?php echo base_url(); ?>images/2017-08-17_161143.png" alt=""/><span>橙色预警触发值</span>
                        </li>
                        <li id="control1">
                            <div>

                                <div id="tiaotiao">
                                    <div id="yuan"></div>
                                    <div id="jin-du"></div>
                                </div>
                                <input type="text" id="input" value="<?=isset($sys_manage['orange_cpu']) && $sys_manage['orange_cpu'] ? $sys_manage['orange_cpu']*100 :'';?>" placeholder="0" autocomplete="off"><span>%</span>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo base_url(); ?>images/2017-08-17_161203.png" alt=""/><span>红色预警触发值</span>
                        </li>
                        <li id="control2">
                            <div>

                                <div id="tiaotiao2">
                                    <div id="yuan2"></div>
                                    <div id="jin-du2"></div>
                                </div>
                                <input type="text" id="input2" value="<?=isset($sys_manage['red_cpu']) && $sys_manage['red_cpu'] ? $sys_manage['red_cpu']*100 :'';?>" placeholder="0" autocomplete="off"><span>%</span>
                            </div>
                        </li>
                    </ul>

                </div>
                <div class="value deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceInUp;">
                    <p>内存使用率告警阈值设置</p>
                    <ul id="cpusy2">
                        <li>
                            <img src="<?php echo base_url(); ?>images/2017-08-17_161143.png" alt=""/><span>橙色预警触发值</span>
                        </li>
                        <li id="control3">
                            <div>

                                <div id="tiaotiao3">
                                    <div id="yuan3"></div>
                                    <div id="jin-du3"></div>
                                </div>
                                <input type="text" id="input3" value="<?=isset($sys_manage['orange_mem']) && $sys_manage['orange_mem'] ? $sys_manage['orange_mem']*100 :'';?>" placeholder="0" autocomplete="off"><span>%</span>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo base_url(); ?>images/2017-08-17_161203.png" alt=""/><span>红色预警触发值</span>
                        </li>
                        <li id="control4">
                            <div>

                                <div id="tiaotiao4">
                                    <div id="yuan4"></div>
                                    <div id="jin-du4"></div>
                                </div>
                                <input type="text" id="input4" value="<?=isset($sys_manage['red_mem']) && $sys_manage['red_mem'] ? $sys_manage['red_mem']*100 :'';?>" placeholder="0" autocomplete="off"><span>%</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="value deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.3s; animation-name: bounceInUp;">
                    <p>硬盘使用率告警阈值设置</p>
                    <ul id="cpusy3">
                        <li>
                            <img src="<?php echo base_url(); ?>images/2017-08-17_161143.png" alt=""/><span>橙色预警触发值</span>
                        </li>
                        <li id="control5">
                            <div>

                                <div id="tiaotiao5">
                                    <div id="yuan5"></div>
                                    <div id="jin-du5"></div>
                                </div>
                                <input type="text" id="input5" value="<?=isset($sys_manage['orange_disk']) && $sys_manage['orange_disk'] ? $sys_manage['orange_disk']*100 :'';?>" placeholder="0" autocomplete="off"><span>%</span>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo base_url(); ?>images/2017-08-17_161203.png" alt=""/><span>红色预警触发值</span>
                        </li>
                        <li id="control6">
                            <div>

                                <div id="tiaotiao6">
                                    <div id="yuan6"></div>
                                    <div id="jin-du6"></div>
                                </div>
                                <input type="text" id="input6" value="<?=isset($sys_manage['red_disk']) && $sys_manage['red_disk'] ? $sys_manage['red_disk']*100 :'';?>" placeholder="0" autocomplete="off"><span>%</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <button id="btn-b" class="animated slideInUp" style="visibility: visible; animation-delay: 0.1s; animation-name: flip;" >保存</button>
            <button id="btn-r" class="animated slideInUp" style="visibility: visible; animation-delay: 0.2s; animation-name: flip;">重置</button>
        </div>
        <div id="system-log">
            <div>
                <p class="system-log-title">SNMP设置</p>

                <form action="">
                    <div class="common-row" >
                        <div class="cell-left">启用SNMP</div>
                        <div class="cell-right"><span class="switch-off" themeColor="#1190DB" id="directory"></span></div>
                    </div>

                </form>
            <button id="btn-b-snmp" class="animated slideInUp" style="visibility: visible; animation-delay: 0.1s; animation-name: flip;">保存</button>
            <button id="btn-r-snmp" class="animated slideInUp" style="visibility: visible; animation-delay: 0.2s; animation-name: flip;">重置</button>
            </div>

        </div>
    </div>
</div>
<script>
        $('#btn-b-snmp').click(function(){

	    setTimeout( function(){
	    	alert_func.success('保存成功',800)},1000)
	})

	//保存

	$("#btn-b").click(function(){


		
		var orange_cpu = $("#input").val();
		var red_cpu = $("#input2").val();
		var orange_mem = $("#input3").val();
		var red_mem = $("#input4").val();
		var orange_disk = $("#input5").val();
		var red_disk = $("#input6").val();

		var obj = {
				'orange_cpu':orange_cpu/100,
				'red_cpu':red_cpu/100,
				'orange_mem':orange_mem/100,
				'red_mem':red_mem/100,
				'orange_disk':orange_disk/100,
				'red_disk':red_disk/100
			};

		$.post('<?php echo site_url("sys_manage/sys_manage/add_sys"); ?>',obj,function(result) {
			var results = eval("(" + result + ")");
            
            if(results.retCode == "0" ) {
            	alert_func.success('保存成功',800)
            }
            else {
            	alert_func.error(results.retMsg);
            }
		})
	});


	
	
	//重置
	
	$("#btn-r").click(function(){
		$("#input").val(0);
		$("#input2").val(0);
		$("#input3").val(0);
		$("#input4").val(0);
		$("#input5").val(0);
		$("#input6").val(0);		
		$("#input").trigger("oninput");
		$("#input2").trigger("oninput");
		$("#input3").trigger("oninput");
		$("#input4").trigger("oninput");
		$("#input5").trigger("oninput");
		$("#input6").trigger("oninput");
	}); 
	
    (function(){
        var input =document.getElementById("input");
        var yuan =document.getElementById("yuan");
        var jindu =document.getElementById("jin-du");
        var tiao =document.getElementById("tiaotiao");
        var control1 =document.getElementById("control1");
        var tiaoW =tiao.offsetWidth;
        function schedule(){

            var isfalse =false; //控制滑动

            yuan.onmousedown =function(e){
                isfalse =true;

                var X =e.clientX; //获取当前元素相对于窗口的X左边

                var offleft =this.offsetLeft; //当前元素相对于父元素的左边距

                var max = tiao.offsetWidth - this.offsetWidth; //宽度的差值

                document.body.onmousemove=function(e){
                    if (isfalse === false){
                        return;
                    }
                    var changeX= e.clientX; //在移动的时候获取X坐标

                    var moveX =Math.min(max,Math.max(-2,offleft+(changeX-X))); //超过总宽度取最大宽
                    input.value =Math.round(Math.max(0,moveX / max) * 100);
                    yuan.style.marginLeft =Math.max(0, moveX) +"px";
                    jindu.style.width =moveX +"px";
                }

            }
            control1.onmouseup =function(){
                isfalse =false;
            }

            var minValue =0;
            var maxValue =100;

            var lla=input.value;
            var yyy =lla/100*tiaoW;
            yuan.style.marginLeft =yyy +"px";
            jindu.style.width =yyy +"px";
            input.oninput =function(){

                var theV =this.value*1;
                if(theV >maxValue || theV <minValue){
                	alert_func.error("输入的数值不正确");
                    input.value ="0";
                    jindu.style.width ="0px";
                    yuan.style.marginLeft ="0px";
                    return;
                }
                var xxx =theV/100*tiaoW;
                yuan.style.marginLeft =xxx +"px";
                jindu.style.width =xxx +"px";
            }
        }
        schedule();
    })();
    (function(){
        var input =document.getElementById("input2");
        var yuan =document.getElementById("yuan2");
        var jindu =document.getElementById("jin-du2");
        var tiao =document.getElementById("tiaotiao2");
        var control2 =document.getElementById("control2");

        var tiaoW =tiao.offsetWidth;
        function schedule(){

            var isfalse =false; //控制滑动

            yuan.onmousedown =function(e){
                isfalse =true;

                var X =e.clientX; //获取当前元素相对于窗口的X左边

                var offleft =this.offsetLeft; //当前元素相对于父元素的左边距

                var max = tiao.offsetWidth - this.offsetWidth; //宽度的差值

                document.body.onmousemove=function(e){
                    if (isfalse == false){
                        return;
                    }
                    var changeX= e.clientX; //在移动的时候获取X坐标

                    var moveX =Math.min(max,Math.max(-2,offleft+(changeX-X))); //超过总宽度取最大宽
                    input.value =Math.round(Math.max(0,moveX / max) * 100);
                    yuan.style.marginLeft =Math.max(0, moveX) +"px";
                    jindu.style.width =moveX +"px";
                }
            }
            control2.onmouseup =function(){
                isfalse =false;
            }

            var minValue =0;
            var maxValue =100;
            var lla=input.value;
            var yyy =lla/100*tiaoW;
            yuan.style.marginLeft =yyy +"px";
            jindu.style.width =yyy +"px";
            input.oninput =function(){
                var theV =this.value*1;
                if(theV >maxValue || theV <minValue){
                	alert_func.error("输入的数值不正确");
                    input.value ="";
                    jindu.style.width ="0px";
                    yuan.style.marginLeft ="0px";
                    return;
                }
                var xxx =theV/100*tiaoW;
                yuan.style.marginLeft =xxx +"px";
                jindu.style.width =xxx +"px";
            }
        }
        schedule();
    })();
    (function(){
        var input =document.getElementById("input3");
        var yuan =document.getElementById("yuan3");
        var jindu =document.getElementById("jin-du3");
        var tiao =document.getElementById("tiaotiao3");
        var control3 =document.getElementById("control3");

        var tiaoW =tiao.offsetWidth;
        function schedule(){

            var isfalse =false; //控制滑动

            yuan.onmousedown =function(e){
                isfalse =true;

                var X =e.clientX; //获取当前元素相对于窗口的X左边

                var offleft =this.offsetLeft; //当前元素相对于父元素的左边距

                var max = tiao.offsetWidth - this.offsetWidth; //宽度的差值

                document.body.onmousemove=function(e){
                    if (isfalse == false){
                        return;
                    }
                    var changeX= e.clientX; //在移动的时候获取X坐标

                    var moveX =Math.min(max,Math.max(-2,offleft+(changeX-X))); //超过总宽度取最大宽
                    input.value =Math.round(Math.max(0,moveX / max) * 100);
                    yuan.style.marginLeft =Math.max(0, moveX) +"px";
                    jindu.style.width =moveX +"px";
                }
            }
            control3.onmouseup =function(){
                isfalse =false;
            }

            var minValue =0;
            var maxValue =100;
            var lla=input.value;
            var yyy =lla/100*tiaoW;
            yuan.style.marginLeft =yyy +"px";
            jindu.style.width =yyy +"px";
            input.oninput =function(){
                var theV =this.value*1;
                if(theV >maxValue || theV <minValue){
                	alert_func.error("输入的数值不正确");
                    input.value ="";
                    jindu.style.width ="0px";
                    yuan.style.marginLeft ="0px";
                    return;
                }
                var xxx =theV/100*tiaoW;
                yuan.style.marginLeft =xxx +"px";
                jindu.style.width =xxx +"px";
            }
        }
        schedule();
    })();
    (function(){
        var input =document.getElementById("input4");
        var yuan =document.getElementById("yuan4");
        var jindu =document.getElementById("jin-du4");
        var tiao =document.getElementById("tiaotiao4");
        var control4 =document.getElementById("control4");

        var tiaoW =tiao.offsetWidth;
        function schedule(){

            var isfalse =false; //控制滑动

            yuan.onmousedown =function(e){
                isfalse =true;

                var X =e.clientX; //获取当前元素相对于窗口的X左边

                var offleft =this.offsetLeft; //当前元素相对于父元素的左边距

                var max = tiao.offsetWidth - this.offsetWidth; //宽度的差值

                document.body.onmousemove=function(e){
                    if (isfalse == false){
                        return;
                    }
                    var changeX= e.clientX; //在移动的时候获取X坐标

                    var moveX =Math.min(max,Math.max(-2,offleft+(changeX-X))); //超过总宽度取最大宽
                    input.value =Math.round(Math.max(0,moveX / max) * 100);
                    yuan.style.marginLeft =Math.max(0, moveX) +"px";
                    jindu.style.width =moveX +"px";
                }
            }
            control4.onmouseup =function(){
                isfalse =false;
            }

            var minValue =0;
            var maxValue =100;
            var lla=input.value;
            var yyy =lla/100*tiaoW;
            yuan.style.marginLeft =yyy +"px";
            jindu.style.width =yyy +"px";
            input.oninput =function(){
                var theV =this.value*1;
                if(theV >maxValue || theV <minValue){
                	alert_func.error("输入的数值不正确");
                    input.value ="";
                    jindu.style.width ="0px";
                    yuan.style.marginLeft ="0px";
                    return;
                }
                var xxx =theV/100*tiaoW;
                yuan.style.marginLeft =xxx +"px";
                jindu.style.width =xxx +"px";
            }
        }
        schedule();
    })();
    (function(){
        var input =document.getElementById("input5");
        var yuan =document.getElementById("yuan5");
        var jindu =document.getElementById("jin-du5");
        var tiao =document.getElementById("tiaotiao5");
        var control5 =document.getElementById("control5");

        var tiaoW =tiao.offsetWidth;
        function schedule(){

            var isfalse =false; //控制滑动

            yuan.onmousedown =function(e){
                isfalse =true;

                var X =e.clientX; //获取当前元素相对于窗口的X左边

                var offleft =this.offsetLeft; //当前元素相对于父元素的左边距

                var max = tiao.offsetWidth - this.offsetWidth; //宽度的差值

                document.body.onmousemove=function(e){
                    if (isfalse == false){
                        return;
                    }
                    var changeX= e.clientX; //在移动的时候获取X坐标

                    var moveX =Math.min(max,Math.max(-2,offleft+(changeX-X))); //超过总宽度取最大宽
                    input.value =Math.round(Math.max(0,moveX / max) * 100);
                    yuan.style.marginLeft =Math.max(0, moveX) +"px";
                    jindu.style.width =moveX +"px";
                }
            }
            control5.onmouseup =function(){
                isfalse =false;
            }

            var minValue =0;
            var maxValue =100;
            var lla=input.value;
            var yyy =lla/100*tiaoW;
            yuan.style.marginLeft =yyy +"px";
            jindu.style.width =yyy +"px";
            input.oninput =function(){
                var theV =this.value*1;
                if(theV >maxValue || theV <minValue){
                	alert_func.error("输入的数值不正确");
                    input.value ="";
                    jindu.style.width ="0px";
                    yuan.style.marginLeft ="0px";
                    return;
                }
                var xxx =theV/100*tiaoW;
                yuan.style.marginLeft =xxx +"px";
                jindu.style.width =xxx +"px";
            }
        }
        schedule();
    })();
    (function(){
        var input =document.getElementById("input6");
        var yuan =document.getElementById("yuan6");
        var jindu =document.getElementById("jin-du6");
        var tiao =document.getElementById("tiaotiao6");
        var control6 =document.getElementById("control6");

        var tiaoW =tiao.offsetWidth;
        function schedule(){

            var isfalse =false; //控制滑动

            yuan.onmousedown =function(e){
                isfalse =true;

                var X =e.clientX; //获取当前元素相对于窗口的X左边

                var offleft =this.offsetLeft; //当前元素相对于父元素的左边距

                var max = tiao.offsetWidth - this.offsetWidth; //宽度的差值

                document.body.onmousemove=function(e){
                    if (isfalse == false){
                        return;
                    }
                    var changeX= e.clientX; //在移动的时候获取X坐标

                    var moveX =Math.min(max,Math.max(-2,offleft+(changeX-X))); //超过总宽度取最大宽
                    input.value =Math.round(Math.max(0,moveX / max) * 100);
                    yuan.style.marginLeft =Math.max(0, moveX) +"px";
                    jindu.style.width =moveX +"px";
                }
            }
            control6.onmouseup =function(){
                isfalse =false;
            }

            var minValue =0;
            var maxValue =100;
            var lla=input.value;
            var yyy =lla/100*tiaoW;
            yuan.style.marginLeft =yyy +"px";
            jindu.style.width =yyy +"px";
            input.oninput =function(){
                var theV =this.value*1;
                if(theV >maxValue || theV <minValue){
                	alert_func.error("输入的数值不正确");
                    input.value ="";
                    jindu.style.width ="0px";
                    yuan.style.marginLeft ="0px";
                    return;
                }
                var xxx =theV/100*tiaoW;
                yuan.style.marginLeft =xxx +"px";
                jindu.style.width =xxx +"px";
            }
        }
        schedule();
    })()
</script>

<script>
    var as=document.querySelectorAll("#top-navigation-tab a");
    var lis=document.querySelectorAll("#top-navigation-tab>ul>li");
    var nav=document.querySelector("#top-navigation-tab");
    as[0].setAttribute('style','border-bottom:3px solid #0288D1;color:#0288D1');
    nav.addEventListener("click",function(e){
        if(e.target && e.target.nodeName == "A"){
            for(var i =0;i<as.length;i++){
                if(i<as.length){
                    as[i].setAttribute('style','border-bottom:3px solid transparent');
                }
                e.target.setAttribute('style','border-bottom:3px solid #0288D1;color:#0288D1');

            }
        }
    });

</script>
<script>
//    window.onload = function(){
//        document.cookie = $('#input1').val();
//        document.cookie = 'uname=tom';
//    }
$(function(){

    switchEvent("#directory",function(){
        $("#directory_content_mask").fadeOut();

    },function(){
        $("#directory_content_mask").fadeIn();
    });

    switchEvent("#directory2",function(){
        $("#directory_content_mask2").fadeOut();

    },function(){
        $("#directory_content_mask2").fadeIn();
    });
});
</script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
</body>
</html>
