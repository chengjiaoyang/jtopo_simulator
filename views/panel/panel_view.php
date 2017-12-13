<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>仪表面板</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/panel.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert.css"/>
    <script src="<?php echo base_url(); ?>js/jquery-1.11.3.js"></script>
    <script src="<?php echo base_url(); ?>js/alert.js"></script>
    <script src="<?php echo base_url(); ?>js/windows.js"></script>
    
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
                <a href="<?php echo site_url('panel/panel'); ?>" style="transform:scale(1.15);">
                    <li>

                    <span class="glyphicon glyphicon-home" style="font-size: 20px;color: #0288D1;">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180433.png" alt=""/>-->
                    </span>
                        <p style="color: #0288D1" class="animated bounce">仪表面板</p>

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
                <li class="animated wobble">Welcome, <span id="user" class="user"><?php echo $this->session->userdata('username');?></span></li>
                <li>
                    <span>
                        <a href="<?php echo site_url('login/logout'); ?>" >
                            <img src="<?php echo base_url(); ?>images/exit.png" alt="" id="exit" title="退出系统"/>
                        </a>
                    </span>
                </li>
            </ul>
        </div>
        <!-- 资源利用统计-->
        <div id="statistics">
            <ul>
                <!-- 环形数据图,以下为图片站位-->
                <!--<img src="<?php echo base_url(); ?>images/2017-08-08_150328.png" alt=""/>-->
                <li>系统资源利用统计</li>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.1s; animation-name: bounceInUp;">
                    <canvas id="one" width="120px" height="120px"></canvas>
                    <p class="canvas-word">CPU使用率</p>
                </li>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceInUp;">
                    <canvas id="two" width="120px" height="120px"></canvas>
                    <p class="canvas-word">内存使用率</p>
                </li>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.3s; animation-name: bounceInUp;">
                    <canvas id="three" width="120px" height="120px"></canvas>
                    <p class="canvas-word">硬盘使用率</p>
                </li>
            </ul>
        </div>
        <!-- 主面板-->
        <div id="section" style='padding-top:200px;'>
            
                <font size='7'><b>欢迎使用中国电信云计算实验室</b></font><br><font color='#0288D1' size='6'><b>网络模拟平台</b></font>
            
        </div>
    </div>
    <script>
    function drawCircle(_options){
        var options = _options || {};    //获取或定义options对象;
      //  options.angle = options.angle || 1;    //定义默认角度1为360度(角度范围 0-1);
        options.color = options.color || '#fff';    //定义默认颜色（包括字体和边框颜色）;
        options.lineWidth = options.lineWidth || 10;    //定义默认圆描边的宽度;
        options.lineCap = options.lineCap || 'square';    //定义描边的样式，默认为直角边，round 为圆角

        var oBoxOne = document.getElementById(options.id);
        var sCenter = oBoxOne.width / 2;    //获取canvas元素的中心点;
        var ctx = oBoxOne.getContext('2d');
        var nBegin = Math.PI / 2;    //定义起始角度;
        var nEnd = Math.PI * 2;    //定义结束角度;
        var grd = ctx.createLinearGradient(0, 0, oBoxOne.width, 0);    //grd定义为描边渐变样式;
        grd.addColorStop(0, 'red');
        grd.addColorStop(0.5, 'yellow');
        grd.addColorStop(1, 'green');

        
        function fomatFloat(src,pos){   
            return Math.round(src*Math.pow(10, pos))/Math.pow(10, pos);   
        } 

        ctx.textAlign = 'center';    //定义字体居中;
        ctx.font = 'normal normal bold 20px Arial';    //定义字体加粗大小字体样式;
        ctx.fillStyle = options.color == 'grd' ? grd : options.color;    //判断文字填充样式为颜色，还是渐变色;
        ctx.fillText(fomatFloat((options.angle * 100),2) + '%', sCenter, sCenter);    //设置填充文字;
		//alert(options.angle);
		//alert((options.angle * 100).toFixed(2));
		//alert(fomatFloat((options.angle * 100),2));
        //alert((options.angle * 100) + '%');//alert(sCenter);
        /*ctx.strokeStyle = grd;    //设置描边样式为渐变色;
         ctx.strokeText((options.angle * 100) + '%', sCenter, sCenter);    //设置描边文字(即镂空文字);*/
        ctx.lineCap = options.lineCap;
        ctx.strokeStyle = options.color == 'grd' ? grd : options.color;
        ctx.lineWidth = options.lineWidth;

        ctx.beginPath();    //设置起始路径，这段绘制360度背景;
        ctx.strokeStyle = '#D8D8D8';
        ctx.arc(sCenter, sCenter, (sCenter - options.lineWidth), -nBegin, nEnd, false);
        ctx.stroke();

        var imd = ctx.getImageData(0, 0, 240, 240);
        function draw(current) {    //该函数实现角度绘制;
            ctx.putImageData(imd, 0, 0);
            ctx.beginPath();
            ctx.strokeStyle = options.color == 'grd' ? grd : options.color;
            ctx.arc(sCenter, sCenter, (sCenter - options.lineWidth), -nBegin, (nEnd * current) - nBegin, false);
            ctx.stroke();
        }

        var t = 0;
        var timer = null;
        function loadCanvas(angle) {    //该函数循环绘制指定角度，实现加载动画;
            timer = setInterval(function(){
                if (t > angle) {
                    draw(options.angle);
                    clearInterval(timer);
                }else{
                    draw(t);
                    t += 0.02;
                }
            }, 20);
        }
        loadCanvas(options.angle);    //载入百度比角度  0-1 范围;
        timer = null;

    }
    var a={
        id: 'one',
//        color: '#F33D4A',
        angle: <?=$sys_manage['cur_cpu']?>,
        lineWidth: 9
    };
    var b={
        id: 'two',
//        color: '#FA6634',
        angle: <?=$sys_manage['cur_mem']?>,
        lineWidth: 9
    };
    var c={

        id: 'three',
//        color: '#0288D1',
        angle: <?=$sys_manage['cur_disk']?>,
        lineWidth: 9

    };

    var a_red = <?=$sys_manage['red_cpu']?>;
    var b_red = <?=$sys_manage['red_mem']?>;
    var c_red = <?=$sys_manage['red_disk']?>;
    var a_orange = <?=$sys_manage['orange_cpu']?>;
    var b_orange = <?=$sys_manage['orange_mem']?>;
    var c_orange = <?=$sys_manage['orange_disk']?>;
    
    color(a,a_red,a_orange);
    color(b,b_red,b_orange);
    color(c,c_red,c_orange);
    function color(n,b,l){

    	if(b=='' || l==''){
    		n.color="#99CC00"
        }
        
        if((n.angle<=l&& n.angle>0) || n.angle == '0.0'){
            n.color="#99CC00"
        }else if(n.angle<=b&& n.angle>l){
            n.color="#FA6634"
        }else if(n.angle>b || n.angle==0){
            n.color="#F33D4A"
        }
    }
    drawCircle(a);
    drawCircle(b);
    drawCircle(c);
    </script>
    <script src="<?php echo base_url(); ?>js/common.js"></script>
</body>
</html>