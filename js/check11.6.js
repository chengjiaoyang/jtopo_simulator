/**
 * Created by Administrator on 2017/9/2.
 */

CanvasRenderingContext2D.prototype.JTopoDashedLineTo = function (a, b, c, d, e) {

    if (typeof (e) == 'string' && e[0] == 'a') {
        var anime = parseInt(e.split('.')[1])
        e = 5

        var animespeed = (new Date()) / anime;
        "undefined" == typeof e && (e = 5);
        var f = c - a,//x轴差
            g = d - b,//y轴差
            h = Math.floor(Math.sqrt(f * f + g * g)),//勾股定理,直线长度
            i = 0 >= e ? h : h / e,//虚线段数
            j = g / h * e,
            k = f / h * e;
        this.beginPath();

        animespeed = animespeed % (e * 2);


        var txs = -f / h * animespeed;
        var tys = -g / h * animespeed;
        for (var l = 0; i > l; l++) {
            l % 2 ? this.lineTo(a + l * k - txs, b + l * j - tys) : this.moveTo((a + l * k - txs) > (a + i * k) ? (a + l * k) : (a + l * k - txs), (b + l * j - tys) > (b + i * j) ? (b + l * j) : (b + l * j - tys))
        };
        this.stroke()
    } else {

        "undefined" == typeof e && (e = 5);
        var f = c - a,
            g = d - b,
            h = Math.floor(Math.sqrt(f * f + g * g)),
            i = 0 >= e ? h : h / e,
            j = g / h * e,
            k = f / h * e;
        this.beginPath();
        for (var l = 0; i > l; l++) l % 2 ? this.lineTo(a + l * k, b + l * j) : this.moveTo(a + l * k, b + l * j);
        this.stroke()

    }
};



//type: child.id + '.svg',
//    id:child.id+cli,
all_list = {
    "u380": [
        "c_hosts",
        'u380.svg',
        'hosts_name',
        1,
    ],
    "u384": [
        "c_servers",
        "u384.svg",
        "server_name",
        1
    ],
    "u382": [
        "c_routers",
        "u382.svg",
        "router_name",
        11
    ],
    "u388": [
        "c_firewalls",
        "u388.svg",
        "firewall_name",
        2
    ],
    "u1811": [
        "c_sdn_switchs",
        "u1811.svg",
        "switch_name",
        11
    ],
    "u512": [
        "c_sdn_controllers",
        "u512.svg",
        "controller_name",
        11
    ],
    "u378": [
        "c_cloud",
        "u378.svg",
        "cloud_name",
        11
    ],
    "usw1": [
        "c_usw1",
        "usw1.svg",
        "switch_name",
        48
    ],
    "usw2": [
        "c_usw2",
        "usw2.svg",
        "switch_name",
        48
    ],
    "usw3": [
        "c_usw3",
        "usw3.svg",
        "switch_name",
        48
    ],
    "usw4": [
        "c_usw4",
        "usw4.svg",
        "switch_name",
        52
    ],
    "usw5": [
        "c_usw5",
        "usw5.svg",
        "switch_name",
        48
    ],
}

net_element_list = {//初始化元件对象
    c_hosts: {//初始化客户端

        host_type: '',
        ip_type: '',
        ip: '',
        netmask: '',
        gateway: '',
        first_dns: '',
        second_dns: '',
        pos_x: '',
        pos_y: '',
    },
    c_servers: {//初始化服务器
        server_name: '',
        dns_server: 'false',
        web_server: 'false',
        ip_type: '',
        ip: '',
        netmask: '',
        gateway: '',
        web_config: {},



    },
    c_routers: {//初始化路由器
        eth_list: [],
        static_route_list: [],
        nat_pool_list: [],
        port_mapping_list: [],
        rip_protocol: {},
        ospfv2_protocol: {},
        bgp_protocol: {},
    },
    c_firewalls: {//初始化防火墙
        eth_list: [],
        static_route_list: [],
        firewall_acls_list: [],
        firewall_service_type_list: [],
        nat_pool_list: [],
    },
    c_sdn_switchs: {//初始化sdn交换机
        openflow_version: '',
        master_controller_ip: '',
        master_controller_port: '',
        slave_controller_ip: '',
        slave_controller_port: '',
        optical_port_num: '',
        electrical_interface_num: '',
        eth_list: [],
    },
    c_sdn_controllers: {//初始化sdn控制器
        ip_addr: '',
        port: '',
    },
    c_cloud: {//初始化云
        eth_list: [],
    }
};



