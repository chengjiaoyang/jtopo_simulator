<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>查看拓扑</title>
    <meta http-equiv="pragma"   content="no-cache" />
    <meta http-equiv="Cache-Control" content="no-cache,must-revalidate" />
    <meta http-equiv="expires" content="Wed,26 Feb 1997 08:21:57 GMT" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/check-topology.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/tabStyle.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/base.css"/>
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/honeySwitch.css"/>-->
    <script src="<?php echo base_url(); ?>js/jquery-1.11.3.js"></script>
    <script src="<?php echo base_url(); ?>js/jtopo-min.js"></script>
    <script src="<?php echo base_url(); ?>js/tabScript.js"></script>
    <script src="<?php echo base_url(); ?>js/toolbar.js"></script>
    <script src="<?php echo base_url(); ?>js/underscore-1.8.2.min.js"></script>
	  <script src="<?php echo base_url(); ?>js/alert.js"></script>
    <script src="<?php echo base_url(); ?>js/windows.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/alert.css"/>
    <!--<script src="<?php echo base_url(); ?>js/honeySwitch.js"></script>-->
    <script>
        var window_topo_web_path = 'http://10.10.1.67:8080/net/index.php';
        var window_topo_static_path = "<?php echo base_url(); ?>";
    </script>
    <style type="text/css">
    /* 控制台样式 */
*{
    margin: 0;
    padding: 0;
}
.terminal-box {
    width: 580px;
    background-color: #ccc;
    border: 1px #0288D1 solid;
}
.terminal-box .search-input{
    width: 80%;
    border: none;
    background-color: rgba(0,0,0,0);
    outline: none;
}
.terminal-box .form-box{
    padding-top: 10px;
}
.header-terminal{
    height: 30px;
    width: 100%;
    background-color: #0288D1;
    color: #fff;
    line-height: 29px;
}
.header-terminal .terminal-name{
    float: left;
    padding:0 10px;
}
.header-terminal .close-terminal{
    float: right;
    width: 60px;
    text-align: center;
}
.header-terminal .close-terminal:hover{
    background-color: #c00;
    cursor: pointer;
}
.content-terminal{
    height: 400px;
    overflow: auto;
}

        /*遮罩1*/
        .modal-all {
            display: none;
            width: 100%;
            height:1000px;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background: rgba(0,0,0, .5);
            z-index: 999;

        }
        .modal-dialog {
            width: 600px;
            margin: 100px auto;

        }
        .modal-content {
            background: #fff;
            border: 1px solid #aaa;
            border-radius: 3px;
            box-shadow: 0 0 5px #aaa;
            padding: 16px 12px;
            transform: translate(0,20px);
            height: 610px;
        }
        .modal-content h4 {
            font-size: 1.5em;
        }
        .modal-content .alert {
            margin: 15px 0;
            border: 1px solid #e4393c;
            background: #fee;
            color: #e4393c;
            font-weight: bold;
            padding: 6px;
            border-radius: 2px;
        }
        .modal-content input {
            box-sizing: border-box; /*总宽=width+margin*/
            width: 100%;
            margin: 6px 0;
            line-height: 2em;
            border: 1px solid #aaa;
            border-radius: 2px;
            padding: 2px 6px;

        }
        .page {
            width: 800px;
            margin: 0 auto;
            padding: 15px;
            background: white;
        }
        h1, h2 {
            margin: 0;
            text-align: center;
            margin-bottom: 15px;
        }
        .common-row {
            width: 100%;
            height: 50px;
            border-bottom: 1px solid lightgrey;
        }
        .cell-left, .cell-right {
            width: 49%;
            height: 100%;
            float: left;
            line-height: 50px;
        }
        .cell-right {
            text-align: right;
        }
        .switch-on, .switch-off {
            margin-top: 9px;
        }
        .showBox {
            width: 100%;
            border: 1px solid lightgrey;
            border-radius: 6px;
            font-size: 16px;
            background: #CCFF99;
        }
        .paragraph {
            white-space: pre-wrap;
            margin: 15px 0;
            word-break: break-all;
            word-wrap: break-word;
        }
        textarea {
            width: 80%;
            border: none;
            outline: none;
            resize: none;
            font-size: 16px;
            height: auto;
            overflow: visible;
        }
        .hidden {
            display: none;
        }
        @media screen and (max-width: 800px) {
            .page {
                width: 100%;
                box-sizing: border-box;
            }
        }
        
        .dialog-title
        {          
            cursor:move;
        }

    </style>

    <script>
        function C( str ){
            console.log( str )
        }
        $(function(){

            loadTab();

            //$("#modal-btn-")
            $("[id^=modal-btn-]").click(function(){
                $(this).parents('.modal-all').find("ul.tabs li:first a").click();
                $(this).parents('.modal-all').hide();
                $(this).parents('form').get(0).reset();
            });


            $('#modal-switchboard-form-11-btn2').click(
                    function () {

                        $('#new_router2').show();
                    }
            );

            $('.modal_2_btn_exit').click(
                    function () {
                        $('.modal_all_2_m').hide()
                    }
            );
            $('.modal_2_btn_exit').click(
                    function () {
                        $('.modal_all_2_m').hide()
                    }
            );


            $('#modal-yun-form-3-btn').click(function () {
                $('#new_cloud_b').show();
            });



        });


    </script>

</head>
<body>
<div id="section_chart"  style="display: none;overflow: hidden">
    <div id="section_chart_slider">
        <div id="user-manage"  class="dialog-title" style="position: absolute">
            <ul>
                <li class="animated fadeInRight"><img src="http://10.10.1.67:8080/net/images/SDyun.png" alt="" id="ala_blacky"/><span>统计分析</span></li>
                <li id="chart_right" style="visibility: hidden"><span class="glyphicon glyphicon-arrow-left"></span></li>
                <li style="float: right" id="ala_close"><span class="glyphicon glyphicon-remove"></span></li>
            </ul>
        </div>
        <div id="create-newUsers" style="overflow: hidden" >
            <ul>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.1s; animation-name: bounceInUp;">
                    <a href="#####" id="HOST">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u380.svg" alt="" id="hosts"/>
                        <p>客户端</p>
                    </a>
                </li>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceInUp;">
                    <a href="#####" id="SERVER">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u384.svg" alt="" id="servers"/>
                        <p>服务器</p>
                    </a>
                </li>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.3s; animation-name: bounceInUp;">
                    <a href="#####" id="L2SWITCH">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u386.svg" alt="" id="stw2"/>
                        <p>2层交换机</p>
                    </a>
                </li>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.4s; animation-name: bounceInUp;">
                    <a href="#####" id="L3SWITCH">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u376.svg" alt="" id="stw3"/>
                        <p>3层交换机</p>
                    </a>
                </li>

            </ul>
            <ul>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;">
                    <a href="#####" id="ROUTER">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u382.svg" alt="" id="routers"/>
                        <p>路由器</p>
                    </a>
                </li>
                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.6s; animation-name: bounceInUp;">
                    <a href="#####" id="FIREWAILL">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u388.svg" alt="" id="firewall"/>
                        <p>防火墙</p>
                    </a>
                </li>


                <li class="deanzxone deanactions bounceInUp animated" style="visibility: visible; animation-delay: 0.9s; animation-name: bounceInUp;">
                    <a href="#####" id="SDNSWITCH">
                        <img src="http://10.10.1.67:8080/net/images/u72.png" alt=""/>
                        <img src="http://10.10.1.67:8080/net/images/u1811.svg" alt="" id="sdnstw"/>
                        <p>SDN交换机</p>
                    </a>
                </li>

            </ul>
        </div>
          <div id="main">

          </div>
    </div>

</div>
<!--2层弹窗-->
<!--3级交换机 新建镜像-->
<div id="new_mi" style="display: none"  class="modal_all_2_m">
        <div class="modal_2_auto dialog-title" >
            <p class="modal-title-p">镜像配置</p>
            <form class="form-horizontal"  onsubmit="return false">
                <div class="form-group">
                    <label class="col-sm-2 control-label">镜像组ID</label>
                    <div class="col-sm-10">
                        <select name="new_mi_id" id="new_mi_id">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="new_mi_choose_port" class="col-sm-2 control-label">monitor port</label>
                    <div class="col-sm-10 monitor_port" style="height:140px;width:227px;overflow: auto;margin-top: 10px;" >

                    </div>
                </div>
                <div class="form-group">
                    <label for="new_mi_port_type" class="col-sm-2 control-label">mirror port</label>
                    <div class="col-sm-10 mirror_port" style="height:140px;width:227px;overflow: auto;margin-top: 10px;" >

                    </div>
                </div>
                <div class="form-group">
                    <label for="new_mi_flux_node" class="col-sm-2 control-label">流量方向</label>
                    <div class="col-sm-10">
                        <select name="new_mi_flux_node" id="new_mi_flux_node">
                            <option value="both">both</option>
                            <option value="inbound">inbound</option>
                            <option value="outbound">outbound</option>

                        </select>
                    </div>
                </div>
                <!--<button class="modal_2_btn" id="new_mi_btn_akk" >应用</button>-->
                <button class="modal_2_btn" id="new_mi_btn_sure" data="modal-switchboard-form-3-table">确定</button>
                <button class="modal_2_btn_exit" >取消</button>
            </form>
        </div>
    </div>
<!--3级交换机 新建vlan-->
<div id="new_vlan" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">  VLAN配置</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">VLAN ID</label>
                <div class="col-sm-10">
                    <input type="text" name="new_vlan_ids" id="new_vlan_ids"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_vlan_des" class="col-sm-2 control-label">描述信息</label>
                <div class="col-sm-10">
                    <input type="text" name="new_vlan_des" id="new_vlan_des"/>
                </div>
            </div>

            <div id="toggle_vr">
                <div class="form-group">
                    <label for="new_vlan_ipv4_add" class="col-sm-2 control-label">IPv4地址</label>
                    <div class="col-sm-10">
                        <input type="text" name="new_vlan_ipv4_add" id="new_vlan_ipv4_add"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="new_vlan_ipv4_mask" class="col-sm-2 control-label">子网掩码</label>
                    <div class="col-sm-10">
                        <input type="text" name="new_vlan_ipv4_mask" id="new_vlan_ipv4_mask"/>
                    </div>
                </div>
            </div>
            <!--<button class="modal_2_btn" id="new_vlan_btn_akk" >添加</button>-->
            <button class="modal_2_btn" id="new_vlan_btn_sure" data="modal-switchboard-form-1-table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--3级交换机 新建接口-->
<div id="new_port" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">编辑接口</p>
        <!--<div class="port_mask"></div>-->
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">启用接口</label>
                <div class="col-sm-10">
                    <label for="port1">开</label><input value="true" type="radio" name="new_port_kg" id="port1" class="input4"/>
                    <label for="port2">关</label><input  value="false" type="radio" name="new_port_kg" id="port2" checked  class="input4"/>
                    <br/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">接口速率</label>
                <div class="col-sm-10">
                    <select name="port_rate" id="port_rate">
                        <option value="10">10</option>
                        <option value="100">100</option>
                        <option value="1000">1000</option>
                        <option value="auto">auto</option>
                        <option value="auto 10">auto 10</option>
                        <option value="auto 100">auto 100</option>
                        <option value="auto 1000">auto 1000</option>
                        <option value="auto 10 100">auto 10 100</option>
                        <option value="auto 10 1000">auto 10 1000</option>
                        <option value="auto 100 1000">auto 100 1000</option>
                        <option value="auto 10 100 1000">auto 10 100 1000</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="port_status" class="col-sm-2 control-label">双工状态</label>
                <div class="col-sm-10">
                    <select name="port_status" id="port_status">
                        <option value="full">全双工</option>
                        <option value="falf">半双工</option>
                        <option value="auto">自适应</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="port_link_type" class="col-sm-2 control-label">连接类型</label>
                <div class="col-sm-10">
                    <select name="port_link_type" id="port_link_type">
                        <option value="none">none</option>
                        <option value="access">access</option>
                        <option value="trunk">trunk</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="new_port_ids_last" class="col-sm-2 control-label">VLAN IDs</label>
                <div class="col-sm-10">
                    <!-- <select id="new_port_ids_last" name="new_port_ids_last">
                    </select> -->
                    <div style="padding-top: 7px;width: 230px" id="new_port_ids_last" >
                    </div>
                </div>
            </div>

            <button class="modal_2_btn" id="new_port_btn_sure" data="modal-switchboard-form-2-table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--3级交换机 新建路由-->
<div id="new_router" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">静态路由配置</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">目标网段</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_mb" name="new_router_mb"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_router_ymcd" class="col-sm-2 control-label">掩码</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_ymcd" name="new_router_ymcd"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_router_yyt" class="col-sm-2 control-label">下一跳</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_yyt" name="new_router_yyt"/>
                </div>
            </div>


            <button class="modal_2_btn" id="new_router_btn_sure" data="modal-switchboard-form-4-table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>


