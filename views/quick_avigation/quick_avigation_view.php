<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>快速向导</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/quick-avigation.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css"/>
     <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert.css"/>
     <script src="<?php echo base_url(); ?>js/jquery-1.11.3.js"></script>
    <script src="<?php echo base_url(); ?>js/alert.js"></script>
    <script src="<?php echo base_url(); ?>js/windows.js"></script>
    
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<?php
include $this->config->item('abs_path').'/public/header.php'; 
?>
<style>
       .modal-backdrop{
                            z-index:975;
                        }
                        #myModal{
                            z-index:987;
                        }
</style>
</head>
<body>
<script>
    $(function(){
        $("#create input").change(function(){
            $('#create label').removeClass('visited animated rubberBand');
            $('#create :checked').next().addClass('visited animated rubberBand');
//                $(":checked");
//            parent().addClass("visited").siblings().removeClass("visited");

        });



    });

//    $("input[type=radio]").bind('click',function(event){
//        alert($(this).next().text()); //被点击的radio的label的值
//    })
</script>
<div id="myModal" class="modal" data-backdrop="static">
    <!--第二层-->
    <div class="">
        <!--第三层 :背景，边框，倒角，阴影-->
        <div class="modal-content">
            <!--第四层：控制内容-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="modal-title">新建拓扑</h4>
            </div>
            <div class="modal-body">
                <form>
                    <fieldset id="fieldset">
                        <div class="form-group">
                            <label for="disabledTextInput">拓扑名称</label>
                            <input type="text" id="disabledTextInput" class="form-control">
                        </div>
                        <!--<div class="form-group" id="topo_type_kb" style="display: none">-->
                            <!--<label for="disabledTextInput2">拓扑类型</label>-->
                            <!--&lt;!&ndash;<input type="text" id="disabledTextInput2" class="form-control">&ndash;&gt;-->
                            <!--<select class="form-control">-->
                                <!--<option>1</option>-->
                                <!--<option>2</option>-->
                                <!--<option>3</option>-->
                                <!--<option>4</option>-->
                                <!--<option>5</option>-->
                            <!--</select>-->
                        <!--</div>-->
                        <div class="form-group" id="topo_type_kb" style="display: none">
                            <select name="disabledTextInput2" id="disabledTextInput2" class="form-control">
                                <option value="传统拓扑">传统拓扑</option>
                                <option value="SDN拓扑">SDN拓扑</option>
                            </select>
                        </div>
                        <button type="button" id="modal-sure">确定</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="modal-exit">取消</button>
                    </fieldset>
                </form>

            </div>

        </div>
    </div>
</div>
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
            <a href="<?php echo site_url('quick_avigation/quick_avigation'); ?>" style="transform:scale(1.15)">
                <li>
                    <span class="glyphicon glyphicon-flag" style="font-size: 22px;color: #0288D1;">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180453.png" alt=""/>-->
                    </span>
                    <p style="color: #0288D1" class="animated bounce">快速向导</p>
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
        <div id="quick-create">
            <ul>
                <li class="animated fadeInRight" style="visibility: visible; animation-delay: 0.1s; animation-name: bounceInUp;">快速创建拓扑向导</li>
                <li class="animated fadeInRight">从列表中选择一种拓扑模板，或选择从空白模板重新绘制拓扑</li>
            </ul>
        </div>
        <div id="create">
            <ul>
                <input type="radio" name="topo_style" id="oh_topo"/>
                <label for="oh_topo">
                    <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.1s; animation-name: bounceInUp;">
                    <span class="create-span" id="blank-topology">空白拓扑</span>
                    </li>
                </label>

                <input type="radio" name="topo_style" id="oh_topo_1"/>
                <label for="oh_topo_1" data="1">
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceInUp;">
                    <img src="<?php echo base_url(); ?>images/u584.png" alt=""/>
                    <span class="create-span">经典三层网络</span>
                </li>
                </label>

                <input type="radio" name="topo_style" id="oh_topo_2"/>
                <label for="oh_topo_2" data="2">
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.3s; animation-name: bounceInUp;">
                    <img src="<?php echo base_url(); ?>images/u591.png" alt=""/>
                    <span class="create-span">带路由器的网络</span>
                </li>
                </label>

                <input type="radio" name="topo_style" id="oh_topo_3"/>
                <label for="oh_topo_3" data="3">
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.4s; animation-name: bounceInUp;">
                    <img src="<?php echo base_url(); ?>images/u598.png" alt=""/>
                    <span class="create-span">带防火墙的网络</span>
                </li>
                </label>
            </ul>
            <ul>
                <input type="radio" name="topo_style" id="oh_topo_4"/>
                <label for="oh_topo_4" data="4">
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;">
                    <img src="<?php echo base_url(); ?>images/u605.png" alt=""/>
                    <span class="create-span">经典SDN网络</span>
                </li>
                </label>

                <input type="radio" name="topo_style" id="oh_topo_5"/>
                <label for="oh_topo_5" data="5">
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.6s; animation-name: bounceInUp;">
                    <img src="<?php echo base_url(); ?>images/u612.png" alt=""/>
                    <span class="create-span">BGP</span>
                </li>
                </label>

                <input type="radio" name="topo_style" id="oh_topo_6"/>
                <label for="oh_topo_6" data="6">
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.7s; animation-name: bounceInUp;">
                    <img src="<?php echo base_url(); ?>images/u619.png" alt=""/>
                    <span class="create-span">RIP v1 & v2</span>
                </li>
                </label>

                <input type="radio" name="topo_style" id="oh_topo_7"/>
                <label for="oh_topo_7" data="7">
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.8s; animation-name: bounceInUp;">
                    <img src="<?php echo base_url(); ?>images/u626.png" alt=""/>
                    <span class="create-span">OSPF 2-4</span>
                </li>
                </label>
            </ul>
            <button id="btn" data-toggle="modal" data-target="#myModal">创建</button>
        </div>
    </div>
</div>
<script>
    $('#modal-sure').click(function () {


        var myTopoName = $('#disabledTextInput').val();
        var myTopoType=$('#disabledTextInput2').val();
         if($('#create :checked').get(0).id=='oh_topo_4'){
                    myTopoType='SDN拓扑'
                }
        localStorage['toponame'] = myTopoName;
        localStorage['topotype'] = myTopoType;

        var create_id=0;
        if( $("#create").find(".visited").attr('data') ){
            create_id = $("#create").find(".visited").attr('data');
        }

        var obj = {
				"toponame":myTopoName,
				"topotype":myTopoType
           };
        
        if(myTopoName !=''){

       	 $.post('<?php echo site_url('topo_manage/topo_manage/check_topo_name'); ?>',obj,function(result) {
        		
        		if (result) {
					
                   if (result.retCode == '9999'){
                	   alert_func.error('网络错误！');return;
                     }
                   
                    if(result.retCode == "0" ) {

                        var topo_name_id = result.topo_name_id;
                   	 window.location.href = "<?php echo site_url('topo_manage/topo_manage/check_topo'); ?>"+"?id="+topo_name_id+"&create_id="+create_id+'&name='+myTopoName;
                    }else{
                    	alert_func.error(result.retMsg);
                    }
        		}
                
    		},'json');
            
       	
        }else{alert_func.error('拓扑名称不能为空');return;}

    });
    $('#btn').click(function () {
        if($('#create :checked').get(0).id=='oh_topo'){

            $('#topo_type_kb').show()
        }else{
            $('#topo_type_kb').hide()
        }
    })
</script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
</body>
</html>