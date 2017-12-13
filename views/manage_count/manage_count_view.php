<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>统计分析</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/analysis.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css"/>
    <script src="<?php echo base_url(); ?>js/jquery-1.11.3.js"></script>
    <?php
include $this->config->item('abs_path').'/public/header.php'; 
?>
</head>
<body>
<div id="container">
    <!-- 左侧边栏-->
    <div id="left-navigation">
        <ul>
            <li class="animated wobble">
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
                        <!-- <img src="<?php echo base_url(); ?>images/2017-08-04_180453.png" alt=""/> -->
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
            <a href="<?php echo site_url('net_log/log'); ?>">
                <li >
                    <span class="glyphicon glyphicon-list-alt" style="font-size: 22px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180522.png" alt=""/>-->
                    </span>
                    <p>日志管理</p>
                </li>
            </a>
            
            <?php if ($this->session->userdata('root') == 'True') {?>
            
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
                <li class="animated fadeInRight"><img src="<?php echo base_url(); ?>images/SDyun.png" alt=""/><span>统计分析</span></li>
            </ul>
        </div>
        <div id="create-newUsers">
            <ul>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.1s; animation-name: bounceInUp;">
                    <a href="<?php echo site_url('manage_count/manage_count/jump?node_type=HOST'); ?>">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u380.svg" alt="" id="hosts"/>
                        <p>客户端</p>
                    </a>
                </li>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceInUp;">
                    <a href="<?php echo site_url('manage_count/manage_count/jump?node_type=SERVER'); ?>">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u384.svg" alt="" id="servers"/>
                        <p>服务器</p>
                    </a>
                </li>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.3s; animation-name: bounceInUp;">
                    <a href="<?php echo site_url('manage_count/manage_count/jump?node_type=L2SWITCH'); ?>">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u386.svg" alt="" id="stw2"/>
                        <p>2层交换机</p>
                    </a>
                </li>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.4s; animation-name: bounceInUp;">
                    <a href="<?php echo site_url('manage_count/manage_count/jump?node_type=L3SWITCH'); ?>">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u376.svg" alt="" id="stw3"/>
                        <p>3层交换机</p>
                    </a>
                </li>

            </ul>
            <ul>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;">
                    <a href="<?php echo site_url('manage_count/manage_count/jump?node_type=ROUTER'); ?>">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u382.svg" alt="" id="routers"/>
                        <p>路由器</p>
                    </a>
                </li>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.6s; animation-name: bounceInUp;">
                    <a href="<?php echo site_url('manage_count/manage_count/jump?node_type=FIREWAILL'); ?>">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u388.svg" alt="" id="firewall"/>
                        <p>防火墙</p>
                    </a>
                </li>


                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.9s; animation-name: bounceInUp;">
                    <a href="<?php echo site_url('manage_count/manage_count/jump?node_type=SDNSWITCH'); ?>">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u1811.svg" alt="" id="sdnstw"/>
                        <p>SDN交换机</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>js/common.js"></script>
</body>
</html>