var self_add_id = 1;
var topo_allElement_data = {};//全部对象
var topo_id_type = {};

var currentNode;
// 拓扑添加网元
function topo_add_element(element, name) {

    if (topo_allElement_data[element.type]) {
        topo_allElement_data[element.type][element.id] = new JTopo.Node(name);
    } else {
        topo_allElement_data[element.type] = {};
        topo_allElement_data[element.type][element.id] = new JTopo.Node(name);
    }
    return topo_allElement_data[element.type][element.id];
}

function create_element(child, left, top, id, data, formdata, netdata) {

    if (id) {
        self_add_id = id;
    }

    // 获取一个网元基本信息对象
    element = new Object();
    if (data) {
        for (node in data) {
            element[node] = data[node]
        }
    } else {
        for (node in net_element_list[all_list[child.id][0]]) {
            element[node] = net_element_list[all_list[child.id][0]][node]
        }
    }

    //element = net_element_list[ all_list[child.id][0] ];

    // 给该网元设置一个ID
    element['id'] = 'net_element_id_' + self_add_id;
    element['type'] = child.id;
    self_add_id++;

    // 给该网元设置一个title
    element[all_list[child.id][2]] = child.title;
    element['left'] = left;
    element['top'] = top;

    net_element_ob = topo_add_element(element, element[all_list[child.id][2]]);
    if (formdata) {
        net_element_ob['formdata'] = formdata
    }

    net_element_ob.type = element['type'];
    net_element_ob.element_id = element['id'];
    net_element_ob.data = element;
    net_element_ob.link = 0;
    net_element_ob.max_link = all_list[child.id][3];
    // 已链接的网元对象集合
    net_element_ob.link_ed = {};

    net_element_ob.setLocation(left, top);

    net_element_ob.setImage(window_topo_static_path + "images/" + all_list[child.id][1]);

    net_element_ob.fontColor = '155,123,2';
    net_element_ob.font = 'bold 12px 微软雅黑';

    // 所有表单数据
    net_element_ob.netdata = { data: {} };

    if (netdata) {
        net_element_ob['netdata'] = netdata
    }

    scene.add(net_element_ob);


    net_element_ob.addEventListener('mouseup', function (e) {
        currentNode = this;
        link_obj.handler(e);
    });
    //net_element_ob.mousedown(function(e){
    //    //if(e.target == null || e.target === beginNode || e.target === link){
    //    //    scene.remove(link);
    //    //}
    //});


    topo_id_type[element['id']] = child.id;

    currentNode = net_element_ob;
    //  初始化 网卡接口
    restore.init_interface(net_element_ob.type);
}