<!--2级交换机 新建镜像-->
<div id="new_mi2" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">镜像配置</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">镜像组ID</label>
                <div class="col-sm-10">
                    <select name="new_mi_id2" id="new_mi_id2">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="new_mi_choose_port" class="col-sm-2 control-label">monitor port</label>
                <div class="col-sm-10 monitor_port" style="height:140px;width:227px;overflow: auto;margin-top: 10px;" >

                </div>
            </div>
            <div class="form-group">
                <label for="new_mi_port_type" class="col-sm-2 control-label">mirror port</label>
                <div class="col-sm-10 mirror_port" style="height:140px;width:227px;overflow: auto;margin-top: 10px;" >

                </div>
            </div>
            <div class="form-group">
                <label for="new_mi_flux_node" class="col-sm-2 control-label">流量方向</label>
                <div class="col-sm-10">
                    <select name="new_mi_flux_node2" id="new_mi_flux_node2">
                        <option value="both">both</option>
                        <option value="inbound">inbound</option>
                        <option value="outbound">outbound</option>

                    </select>
                </div>
            </div>
            <!--<button class="modal_2_btn" id="new_mi_btn_akk2" >应用</button>-->
            <button class="modal_2_btn" id="new_mi_btn_sure2" data="modal-switchboard-form-3-table2">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--2级交换机 新建vlan-->
<div id="new_vlan2" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">VLAN配置</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">VLAN ID</label>
                <div class="col-sm-10">
                    <input type="text" name="new_vlan_ids2" id="new_vlan_ids2"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_vlan_des" class="col-sm-2 control-label">描述信息</label>
                <div class="col-sm-10">
                    <input type="text" name="new_vlan_des2" id="new_vlan_des2"/>
                </div>
            </div>


            <button class="modal_2_btn" id="new_vlan_btn_sure2" data="modal-switchboard-form-1-table2">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--2级交换机 新建接口-->
<div id="new_port2" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">编辑接口</p>
        <!--<div class="port_mask"></div>-->
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
               <label class="col-sm-2 control-label">启用接口</label>
                <div class="col-sm-10">
                    <label for="port1">开</label><input value="true" type="radio" name="new_port_kg2" id="port12" class="input4"/>
                    <label for="port2">关</label><input  value="false" type="radio" name="new_port_kg2" id="port22" checked  class="input4"/>
                    <br/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">接口速率</label>
                <div class="col-sm-10">
                    <select name="port_rate2" id="port_rate2">
                        <option value="10">10</option>
                        <option value="100">100</option>
                        <option value="1000">1000</option>
                        <option value="auto">auto</option>
                        <option value="auto 10">auto 10</option>
                        <option value="auto 100">auto 100</option>
                        <option value="auto 1000">auto 1000</option>
                        <option value="auto 10 100">auto 10 100</option>
                        <option value="auto 10 1000">auto 10 1000</option>
                        <option value="auto 100 1000">auto 100 1000</option>
                        <option value="auto 10 100 1000">auto 10 100 1000</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="port_status" class="col-sm-2 control-label">双工状态</label>
                <div class="col-sm-10">
                    <select name="port_status2" id="port_status2">
                        <option value="full">全双工</option>
                        <option value="falf">半双工</option>
                        <option value="auto">自适应</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="port_link_type" class="col-sm-2 control-label">连接类型</label>
                <div class="col-sm-10">
                    <select name="port_link_type2" id="port_link_type2">
                        <option value="none">none</option>
                        <option value="access">access</option>
                        <option value="trunk">trunk</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="new_port_ids_last" class="col-sm-2 control-label">VLAN IDs</label>
                <div class="col-sm-10">
                    <!-- <select id="new_port_ids_last2" name="new_port_ids_last2">

                    </select> -->
                    
                    <div style="padding-top: 7px;width: 230px" id="new_port_ids_last2" >
                    </div>
                </div>
            </div>

            <button class="modal_2_btn" id="new_port_btn_sure2" data="modal-switchboard-form-2-table2">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--2级交换机 新建路由-->
<div id="new_router2" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">静态路由配置</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">目标网段</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_mb2" name="new_router_mb2"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_router_ymcd" class="col-sm-2 control-label">子网掩码</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_ymcd2" name="new_router_ymcd2"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_router_yyt" class="col-sm-2 control-label">下一跳</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_yyt2" name="new_router_yyt2"/>
                </div>
            </div>


            <button class="modal_2_btn" id="new_router_btn_sure2" data="modal-switchboard-form-4-table2">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>

<!--路由器 新建接口-->
<div id="new_router_port" style="display: none"  class="modal_all_2_m" >
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">编辑接口</p>
        <!--<div class="port_mask" id="router_port_mask"></div>-->
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">启用接口</label>
                <div class="col-sm-10">
                    <label for="web1">开</label><input value="true" type="radio" name="new_router_port_kg" id="router_port1" class="input5"/>
                    <label for="web2">关</label><input  value="false" type="radio" name="new_router_port_kg" id="router_port2" checked  class="input5"/>
                    <br/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">接口速率</label>
                <div class="col-sm-10">
                    <select name="router_port_rate" id="router_port_rate">
                        <option value="10">10</option>
                        <option value="100">100</option>
                        <option value="1000">1000</option>
                        <option value="auto">auto</option>
                        <option value="auto 10">auto 10</option>
                        <option value="auto 100">auto 100</option>
                        <option value="auto 1000">auto 1000</option>
                        <option value="auto 10 100">auto 10 100</option>
                        <option value="auto 10 1000">auto 10 1000</option>
                        <option value="auto 100 1000">auto 100 1000</option>
                        <option value="auto 10 100 1000">auto 10 100 1000</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="routert_port_status" class="col-sm-2 control-label">双工状态</label>
                <div class="col-sm-10">
                    <select name="routert_port_status" id="routert_port_status">
                        <option value="full">全双工</option>
                        <option value="falf">半双工</option>
                        <option value="auto">自适应</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="new_router_port_ipadd" class="col-sm-2 control-label">ip地址</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_port_ipadd" name="new_router_port_ipadd"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_router_port_zwym" class="col-sm-2 control-label">子网掩码</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_port_zwym" name="new_router_port_zwym"/>
                </div>
            </div>



            <button class="modal_2_btn" id="new_router_port_btn_sure" data="modal-router-form-1-table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--路由器 编辑静态路由  -->
<div id="new_router_status" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">静态路由配置</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">目标网段</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_status_mbwd" name="new_router_status_mbwd"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_router_status_ymcd" class="col-sm-2 control-label">子网掩码</label>
                <div class="col-sm-10">
                    <input type="text" name="new_router_status_ymcd" id="new_router_status_ymcd"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_router_status_xyt" class="col-sm-2 control-label">下一跳</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_status_xyt" name="new_router_status_xyt"/>
                </div>
            </div>


            <button class="modal_2_btn" id="new_router_status_btn_sure" data="modal-router-form-2-table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--路由器 新建Nat-->
<div id="new_router_nat" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">NAT配置</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">地址池名称</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_nat_addp" name="new_router_nat_addp"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_router_nat_yyjk" class="col-sm-2 control-label">应用接口</label>
                <div class="col-sm-10">
                    <select name="new_router_nat_yyjk" id="new_router_nat_yyjk" style="transform: translate(0,-1px);">
                        <!-- <option value="WAN1">WAN1</option>
                        <option value="WAN2">WAN2</option>
                        <option value="WAN3">WAN3</option> -->
                        
                        <option value="eth0">eth0</option>
                        <option value="eth1">eth1</option>
                        <option value="eth2">eth2</option>
                        <option value="eth3">eth3</option>
                        <option value="eth4">eth4</option>
                        <option value="eth5">eth5</option>
                        <option value="eth6">eth6</option>
                        <option value="eth7">eth7</option>
                        
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">起始地址</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_nat_start" name="new_router_nat_start"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">结束地址</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_nat_end" name="new_router_nat_end"/>
                </div>
            </div>


            <button class="modal_2_btn" id="new_router_nat_btn_sure" data="modal-router-form-3-table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--路由器 新建端口转换-->
<div id="new_router_map" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">端口映射配置</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">映射名称</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_map_name" name="new_router_map_name"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_router_map_gwdz" class="col-sm-2 control-label">公网地址</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_map_gwdz" name="new_router_map_gwdz"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_router_map_swdz" class="col-sm-2 control-label">私网地址</label>
                <div class="col-sm-10">
                    <input type="text" id="new_router_map_swdz" name="new_router_map_swdz"/>
                </div>
            </div>
              <div class="form-group">
                                <label for="new_router_map_dkzz" class="col-sm-2 control-label">端口转换</label>
                                <div class="col-sm-10">
                                    <input type="checkbox" value="1" id="new_router_map_dkzz" name="new_router_map_dkzz">
                                </div>
              </div>
            <div id="zz_div" style="display: none">
                               <div class="form-group">
                                   <label for="new_router_map_select" class="col-sm-2 control-label">协议</label>
                                   <div class="col-sm-10">
                                       <select name="new_router_map_select" id="new_router_map_select">
                                           <option value="TCP">TCP</option>
                                           <option value="UDP">UDP</option>
                                           <option value="Both">Both</option>
                                       </select>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label for="new_router_map_gwdk" class="col-sm-2 control-label">公网端口</label>
                                   <div class="col-sm-10">
                                       <input type="input" id="new_router_map_gwdk" name="new_router_map_gwdk"/>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label for="new_router_map_swdk" class="col-sm-2 control-label">私网端口</label>
                                   <div class="col-sm-10">
                                       <input type="input" id="new_router_map_swdk" name="new_router_map_swdk"/>
                                   </div>
                               </div>
            </div>

            <button class="modal_2_btn" id="ew_router_map_btn_sure" data="modal-router-form-4-table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--路由器 新建rip-->
<div id="new_router_rip" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">Rip路由配置</p>
        <form class="form-horizontal"  onsubmit="return false">


            <span class="yuki_span">网段</span><input type="text" style="margin-top: 20px" id="new_router_rip_nwwd" name="new_router_rip_nwwd">/ <span class="yuki_span">掩码</span>     <input type="text" id="new_router_rip_ymcd" name="new_router_rip_ymcd"/>
            <br/>
            <span id="area_gg" style="display:none;">
                    <label for="">区域</label><input type="text" id="OSPF_zdwh_area" name="OSPF_zdwh_area"/>
                </span>
                <br/>
            <button class="modal-button" id="add_route_route" style="margin-top: 10px;">添加</button>
            <br/>
            <br/>
            <table class="modal-table" id="new_router_rip_table_f" style="text-align:left">
                <tr>
                    <th class="modal-table-th" width="50px">编号</th>
                    <th class="modal-table-th" width="250px" id="new_router_rip_table_f_td">网段/掩码/区域</th>
                    <th class="modal-table-th" width="150px">操作</th>

                </tr>
            </table>
            <button class="modal_2_btn" id="new_router_rip_btn_sure" data="dynamic_router_table1">确定</button>
        </form>
    </div>
</div>
<!--路由器 新建ospf-->
<div id="new_router_ospf" style="display: none;height: 641px"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">ospf路由配置</p>
        <form class="form-horizontal"  onsubmit="return false">


            <span class="yuki_span">内网网段</span><input type="text" style="margin-top: 20px" id="new_router_ospf_11" name="new_router_ospf_11">/ <span class="yuki_span">掩码</span><input type="text" id="new_router_ospf_22" name="new_router_ospf_22"/>
            <br/>
            <button class="modal-button" style="margin-top: 10px;">添加</button>
            <br/>
            <table class="modal-table" id="new_router_ospf_table_f" style="text-align:left">
                <tr>
                    <th class="modal-table-th" width="50px">编号</th>
                    <th class="modal-table-th" width="250px">网段/掩码/区域</th>
                    <th class="modal-table-th" width="150px">操作</th>

                </tr>
                
            </table>
            <button class="modal_2_btn" id="new_router_ospf_sure_hold" data="dynamic_router_table2">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--路由器 新建bgp-->
<div id="new_router_bgp" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">Bgp路由配置</p>
        <form class="form-horizontal"  onsubmit="return false">
            <span class="yuki_span">内网网段</span><input type="text" style="margin-top: 20px" id="new_router_bgp_nwwd" name="new_router_bgp_nwwd">/ <span class="yuki_span">掩码</span>     <input type="text" id="new_router_bgp_ymcd" name="new_router_bgp_ymcd"/>
            <br/>
            <button class="modal-button" style="margin-top: 10px;">添加</button>
            <br/>
            <table class="modal-table" id="new_router_bgp_table_f" style="text-align:left">
                <tr>
                    <th class="modal-table-th" width="50px">编号</th>
                    <th class="modal-table-th" width="250px">网段/掩码/区域</th>
                    <th class="modal-table-th" width="150px">操作</th>

                </tr>

            </table>
            <button class="modal_2_btn" id="new_router_bgp_btn_sure" data="dynamic_router_table3_table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--防火墙 新建接口-->
