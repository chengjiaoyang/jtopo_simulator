<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>拓扑管理</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/topology-manage.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert.css"/>
    <script src="<?php echo base_url(); ?>js/jquery-1.11.3.js"></script>
    <script src="<?php echo base_url(); ?>js/alert.js"></script>
    <script src="<?php echo base_url(); ?>js/windows.js"></script>
    <script src="<?php echo base_url(); ?>js/vue.js"></script>
    
    <script src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
   
     <script src="<?php echo base_url(); ?>js/jquery.form.js"></script>
<?php
include $this->config->item('abs_path').'/public/header.php'; 
?>
</head>
<body>
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
                
                    <fieldset id="fieldset">
                        <div class="form-group">
                            <label for="disabledTextInput">拓扑名称</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="请输入拓扑名称">
                        </div>
                        <div class="form-group">
                            <label for="disabledSelect">新建方式</label>
                            <select id="disabledSelect" class="form-control">
                                <option>从头开始新建</option>
                                <option>导入已有拓扑</option>
                            </select>
                        </div>
                        <div class="form-group" id="topo_class">
                            <label for="topo-type">拓扑类型</label>
                            <select id="topo-type" class="form-control">
                                <option>传统拓扑</option>
                                <option>SDN拓扑</option>
                            </select>
                        </div>
                        <div class="form-group" id="choose_file_calss" style="display: none">
                            <label for="choose_file" >导入文件</label>
                            <!-- <input type="file" id="choose_file"/> -->
                            	<form id='topo_upload' action='<?php echo site_url("topo_manage/topo_manage/import_topo"); ?>' method='post' enctype='multipart/form-data'>
			            	   		<input type="file" id="topo_file" name="topo_file" onchange='upload_topo()'/><input id="topo_file_url" value="" type="hidden">
			            	   		<!-- <button type="button" id="import_button">确定</button> -->
			            	  	</form>
			            	  <!-- <input type="button" id="import_button" value="导入"/>&nbsp;(注:支持.txt)&nbsp; -->
                        </div>
                        <!--<div class="checkbox">-->
                            <!--<label>-->
                                <!--<input type="checkbox"> Can't check this-->
                            <!--</label>-->
                        <!--</div>-->
                        <button type="button" id="modal-sure">确定</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="modal-exit">取消</button>
                    </fieldset>
                

            </div>

        </div>
    </div>