/* 节点右键菜单处理 */
$("#contextmenu a").click(function (e, node) {
    var text = $(this).text();
    //var n = new JTopo.Node(node.name);
    if (text == '删除该节点') {
        link_obj.remove_net()
        delete topo_allElement_data[currentNode.type][currentNode.element_id];

        scene.remove(currentNode);
        currentNode = null;
    } else if (text == '撤销上一次操作') {
        currentNode.restore();
    } else if (text == '更改颜色') {
        currentNode.fillColor = JTopo.util.randomColor();
    } else if (text == '顺时针旋转') {
        currentNode.rotate += 0.5;
    } else if (text == '逆时针旋转') {
        currentNode.rotate -= 0.5;
    } else if (text == '放大') {
        currentNode.scaleX += 0.2;
        currentNode.scaleY += 0.2;
    } else if (text == '缩小') {
        currentNode.scaleX -= 0.2;
        currentNode.scaleY -= 0.2;
    }
    else if (text == '元件配置' || text == '控制台') {
        var detail = currentNode.detail || currentDetail;

        //if (currentNode.type == 'u380'){//客户端
        //    restoreFromData();
        //    text == '控制台' && $("#modal7 .all_con").click();
        //    $("#modal7").show();
        //}
        var conf = {
            'u380': 'modal7', //客户端
            'u384': 'modal1', //服务器
            'usw1': 'modal2', //48口千兆电
            'usw2': 'modal2', // 48口千兆光
            'usw3': 'modal9',//48口千兆电
            'usw4': 'modal9',//4口万兆光
            'usw5': 'modal9',//24口万兆光
            'u382': 'modal3', //路由器
            'u388': 'modal4',//防火墙
            'u378': 'modal8',//云
            'u512': 'modal5',//sdn控制器
            'u1811': 'modal6',//sdn交换机
        }
        if (
            text == '控制台' &&
            $("#" + conf[currentNode.type] + " .all_con").length > 0
        ) {
            $("#" + conf[currentNode.type] + " .all_con").click();
        }
        restoreFromData();

        $("#" + conf[currentNode.type]).show();
        $('.modal-content').css({ 'position': 'absolute', 'top': '0px', 'left': 0, 'width': '600px' });



        var li = "";
        if (detail != '' && detail != undefined) {
            $.each(detail, function (key, item) {
                li += "<li>" + key + " : " + item + "</li>";
            });
        } else {
            li = "<li>暂无详细参数</li>";
        }
        $("#detail").html(li);
        $("#contextmenu").hide();
        $("#detail li").attr("style", "padding:6px");
        $("#detail").css({
            top: currentNode.y,
            left: currentNode.x
        }).show();
    } else if (text == '前往控制台') {
        //创建控制台
        $('#contextmenu').hide();
        // 控制台的id
        var curr_id = current_element().element_id;
        // 大概是拓扑图的数据
        var topo_name_id = $("#current_topo_id").val();
        // 控制台的名称
        var terminalName=current_element().text;
        // 创建弹窗
        new Terminal({
            currId: curr_id,
            terminalName:terminalName,
            topo_name_id: topo_name_id,
            serverPath: window_topo_web_path + '/topo_manage/topo_manage/exec_cmd?callback=?'
        });
    } else {
        currentNode.save();
    }
    $("#contextmenu").hide();
});



///!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!/
function current_element() {
    return topo_allElement_data[currentNode.type][currentNode.element_id];
}