<div id="new_firewall_port" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">编辑接口</p>

        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">启用接口</label>
                <div class="col-sm-10">
                    <label for="web1">开</label><input value="true" type="radio" name="firewall_kg"   class="input4" id="new_firewall_port_1"/>
                    <label for="web2">关</label><input value="false" type="radio" name="firewall_kg"  checked  class="input4" id="new_firewall_port_2"/>
                    <br/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">接口速率</label>
                <div class="col-sm-10">
                    <select id="firewall_port_rate" name="firewall_port_rate">
                        <option value="10">10</option>
                        <option value="100">100</option>
                        <option value="1000">1000</option>
                        <option value="auto">auto</option>
                        <option value="auto 10">auto 10</option>
                        <option value="auto 100">auto 100</option>
                        <option value="auto 1000">auto 1000</option>
                        <option value="auto 10 100">auto 10 100</option>
                        <option value="auto 10 1000">auto 10 1000</option>
                        <option value="auto 100 1000">auto 100 1000</option>
                        <option value="auto 10 100 1000">auto 10 100 1000</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">双工状态</label>
                <div class="col-sm-10">
                    <select id="firewall_port_status_type" name="firewall_port_status_type">
                        <option value="full">全双工</option>
                        <option value="falf">半双工</option>
                        <option value="auto">自适应</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">IP地址</label>
                <div class="col-sm-10">
                    <input type="text" name="firewall_port_ip" id="firewall_port_ip"/>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">子网掩码</label>
                <div class="col-sm-10">
                    <input type="text" name="firewall_port_mask" id="firewall_port_mask"/>
                </div>
            </div>



            <button class="modal_2_btn" id="firewall_modal2_s" table_id="modal-firewall-form-1-table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--防火墙 新建新建策略-->
<div id="new_firewall_saf" style="display:none "  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">策略配置</p>

        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">启用策略</label>
                <div class="col-sm-10">
                    <label for="web1">开</label><input value="true" type="radio" name="new_firewall_saf_kg" id="port1_saf" class="input4"/>
                    <label for="web2">关</label><input  value="false" type="radio" name="new_firewall_saf_kg" id="port2_saf" checked  class="input4"/>
                    <br/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">策略名称</label>
                <div class="col-sm-10">
                    <input type="text" name="new_firewall_saf_name" id="new_firewall_saf_name"/>
                </div>
            </div>
            <div class="form-group">
                <label for="firewall_port_status_llfx" class="col-sm-2 control-label">流量方向</label>
                <div class="col-sm-10">
                    <select name="firewall_port_status_llfx" id="firewall_port_status_llfx">
                        <option value="incoming">incoming</option>
                        <option value="outgoing">outgoing</option>
                        <option value="all">all</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">源地址</label>
                <div class="col-sm-10">
                    <input type="text" name="new_firewall_saf_yuan" id="new_firewall_saf_yuan"/>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">源端口范围</label>
               <div class="col-sm-10">
                                       <input type="text" name="new_firewall_saf_yuan_rate" id="new_firewall_saf_yuan_rate"/>~<input type="text" name="new_firewall_saf_yuan_rate_end" id="new_firewall_saf_yuan_rate_end"/>
                                   </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">目的地址</label>
                <div class="col-sm-10">
                    <input type="text" name="new_firewall_saf_yuan_add" id="new_firewall_saf_yuan_add"/>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">服务类型</label>
                <div class="col-sm-10">
                    <input type="text" name="new_firewall_saf_stype" id="new_firewall_saf_stype"/>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">策略动作</label>
                <div class="col-sm-10">
                    <select name="firewall_port_status_d" id="firewall_port_status_d" >
                        <option value="accept">accept</option>
                        <option value="drop">drop</option>


                    </select>
                </div>
            </div>


            <button class="modal_2_btn" id="new_firewall_saf_btn_sure" data="modal-firewall-form-2-table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--防火墙 新建服务类型-->
<div id="new_firewall_sertype" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">服务类型配置</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">服务类型</label>
                <div class="col-sm-10">
                    <input name="new_firewall_sertype_lx" id="new_firewall_sertype_lx" type="text">


                </div>
            </div>
            <div class="form-group">
                <label for="firewall_type2" class="col-sm-2 control-label">协议类型</label>
                <div class="col-sm-10">
                    <select name="firewall_type2" id="firewall_type2">
                        <option value="TCP">TCP</option>
                        <option value="UDP">UDP</option>
                        <option value="ALL">ALL</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="firewall_type_input1" class="col-sm-2 control-label">目的端口范围</label>
                <div class="col-sm-10">
                    <input type="text" id="firewall_type_input1" name="firewall_type_input1"/>~<input type="text" id="firewall_type_input2" name="firewall_type_input2"/>
                </div>
            </div>


            <button class="modal_2_btn" id="new_firewall_sertype_btn_sure" data="modal-firewall-form-3-table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--防火墙 新建nat-->
<div id="new_firewall_nat" style="display:none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">NAT配置</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">地址池名称</label>
                <div class="col-sm-10">
                    <input type="text" id="new_firewall_nat_dzc" name="new_firewall_nat_dzc"/>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">地址范围</label>
                <div class="col-sm-10">
                    <input type="text" id="firewall_nat_input1" name="firewall_nat_input1"/>~<input type="text" id="firewall_nat_input2" name="firewall_nat_input2"/>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">应用接口</label>
                <div class="col-sm-10">
                    <select name="new_firewall_nat_yyjk_f" id="new_firewall_nat_yyjk_f">
                        <option value="eth0">eth0</option>
                    </select>
                </div>
            </div>

            <button class="modal_2_btn" id="new_firewall_nat_btn_sure" data="modal-firewall-form-4-table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--路由器 编辑静态路由  -->
<div id="new_firewall_status" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">静态路由配置</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">目标网段</label>
                <div class="col-sm-10">
                    <input type="text" id="new_firewall_status_mbwd" name="new_router_status_mbwd"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_router_status_ymcd" class="col-sm-2 control-label">子网掩码</label>
                <div class="col-sm-10">
                    <input type="text" name="new_router_status_ymcd" id="new_firewall_status_ymcd"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_router_status_xyt" class="col-sm-2 control-label">下一跳</label>
                <div class="col-sm-10">
                    <input type="text" id="new_firewall_status_xyt" name="new_router_status_xyt"/>
                </div>
            </div>


            <button class="modal_2_btn" id="new_firewall_status_btn_sure" data="modal-router-form-2-table-firewall">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--云-->
<div id="new_cloud_b" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">云接口编辑</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">接口名称</label>
                <div class="col-sm-10">
                    <input type="text" id="new_cloud_b_name" name="new_cloud_b_name" readonly/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_cloud_b_status" class="col-sm-2 control-label">状态</label>
                <div class="col-sm-10">
                    <input type="text" name="new_cloud_b_status" id="new_cloud_b_status"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_cloud_b_rate" class="col-sm-2 control-label">速率</label>
                <div class="col-sm-10">
                    <input type="text" id="new_cloud_b_rate" name="new_cloud_b_rate"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_cloud_b_sg" class="col-sm-2 control-label">双工</label>
                <div class="col-sm-10">
                    <input type="text" id="new_cloud_b_sg" name="new_cloud_b_sg"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_cloud_b_ip" class="col-sm-2 control-label">	IP地址</label>
                <div class="col-sm-10">
                    <input type="text" id="new_cloud_b_ip" name="new_cloud_b_ip"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_cloud_b_mask" class="col-sm-2 control-label">子网掩码</label>
                <div class="col-sm-10">
                    <input type="text" id="new_cloud_b_mask" name="new_cloud_b_mask"/>
                </div>
            </div>


            <button class="modal_2_btn" id="new_cloud_b_btn_sure" data="modal-router-form-2-table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--路由器WAN和LAN弹窗-->
<div id="new_router_choose_port" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">静态路由配置</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">WAN口数量</label>
                <div class="col-sm-10">
                    <select name="new_router_choose_port_wan" id="new_router_choose_port_wan">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="new_router_status_ymcd" class="col-sm-2 control-label">LAN口数量</label>
                <div class="col-sm-10">
                    <select name="new_router_choose_port_lan" id="new_router_choose_port_lan">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
            </div>



            <button class="modal_2_btn" id="new_router_wan_btn_sure" >确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--服务器 新建dns-->
<div id="new_server_dns" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">编辑DNS记录</p>
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">IP地址</label>
                <div class="col-sm-10">
                    <input type="text" name="new_server_ids2" id="new_server_ids2"/>
                </div>
            </div>
            <div class="form-group">
                <label for="new_vlan_des" class="col-sm-2 control-label">域名</label>
                <div class="col-sm-10">
                    <input type="text" name="new_server_des2" id="new_server_des2"/>
                </div>
            </div>
            <!--&lt;!&ndash;<div class="form-group">&ndash;&gt;//暂时不要-->
            <!--<label for="inputPassword" class="col-sm-2 control-label" >虚接口</label>-->
            <!--<div class="col-sm-10">-->

            <!--<label for="web1">开</label><input value="true" type="radio" name="input3" id="vr1" class="input3"/>-->
            <!--<label for="web2">关</label><input  value="false" type="radio" name="input3" id="vr2" checked  class="input3"/>-->
            <!--<br/>-->
            <!--</div>-->
            <!--</div>-->
            <!--<div id="toggle_vr2">-->
            <!--<div class="form-group">-->
            <!--<label for="new_vlan_ipv4_add" class="col-sm-2 control-label">IPv4地址</label>-->
            <!--<div class="col-sm-10">-->
            <!--<input type="text" name="new_vlan_ipv4_add2" id="new_vlan_ipv4_add2"/>-->
            <!--</div>-->
            <!--</div>-->
            <!--<div class="form-group">-->
            <!--<label for="new_vlan_ipv4_mask" class="col-sm-2 control-label">子网掩码</label>-->
            <!--<div class="col-sm-10">-->
            <!--<input type="text" name="new_vlan_ipv4_mask2" id="new_vlan_ipv4_mask2"/>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->

            <button class="modal_2_btn" id="new_vlan_btn_sure2_dns" data="modal-form-1-table">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--sdn交换机 新建接口-->
<div id="sdn_new_port2" style="display: none"  class="modal_all_2_m">
    <div class="modal_2_auto dialog-title">
        <p class="modal-title-p">编辑接口</p>
        <!--<div class="port_mask"></div>-->
        <form class="form-horizontal"  onsubmit="return false">
            <div class="form-group">
                <label class="col-sm-2 control-label">启用接口</label>
                <div class="col-sm-10">
                    <label for="port1">开</label><input value="true" type="radio" name="sdn_port_kg2" id="sdn_port12" class="input4"/>
                    <label for="port2">关</label><input  value="false" type="radio" name="sdn_port_kg2" id="sdn_port22" checked  class="input4"/>
                    <br/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">接口速率</label>
                <div class="col-sm-10">
                    <select name="port_rate2" id="sdn_port_rate2">
                        <option value="10">10</option>
                        <option value="100">100</option>
                        <option value="1000">1000</option>
                        <option value="auto">auto</option>
                        <option value="auto 10">auto 10</option>
                        <option value="auto 100">auto 100</option>
                        <option value="auto 1000">auto 1000</option>
                        <option value="auto 10 100">auto 10 100</option>
                        <option value="auto 10 1000">auto 10 1000</option>
                        <option value="auto 100 1000">auto 100 1000</option>
                        <option value="auto 10 100 1000">auto 10 100 1000</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="port_status" class="col-sm-2 control-label">双工状态</label>
                <div class="col-sm-10">
                    <select name="port_status2" id="sdn_port_status2">
                        <option value="full">全双工</option>
                        <option value="falf">半双工</option>
                        <option value="auto">自适应</option>
                    </select>
                </div>
            </div>


            <button class="modal_2_btn" id="sdn_new_port_btn_sure2" data="modal-switchboard-form-2-table2">确定</button>
            <button class="modal_2_btn_exit" >取消</button>
        </form>
    </div>
</div>
<!--2层弹窗-->

<!--网卡列表弹窗-->
<div id="eth_port_list" class=".eth_port_list" style="display: none;position: absolute;z-index: 999">
    <p>选择元件接口</p>
    <select name="eth_port_list-op" id="eth_port_list-op">Eth1</select>
    <button class="eth_sure" >确定</button>
</div>