</div>


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
    <!-- top导航-->
    <div id="top-navigation">
        <ul id="top-navigation-left">
            <li>中国电信云计算实验室</li>
            <li class="animated rubberBand">网络模拟平台</li>
        </ul>
        <ul id="top-navigation-right">
            <li class="animated tada"><img src="<?php echo base_url(); ?>images/u74.png" alt=""/></li>
            <li>Welcome, <span id="user" class="user"><?php echo $this->session->userdata('username');?></span></li>
            <li class="">
                    <span>
                        <a href="<?php echo site_url('login/logout'); ?>" >
                            <img src="<?php echo base_url(); ?>images/exit.png" alt="" id="exit" title="退出系统"/>
                        </a>
                    </span>
            </li >
        </ul>
    </div>
    <!-- 主面板-->
    <div id="section">
        <div id="quick-create">
            <ul>
                <li class="animated fadeInRight" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInRight;">拓扑管理</li>
                <li class="animated fadeInRight">传统拓扑: <?=$chuantong;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SDN拓扑: <?=$sdn;?></li>
            </ul>

        </div>
        <div id="create" >
            <button id="btn" data-toggle="modal" data-target="#myModal" class="animated bounceInUp">新建拓扑</button>
            <div class="domab" style="position: relative">
                <div class="" style="float:right;">
                    <label>
                        <input type="text" class="dsearch" placeholder="请输入关键字..." aria-controls="example" id="search-input">
                        <img src="<?php echo base_url(); ?>images/2017-08-18_165039.png" alt="" id="search-img">
                    </label>
                </div>

                <button id="button" style="float:left;" >删除拓扑</button>
                <button id="button_d" style="float:left;">下载拓扑</button>
                <!--<button id="button" style="float:left;" >下载拓扑</button>-->
                <div style="float:left; position:relative; z-index:9999;height:100%;">
                    <!--<button class="showcol">列段显示/隐藏</button>-->
                    <!--<ul class="showul"-->
                    <!--style=" list-style:none;display:none; position:absolute; left:80px; top:10px; background:#FFFFFF; border:1px solid #ccc; width:200px;">-->
                    <!--<li>-->
                    <!--<input type="checkbox" class="toggle-vis" data-column="2"/>-->
                    <!--服务器名称-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--<input type="checkbox" class="toggle-vis" data-column="3"/>-->
                    <!--IP-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--<input type="checkbox" class="toggle-vis" data-column="4"/>-->
                    <!--CPU/内存-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--<input type="checkbox" class="toggle-vis" data-column="5"/>-->
                    <!--数据盘大小-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--<input type="checkbox" class="toggle-vis" data-column="6"/>-->
                    <!--操作系统-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--<input type="checkbox" class="toggle-vis" data-column="7"/>-->
                    <!--状态-->
                    <!--</li>-->
                    <!--</ul>-->
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="wt100" style="position:relative; overflow:hidden; height:100%">
                <table id="example" class="display animated slideInUp" cellspacing="0" width="100%" >
                    <thead>
                    <tr>
                        <th style=" width:1px; padding:0"></th>
                        <th style="width:30px; padding:10px 0 10px 10px">
                            <input type="checkbox" id="checkAll"></th>
                        <th>拓扑名称</th>
                        <th>创建时间</th>
                        <th>创建者</th>
                        <th>拓扑类型</th>
                        <!--<th>操作系统</th>-->
                        <!--<th>状态</th>-->
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <!--<th></th>-->
                        <!--<th></th>-->
                    </tr>
                    </tfoot>
                    <tbody>
                    
                    <?php if(!empty($topo_list)){foreach($topo_list as $data): ?>
                    
                    <tr>
                        <td></td>
                        <td>
                            <input type="checkbox" value='<?=$data['topo_name_id']?>' name="checkList"></td>
                        <td>
                           <a class="clickdom" href="<?php echo site_url('topo_manage/topo_manage/check_topo').'?id='.$data['topo_name_id'].'&name='.$data['topo_name']; ?>" isclick="true" onClick="clickDom(this);"><?=$data['topo_name'];?></a>
                        </td>
                        <td><?=$data['create_time']?></td>
                        <td><?=$data['user_name']?></td>
                        <td><?=$data['topo_type']?></td>
                        <!--<td>CentOS 56.5</td>-->
                        <!--<td>运行中</td>-->
                    </tr>
                    <?php endforeach; } ?>   
                                    

                    </tbody>
                </table>
                <div class="showslider">
                    <button class="closediv">关闭</button>
                </div>
                <style>
                    .showslider {
                    display:none;
                        width: 25%;
                        height: 100%;
                        background-color: #fff;
                        border: 1px solid #ccc;
                        position: absolute;
                        top: 9px;
                    }

                    .addselect {
                        border-radius: 2px;
                        display: inline-block;
                        background-color: #ccc;
                        height: 12px;
                        width: 16px;
                        text-align: center;
                        color: #fff;
                        font-size: 9px;
                        font-family: Arial;
                        position: relative;
                        margin-left: 4px;
                        cursor: pointer;
                        overflow: hidden;
                        vertical-align: top;
                        top: 1px;
                    }

                    .addselect select {
                        width: 44px;
                        opacity: 0;
                        position: absolute;
                        left: 0;
                        top: 0;
                        cursor: pointer;
                    }

                    table.dataTable tbody th, table.dataTable th, table.dataTable tbody td {
                        font-size: 12px;
                        text-align: left;
                    }

                    table.dataTable thead th {
                        padding: 0 8px;
                    }
                    #example a{
                        cursor: pointer;
                    }
                    .modal-backdrop{
                        z-index:975;
                    }
                    #myModal{
                        z-index:987;
                    }
                </style>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<!--<script>-->
    <!--var app=new Vue({-->
        <!--el:'#container',-->
        <!--data(){-->
        <!--return{-->
            <!--users:[-->
                <!--{name:'测试拓扑1',time:'2017-6-15',people:'Administrator',type:'传统'},-->
                <!--{name:'SDN双线拓扑',time:'2017-8-15',people:'Test',type:'SDN'},-->
                <!--{name:'测试拓扑1',time:'2017-6-15',people:'Administrator',type:'传统'},-->
                <!--{name:'SDN双线拓扑',time:'2017-8-15',people:'Test',type:'SDN'},-->
                <!--{name:'测试拓扑1',time:'2017-6-15',people:'Administrator',type:'传统'},-->
                <!--{name:'SDN双线拓扑',time:'2017-8-15',people:'Test',type:'SDN'},-->
                <!--{name:'测试拓扑1',time:'2017-6-15',people:'Administrator',type:'传统'},-->
                <!--{name:'SDN双线拓扑',time:'2017-8-15',people:'Test',type:'SDN'},-->
                <!--{name:'测试拓扑1',time:'2017-6-15',people:'Administrator',type:'传统'},-->
                <!--{name:'SDN双线拓扑',time:'2017-8-15',people:'Test',type:'SDN'},-->
            <!--],-->


        <!--}-->
    <!--},-->
    <!--methods:{-->
        <!--handle:function(x){-->
            <!--this.users.splice(x,1);-->
        <!--}-->
    <!--}-->
    <!--//-->
    <!--})-->