//连线对象
var link_obj = {
    parent_net: null,
    current_virtual_link: null,
    links: {},
    current_link: null,
    step: 1,
    net_1: '',
    net_2: '',
    evet: '',
    t: null,
    //判定网元有几个网卡
    judge_element_link: function (node) {

        // 判断网卡链接数量是否已满
        if (node['link'] >= node['max_link']) {
            return false;
        }
        if (this.step == 2) {
            if (node['link_ed'][this.parent_net['element_id']] || node == this.parent_net) {
                return false;
            }
        }
        return true;

    },
    virtual_link: function () {

        // 当前网元
        var current_net = current_element();

        if (!this.judge_element_link(current_net))
            return;

        // 第一步
        if (this.step == 1) {

            // 临时网元
            var tempNode = new JTopo.Node('');
            // 增加连线
            this.current_virtual_link = new JTopo.Link(current_net, tempNode);
            scene.add(this.current_virtual_link);

            scene.mousemove(function (e) {
                tempNode.setLocation(e.x - 15, e.y - 15);
            });
            this.parent_net = current_net;
            this.step = 2;
        } else {
            // 第二步
            if (current_net != this.parent_net) {

                scene.remove(this.current_virtual_link);

                // 创建链接线
                this.actual_link(this.parent_net, current_net);
                // 清除...
                this.parent_net = null;
                JTopoToobarEvent.label_r2()
                this.step = 1;
            }
        }
    },
    // 创建链接线
    actual_link: function (node1, node2, on, id) {

        if (on == 1) {
            if (node1['link_ed'][node2.element_id]) {
                return;
            }
            if (node2['link_ed'][node1.element_id]) {
                return;
            }
        }

        if (id) {
            self_add_id = id;
        }

        var link = new JTopo.Link(node1, node2);
        if (node1.type == 'u512' && node2.type !== 'u1811' || node1.type !== 'u1811' && node2.type == 'u512') {
            return;
        }

        if (node1.type == 'u512' && node2.type == 'u1811' || node2.type == 'u512' && node1.type == 'u1811') {
            link.lineWidth = 3;
            link.strokeColor = '0,153,204';
            link.shadow = false;
            link.dashedPattern = 5;
            link.line_type = 'xu';
            link.bundleGap = 20;
            link.link_id = 'link_id_' + self_add_id;
            self_add_id++;
        } else {
            link.lineWidth = 3;
            link.strokeColor = '0,153,204';
            link.shadow = false;
            link.bundleGap = 20;
            link.link_id = 'link_id_' + self_add_id;
            self_add_id++;
        }


        link.addEventListener('mouseup', function (e) {
            link_obj.current_link = this;
            if (e.button == 2) {
                link_obj.mouseout()
                $("#linemenu").css({
                    top: e.pageY,
                    left: e.pageX
                }).show();
            }
        });


        link.addEventListener('mouseover', function (e) {
            link_obj.mouseover(this, e)
        });
        link.addEventListener('mouseout', function (e) {
            link_obj.mouseout(this)
        });


        node1['link_ed'][node2['element_id']] = node2;
        node2['link_ed'][node1['element_id']] = node1;
        node1['link']++
        node2['link']++


        // 记录已经使用的网卡
        if (this.net_1) {
            link.link_net1 = this.net_1;
            net_interface.save(node1, this.net_1);
        }
        if (this.net_2) {
            link.link_net2 = this.net_2;
            net_interface.save(node2, this.net_2)
        }

        this.links[link.link_id] = link;
        scene.add(link);

        if (!node1['link_obj_ed']) {
            node1['link_obj_ed'] = {}
        }

        if (!node2['link_obj_ed']) {
            node2['link_obj_ed'] = {}
        }

        node1['link_obj_ed'][link.link_id] = link;
        node2['link_obj_ed'][link.link_id] = link;

        this.net_1 = '';
        this.net_2 = '';

    },

    handler: function (e) {
        var element = current_element();
        if (e.button == 2) {// 右键
            $("#you_console").show();
            if (element.type == 'u378') {
                $("#you_console").hide()
            }
            //当前位置弹出菜单（div）
            $("#contextmenu").css({
                top: e.pageY,
                left: e.pageX
            }).show();

        } else {
            if (e.target != null && e.target instanceof JTopo.Node && $("input[name='modeRadio']:checked").val() == "normal") {
                if (element.type != 'u512' && element.type != 'u378') {
                    // 判断是否连接线起点网元
                    $("#eth_port_list").css({ top: e.pageY, left: e.pageX }).show();
                    $('#section-mask').show();
                    net_interface.display();
                } else {
                    if (link_obj.step == 1) {
                        link_obj.virtual_link(1)
                    } else {
                        link_obj.virtual_link(2)
                    }
                    $("#eth_port_list").hide();
                    $("#eth_port_list>select>option").remove();
                    $('#section-mask').hide();
                }
            }
        }
    },
    // 删除虚拟线
    remove_virtual_link: function () {
        this.parent_net = null;
        if (this.current_virtual_link) {
            scene.remove(this.current_virtual_link)
        }
        this.step = 1;
    },
    remove_link: function () {
        this.remove_virtual_link();
        var nodeA = this.current_link.nodeA;
        var nodeZ = this.current_link.nodeZ;
        nodeA['link']--;
        nodeZ['link']--;
        delete nodeA['link_ed'][nodeZ.element_id];
        delete nodeZ['link_ed'][nodeA.element_id];

        if (this.current_link.link_net1) {
            net_interface.del(nodeA, this.current_link.link_net1);
        }
        if (this.current_link.link_net2) {
            net_interface.del(nodeZ, this.current_link.link_net2);
        }

        if (nodeA['link_obj_ed'] && nodeA['link_obj_ed'][this.current_link.link_id]) {
            delete nodeA['link_obj_ed'][this.current_link.link_id]
        }
        if (nodeZ['link_obj_ed'] && nodeZ['link_obj_ed'][this.current_link.link_id]) {
            delete nodeZ['link_obj_ed'][this.current_link.link_id]
        }

        delete this.links[this.current_link.link_id]
        scene.remove(this.current_link)
    },
    remove_net: function () {
        var element = current_element();
        if (element['link_obj_ed']) {
            for (var link_id in element['link_obj_ed']) {
                var link = element['link_obj_ed'][link_id];
                if (link) {
                    this.current_link = link
                    this.remove_link();
                }
            }
        }
    },
    mouseover: function (link, e) {
        var html = '';
        if (link.link_net1 && link.link_net1 != '') {
            html += '<p>' + link.nodeA.text + '的网卡：' + link.link_net1 + '</p>';
        }
        if (link.link_net2 && link.link_net2 != '') {
            html += '<p>' + link.nodeZ.text + '的网卡：' + link.link_net2 + '</p>';
        }
        $('#link-alert-content').html(html);
        this.t = setTimeout(function () {
            $("#link-alert-container").css({
                top: e.clientY,
                left: e.clientX + 40
            }).show();
        }, 100)

    },
    mouseout: function (link) {
        $('#link-alert-content').html('');
        clearTimeout(this.t)
        $("#link-alert-container").hide();

        //$("#detail").css({
        //    top: currentNode.y,
        //    left: currentNode.x
        //}).show();
    }
};
$(document).on('click', '.eth_sure', function () {
    var element = current_element();
    var net = $("#eth_port_list-op").val()
    if (link_obj.step == 1) {
        if (net) {
            link_obj.net_1 = net;
            link_obj.virtual_link(1)
        } else if (element.type == 'u512' || element.type == 'u378') {
            link_obj.virtual_link(1)
        }

    } else {
        if (net) {
            link_obj.net_2 = net;
            link_obj.virtual_link(2)
        } else if (element.type == 'u512' || element.type == 'u378') {
            link_obj.virtual_link(2)
        }
    }


    $("#eth_port_list").hide();
    $("#eth_port_list>select>option").remove();
    $('#section-mask').hide();
})