<!--服务器设置-->
<div class="modal-all" id="modal1" >
    <form id="modal1_form" onsubmit="return false">
    <div class="modal-dialog">
        <div class="modal-content">
            <p class="modal-title-p dialog-title">服务器设置</p>
            <ul class="tabs">
                <li><a href="#" name=".tab1_1">基本配置</a></li>
                <li><a href="#" name=".tab1_2">接口配置</a></li>
                <li><a href="#" name=".tab1_3">WEB服务设置</a></li>
                <li><a href="#" name=".tab1_4">DNS服务设置</a></li>

            </ul>
            <div class="content dialog-title" id="ser_zero">
                <div class="tab1_1" style="margin-top: 49px;margin-left: 34px;">

                        <label for="server-allocation-1">元件名称</label>
                        <input type="text" id="server-allocation-1" name="server-allocation-1" />

                        <button id="modal-form-1-btn" class="modal-button netname keep-successed">保存</button>
                </div>
                <div class="tab1_2" style="margin-top: 49px;margin-left: 34px;">

                        <label for="server-allocation-2">配置IP地址</label>
                        <!--<input type="text" id="server-allocation-2"/>-->
                        <select name="server-allocation-2" id="server-allocation-2">
                            <option value="static">手动输入</option>
                            <option value="auto">自动获取</option>
                        </select>
                        <br/>
                        <label for="server-allocation-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IP地址</label>
                        <input type="text" id="server-allocation-3" name="server-allocation-3"/>
                        <br/>
                        <label for="server-allocation-4">&nbsp;&nbsp;&nbsp;&nbsp;子网掩码</label>
                        <input type="text" id="server-allocation-4" name="server-allocation-4"/>
                        <br/>
                        <label for="server-allocation-5">&nbsp;&nbsp;&nbsp;&nbsp;网关地址</label>
                        <input type="text" id="server-allocation-5" name="server-allocation-5"/>
                        <br/>

                    <button id="modal-form-2-btn" class="modal-button keep-successed">保存</button>
                </div>
                <div class="tab1_3" style="margin-top: 20px">
                    <p class="servers">Web服务</p>
                    <label for="web1">开</label><input value="true" type="radio" name="input1" id="web1" class="input1 ocbutton"/>
                    <label for="web2">关</label><input  value="false" type="radio" name="input1" id="web2" checked  class="input1 ocbutton"/>
                    <br/>
                        <span id="ser_port" style="display:block;    margin-top: 40px;">
                            <label for="ser_port_1">填写端口号</label><input name="ser_port_1" type="text " id="ser_port_1" />
                            <button id="modal-form-6-btn" class="modal-button keep-successed">保存</button>
                        </span>





                </div>
                <div class="tab1_4" style="margin-top: 20px;margin-left:20px;">
                    <p class="servers">DNS服务</p>
                    <label for="DNS1">开</label><input type="radio" name="input2" id="DNS1" value="true" class="input2 ocbutton"/>
                    <label for="DNS2">关</label><input type="radio" name="input2" id="DNS2" checked value="false" class="input2 ocbutton"/>
                    <span id="sdn_port" style="display: block">

                    <label for="" style="transform:translate(0,35px)">DNS域名:&nbsp;&nbsp;&nbsp;bdyjsim.com</label>

                    <input type="text" id="server_dns_def" value="bdyjsim.com" style="visibility: hidden"/>

                    <button id="modal-form-3-btn" class="modal-button">新建</button>
                    <button id="modal-form-4-btn" class="modal-button">编辑</button>
                    <button id="modal-form-5-btn" class="modal-button" data="delete_table">删除</button>
                    <span style="display: block;height:120px;overflow: auto;transform: translate(0,42px)" >
                        <table id="modal-form-1-table" class="modal-table">
                            <tr>
                                <th  style="width: 50px;" class="modal-table-th">选择</th>
                                <th style="width: 100px;" class="modal-table-th">IP</th>
                                <th style="width: 100px;" class="modal-table-th">A记录</th>
                            </tr>

                        </table>
                    </span>
                </span>
                </div>
                <div class="tab1_5">
                          <span style="display: block;height: 400px;overflow-x:hidden; overflow-y:auto" >
                              <span class="panel-shell" style="display: block">
                                  <span class="output-view" style="display: block">
                                      Welcome to cmd.
                                  </span>
                                  <span class="cmd_box">

                                  </span>
                              </span>
                        </span>
                </div>

            </div>
            <div style="border-top: 1px solid #cccccc;transform: translate(0,-75px)"></div>
            <button class="modal-btn" id="modal-btn-1">关闭</button>
        </div>
    </div>
    </form>
</div>
<!--2层交换机设置-->
<div class="modal-all" id="modal2">
    <form id="modal2_form" onsubmit="return false">
        <div class="modal-dialog">
            <div class="modal-content">
                <p class="modal-title-p dialog-title">2层交换机设置</p>
                <ul class="tabs">
                    <li><a href="#" name=".tab2_1">基本配置</a></li>
                    <li><a href="#" name=".tab2_2">VLAN配置</a></li>
                    <li id="modal2_2_inter"><a href="#" name=".tab2_3">接口配置</a></li>
                    <li><a href="#" name=".tab2_4">镜像设置</a></li>

                </ul>
                <div class="content dialog-title" id="switch2_zero" >
                    <div class="tab2_1" style="margin-top: 49px;margin-left: 34px;">

                            <label for="switchboard-allocation-1">元件名称</label>
                            <input type="text" id="switchboard-allocation-12" name="switchboard-allocation-12"/>

                        <button id="modal-switchboard-form-1-btn2" class="modal-button netname keep-successed" style="transform: translate(73px,34px)">保存</button>
                    </div>
                    <div class="tab2_2"  style="margin-top: 10px;">
                        <button id="modal-switchboard-form-2-btn2" class="modal-button" style="margin-left: 40px;">新建</button>
                        <button id="modal-switchboard-form-3-btn2" class="modal-button">编辑</button>
                        <button id="modal-switchboard-form-4-btn2" class="modal-button">删除</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-switchboard-form-1-table2" class="modal-table" style="transform: translate(49px,18px)">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 100px;" class="modal-table-th">VLAN ID</th>
                                    <th style="width: 100px;" class="modal-table-th">描述</th>
                                    <th style="width: 100px;" class="modal-table-th">成员端口</th>
                                </tr>
                            </table>
                        </span>
                    </div>
                    <div class="tab2_3" style="margin-top: 10px">
                        <button id="modal-switchboard-form-6-btn2" class="modal-button" style="margin-left: 40px;">编辑</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-switchboard-form-2-table2" class="modal-table"  style="transform: translate(8px,18px)">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 100px;" class="modal-table-th">接口名称</th>
                                    <th style="width: 100px;" class="modal-table-th">状态</th>
                                    <th style="width: 100px;" class="modal-table-th">接口速率</th>
                                    <th style="width: 100px;" class="modal-table-th">双工</th>
                                    <th style="width: 100px;" class="modal-table-th">连接类型</th>
                                    <th style="width: 100px;" class="modal-table-th">VlanID</th>
                                </tr>
                            </table>
                        </span>
                    </div>
                    <div class="tab2_4" style="margin-top: 10px;">
                        <button id="modal-switchboard-form-8-btn2" class="modal-button" style="margin-left: 40px;">新建</button>
                        <button id="modal-switchboard-form-9-btn2" class="modal-button">编辑</button>
                        <button id="modal-switchboard-form-10-btn2" class="modal-button">删除</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-switchboard-form-3-table2" class="modal-table"  style="transform: translate(30px,18px);table-layout:fixed;word-wrap:break-word; word-break:break-all;">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 100px;" class="modal-table-th">镜像组ID</th>
                                    <th style="width: 100px;" class="modal-table-th">状态</th>
                                    <th style="width: 110px;word-wrap:break-word" class="modal-table-th">数据端口</th>
                                    <th style="width: 100px;" class="modal-table-th">镜像端口</th>
                                    <th style="width: 100px;" class="modal-table-th">流量方向</th>

                                </tr>

                            </table>
                        </span>
                    </div>
                    <div class="tab2_5">
                              <span style="display: block;height: 400px;overflow: auto" >
                              <span class="panel-shell" style="display: block">
                                  <span class="output-view" style="display: block">
                                      Welcome to cmd.
                                  </span>
                                  <span class="cmd_box">

                                  </span>
                              </span>
                        </span>
                    </div>
                </div>
                <div style="border-top: 1px solid #ccc;transform: translate(0,-75px)"></div>
                <button class="modal-btn" id="modal-btn-22">关闭</button>
            </div>
        </div>
    </form>
</div>
<!--3层交换机设置-->
<div class="modal-all" id="modal9">
    <form id="modal9_form" onsubmit="return false">
        <div class="modal-dialog">
            <div class="modal-content">
                <p class="modal-title-p dialog-title">3层交换机设置</p>
                <ul class="tabs">
                    <li><a href="#" name=".tab9_1">基本配置</a></li>
                    <li><a href="#" name=".tab9_2">VLAN配置</a></li>
                    <li id="modal9_3_inter"><a href="#" name=".tab9_3">接口配置</a></li>
                    <li><a href="#" name=".tab9_4">镜像设置</a></li>
                    <li><a href="#" name=".tab9_5">静态路由</a></li>

                </ul>
                <div class="content dialog-title" id="switch3_zero">
                    <div class="tab9_1" style="margin-top: 49px;margin-left: 34px;">
                        <form action="" id="modal-switchboard-form-1">
                            <label for="switchboard-allocation-1">元件名称</label>
                            <input type="text" id="switchboard-allocation-1" name="switchboard-allocation-1"/>
                        </form>
                        <button id="modal-switchboard-form-1-btn" class="modal-button netname keep-successed" >保存</button>
                    </div>
                    <div class="tab9_2" style="margin-top: 10px;">
                        <button id="modal-switchboard-form-2-btn" class="modal-button">新建</button>
                        <button id="modal-switchboard-form-3-btn" class="modal-button">编辑</button>
                        <button id="modal-switchboard-form-4-btn" class="modal-button">删除</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-switchboard-form-1-table" class="modal-table">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 100px;" class="modal-table-th">VLAN ID</th>
                                    <th style="width: 100px;" class="modal-table-th">描述</th>
                                    <th style="width: 100px;" class="modal-table-th">IPv4地址</th>
                                    <th style="width: 100px;" class="modal-table-th">子网掩码</th>
                                    <th style="width: 100px;" class="modal-table-th">成员端口</th>
                                </tr>
                            </table>
                        </span>
                    </div>
                    <div class="tab9_3" style="margin-top: 10px;">

                        <button id="modal-switchboard-form-6-btn" class="modal-button">编辑</button>

                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-switchboard-form-2-table" class="modal-table">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 100px;" class="modal-table-th">接口名称</th>
                                    <th style="width: 100px;" class="modal-table-th">状态</th>
                                    <th style="width: 100px;" class="modal-table-th">接口速率</th>
                                    <th style="width: 100px;" class="modal-table-th">双工</th>
                                    <th style="width: 100px;" class="modal-table-th">连接类型</th>
                                    <th style="width: 100px;" class="modal-table-th">VlanID</th>
                                </tr>

                            </table>
                        </span>
                    </div>
                    <div class="tab9_4" style="margin-top: 10px;">
                        <button id="modal-switchboard-form-8-btn" class="modal-button" style="margin-left: 10px;">新建</button>
                        <button id="modal-switchboard-form-9-btn" class="modal-button">编辑</button>
                        <button id="modal-switchboard-form-10-btn" class="modal-button">删除</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-switchboard-form-3-table" class="modal-table" style="table-layout:fixed;word-wrap:break-word; word-break:break-all;">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 100px;" class="modal-table-th">镜像组ID</th>
                                    <th style="width: 100px;" class="modal-table-th">状态</th>
                                    <th style="width: 111px;word-wrap:break-word" class="modal-table-th">数据端口</th>
                                    <th style="width: 100px;" class="modal-table-th">镜像端口</th>
                                    <th style="width: 100px;" class="modal-table-th">流量方向</th>

                                </tr>

                            </table>
                        </span>
                    </div>
                    <div class="tab9_5" style="margin-top: 10px;">
                        <button id="modal-switchboard-form-11-btn" class="modal-button">新建</button>
                        <button id="modal-switchboard-form-12-btn" class="modal-button">编辑</button>
                        <button id="modal-switchboard-form-13-btn" class="modal-button">删除</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-switchboard-form-4-table" class="modal-table">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 100px;" class="modal-table-th">目标网段</th>
                                    <th style="width: 100px;" class="modal-table-th">子网掩码</th>
                                    <th style="width: 100px;" class="modal-table-th">下一跳</th>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>
                                </tr>

                            </table>
                        </span>
                    </div>
                    <div class="tab9_6">
                              <span style="display: block;height: 400px;overflow: auto" >
                              <span class="panel-shell" style="display: block">
                                  <span class="output-view" style="display: block">
                                      Welcome to cmd.
                                  </span>
                                  <span class="cmd_box">

                                  </span>
                              </span>
                        </span>
                    </div>
                </div>
                <div style="border-top: 1px solid #ccc;transform: translate(0,-75px)"></div>
                <button class="modal-btn" id="modal-btn-2">关闭</button>
            </div>
        </div>
    </form>