<!--</script>-->
<script>
    $(function () {

        var table = $('#example').DataTable({
            "dom": '<"top"f >rt<"bottom"ilp><"clear">',//dom定位
            "dom": 'tiprl',//自定义显示项
            //"dom":'<"domab"f>',
            "scrollY": "305px",//dt高度
            "lengthMenu": [
                [8, 6, 8, -1],
                [4, 6, 8, "All"]
            ],//每页显示条数设置
            "lengthChange": false,//是否允许用户自定义显示数量
            "bPaginate": true, //翻页功能
            "bFilter": false, //列筛序功能
            "searching": true,//本地搜索
            "ordering": true, //排序功能
            "Info": true,//页脚信息
            "autoWidth": true,//自动宽度
            "oLanguage": {//国际语言转化
                "oAria": {
                    "sSortAscending": " - click/return to sort ascending",
                    "sSortDescending": " - click/return to sort descending"
                },
                "sLengthMenu": "显示 _MENU_ 记录",
                "sZeroRecords": "对不起，查询不到任何相关数据",
                "sEmptyTable": "未有相关数据",
                "sLoadingRecords": "正在加载数据-请等待...",
                "sInfo": "当前显示 _START_ 到 _END_ 条，共 _TOTAL_ 条记录。",
                "sInfoEmpty": "当前显示0到0条，共0条记录",
                "sInfoFiltered": "（数据库中共为 _MAX_ 条记录）",
                "sProcessing": "<img src='<?php echo base_url(); ?>resources/user_share/row_details/select2-spinner.gif'/> 正在加载数据...",
                "sSearch": "模糊查询：",
                "sUrl": "",
                //多语言配置文件，可将oLanguage的设置放在一个txt文件中，例：Javascript/datatable/dtCH.txt
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": " 上一页 ",
                    "sNext": " 下一页 ",
                    "sLast": " 尾页 "
                }
            },

            "columnDefs": [
                {
                    orderable: false,

                    targets: 0 },
                {
                    orderable: false,

                    targets: 1 }
            ],//第一列与第二列禁止排序

            "order": [
                [0, null]
            ],//第一列排序图标改为默认
            initComplete: function () {//列筛选
                var api = this.api();
                api.columns().indexes().flatten().each(function (i) {
                    if (i != 0 && i != 1) {//删除第一列与第二列的筛选框
                        var column = api.column(i);
                        var $span = $('<span class="addselect">▾</span>').appendTo($(column.header()))
                        var select = $('<select><option value="">All</option></select>')
                                .appendTo($(column.header()))
                                .on('click', function (evt) {
                                    evt.stopPropagation();
                                    var val = $.fn.dataTable.util.escapeRegex(
                                            $(this).val()
                                    );
                                    column
                                            .search(val ? '^' + val + '$' : '', true, false)
                                            .draw();
                                });
                        column.data().unique().sort().each(function (d, j) {
                            function delHtmlTag(str) {
                                return str.replace(/<[^>]+>/g, "");//去掉html标签
                            }

                            d = delHtmlTag(d)
                            select.append('<option value="' + d + '">' + d + '</option>')
                            $span.append(select)
                        });

                    }
                });

            }

        });

        //添加索引列
        table.on('order.dt search.dt',
                function () {
                    table.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function (cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();

        //自定义搜索
        $('.dsearch').on('keyup click', function () {
            var tsval = $(".dsearch").val()
            table.search(tsval, false, false).draw();
        });

        //checkbox全选
        $("#checkAll").on("click", function () {
            if ($(this).prop("checked") === true) {
                $("input[name='checkList']").prop("checked", $(this).prop("checked"));
                $('#example tbody tr').addClass('selected');
            } else {
                $("input[name='checkList']").prop("checked", false);
                $('#example tbody tr').removeClass('selected');
            }
        });

        //显示隐藏列
        $('.toggle-vis').on('change', function (e) {
            e.preventDefault();
            var column = table.column($(this).attr('data-column'));
            column.visible(!column.visible());
        });

        //删除选中行
        $('#example tbody').on('click', 'tr input[name="checkList"]', function () {
            var $tr = $(this).parents('tr');
            $tr.toggleClass('selected');
            var $tmp = $('[name=checkList]:checkbox');
            $('#checkAll').prop('checked', $tmp.length == $tmp.filter(':checked').length);

        });

        $('#button').click(function () {
 			var length = $('[name=checkList]:checkbox').filter(':checked').length;
 						
 			if(length == 0){
 				alert_func.error("请选择要删除的拓扑"); return;
 			}

 			if(length > 1){
 				alert_func.error("请选择一个要操作的拓扑");return;
 			}

 			
 			if(length == 1){
 				var topo_name_id = $('[name=checkList]:checkbox').filter(':checked').val();				
 				
 				var obj = {'topo_name_id':topo_name_id};

 				if(confirm("您确定删除该拓扑吗？") == true ) {
 					$.post('<?php echo site_url("topo_manage/topo_manage/topo_del"); ?>',obj,function(result) {  
 						var results = eval("(" + result + ")");
 		                  
 			            if(results.retCode == "0" ) {
 			            	alert_func.success("删除成功");
 			            	window.location.href = "<?php echo site_url('topo_manage/topo_manage'); ?>";
 			            }
 			            else {
 			            	alert_func.error(results.retMsg);
 			            }
 			            
 			        });  
 				}else
 				{
 					return;
 					}	
 			}
            
        });
        $('#button_d').click(function () {//下载
//            table.row('.selected').remove().draw(false);

        	var length = $('[name=checkList]:checkbox').filter(':checked').length;
				
 			if(length == 0){
 				alert_func.error("请选择要下载的拓扑"); return;
 			}

 			if(length > 1){
 				alert_func.error("请选择一个要操作的拓扑");return;
 			}

 			if(length == 1){
 				var topo_name_id = $('[name=checkList]:checkbox').filter(':checked').val();								 				
 				
 				if(confirm("您确定下载该拓扑吗？") == true ) {
 					//$.get("<?php echo site_url('topo_manage/topo_manage/export_topo?id='); ?>"+topo_name_id,{},function(result) {  
 						 			            
 			    //    }); 
 					window.location.href = "<?php echo site_url('topo_manage/topo_manage/export_topo?id='); ?>"+topo_name_id;
 				}else
 				{
 					return;
 					}	
 			}
        });

        $('.showcol').click(function () {
            $('.showul').toggle();

        })

        //获取表格宽度赋值给右侧弹出层
        wt = $('.wt100').width();
        $('.showslider').css('right', -wt);

        //关闭右侧弹出层
        $('.closediv').click(function () {
            $(this).parent('.showslider').animate({
                right: -wt
            }, 100);
            $('input[name="checkList"]').attr("checked",false);
            $('.clickdom').attr('isclick', true)
        });

        
    })

    //右侧弹出详情层
      var flag=false;
     function clickDom(obj){
     var  $par=$(obj).parents('#example_wrapper').siblings('.showslider');
     var  isattr=$(obj).attr('isclick');
     if(isattr=="true"){
     if(flag){
     $par.animate({
     right:-wt
     },200);
     flag=!flag
     }
     else{
     $par.animate({
     right:0
     },200);
     flag=!flag

     }
     }
     $('.clickdom').attr('isclick',false);
     $(obj).attr('isclick',true);


     }

    function clickDom(obj) {
        var $par = $(obj).parents('#example_wrapper').siblings('.showslider');
        var isattr = $(obj).attr('isclick');
        if (isattr == "false") {
            $par.animate({
                right: -wt
            }, 200);
            $('.clickdom').attr('isclick', true);
            $(obj).attr('isclick', false);

        } else {
            $par.animate({
                right: -wt
            }, 200);
            $par.animate({
                right: 0
            }, 400);
            $('.clickdom').attr('isclick', true);
            $(obj).attr('isclick', false)
        }

    };

    $('#disabledSelect').mouseup(function () {
        if($('#disabledSelect').val()=='导入已有拓扑'){
            $('#topo_class').hide();
            $('#choose_file_calss').fadeIn()
        }else if($('#disabledSelect').val()=='从头开始新建'){
            $('#choose_file_calss').hide();
            $('#topo_class').fadeIn();

        }
    });

//    跳转

    $('#modal-sure').click(function () {
        var myTopoName = $('#disabledTextInput').val();
        var myTopoType=$('#topo-type').val();
        localStorage['toponame'] = myTopoName;
        localStorage['topotype'] = myTopoType;
		var topo_file_url = $("#topo_file_url").val();


		var obj = {
				"toponame":myTopoName
          };


		var is_Select = false;
        
		if ($('#disabledSelect').val()=='导入已有拓扑') {
			var file_url = $("#choose_file").val();
			if (file_url == '') {
				alert_func.error("请上传文件");
	            return false;
			}			

			is_Select = true;	
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

                        var check_topo_url = "<?php echo site_url('topo_manage/topo_manage/check_topo'); ?>"+"?id="+topo_name_id+'&name='+myTopoName;

                        if (is_Select) {
                        	check_topo_url+='&file_url='+topo_file_url;
                        }
                        
                   	 window.location.href = check_topo_url;
                    }else{
                    	alert_func.error(result.retMsg);
                    }
        		}
                
    		},'json');
            
       	
        }else{alert_func.error('拓扑名称不能为空');return;}

    });

    //上传拓扑
    
    function upload_topo(){
    	//上传topo		        
	       if(confirm("是否执行该操作？") == true){	   		       
	            $("#topo_upload").ajaxSubmit({
	                dataType:  'json',
	                success: function(data) {
	                    var data_str = JSON.stringify(data);
	                    var jsonobj = eval('('+data_str+')');
	                    var topo_file_url = jsonobj.topo_file_url;
	                    var status = jsonobj.status;
	                    
		            	if(status == 1) {
		            		$("#topo_file_url").val(topo_file_url);							
		            		
	                       // alert("导入成功!"); 
	                    }
	                    else{
	                    	$("#topo_file").val('');
	                    	alert_func.error(jsonobj.error_info); 
	                    }
	                },
	                error:function(xhr){
	                	
	                	alert_func.error("数据异常!");
	                }
	            });
	        }

    } 
    
</script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
</body>
</html>