//var tempNodeA = new JTopo.Node('tempA');
//tempNodeA.setSize(1, 1);
//var tempNodeZ = new JTopo.Node('tempZ');
//tempNodeZ.setSize(1, 1);
//var link = link_obj.new_link(tempNodeA, tempNodeZ);


// 监测流量
var Monitor_flow = {
    setTimeout: [],
    status: 0,
    run: function () {
        var data = {
            'topo_name_id': $("#current_topo_id").val()
        }
        $.getJSON(window_topo_web_path + '/topo_manage/topo_manage/get_link_flow?callback=?', data, function (msg) {
            if (msg && msg.retCode == 0 && msg.link_flow_info) {
                for (var i = 0; i < msg.link_flow_info.length; i++) {
                    if (link_obj.links[msg.link_flow_info[i]['link_name']]) {
                        if (link_obj.links[msg.link_flow_info[i]['link_name']]) {
                            var link_id = msg.link_flow_info[i]['link_name'];
                        }
                        var flow = msg.link_flow_info[i]['link_flow'];
                        var info = msg.link_flow_info[i]['link_info'];
                        if (flow >= 1 && flow <= 100) {
                            link_obj.links[link_id].dashedPattern = 'a.' + flow
                            link_obj.links[link_id].strokeColor = '185, 33, 202'
                            link_obj.links[link_id].text = info;
                            link_obj.links[link_id].fontColor = '185, 33, 202'
                        } else {
                            if (link_obj.links[link_id].line_type && link_obj.links[link_id].line_type == 'xu') {
                                link_obj.links[link_id].dashedPattern = 5;
                            } else {
                                link_obj.links[link_id].dashedPattern = null
                            }
                            link_obj.links[link_id].strokeColor = '243,61,74';
                            link_obj.links[link_id].text = '';
                            link_obj.links[link_id].fontColor = '255,255,255'
                        }
                    }
                }
            } else {
                Monitor_flow.run_reduction()
            }

            if (Monitor_flow.status == 1) {
                (function () {
                    var t = setTimeout(function () {
                        Monitor_flow.run()
                    }, 5000)
                    Monitor_flow.setTimeout.push(t)
                })()
            }
        }).error(function () {
            Monitor_flow.run_reduction()

            if (Monitor_flow.status == 1) {
                (function () {
                    var t = setTimeout(function () {
                        Monitor_flow.run()
                    }, 5000)
                    Monitor_flow.setTimeout.push(t)
                })()
            }
        })
    },
    run_reduction: function () {
        for (var linkc in link_obj.links) {
            (function (linkc) {
                setTimeout(function () {
                    link_obj.links[linkc].strokeColor = '0,255,0';
                    link_obj.links[linkc].shadow = true;
                    link_obj.links[linkc].lineWidth = 4;
                    link_obj.links[linkc].text = '';
                    link_obj.links[linkc].fontColor = '255,255,255'

                    if (link_obj.links[linkc].line_type && link_obj.links[linkc].line_type == 'xu') {
                        link_obj.links[linkc].dashedPattern = 5;
                    } else {
                        link_obj.links[linkc].dashedPattern = null
                    }

                }, 200)
            })(linkc)
        };
    },
    reduction: function () {

        for (var i in link_obj.links) {

            if (link_obj.links[i].line_type && link_obj.links[i].line_type == 'xu') {
                link_obj.links[i].dashedPattern = 5;
            } else {
                link_obj.links[i].dashedPattern = null;
            }

            link_obj.links[i].strokeColor = '0,153,204';
            link_obj.links[i].shadow = false;
            link_obj.links[i].lineWidth = 3;
            link_obj.links[i].text = '';
            link_obj.links[i].fontColor = '255,255,255'
        }
    },
    close: function () {
        Monitor_flow.status = 0;
        if (Monitor_flow.setTimeout) {
            for (var i = 0; i <= Monitor_flow.setTimeout.length; i++) {
                clearTimeout(Monitor_flow.setTimeout[i])
            }
        }
        Monitor_flow.setTimeout = []
        this.reduction();
    }
}