</div>

<!--路由器设置-->
<div class="modal-all" id="modal3" >
    <form id="modal3_form" onsubmit="return false">
        <div class="modal-dialog">
            <div class="modal-content">
                <p class="modal-title-p dialog-title">路由器设置</p>
                <ul class="tabs">
                    <li><a href="#" name=".tab3_1">基本配置</a></li>
                    <li><a href="#" name=".tab3_2">接口配置</a></li>
                    <li><a href="#" name=".tab3_3">静态路由</a></li>
                    <li><a href="#" name=".tab3_4">NAT</a></li>
                    <li><a href="#" name=".tab3_5">动态路由</a></li>
                    <li><a href="#" name=".tab3_6">端口映射</a></li>

                </ul>
                <div class="content dialog-title" id="router_zero">
                    <div class="tab3_1"  style="margin-top: 49px;margin-left: 34px;">

                            <label for="router-allocation-1">元件名称</label>
                            <input type="text" id="router-allocation-1"  name="router-allocation-1"/>

                        <button id="modal-router-form-1-btn" class="modal-button netname keep-successed">保存</button>
                    </div>
                    <div class="tab3_2">
                        <button id="modal-router-form-3-btn" class="modal-button">编辑</button>
                       <span style="display: block;overflow: auto;height:350px;margin-top: 20px;">
                            <table id="modal-router-form-1-table" class="modal-table">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 50px;" class="modal-table-th">接口名称</th>
                                    <th style="width: 50px;" class="modal-table-th">状态</th>
                                    <th style="width: 50px;" class="modal-table-th">速率</th>
                                    <th style="width: 80px;" class="modal-table-th">双工</th>
                                    <th style="width: 80px;" class="modal-table-th">连接类型</th>
                                    <th style="width: 100px;" class="modal-table-th">IP地址</th>
                                    <th style="width: 150px;" class="modal-table-th">子网掩码</th>

                                </tr>                             

                            </table>
                       </span>
                    </div>
                    <div class="tab3_3">
                        <button id="modal-router-form-5-btn" class="modal-button">新建</button>
                        <button id="modal-router-form-6-btn" class="modal-button">编辑</button>
                        <button id="modal-router-form-7-btn" class="modal-button" data="router_status_checkbox">删除</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-router-form-2-table" class="modal-table">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 300px;" class="modal-table-th">目标网段</th>
                                    <th style="width: 300px;" class="modal-table-th">子网掩码</th>
                                    <th style="width: 300px;" class="modal-table-th">下一跳</th>

                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="router_status_checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>

                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="router_status_checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>

                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="router_status_checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>

                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="router_status_checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>

                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="router_status_checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>

                                </tr><tr>
                                <td><input type="checkbox" name="router_status_checkbox"/></td>
                                <td>192.168.1.0</td>
                                <td>24</td>
                                <td>10.10.10.1</td>

                            </tr>

                            </table>
                        </span>
                    </div>
                    <div class="tab3_4">
                        <button id="modal-router-form-8-btn" class="modal-button">新建</button>
                        <button id="modal-router-form-9-btn" class="modal-button">编辑</button>
                        <button id="modal-router-form-10-btn" class="modal-button">删除</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-router-form-3-table" class="modal-table">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 100px;" class="modal-table-th">名称</th>
                                    <th style="width: 100px;" class="modal-table-th">应用接口</th>
                                    <th style="width: 150px;" class="modal-table-th">起始地址</th>
                                    <th style="width: 150px;" class="modal-table-th">结束地址</th>
                                </tr>
                            </table>
                        </span>
                    </div>
                    <div class="tab3_5">
                        <select name="dynamic_router_select1" id="dynamic_router_select1">
                            <option id="dynamic_router_select1_r1" value="r1">内网路由协议</option>
                            <option value="r2">边界路由协议</option>
                        </select>
                        <select name="dynamic_router_select2" id="dynamic_router_select2">
                            <option value="RIP">RIP</option>
                            <option value="OSPF">OSPF</option>
                        </select>

                       <!--  <label for="web1" id="dynamic_router1_label">开启</label><input value="true" type="radio" name="input6" id="dynamic_router1" class="input6"/>
                        <label for="web2" id="dynamic_router2_label">关闭</label><input  value="false" type="radio" name="input6" id="dynamic_router2" checked  class="input6"/>
 -->




                        <span id="rip" style="display: block;" >
                        	<span id="rip_kg">
                                 <label for="web1" id="dynamic_router1_label_rip">开启</label><input value="true" type="radio" name="input6" id="dynamic_router1_rip" class="input6"/>
                                 <label for="web2" id="dynamic_router2_label_rip">关闭</label><input  value="false" type="radio" name="input6" id="dynamic_router2_rip" checked  class="input6"/>
                             </span>
                            <button class="modal-button " id="new_rip_btn">编辑</button>
                            <button class="modal-button keep-successed" id="new_rip_btn_hold">保存</button>
                            <label for="rip_banbenhao">版本号</label><input type="text" id="rip_banbenhao" name="rip_banbenhao"/>
                            <br/>
                            <label for="rip_gengxinshijian">更新间隔</label><input type="text" id="rip_gengxinshijian" name="rip_gengxinshijian"/>
                            <br/>
                            <label for="rip_lajihuishou">垃圾回收间隔</label><input type="text" id="rip_lajihuishou" name="rip_lajihuishou"/>
                            <br/>
                            <label for="rip_chaoshijiange">超时间隔</label><input type="text" id="rip_chaoshijiange" name="rip_chaoshijiange"/>
                            <br/>

                            <table class="modal-table dynamic_router_table" id="dynamic_router_table1" >
                                <tr>
                                    <th class="modal-table-th" width="50px">编号</th>
                                    <th class="modal-table-th" width="150px">网段/掩码</th>
                                </tr>
                            </table>
                        </span>
                        <span id="OSPF" style="display: block;">
                        	<span id="ospf_span_kg">
                                  <label for="web1" id="dynamic_router1_label">开启</label><input value="true" type="radio" name="input7" id="dynamic_router1" class="input6"/>
                                     <label for="web2" id="dynamic_router2_label">关闭</label><input  value="false" type="radio" name="input7" id="dynamic_router2" checked  class="input6"/>
                            </span>
                            <button class="modal-button" id="new_OSPF_btn" style="top: 195px;">编辑</button>
                            <button class="modal-button keep-successed"  id="new_OSPF_btn_hold">保存</button>
                            <!--<label for="">类型</label><input type="text" id="OSPF_leix" name="OSPF_leix"/>-->
                            <!--<br/>-->
                            <label for="">路由器ID</label><input type="text" id="OSPF_luyid" name="OSPF_luyid"/>
                            <br/>

                            <label for="">SPF时延</label><input type="text" id="OSPF_spfys" name="OSPF_spfys"/>
                            <br/>
                            <label for="">维护时间</label><input type="text" id="OSPF_whsj" name="OSPF_whsj"/>
                            <br/>
                            <label for="">最大维护时间</label><input type="text" id="OSPF_zdwh" name="OSPF_zdwh"/>
                            <br/>
                            <!-- <label for="">骨干区域</label><input type="text" id="OSPF_zdwh_area" name="OSPF_zdwh_area"/>
                            <br/> -->
                            <table class="modal-table dynamic_router_table" id="dynamic_router_table2" >
                                <tr>
                                    <th class="modal-table-th" width="50px">编号</th>
                                    <th class="modal-table-th" width="150px">网段/掩码/区域</th>
                                </tr>
                            </table>
                        </span>


                        <span id="dynamic_router_table3" style="display: block;">
                        <span id="bgp_kg_span">
                                <label for="web1" id="dynamic_router1_label_bgp">开启</label><input value="true" type="radio" name="input8" id="dynamic_router1_bgp" class="input6"/>
                                <label for="web2" id="dynamic_router2_label_bgp">关闭</label><input  value="false" type="radio" name="input8" id="dynamic_router2_bgp" checked  class="input6"/>
                            </span>
                            <button class="modal-button" id="new_bgp_btn" style="transform: translate(314px,266px)" >编辑</button>
                            <button class="modal-button keep-successed" id="new_bgp_btn_hold" style="transform: translate(317px,124px)">保存</button>
                            <span style="display: block;width:278px;text-align: right">
                                <label for="">AS号</label><input type="text" id="bgp_leix" name="bgp_leix"/>
                            <br/>
                            <label for="">路由标识</label><input type="text" id="bgp_lyid" name="bgp_lyid"/>
                            <br/>
                            <label for="">邻居IP</label><input type="text" id="bgp_spfjs" name="bgp_spfjs"/>
                            <br/>
                            <label for="">邻居AS号</label><input type="text" id="bgp_spfsy" name="bgp_spfsy"/>
                            <br/>
                            </span>
                            <table class="modal-table dynamic_router_table" id="dynamic_router_table3_table" style="transform: translate(40px,15px)">
                                <tr>
                                    <th class="modal-table-th" width="50px">编号</th>
                                    <th class="modal-table-th" width="150px">网段/掩码</th>
                                </tr>
                            </table>
                        </span>



                    </div>
                    <div class="tab3_6">
                        <button id="modal-router-form-11-btn" class="modal-button">新建</button>
                        <button id="modal-router-form-12-btn" class="modal-button">编辑</button>
                        <button id="modal-router-form-13-btn" class="modal-button">删除</button>
                        <button id="modal-router-form-11-btn-hold" class="modal-button keep-successed">保存</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-router-form-4-table" class="modal-table">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 100px;" class="modal-table-th">映射名称</th>
                                    <th style="width: 150px;" class="modal-table-th">公网地址</th>
                                    <th style="width: 150px;" class="modal-table-th">私网地址</th>
                                    <th style="width: 50px;" class="modal-table-th">协议</th>
                                    <th style="width: 100px;" class="modal-table-th">公网端口</th>
                                    <th style="width: 100px;" class="modal-table-th">私网端口</th>
                                </tr>
                            </table>
                        </span>
                    </div>
                    <div class="tab3_7">
                            <span style="display: block;height: 400px;overflow: auto" >
                                  <span class="panel-shell" style="display: block">
                                      <span class="output-view" style="display: block">
                                          Welcome to cmd.
                                      </span>
                                      <span class="cmd_box">

                                      </span>
                                  </span>
                            </span>
                    </div>
                </div>
                <div style="border-top: 1px solid #ccc;transform: translate(0,-75px)"></div>
                <button class="modal-btn" id="modal-btn-3">关闭</button>
            </div>
        </div>
    </form>
