<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>统计分析</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/analysis.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css"/>
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
            <a href="#">
                <li>
                    <span class="glyphicon glyphicon-flag" style="font-size: 22px">
                       <!--  <img src="<?php echo base_url(); ?>images/2017-08-04_180453.png" alt=""/> -->
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
            <a href="<?php echo site_url('manage_count/manage_count'); ?>" style="transform:scale(1.15);">
                <li >
                    <span class="glyphicon glyphicon-signal" style="font-size: 22px;color: #0288D1;">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-14_124453.png" alt=""/>-->
                    </span>
                    <p style="color: #0288D1" class="animated bounce">统计分析</p>
                </li>
            </a>
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
                        <a href="<?php echo site_url('manage_count/manage_count/jump'); ?>" >
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

       <center><div id="main" style="width: 1085px;height:450px;"></div></center> 

    </div>
</div>
<script src="<?php echo base_url(); ?>js/echarts.common.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/dark.js"></script>
<script>
echar_table = {
		 statistics_id:0,
		datetime:[],
	    show_data:[],
	    name:[],
	    myChart:'',
	    option:{
	        title: {
	            text: '<?=$flow[$type]?>流量图'
	        },
	        tooltip : {
	            trigger: 'axis',
	            axisPointer: {
	                type: 'cross',
	                label: {
	                    backgroundColor: '#6a7985'
	                }
	            },
	            formatter:function(a)
	            {
	                var relVal = "";
	                relVal  = a[0].axisValue +"<br />";
	                for( var i=a.length-1;i>=0;i-- ){
	                    relVal += a[i].marker+a[i].data+" bytes<br />" ;
	                }
	                return relVal;
	            }
	        },
	        legend: {
	            data:[]
	        },
	        toolbox: {

	            feature: {
	                magicType: {show: true, type: ['stack', 'tiled']},
	                saveAsImage: {show: true}
	            }
	        },
	        grid: {
	            left: '3%',
	            right: '4%',
	            bottom: '3%',
	            containLabel: true
	        },
	        xAxis : [
	            {
	                type : 'category',
	                boundaryGap : false,
	                data : [],
	            }
	        ],
	        yAxis : [
	            {
	                axisLabel:{
	                    formatter: '{value}',
	                },
	                type : 'value',
	            }
	        ],
	        series : [
	        ]
	    },
	    init:function(){
	        this.init_echarts()
	        this.init_data()
	        this.init_timeval()
	    },
	    init_echarts:function(){
	        this.myChart = echarts.init(document.getElementById('main'),'dark');
	        
	        this.myChart.setOption(this.option);
	    },
	    init_data:function(fun){
	    	this.myChart.showLoading()
	        $.getJSON(window_topo_web_path+'/manage_count/manage_count/statistics_info?statistics_id='+echar_table.statistics_id+'&node_type=<?=$type?>&callback=?').done(function (data) {
	            echar_table.data(data);
	        });
	    },
	    data:function(data){
	        echar_table.name=[];
	        if( !data['flow_info'] ){
	        	echar_table.myChart.hideLoading();
	            return;
	        }
	        this.statistics_id = data['statistics_id']
	        var time = data['time']
	        var max_flow = data['max_flow']
	        var step =data['step']
	        var k=0;
	        for( l in data['flow_info']) {
	            var datamum = [];

	            for ( var i=0;i<data['flow_info'][l].length;i++ ) {
	                datamum.push( data['flow_info'][l][i]['node_flow'] );
	            }

	            ob = {
	                name:l,
	                type:'line',
	                stack: '总量',
	                areaStyle: {normal: {}},
	                data:datamum,

	            }

	            echar_table.show_data[k] = ob

	            k++;


	            echar_table.name.push( l )
	        }


	        echar_table.myChart.hideLoading();
	        echar_table.myChart.setOption({
	            yAxis:{
	              //  max:max_flow
	            },
	            xAxis:{
	                data:time,
	                axisLabel : {
	                    interval: step
	                }
	            },
	            legend:{
	                data:echar_table.name
	            },

	            series: echar_table.show_data
	        });

	        echar_table.name =[];
	        echar_table.show_data=[]
	    },
	    init_timeval:function(){

	       setInterval(function(){
	           echar_table.init_data()
	       },10000)
	    }

	}

	echar_table.init();
</script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
</body>
</html>