//开启流量
var aa = 1;
flux = {
    start_flux: function () {

        //for( var linkc in link_obj.links ){
        //
        //
        //            link_obj.links[linkc].strokeColor='0,255,0';
        //            link_obj.links[linkc].shadow=true;
        //            link_obj.links[linkc].lineWidth=4;
        //
        //
        //};

        for (var jj in topo_allElement_data) {

            if (typeof topo_allElement_data[jj] == 'object') {
                //console.log(topo_allElement_data[jj]);
                for (var k in topo_allElement_data[jj]) {
                    topo_allElement_data[jj][k].shadow = true;
                    //console.log(topo_allElement_data[jj][k].shadow);
                    topo_allElement_data[jj][k].shadowColor = 'rgba(3,157,57,1)';
                    topo_allElement_data[jj][k].shadowOffsetX = 1;
                    topo_allElement_data[jj][k].shadowOffsetY = 1;
                    topo_allElement_data[jj][k].shadowBlur = 60;

                }
            }

        }


    },
    stop_flux: function () {

        for (var i in link_obj.links) {

            link_obj.links[i].strokeColor = '0,153,204';
            link_obj.links[i].shadow = false;
            link_obj.links[i].lineWidth = 3;
            link_obj.links[i].text = '';
            link_obj.links[i].fontColor = '255,255,255'

            if (link_obj.links[i].line_type && link_obj.links[i].line_type == 'xu') {
                link_obj.links[i].dashedPattern = 5;
            } else {
                link_obj.links[i].dashedPattern = null
            }

        }
        for (var jj in topo_allElement_data) {

            if (typeof topo_allElement_data[jj] == 'object') {

                for (var k in topo_allElement_data[jj]) {
                    topo_allElement_data[jj][k].shadow = false;
                    topo_allElement_data[jj][k].shadowColor = 'rgba(0,255,0,1)';
                }
            }

        }

    }
};
var stt = true;
var timerId;
(function () {

    $("#start").click(function () {



        var data = {
            'topo_name_id': $("#current_topo_id").val()
        }
        if (stt) {


            $(function () {
                alert_func.loading();
                timerId = window.setInterval(getForm, 1000);

            });
            function getForm() {
                Ajax$.jsonp({
                    url: window_topo_web_path + '/topo_manage/topo_manage/topo_run?callback=?',
                    data: data,
                    ok: function (msg) {
                        if (msg && msg['retCode'] != undefined && msg.retCode == 10) {

                            alert_func.loading(msg.boot_msg);
                        }
                        else if (msg && msg['retCode'] != undefined && msg.retCode == 6) {
                            alert_func.close_loading()
                            window.clearInterval(timerId);
                            alert_func.error('开启失败：' + msg.retMsg, 2000)
                        }
                        else if (msg && msg['retCode'] != undefined && msg.retCode == 0) {
                            flux.start_flux();
                            alert_func.close_loading()
                            window.clearInterval(timerId);
                            $('#start span.glyphicon').addClass('toolclass');
                            $('.kaiq_txt').html('停止流量');

                            $('#components-box-mask').css('display', 'block');
                            $('#left-navigation-mask,#section-top-mask,#top-navigation-mask').show();
                            $('#check_mytopo').show();
                            $("#components-l2").hide();
                            $("#lll2").css('border-color', '#666666 transparent transparent transparent');
                            $('#u376').css('top', '230px');
                            $('#u382').css('margin-top', '113px');
                            $("#components-l3").hide();
                            $("#lll3").css('border-color', '#666666 transparent transparent transparent');
                            $('#u382').css('margin-top', '113px');
                            stt = false;

                            //setTimeout(function(){
                            //    Monitor_flow.status = 1;
                            //    Monitor_flow.run();
                            //},1500)
                            for (var i in msg.links) {

                                if (msg.links[i]['status'] == 'on') {
                                    //console.log(msg.links[i]['link_name']+'开') ;

                                    setTimeout(function () {
                                        Monitor_flow.status = 1;
                                        Monitor_flow.run();
                                    }, 500)

                                }
                                else if (msg.links[i]['status'] == 'off') {
                                    //console.log(msg.links[i]['link_name']+'关');
                                    for (var linkc in link_obj.links) {
                                        //console.log(linkc);
                                        if (linkc == msg.links[i]['link_name']) {
                                            //console.log(linkc);
                                            link_obj.links[linkc].strokeColor = '243,61,74';
                                            link_obj.links[linkc].shadow = true;
                                            link_obj.links[linkc].lineWidth = 4;
                                        }

                                    };
                                }
                            }

                            alert_func.success('开启成功', 1500)
                        } else if (msg && msg['retCode'] != undefined && msg.retCode == 255) {
                            alert_func.close_loading()
                            Monitor_flow.close();
                            window.clearInterval(timerId);
                            if (msg && msg['retMsg'] != undefined && msg.retMsg) {
                                alert_func.error('开启失败：' + msg.retMsg, 2000)
                            } else {
                                alert_func.error('开启失败', 1500)
                            }
                        }
                    },
                    error: function () {
                        alert_func.close_loading();
                        Monitor_flow.close();
                        alert_func.error('开启失败', 1500)
                    },
                    timeout: 5000
                })


            }


        }
        else {
            alert_func.loading()
            Ajax$.jsonp({
                url: window_topo_web_path + '/topo_manage/topo_manage/topo_stop?callback=?',
                data: data,
                ok: function (msg) {
                    if (msg && msg['retCode'] != undefined && msg.retCode == 0) {

                        $('#start span.glyphicon').removeClass('toolclass');
                        $('.kaiq_txt').html('开启流量');

                        $('#components-box-mask').css('display', 'none');
                        $('#left-navigation-mask,#top-navigation-mask,#section-top-mask').hide();

                        stt = true;
                        Monitor_flow.close();
                        setTimeout(function () {
                            flux.stop_flux();
                        }, 800)

                        alert_func.close_loading()
                        alert_func.success('停止成功', 1500)
                    } else {
                        $('#start span.glyphicon').removeClass('toolclass');
                        $('.kaiq_txt').html('开启流量');

                        $('#components-box-mask').css('display', 'none');
                        $('#left-navigation-mask,#top-navigation-mask,#section-top-mask').hide();

                        stt = true;
                        Monitor_flow.close();
                        setTimeout(function () {
                            flux.stop_flux();
                        }, 800)

                        alert_func.close_loading()
                        if (msg.retMsg) {
                            alert_func.error('停止成功：' + msg.retMsg, 2000)
                        } else {
                            alert_func.error('停止成功', 1500)
                        }
                    }
                },
                error: function () {
                    $('#start span.glyphicon').removeClass('toolclass');
                    $('.kaiq_txt').html('开启流量');

                    $('#components-box-mask').css('display', 'none');
                    $('#left-navigation-mask,#top-navigation-mask,#section-top-mask').hide();

                    stt = true;
                    Monitor_flow.close();
                    setTimeout(function () {
                        flux.stop_flux();
                    }, 800)
                    alert_func.close_loading()
                    alert_func.error('停止成功', 1500)
                },
                timeout: 60000
            })



        }
    });
})();