</div>
<!--防火墙设置-->
<div class="modal-all" id="modal4">
    <form id="modal4_form" onsubmit="return false">
        <div class="modal-dialog">
            <div class="modal-content">
                <p class="modal-title-p dialog-title">防火墙设置</p>
                <ul class="tabs">
                    <li><a href="#" name=".tab4_1">基本配置</a></li>
                    <li><a href="#" name=".tab4_2">接口配置</a></li>
                    <li><a href="#" name=".tab4_3">NAT</a></li>
                    <li><a href="#" name=".tab4_4">静态路由</a></li>
                    <li><a href="#" name=".tab4_5">安全策略</a></li>
                    <li><a href="#" name=".tab4_6">服务类型</a></li>


                </ul>
                <div class="content dialog-title" id="fire_zero">
                    <div class="tab4_1" style="margin-top: 49px;margin-left: 34px;">

                        <label for="switchboard-allocation-1">元件名称</label>
                        <input type="text" id="firewall-allocation-1"  name="firewall-allocation-1"/>

                        <button id="modal-firewall-form-1-btn" class="modal-button netname keep-successed">保存</button>
                    </div>
                    <div class="tab4_2">

                        <button id="modal-firewall-form-3-btn" class="modal-button">编辑</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-firewall-form-1-table" class="modal-table">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th  style="width: 50px;" class="modal-table-th">接口名称</th>
                                    <th style="width: 50px;" class="modal-table-th">状态</th>
                                    <th style="width: 50px;" class="modal-table-th">速率</th>
                                    <th style="width: 50px;" class="modal-table-th">双工</th>
                                    <th style="width: 100px;" class="modal-table-th">连接类型</th>
                                    <th style="width: 100px;" class="modal-table-th">IP地址</th>
                                    <th style="width: 100px;" class="modal-table-th">子网掩码</th>

                                </tr>
                               
                            </table>
                        </span>
                    </div>
                    <div class="tab4_3">
                        <button id="modal-firewall-form-11-btn" class="modal-button">新建</button>
                        <button id="modal-firewall-form-12-btn" class="modal-button">编辑</button>
                        <button id="modal-firewall-form-13-btn" class="modal-button">删除</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-firewall-form-4-table" class="modal-table">
                                <tr>
                                    <th  style="width: 80px;" class="modal-table-th">选择</th>
                                    <th style="width: 100px;" class="modal-table-th">名称</th>
                                    <th style="width: 100px;" class="modal-table-th">类型</th>
                                    <th style="width: 150px;" class="modal-table-th">起始地址</th>
                                    <th style="width: 150px;" class="modal-table-th">结束地址</th>
                                </tr>
                            </table>
                        </span>
                    </div>
                    <div class="tab4_4">
                        <button id="modal-router-form-5-btn-firewall" class="modal-button">新建</button>
                        <button id="modal-router-form-6-btn-firewall" class="modal-button">编辑</button>
                        <button id="modal-router-form-7-btn-firewall" class="modal-button" data="router_status_checkbox">删除</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-router-form-2-table-firewall" class="modal-table">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 300px;" class="modal-table-th">目标网段</th>
                                    <th style="width: 300px;" class="modal-table-th">子网掩码</th>
                                    <th style="width: 300px;" class="modal-table-th">下一跳</th>

                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="router_status_checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>

                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="router_status_checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>

                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="router_status_checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>

                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="router_status_checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>

                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="router_status_checkbox"/></td>
                                    <td>192.168.1.0</td>
                                    <td>24</td>
                                    <td>10.10.10.1</td>

                                </tr><tr>
                                <td><input type="checkbox" name="router_status_checkbox"/></td>
                                <td>192.168.1.0</td>
                                <td>24</td>
                                <td>10.10.10.1</td>

                            </tr>

                            </table>
                        </span>
                    </div>
                    <div class="tab4_5">
                        <button id="modal-firewall-form-5-btn" class="modal-button">新建</button>
                        <button id="modal-firewall-form-6-btn" class="modal-button">编辑</button>
                        <button id="modal-firewall-form-7-btn" class="modal-button">删除</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-firewall-form-2-table" class="modal-table">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 50px;" class="modal-table-th">策略名称</th>
                                    <th style="width: 50px;" class="modal-table-th">状态</th>
                                    <th style="width: 100px;" class="modal-table-th">流量方向</th>
                                    <th style="width: 150px;" class="modal-table-th">源地址</th>
                                    <th style="width: 100px;" class="modal-table-th">源端口起点</th>
                                    <th style="width: 100px;" class="modal-table-th">源端口终点</th>
                                    <th style="width: 150px;" class="modal-table-th">目的地址</th>
                                    <th style="width: 50px;" class="modal-table-th">服务类型</th>
                                    <th style="width: 50px;" class="modal-table-th">策略动作</th>
                                </tr>
                            </table>
                        </span>
                    </div>
                    <div class="tab4_6">
                        <button id="modal-firewall-form-8-btn" class="modal-button">新建</button>
                        <button id="modal-firewall-form-9-btn" class="modal-button">编辑</button>
                        <button id="modal-firewall-form-10-btn" class="modal-button">删除</button>
                        <button id="modal-firewall-form-8-btn-hold" class="modal-button keep-successed">保存</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-firewall-form-3-table" class="modal-table">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 100px;" class="modal-table-th">序号</th>
                                    <th style="width: 100px;" class="modal-table-th">服务类型</th>
                                    <th style="width: 100px;" class="modal-table-th">协议类型</th>
                                    <th style="width: 100px;" class="modal-table-th">起始端口</th>
                                    <th style="width: 100px;" class="modal-table-th">结束端口</th>
                                </tr>
                            </table>
                        </span>
                    </div>

                    <div class="tab4_7">
                            <span style="display: block;height: 400px;overflow: auto" >
                              <span class="panel-shell" style="display: block">
                                  <span class="output-view" style="display: block">
                                      Welcome to cmd.
                                  </span>
                                  <span class="cmd_box">

                                  </span>
                              </span>
                        </span>
                    </div>
                </div>
                <div style="border-top: 1px solid #ccc;transform: translate(0,-75px)"></div>
                <button class="modal-btn" id="modal-btn-4">关闭</button>
            </div>
        </div>
    </form>
</div>
<!--SDN控制器设置-->
<div class="modal-all" id="modal5">
    <form id="modal5_form" onsubmit="return false">
        <div class="modal-dialog">
            <div class="modal-content">
                <p class="modal-title-p dialog-title">SDN控制器设置</p>
                <ul class="tabs">
                    <li><a href="#" name=".tab5_1">基本配置</a></li>
                    <li><a href="#" name=".tab5_2">属性配置</a></li>
                    <li style='display: none;'><a href="#" name=".tab5_3">流表下发</a></li>


                </ul>
                <div class="content dialog-title" id="sdnc_zero">
                    <div class="tab5_1" style="margin-top: 49px;margin-left: 34px;">

                        <label for="sdnC-allocation-1">元件名称</label>
                        <input type="text" id="sdnC-allocation-1"  name="sdnC-allocation-1"/>

                        <button id="modal-sdnC-form-1-btn" class="modal-button netname keep-successed">保存</button>
                    </div>
                    <div class="tab5_2" style="margin-top: 19px;margin-left: 26px;">

                        <label for="sdnC-2">IP地址</label>
                        <input type="text" id="sdnC-2" value="" name="sdnC-2" readonly/>
                        <br/>
                        <label for="sdnC-3">端口号</label>
                        <input type="text" id="sdnC-3" value="" name="sdnC-3" readonly/>
                        <br/>


                        <button id="modal-sdnC-form-2-btn" class="modal-button keep-successed">保存</button>
                        <button class="modal-button" id="modal-sdnC-form-2-btn-getIP">获取IP和端口</button>
                    </div>
                    <div class="tab5_3" style="height:700px;margin-left: 31px;">
                        <form onsubmit="return false" class="form-horizontal" id="lssued_form_b" >
                            <label for="">流表名称</label> <input type="text" class="lssued" id="liub_name" name="liub_name"/>
                            <br/>
                            <label for="">交换机名称</label>
                            <select name="lssued_sname" id="lssued_sname" class="lssued select_xf" style="transform: translate(0,-1px)">
                                <option value="SDN-SW3">SDN-SW3</option>
                                <option value="SDN-SW3">SDN-SW3</option>
                                <option value="SDN-SW3">SDN-SW3</option>
                            </select>
                            <br/>
                            <label for="">协议类型</label>
                            <select name="lssued_sname_type" id="lssued_sname_type" class="lssued select_xf">
                                <option value="TCP">TCP</option>
                                <option value="UDP">UDP</option>
                                <option value="ALL">ALL</option>
                            </select>
                            <br/>
                            <label for="">空闲超时时间</label> <input type="text" class="lssued_little" id="kxccsj" name="kxccsj">&nbsp;&nbsp;<label for="">流表生效时间</label> <input type="text" class="lssued_little" id="lbsxsj" name="lbsxsj"/ >
                            <br/>
                            <label for="">优先级</label>
                            <select name="lssued_sname_yxj" id="lssued_sname_yxj" class="lssued select_xf">
                                <option value="TCP">TCP</option>
                                <option value="UDP">UDP</option>
                                <option value="ALL">ALL</option>
                            </select>
                            <br/>
                            <label for="">Inport</label> <input type="text" class="lssued" id="lssued_inport" name="lssued_inport"/>
                            <br/>
                            <label for="">srcMAC</label> <input type="text" class="lssued_little" id="lssued_srcMAC" name="lssued_srcMAC">&nbsp;&nbsp;<label for="">dstMAC</label> <input type="text" class="lssued_little" id="lssued_dstMAC" name="lssued_dstMAC"/ >
                            <br/>
                            <label for="">ethType</label><select name="lssued_ethType" id="lssued_ethType" class="lssued_little select_xf">
                            <option value="VLAN">VLAN</option>
                            <option value="IP">IP</option>
                        </select>&nbsp;&nbsp;<label for="">VLAN ID</label> <input type="text" class="lssued_little" id="lssued_vlan_id" name="lssued_vlan_id"/ >
                            <br/>
                            <label for="">ipProto</label>
                            <select name="lssued_ipProto" id="lssued_ipProto" class="lssued select_xf">
                                <option value="TCP">TCP</option>
                                <option value="UDP">UDP</option>

                            </select>
                            <br/>
                            <label for="">IPv4Src</label> <input type="text" class="lssued_little" id="lssued_IPv4Src" name="lssued_IPv4Src">&nbsp;&nbsp;<label for="">IPv4Dst</label> <input type="text" class="lssued_little" id="lssued_IPv4Dst" name="lssued_IPv4Dst"/ >
                            <br/>
                            <label for="">tcpSrc</label> <input type="text" class="lssued_little" id="lssued_tcpSrc_l2" name="lssued_tcpSrc_l2">&nbsp;&nbsp;<label for="">tcpDst</label> <input type="text" class="lssued_little" id="lssued_tcpDst_l2" name="lssued_tcpDst_l2">
                            <br/>
                            <label for="">outPut</label> <input type="text" class="lssued" id="lssued_outPut" name="lssued_outPut"/>
                        </form>
                        <button id="modal5_form_btn_lbxf" class="modal-button keep-successed">保存</button>
                    </div>
                    <div class="tab5_4">
                           <span style="display: block;height: 400px;overflow: auto" >
                              <span class="panel-shell" style="display: block">
                                  <span class="output-view" style="display: block">
                                      Welcome to cmd.
                                  </span>
                                  <span class="cmd_box">

                                  </span>
                              </span>
                        </span>
                    </div>


                </div>
                <div style="border-top: 1px solid #cccccc;transform: translate(0,-75px)"></div>
                <button class="modal-btn" id="modal-btn-5">关闭</button>
            </div>
        </div>
    </form>
</div>
<!--SDN交换机设置-->
<div class="modal-all" id="modal6">
    <form id="modal6_form" onsubmit="return false">
        <div class="modal-dialog">
            <div class="modal-content">
                <p class="modal-title-p dialog-title">SDN交换机设置</p>
                <ul class="tabs">
                    <li><a href="#" name=".tab6_1">基本配置</a></li>
                    <li><a href="#" name=".tab6_2">属性配置</a></li>
                    <li><a href="#" name=".tab6_3">接口配置</a></li>


                </ul>
                <div class="content dialog-title" id="sdns_zero">
                    <div class="tab6_1" style="margin-top: 49px;margin-left: 34px;">

                        <label for="sdnS-allocation-1">元件名称</label>
                        <input type="text" id="sdnS-allocation-1" name="sdnS-allocation-1" />

                        <button id="modal-sdnS-form-1-btn" class="modal-button netname keep-successed">保存</button>
                    </div>
                    <div class="tab6_2" style="margin-left: 10px;">

                        <label for="sdnS-2" style="transform: translate(0,30px)">OpenFlow版本</label>

                        <select name="sdnS-2" id="sdnS-2" class="select_up" style="display: block">
                            <option value="1.0">1.0</option>
                            <option value="1.3">1.3</option>
                        </select>
                        <br/>
                        <label for="sdnS-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;主控制器IP</label>
                        <input type="text" id="sdnS-3" name="sdnS-3"/>
                        <br/>

                        <label for="sdnS-4">&nbsp;&nbsp;&nbsp;&nbsp;主控制器端口</label>
                        <input type="text" id="sdnS-4" name="sdnS-4"/>
                        <br/>
                        <label for="sdnS-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;备控制器IP</label>
                        <input type="text" id="sdnS-5" name="sdnS-5"/>
                        <br/>
                        <label for="sdnS-6">&nbsp;&nbsp;&nbsp;&nbsp;备控制器端口</label>
                        <input type="text" id="sdnS-6" name="sdnS-6"/>

                        <button id="modal-sdnS-form-2-btn" class="modal-button keep-successed">保存</button>
                    </div>

                    <div class="tab6_3">
                        <button id="modal-switchboard-sdn-form-6-btn" class="modal-button">编辑</button>
                        <span style="display: block;overflow: auto;height:350px;">
                            <table id="modal-switchboard-sdn-form-2-table" class="modal-table">
                                <tr>
                                    <th  style="width: 50px;" class="modal-table-th">选择</th>
                                    <th style="width: 100px;" class="modal-table-th">接口名称</th>
                                    <th style="width: 100px;" class="modal-table-th">状态</th>
                                    <th style="width: 100px;" class="modal-table-th">接口速率</th>
                                    <th style="width: 100px;" class="modal-table-th">双工</th>

                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>1</td>
                                    <td>on</td>
                                    <td>auto 10 100 100</td>
                                    <td>全双工</td>

                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>2</td>
                                    <td>off</td>
                                    <td>10</td>
                                    <td>全双工</td>

                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>2</td>
                                    <td>on</td>
                                    <td>10</td>
                                    <td>全双工</td>

                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>1</td>
                                    <td>on</td>
                                    <td>auto 10 100 100</td>
                                    <td>全双工</td>

                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>1</td>
                                    <td>on</td>
                                    <td>auto 10 100 100</td>
                                    <td>全双工</td>

                                </tr>
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>1</td>
                                    <td>on</td>
                                    <td>auto 10 100 100</td>
                                    <td>全双工</td>

                                </tr>
                            </table>
                        </span>
                    </div>


                    <div class="tab6_4">
                        <span style="display: block;height: 400px;overflow: auto" >
                              <span class="panel-shell" style="display: block">
                                  <span class="output-view" style="display: block">
                                      Welcome to cmd.
                                  </span>
                                  <span class="cmd_box">

                                  </span>
                              </span>
                        </span>
                    </div>


                </div>
                <div style="border-top: 1px solid #cccccc;transform: translate(0,-75px)"></div>
                <button class="modal-btn" id="modal-btn-6">关闭</button>
            </div>
        </div>
    </form>
