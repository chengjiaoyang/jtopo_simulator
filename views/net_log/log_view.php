<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>日志管理</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>css/log-manage.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/alert.css"/>
    <script src="<?php echo base_url(); ?>js/jquery-1.11.3.js"></script>
    <script src="<?php echo base_url(); ?>js/alert.js"></script>
    <script src="<?php echo base_url(); ?>js/windows.js"></script>
    
    <script src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>js/dark.js"></script>
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
            <a href="<?php echo site_url('net_log/log'); ?>" style="transform:scale(1.15);">
                <li >
                    <span class="glyphicon glyphicon-list-alt" style="font-size: 22px;color: #0288D1;">
                        <!--<img src="<?php echo base_url(); ?>images/2017-08-04_180522.png" alt=""/>-->
                    </span>
                    <p style="color: #0288D1" class="animated bounce">日志管理</p>
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
        <!-- 切换面板-->
        <div id="top-navigation-tab">
            <ul>
                <li><a href="#login-log">用户登录日志</a></li>
                <li><a href="#operate-log">拓扑操作日志</a></li>
                <li><a href="#system-log">系统运行日志</a></li>
            </ul>
        </div>
    </div>
    <!-- 主面板-->
    <div id="box">
        <div id="login-log">
            <div id="login-log-first">
                <ul>
                    <li class="animated fadeInRight">用于记录所有用户登录情况</li>
                </ul>
            </div>
            <div id="login-log-second">
                <div class="domab" style="position: relative">
                    <div class="" style="float:right;">
                        <label>
                            <input type="text" class="dsearch" placeholder="请输入关键字..." aria-controls="example" id="search-input">
                        </label>
                    </div>

                    <div style="float:left; position:relative; z-index:9999;height:100%;">
                       
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="wt100" style="position:relative; overflow:hidden; height:100%">
                    <table id="example" class="display animated slideInUp" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th style=" width:1px; padding:0"></th>
                            <th style="width:30px; padding:10px 0 10px 10px">
                                <input style="visibility:hidden" type="checkbox" id="checkAll"></th>
                            <th>登录账号</th>
                            <th>登录时间</th>
                            <th>账号操作</th>
                            <th>操作结果</th>
                            <th>失败原因</th>

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
                            <th></th>

                        </tr>
                        </tfoot>
                        <tbody>
                        
                        <?php if(!empty($login_log)){foreach($login_log as $data): ?>
                        
                        <tr>
                            <td></td>
                            <td>
                                <input style="visibility:hidden;" type="checkbox" name="checkList"></td>
                            <td>
                                <?=$data['username']?>
                            </td>
                            <td><?=$data['logintime']?></td>
                            <td><?=$data['login_info']?></td>
                            <td><div class="<?=$data['login_status'] == '成功'?'system-td-suc':'system-td-fai'?>"><?=$data['login_status']?></div></td>
                            <td><?=isset($data['fail_reason']) && $data['fail_reason'] ? $data['fail_reason'] : ''?></td>

                        </tr> 
                        
                        <?php endforeach; } ?>                                                                      
                        </tbody>
                    </table>
                    <style>
                        .showslider {
                        display:none;
                            width: 80%;
                            height: 100%;
                            background-color: #fff;
                            border: 1px solid #ccc;
                            position: absolute;
                            top: 9px;
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
                    </style>
                </div>
            </div>
        </div>
        <div id="operate-log">
            <div id="operate-log-first">
                <ul>
                    <li>用于记录拓扑的新建、修改和删除情况</li>
                </ul>
            </div>
            <div id="operate-log-second">
                <div class="domab" style="position: relative">
                    <div class="" style="float:right;">
                        <label>
                            <input type="text" class="dsearch" placeholder="请输入关键字..." aria-controls="example" id="search-input">
                            <!--<img src="<?php echo base_url(); ?>images/2017-08-18_165039.png" alt="" id="search-img">-->
                        </label>
                    </div>

                    <!--<button id="button" style="float:left;">删除账号</button>-->
                    <div style="float:left; position:relative; z-index:9999;height:100%;">
                        
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="wt100" style="position:relative; overflow:hidden; height:100%">
                    <table id="example2" class="display animated slideInUp" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th style=" width:1px; padding:0"></th>
                            <th style="width:30px; padding:10px 0 10px 10px">
                                <input style="visibility:hidden;" type="checkbox" id="checkAll"></th>
                            <th>操作账号</th>
                            <th>操作时间</th>
                            <th>操作内容</th>


                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>


                        </tr>
                        </tfoot>
                        <tbody>
                        
                        <?php if(!empty($operation_log)){foreach($operation_log as $data): ?>
                        <tr>
                            <td></td>
                            <td>
                                <input style="visibility:hidden;" type="checkbox" name="checkList"></td> 
                            <td>
                                <?=$data['username']?>
                            </td>
                            <td><?=$data['operatet_time']?></td>
                            <td><?=$data['operate_info']?></td>


                        </tr>
                         <?php endforeach; } ?>      

                        </tbody>
                    </table>
                    <style>
                        .showslider {
                            width: 80%;
                            height: 100%;
                            background-color: #fff;
                            border: 1px solid #ccc;
                            position: absolute;
                            top: 9px;
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
                    </style>
                </div>
            </div>
        </div>
        <div id="system-log">
            <div id="system-log-first">
                <ul>
                    <li>用于记录宿主机cpu、内存和硬盘的告警信息</li>
                </ul>
            </div>
            <div id="system-log-second">
                <div class="domab" style="position: relative">
                    <div class="" style="float:right;">
                        <label>
                            <input type="text" class="dsearch" placeholder="请输入关键字..." aria-controls="example" id="search-input">
                            <!--<img src="<?php echo base_url(); ?>images/2017-08-18_165039.png" alt="" id="search-img">-->
                        </label>
                    </div>

                    <!--<button id="button" style="float:left;">删除账号</button>-->
                    <div style="float:left; position:relative; z-index:9999;height:100%;">
                       
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="wt100" style="position:relative; overflow:hidden; height:100%">
                    <table id="example3" class="display animated slideInUp" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th style=" width:1px; padding:0"></th>
                            <th style="width:30px; padding:10px 0 10px 10px">
                                <input style="visibility:hidden;" type="checkbox" id="checkAll"></th>
                            <th>告警级别</th>
                            <th>告警时间</th>
                            <th>告警内容</th>


                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>


                        </tr>
                        </tfoot>
                        <tbody>
                        <?php if(!empty($sys_log)){foreach($sys_log as $data): ?>
                        <tr>
                            <td></td>
                            <td>
                                <input style="visibility:hidden;" type="checkbox" name="checkList"></td>
                            <td>
                               <div class="<?=$data['log_level'] == 'orange' ? 'system-td-ora' : 'system-td-red'?>"><?=$data['log_level'] == 'orange' ? '橙色' : '红色'?></div>
                            </td>
                            <td><?=$data['log_time']?></td>
                            <td><?=$data['log_info']?></td>
                        </tr>
                        <?php endforeach; } ?>
                                              
                        </tbody>
                    </table>
                    <style>
                        .showslider {
                            width: 80%;
                            height: 100%;
                            background-color: #fff;
                            border: 1px solid #ccc;
                            position: absolute;
                            top: 9px;
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
                    </style>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {

        var table = $('#example').DataTable({
            "dom": '<"top"f >rt<"bottom"ilp><"clear">',//dom定位
            "dom": 'tiprl',//自定义显示项
            //"dom":'<"domab"f>',
            "scrollY": "350px",//dt高度
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
            table.row('.selected').remove().draw(false);
        });

        $('.showcol').click(function () {
            $('.showul').toggle();

        })

        //获取表格宽度赋值给右侧弹出层
       // wt = $('.wt100').width();
       // $('.showslider').css('right', -wt);

        //关闭右侧弹出层
       // $('.closediv').click(function () {
        //    $(this).parent('.showslider').animate({
        //        right: -wt
       //     }, 200)
       //     $('.clickdom').attr('isclick', true)
       // });


    })
    $(function () {

        var table = $('#example2').DataTable({
            "dom": '<"top"f >rt<"bottom"ilp><"clear">',//dom定位
            "dom": 'tiprl',//自定义显示项
            //"dom":'<"domab"f>',
            "scrollY": "350px",//dt高度
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
            table.row('.selected').remove().draw(false);
        });

        $('.showcol').click(function () {
            $('.showul').toggle();

        })

        //获取表格宽度赋值给右侧弹出层
        //wt = $('.wt100').width();
       // $('.showslider').css('right', -wt);

        //关闭右侧弹出层
       // $('.closediv').click(function () {
        //    $(this).parent('.showslider').animate({
        //        right: -wt
        //    }, 200)
        //    $('.clickdom').attr('isclick', true)
       // });


    })
    $(function () {

        var table = $('#example3').DataTable({
            "dom": '<"top"f >rt<"bottom"ilp><"clear">',//dom定位
            "dom": 'tiprl',//自定义显示项
            //"dom":'<"domab"f>',
            "scrollY": "350px",//dt高度
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
            table.row('.selected').remove().draw(false);
        });

        $('.showcol').click(function () {
            $('.showul').toggle();

        })

    })
    /*
    function clickDom(obj) {
        var $par = $(obj).parents('#example_wrapper').siblings('.showslider')
        var isattr = $(obj).attr('isclick');
        if (isattr == "false") {

        } else {
            $par.animate({
                right: -wt
            }, 200)
            $par.animate({
                right: 0
            }, 400)
            $('.clickdom').attr('isclick', true)
            $(obj).attr('isclick', false)
        }

    }
    */
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
    })
</script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
</body>
</html>