//删除弹窗table
table_name = {
    ser_name: 'dns_ser_checkbox',
    router_port: 'dns_ser_checkbox',
}

table_delete = {
    ser_delTable: function () {
        $("input[name='dns_ser_checkbox']:checked").each(function () {
            let n = $(this).parents("tr").index();
            $("table#modal-form-1-table").find("tr:eq(" + n + ")").remove();
        });
    },
    router_port_delTable: function () {
        $("input[name='router_port_checkbox']:checked").each(function () {
            let n = $(this).parents("tr").index();
            $("table#modal-router-form-1-table").find("tr:eq(" + n + ")").remove();
        });
    },
    router_status_delTable: function () {
        $("input[name='router_status_checkbox']:checked").each(function () {
            let n = $(this).parents("tr").index();
            $("table#modal-router-form-2-table").find("tr:eq(" + n + ")").remove();
        });
    },
}
$(function () {
    $("button[data='delete_table']").click(function () {
        table_delete.ser_delTable();
    });
    $("button[data='router_port_checkbox']").click(function () {
        table_delete.router_port_delTable();
    });
    $("button[data='router_status_checkbox']").click(function () {
        table_delete.router_status_delTable();
    });

});

//收起

$('#check_window1').click(function () {

    if ($('#check_window1').text() == '收起') {
        //$('#components-box-mask').hide();
        $(function () {
            $('#check_window1').hide();
            $('#check_mytopo').removeClass('kai').addClass('shouqi');
            $('#check_window').html('打开').css('opacity', .3).fadeIn();
            $('#check_zhanshi>p').hide();
        })
        //$('#check_window').addClass('fixed');
    } else if ($('#check_window').text() == '打开') {
        //$('#components-box-mask').show();

    }

});
$('#check_window').click(function () {
    $('#check_mytopo').removeClass('shouqi').addClass('kai');
    $('#check_window').html('收起').css('opacity', 1);
    $('#check_zhanshi>p').show();
    $('#check_window').hide();
    $('#check_window1').fadeIn()
})


//弹窗拖拽
//function winDrag(select){
//    $(select+'>form>div').mousedown(function () {
//        var isMove = true;
//        var e_w=parseInt($(this).parent().css('width'));
//        var W_h=$(window).height();
//        var W_w=$(window).width();
//        var _x = event.clientX - $(select).offset().left-e_w/2;
//        var _y = event.clientY - $(select).offset().top;
//        $(document).mousemove(function (event) {
//                if (isMove) {
//                    var obj = $(select);
//                    var l= event.clientX - _x;
//                    var t= event.clientY - _y;
//                    if(l<e_w/2) l=e_w/2;
//                    if(l>W_w-e_w/2) l=W_w-e_w/2;
//                    if(t<0) t=0;
//                    if(t>W_h-100) t=W_h-100;
//                    obj.css({'left': l, 'top': t});
//                }
//            }
//        ).mouseup(
//            function () {
//                isMove = false;
//            }
//        );
//    });
//}
//winDrag('.modal-all');