</div>
<!--客户端设置-->
<div class="modal-all" id="modal7">
    <form  id="modal7_form" onsubmit="return false">
        <div class="modal-dialog">
            <div class="modal-content">
                <p class="modal-title-p dialog-title">客户端设置</p>
                <ul class="tabs">
                    <li><a href="#" name=".tab7_1">基本配置</a></li>
                    <li><a href="#" name=".tab7_2">接口配置</a></li>


                </ul>
                <div class="content dialog-title" id="cli_zero">
                    <div class="tab7_1"  style="margin-top: 49px;margin-left: 34px;">
                            <label for="server-allocation-1">元件名称</label>
                            <input type="text" id="cli-allocation-1"  name="cli-allocation-1"/>
                        <button id="modal-cli-form-1-btn" class="modal-button netname keep-successed">保存</button>
                    </div>
                    <div class="tab7_2" style="margin-top: 49px;margin-left: 34px;">
                            <label for="cli-allocation-2">配置IP地址</label>
                            <!--<input type="text" id="cli-allocation-2"/>-->
                            <select id="cli-allocation-2" name="cli-allocation-2">
                                <option value="static" >手动输入</option>
                                <option value="auto" >自动获取</option>
                            </select>
                            <br/>
                            <label for="cli-allocation-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IP地址</label>
                            <input type="text" id="cli-allocation-3" value="" name="cli-allocation-3"/>
                            <br/>
                            <label for="cli-allocation-4">&nbsp;&nbsp;&nbsp;&nbsp;子网掩码</label>
                            <input type="text" id="cli-allocation-4" name="cli-allocation-4"/>
                            <br/>
                            <label for="cli-allocation-5">&nbsp;&nbsp;&nbsp;&nbsp;网关地址</label>
                            <input type="text" id="cli-allocation-5" name="cli-allocation-5"/>
                            <br/>
                            <label for="cli-allocation-6">&nbsp;&nbsp;&nbsp;&nbsp;首选DNS</label>
                            <input type="text" id="cli-allocation-6" name="cli-allocation-6"/>
                            <br/>
                            <label for="cli-allocation-7">&nbsp;&nbsp;&nbsp;&nbsp;次选DNS</label>
                            <input type="text" id="cli-allocation-7" name="cli-allocation-7"/>

                        <button id="modal-cli-form-2-btn" class="modal-button keep-successed" style="transform: translate(86px,26px)">保存</button>
                    </div>
                    <div class="tab7_3">
                        <span style="display: block;height: 400px;overflow: auto" >
                              <span class="panel-shell" style="display: block">
                                  <span class="output-view" style="display: block">
                                      Welcome to cmd.
                                  </span>
                                  <span class="cmd_box">

                                  </span>
                              </span>
                        </span>
                    </div>


                </div>
                <div style="border-top: 1px solid #cccccc;transform: translate(0,-75px)"></div>
                <button class="modal-btn" id="modal-btn-7">关闭</button>
            </div>
        </div>
    </form>
</div>
<!--云设置-->
<div class="modal-all" id="modal8" >
    <form id="modal8_form" onsubmit="return false">
        <div class="modal-dialog">
            <div class="modal-content">
                <p class="modal-title-p dialog-title">真实网络</p>
                <ul class="tabs">
                    <li><a href="#" name=".tab8_1">基本配置</a></li>
                    <li><a href="#" name=".tab8_2" id="para-host">宿主机网卡配置</a></li>

                </ul>
                <div class="content dialog-title" id="yun_zero">
                    <div class="tab8_1" style="margin-top: 49px;margin-left: 34px;">

                        <label for="yun-allocation-1" >元件名称</label>
                        <input type="text" id="yun-allocation-1"  name="yun-allocation-1"/>

                        <button id="modal-yun-form-1-btn" class="modal-button netname keep-successed">保存</button>
                    </div>
                    <div class="tab8_2" style="margin-top: 49px;margin-left: 34px;">
                    <label for="yun-allocation-szj" id="yun-allocation-szj-label">宿主机网卡</label>
                        <select id="yun-allocation-szj" style="transform: translate(0.0);" name="yun-allocation-szj">
                            <option disabled="disabled" id="yun-allocation-szj-opt" >请选择</option>

                        </select>
                           <button id="modal-yun-form-1-btn-szj" class="modal-button netname keep-successed">保存</button>
                    </div>

                </div>
                <div style="border-top: 1px solid #ccc;transform: translate(0,-75px)"></div>
                <button class="modal-btn" id="modal-btn-8">关闭</button>
            </div>
        </div>
    </form>
</div>
<!--lianlu-->
<div class="modal-all" id="modal10" style="">
    <form id="modal8_form_ll" onsubmit="return false">
        <div class="modal-dialog">
            <div class="modal-content">
                <p class="modal-title-p dialog-title">链路属性设置</p>
                <ul class="tabs">
                    <li><a href="#" name=".tab8_1">基本配置</a></li>


                </ul>
                <div class="content dialog-title" id="yun_zero_ll">
                    <div class="tab8_1" style="margin-top: 49px;margin-left: 34px;">

                        <label for="yun-allocation-1" >丢包率</label>
                        <input type="text" id="yun-allocation-1_ll"  name="yun-allocation-1"  placeholder=""/>
                        <br/>
                        <label for="yun-allocation-1" >&nbsp;&nbsp;&nbsp;&nbsp;时延</label>
                        <input type="text" id="yun-allocation-1_ll2"  name="yun-allocation-1" placeholder="单位毫秒"/>

                        <button id="modal-yun-form-1-btn_ll" class="modal-button netname keep-successed">保存</button>
                    </div>


                </div>
                <div style="border-top: 1px solid #ccc;transform: translate(0,-75px)"></div>
                <button class="modal-btn" id="modal-btn-8_ll">关闭</button>
            </div>
        </div>
    </form>
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
                <a href="<?php echo site_url('quick_avigation/quick_avigation'); ?>">
                    <li>
                    <span class="glyphicon glyphicon-flag" style="font-size: 22px">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180453.png" alt=""/>-->
                    </span>
                        <p>快速向导</p>
                    </li>
                </a>
                <a href="<?php echo site_url('topo_manage/topo_manage'); ?>" style="transform:scale(1.15);">
                    <li >
                    <span class="glyphicon glyphicon-calendar" style="font-size: 22px;color: #0288D1;">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180506.png" alt=""/>-->
                    </span>
                        <p style="color: #0288D1" class="animated bounce">拓扑管理</p>
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
    <div id="left-navigation-mask" style="display: none"></div>
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
                                 <span class="glyphicon glyphicon-off" id="exit" title="退出系统"></span>
                            <!--<img src="<?php echo base_url(); ?>images/exit.png" alt="" id="exit" title="退出系统"/>-->
                        </a>
                    </span>
                </li>
            </ul>
        </div>
        <div id="top-navigation-mask" style="display: none"></div>
        <!-- section-->
        <div id="section">
            <div id="section-top">
                <ul>
                    <li class="animated zoomIn">
                        <a href="<?php echo site_url('topo_manage/topo_manage'); ?>" class="section-btn" style="text-decoration: none" id="keep-list"><img src="<?php echo base_url(); ?>images/tui.png" alt=""/>返回列表</a>
                    </li>
                    <li class="word animated fadeInRight">
                        <span id="topo-span"><?=$topo_name;?></span>
                    </li>

                </ul>
                 <button href="" class="section-btn right animated zoomIn" style="text-decoration:none" id="keep-topo"><img src="<?php echo base_url(); ?>images/bao.png" alt="" >保存拓扑</button>
                <!--<a href="" class="btn right" ><img src="<?php echo base_url(); ?>images/search-little.png" alt=""/>查看脚本</a>-->
                <button class="btn-primary" id="check_window" style="display: none">收起</button>
            </div>
               <div id="section-top-mask" style="display: none"></div>
            <div id="section-left" class="content-body-left">


            </div>
            <ul id="contextmenu" style="display: none;position: absolute;z-index: 999">
                <li><a>顺时针旋转</a></li>
                <li><a>逆时针旋转</a></li>
                <li><a>放大</a></li>
                <li><a>缩小</a></li>
                <li><a>元件配置</a></li>
                <!--<li id="you_console"><a>控制台</a></li>-->
                <li class="go_con"><a>前往控制台</a></li>
                <!--<li><a>编辑节点</a></li>-->
                <li><a>删除该节点</a></li>
            </ul>
            <ul id="linemenu" style="display: none;position: absolute;z-index: 999">
                <li><a>删除该连线</a></li>
            </ul>
            <ul id="detail" style="display:none;background-color :#d3d3d3;"></ul>
            <div class="container-topo">
                <div id="content">
                    <div class="row clearfix">

                            <div class="span2">
                                <div id="components-box">
                                    <div id="components-box-mask" style="display: none"></div>
                                    <div class="coms" id="components">
                                        <p>元件库</p>
                                        <div class="component" title="客户端" trigger="manual" id="u380">
                                            <a class=" icon exchanger" id="ji"><img src="<?php echo base_url(); ?>images/u380.svg" alt=""/><span>客户端</span></a>
                                        </div>
                                        <div class="component" title="服务器" trigger="manual"  id="u384">
                                            <a class=" icon node "><img src="<?php echo base_url(); ?>images/u384.svg" alt=""/><span>服务器</span></a>
                                        </div>


                                        <!-- l2 弹窗-->
                                        <div style="display: none" id="components-l2">
                                            <div class="component" title="交换机" trigger="manual"  id="usw1">
                                                <a class=" icon "><img src="<?php echo base_url(); ?>images/usw1.svg" alt=""/><span>SW-5248-P <br/>48口千兆电</span></a>
                                            </div>
                                            <div class="component" title="交换机" trigger="manual" id="usw2" >
                                                <a class=" icon "><img src="<?php echo base_url(); ?>images/usw2.svg" alt=""/><span>SW-5248-F<br/>48口千兆光</span></a>
                                            </div>
                                        </div>
                                        <!-- l2 弹窗-->


                                        <!-- l3弹窗-->

                                        <div style="display: none" id="components-l3">
                                            <div class="component" title="交换机" trigger="manual" id="usw3" style="margin-top:110px;">
                                                <a class=" icon "><img src="<?php echo base_url(); ?>images/usw3.svg" alt=""/><span>SW-5358-H <br/>48口千兆电</span></a>
                                            </div>
                                            <div class="component" title="交换机" trigger="manual" id="usw4" >
                                                <a class=" icon "><img src="<?php echo base_url(); ?>images/usw4.svg" alt=""/><span>SW-5352-H <br/>4口万兆光</span></a>
                                            </div>
                                            <div class="component" title="交换机" trigger="manual"  id="usw5">
                                                <a class=" icon "><img src="<?php echo base_url(); ?>images/usw5.svg" alt=""/><span>SW-5524-H <br/>24口万兆光</span></a>
                                            </div>
                                        </div>
                                        <!-- l3 弹窗-->
                                        <div class="component" title="路由器" trigger="manual"  id="u382" style="margin-top: 120px;">
                                            <a class=" icon "><img src="<?php echo base_url(); ?>images/u382.svg" alt=""/><span>路由器</span></a>
                                        </div>
                                        <div class="component" title="防火墙" trigger="manual"  id="u388">
                                            <a class=" icon "><img src="<?php echo base_url(); ?>images/u388.svg" alt=""/><span>防火墙</span></a>
                                        </div>
                                        <div class="component" title="真实网络" trigger="manual"  id="u378">
                                            <a class=" icon yun"><img src="<?php echo base_url(); ?>images/u378.svg" alt=""/><span>真实网络</span></a>
                                        </div>
                                        <div class="component" title="SDN控制器" trigger="manual" id="u512">
                                            <a class=" icon "><img src="<?php echo base_url(); ?>images/u512.svg" alt=""/><span>SDN控制器</span></a>
                                        </div>
                                        <div class="component" title="SDN交换机" trigger="manual"  id="u1811">
                                            <a class=" icon "><img src="<?php echo base_url(); ?>images/u1811.svg" alt=""/><span>SDN交换机</span></a>
                                        </div>


                                    </div>
                                    <div class="component coms" title="请选择交换机类型" trigger="manual"  id="u386" style="transform: translate(-10px,0)">
                                        <a class=" icon "><img src="<?php echo base_url(); ?>images/u386.svg" alt=""/><span>L2交换机</span></a>
                                        <div id="lll2"></div>
                                    </div>
                                    <div class="component" title="请选择交换机类型" trigger="manual" id="u376" style="transform: translate(-10px,0)">
                                        <a class=" icon node"><img src="<?php echo base_url(); ?>images/u376.svg" alt=""/><span>L3交换机</span></a>
                                        <div id="lll3"></div>
                                    </div>
                                </div>


                            </div>

                        <div class="span10">
                            <canvas width="940" height="475" id="target"></canvas>

                        </div>
                    </div> <!-- row -->

                    </div>
                </div> <!-- /content -->
            </div> <!-- /container-topo -->
            <!--<div id="content-body-center" class="right content-body-center"></div>-->
            <!--<canvas id="canvas"></canvas>-->
        </div>
        <div id="section-mask" style="display: none"></div>
        <!-- TEST-->

    <!-- 检查弹窗-->

        <!--选择元件接口-->
<!--选择元件接口-->
<div id="chooseS" style="display: none">
    <p>选择开始连接的元件接口</p>
    <select name="" id="choose-1">
        <option value="xx"></option>
        <option value="Eth1">Eth1</option>
    </select>
</div>
<div id="chooseE" style="display: none">
    <p>选择结束连接的元件接口</p>
    <select name="" id="choose-2">
        <option value="YY"></option>
        <option value="Eth1">Eth1</option>
    </select>
</div>




<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css"/>

<script>
    function setTopoType( topo_type ){
        if( topo_allElement_data.topo_type ){
            return;
        }
        if( topo_type == '传统拓扑' ){
            $('#u512').hide();
            $('#u1811').hide();
            $('#sdn_line').hide()
        }
        topo_allElement_data.topo_type=topo_type;
    }

    function setTopoName( topo_name ){
        if( topo_allElement_data.topo_name ){
            return;
        }
        $('#topo-span').html( topo_name );
        topo_allElement_data.topo_name=topo_name;
    }


</script>

<script>
<?php if ($web_info){
	?>
		var restore_topo_img_data=<?=$web_info?>;
	<?php 
	}else{
	?>
	var restore_topo_img_data='';
	<?php 
	}
	?>
	var restore_topo_name = '<?=$topo_name;?>' 

</script>
<script src="<?php echo base_url(); ?>js/com.js"></script>
<script src="<?php echo base_url(); ?>js/pingPort.js"></script>
<!--<script src="<?php echo base_url(); ?>js/check.js"></script>-->
<script src="<?php echo base_url(); ?>js/check11.6.js"></script>
<script src="<?php echo base_url(); ?>js/terminal.js"></script>
<script src="<?php echo base_url(); ?>js/topoimgconf.js"></script>
<script src="<?php echo base_url(); ?>js/savetable.js"></script>


<script>
 $("#u386,#lll2").click(function(){
        if($("#components-l3").css("display")=="none"){
            if($("#components-l2").css("display")=="none"){
                $("#components-l2").show();
                $('#usw1').css('margin-top','60px');
                $("#lll2").css('border-color','transparent transparent #0288D1  transparent');
                $('#u376').css('top','340px');
                $('#u382').css('margin-top','60px');

            }else{
                $("#components-l2").hide();
                $("#lll2").css('border-color','#666666 transparent transparent transparent');
                $('#u376').css('top','230px');
                $('#u382').css('margin-top','113px');
            }
        }else{
            if($("#components-l2").css("display")=="none"){
                $("#components-l2").show();
                $('#usw1').css('margin-top','57px')
                $("#lll2").css('border-color','transparent transparent #0288D1  transparent');
                $('#u376').css('top','340px');
                $('#u382').css('margin-top','10px');
                $("#components-l3").css('margin-top','-58px');
                $('#usw3').css('margin-top','128px')

            }else{
                $("#components-l2").hide();
                $("#lll2").css('border-color','#666666 transparent transparent transparent');
                $('#u376').css('top','230px');
                $("#components-l3").css('margin-top','128px')

            }
        }

    });
    $('#u376,#lll3').click(
            function () {
                if($("#components-l2").css("display")=="none"){
                    if($("#components-l3").css("display")=="none"){
                        $("#components-l3").show();
                        $("#lll3").css('border-color','transparent transparent #0288D1  transparent');
                        $('#u382').css('margin-top','0px');
                        $('#usw3').css('margin-top','119px')

                    }else{
                        $("#components-l3").hide();
                        $("#lll3").css('border-color','#666666 transparent transparent transparent');
                        $('#u382').css('margin-top','113px');
                    }
                }else{
                    if($("#components-l3").css("display")=="none"){
                        $("#components-l3").show().css('margin-top','75px');
                        $('#usw3').css('margin-top','71px')
                        $("#lll3").css('border-color','transparent transparent #0288D1  transparent');
                        $('#u382').css('margin-top','0px');

                    }else{
                        $("#components-l3").hide();
                        $("#lll3").css('border-color','#666666 transparent transparent transparent');
                        $('#u382').css('margin-top','64px');
                    }
                }

            }
    );

    //<!-- 开启流量-->

    $(document).on("change","#topo-name",function(){
        var topotitle=$(this).val();//获取value

    });
    var luff=true;
    start.onclick=function(){
        if(luff){
            start.src = '<?php echo base_url(); ?>images/2017-08-25_105734.png';
            $('#linestyle').fadeOut();
        }else{
            start.src = '<?php echo base_url(); ?>images/2017-08-25_105716.png';
            $('#linestyle').fadeOut();
        }

    }

    $(document).ready(function() {
        $('#ser_port').hide();
        $('#sdn_port').hide();
//        $('#toggle_vr').hide();
//        $('.port_mask').show();
        $(".input1").change(
                function() {
                    var $selectedvalue = $("input[name='input1']:checked").val();

                    if ($selectedvalue == 'true') {

                        $('#ser_port').fadeIn();
                    }
                    else {
                        $('#ser_port').fadeOut();
                    }
                });
    $(".input2").change(
            function() {
                var $selectedvalue2 = $("input[name='input2']:checked").val();

                if ($selectedvalue2 == 'true') {
                    $('#sdn_port').fadeIn();

                }
                else {

                    $('#sdn_port').fadeOut();
                }
            });
        $(".input3").change(
                function() {
                    var $selectedvalue3 = $("input[name='input3']:checked").val();

                    if ($selectedvalue3 == 'true') {
                        $('#toggle_vr').fadeOut();

                    }
                    else {

                        $('#toggle_vr').fadeIn();
                    }
                });
        $(".input4").change(
                function() {
                    var $selectedvalue4 = $("input[name='input4']:checked").val();

                    if ($selectedvalue4 == 'true') {
                        $('.port_mask').fadeOut();

                    }
                    else {

                        $('.port_mask').fadeIn();
                    }
                });
        $(".input5").change(
                function() {
                    var $selectedvalue5 = $("input[name='input5']:checked").val();

                    if ($selectedvalue5 == 'true') {
                        $('.port_mask').fadeOut();

                    }
                    else {

                        $('.port_mask').fadeIn();
                    }
                });

        $("#dynamic_router_select1").change(
                function() {
                    var element = current_element();

                    var $selectedvalue7 = $("#dynamic_router_select1").val();
                    if ($selectedvalue7 == 'r2') {
                        $("#dynamic_router_select2 option").remove();
                        $("#dynamic_router_select2").append("<option value='bgp'>bgp</option>");
                        if($("#dynamic_router_select2").val()=='bgp'){
                            $('#OSPF').hide();
                            $('#rip').hide();
                            $('#dynamic_router_table3').fadeIn();
                            element.dynamic_type = $selectedvalue7+'-bgp'
                        }
                    }
                    else if($selectedvalue7 == 'r1'){
                        $("#dynamic_router_select2 option").remove();
                        $("#dynamic_router_select2").append("<option value='RIP'>RIP</option><option value='OSPF'>OSPF</option>");
                        $('#rip').fadeIn();
                        $('#OSPF').hide();
                        $('#dynamic_router_table3').hide();
                        element.dynamic_type = $selectedvalue7+'-RIP'
                    }

                    restore.route_dynamic_data();
                });
        $("#dynamic_router_select2").change(
                function() {
                    var element = current_element();
                    var name1 = $("#dynamic_router_select1").val();
                    var $selectedvalue6 = $("#dynamic_router_select2").val();
                    element.dynamic_type = name1+'-'+$selectedvalue6
                    if ($selectedvalue6 == 'RIP') {
                        $('#rip').fadeIn();
                        $('#OSPF').hide();
                        $('#new_bgp_btn').hide();
                    }
                    else if($selectedvalue6 == 'OSPF'){

                        $('#OSPF').fadeIn();
                        $('#rip').hide();
                    }
                    restore.route_dynamic_data();
                });
        $('#OSPF,#dynamic_router_table3').hide();





    });
</script>
<input type="hidden" id="current_topo_id" value="<?=$id;?>" />
<input type="hidden" id="current_topo_name" value="<?=$topo_name;?>" />
<input type="hidden" id="current_topo_type" value="<?=$topo_type;?>" />

<div id="link-alert-container" >
    <div id="link-alert-content" >
    </div>
</div>
<script>
    $('#new_router_map_dkzz').change(function(){
        if($('#new_router_map_dkzz').is(':checked')){
            $('#zz_div').show()
        }else{
            $('#zz_div').hide()
        }
    })

</script>
//<script src="<?php echo base_url(); ?>js/echarts.common.min.js"></script>
<script src="<?php echo base_url(); ?>js/echarts.js"></script>
<script src="<?php echo base_url(); ?>js/dark.js"></script>
<script>
    var get_chart;
    var chart_start=true;

$(document).on('click','#create-newUsers>ul a',function(){
   var chart_type=$(this)[0].id;
    var chart_name=$(this).find('p').text();
    $('#ala_blacky').next().html(chart_name+'流量图')

    $('#create-newUsers').animate({'left':'-726'}, 'slow');

    if( chart_start){
          $('#chart_right').css('visibility','visible');

        echar_table = {
        		 statistics_id:0,
        		datetime:[],
        	    show_data:[],
        	    name:[],
        	    myChart:'',
        	    option:{
                    backgroundColor:'#ebecec',
//        	        title: {
//        	            text: chart_name+'流量图'
//        	        },
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

        	        this.myChart.setOption(this.option,true);
        	    },
        	    init_data:function(fun){
//        	    	this.myChart.showLoading()
        	        $.getJSON(window_topo_web_path+'/manage_count/manage_count/statistics_info?statistics_id='+echar_table.statistics_id+'&node_type='+chart_type+'&callback=?').done(function (data) {
        	            echar_table.data(data);
        	        });

        	    },
        	    data:function(data){
        	        echar_table.name=[];
        	        if( !data['flow_info'] ){
//        	        	echar_table.myChart.hideLoading();
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
//        	                areaStyle: {normal: {}},
                            itemStyle : {
                                 normal : {
                                 lineStyle:{

                                             }
                                         }
                                     },
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
        	               axisLabel : {

                                  	                    textStyle:{
                                                                           color:"#000000", //刻度颜色
                                                                            //刻度大小
                                                                      }
                                  	                }
        	            },
        	            xAxis:{
        	                data:time,
        	                axisLabel : {
        	                    interval: step,
        	                    textStyle:{
                                                 color:"#000000", //刻度颜色
                                                  //刻度大小
                                            }
        	                }
        	            },
        	            legend:{
        	                data:echar_table.name,
        	                textStyle:{
                                        color:'#000',
                                    }
        	            },

        	            series: echar_table.show_data
        	        });

        	        echar_table.name =[];
        	        echar_table.show_data=[]
        	    },
        	    init_timeval:function(){

        	       get_chart=setInterval(function(){
        	           echar_table.init_data()
        	       },2000)
        	    }

        	}

        	echar_table.init();
             chart_start=false;

    }else{
        clearInterval(get_chart)
    }
});

$(document).on('click','#chart_right', function () {
  $('#ala_blacky').next().html('统计分析')
 clearInterval(get_chart);
     chart_start=true;
    $('#create-newUsers').animate({'left':'0'}, 'slow');
    $('#main').animate({'left':'726'},'slow')
      $('#chart_right').css('visibility','hidden')
});

</script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
</body>

</html>
