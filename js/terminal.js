var Terminal = (function () {
    var Popup = function (options) {
        /**
         * 存储传入的数据
         */
        this.create_time = +new Date();
        this.cur_device_id = options.currId;
        this.currId = this.create_time + '-' + options.currId; //terminal的Id，数据从上面传过来
        this.topo_name_id = options.topo_name_id; //topu的信息
        this.serverPath = options.serverPath; //获取参数的路径
        this.terminalName = options.terminalName;

        /**
         * 存储运行中数据
         */
        //  尽量维护更少的数据，即使增加dom的操作也无所谓
        this.rootEle = ''; //控制台的根节点
        this.inputValues = []; //存储我在输入框内输入所有内容 
        this.inputValuesIndex = 0;    //inputValues的位置指针
        this.enterTimes = 0; //enter键按了几次 ，（验证查看旧版本，发现保存的就是enter键按了几次，不是向服务器发送了几次）
        this.cmd_status = 'on';
        //键盘按键值
        this.keydownCode = {
            QUIT: 67, //ctrl+c组合键
            ENTER: 13, //esc键
            UP: 38,  //up键
            DOWN: 40 //down键
        };
        //绑定DOM，绑定事件
        this._init();
    };
    Popup.prototype = {
        // 当前获取焦点的控制台，或者说鼠标点击了那个控制台，注意，这是共享属性
        nowFocusTerminal: '',
        // 控制台的位置,这是共享属性
        left: 200,
        top: 200,
        zIndex: 1000,
        /**
         * 创建input结构
         */
        bindSearchDom: function () {
            var _searchDom = document.createElement('div');
            _searchDom.className = 'form-box';
            var formHtml = [
                '<label>' + this.terminalName + '$  </label>',
                '<input type="text" class="search-input" autofocus>'
            ].join('');
            _searchDom.innerHTML = formHtml;
            return _searchDom;
        },
        /**
         * 创建接收数据的盒子result
         */
        bindResultDom: function () {
            var _resultDom = document.createElement('div');
            _resultDom.className = 'result-box';
            return _resultDom;
        },
        /**
         * 合并input结构和result结构
         */
        bindDom: function () {
            // 如果弹窗存在，就移除dom
            if (document.getElementById(this.currId)) {
                document.body.removeChild(document.getElementById(this.currId));
            }
            /**
             * 创建terminal根结构
             */
            var _terminalDom = document.createElement('div');
            _terminalDom.id = this.currId;
            _terminalDom.className = 'terminal-box';
            _terminalDom.style.position = 'absolute';
            _terminalDom.style.left = this.left + 'px';
            _terminalDom.style.top = this.top + 'px';
            _terminalDom.style.zIndex = this.zIndex;
            // 控制台头信息
            var headTermianlHmtl = '';
            headTermianlHmtl += '<div class="header-terminal">';
            headTermianlHmtl += '<div class="terminal-name">' + this.terminalName + '控制台</div>';
            headTermianlHmtl += '<div class="close-terminal">关闭</div>';
            headTermianlHmtl += '</div>';
            _terminalDom.innerHTML = headTermianlHmtl;

            // 包裹input和result盒子
            var _contentTerminalDom = document.createElement('div');
            _contentTerminalDom.className = 'content-terminal';
            // 将input和result结构加入terminal结构
            _contentTerminalDom.appendChild(this.bindSearchDom()); //加入form盒子
            _contentTerminalDom.appendChild(this.bindResultDom()); //加入result盒子
            // 将所有dom加入到terminal结构中
            _terminalDom.appendChild(_contentTerminalDom);
            // 将terminal结构加入body
            document.body.appendChild(_terminalDom);
            this.rootEle = _terminalDom;
        },
        /**
         * 请求获取数据
         */
        getData: function (inputValue) {
            var that = this;
            //如果控制台的状态是允许向服务器请求数据，就发送请求
            if (this.cmd_status === 'on') {
                var sendData = {
                    cmd: inputValue, //查询的值
                    cmd_id: "c_" + this.create_time + '-' + this.enterTimes, //enter键按了几次
                    cmd_status: this.cmd_status, //可以向服务器请求数据
                    dev_name: this.cur_device_id, // 弹窗最外层的id
                    topo_name_id: this.topo_name_id, //这个数据，进入页面的时候就已经有了，只需要获取
                };
                $.ajax({
                    data: sendData,
                    url: that.serverPath,
                    dataType: 'json',
                    success: function (res) {
                        // 如果返回的状态码为0
                        if (res.retCode === 0) {
                            // 直接处理数据
                            that.dealData(res.cmd_result);
                            // 添加input和result结构
                            that.addInputResult();
                        }

                        // 如果返回的状态码为10
                        if (res.retCode === 10) {
                            // 循环请求数据
                            that.loopRequest(res.cmd_result);
                        }
                        // 如果返回的状态码为6
                        if (res.retCode === 6) {
                            // 循环请求数据
                            that.dealRetMsg(res.retMsg);
                            // 添加input和result结构
                            that.addInputResult();
                        }

                    },
                    error: function (m) {
                        console.log(m);
                    }
                });
            } else {
                return;
            }
        },
        /**
         * 处理返回的cmd_result数据
         */
        dealData: function (resResult) {
            // 处理数据
            for (var i = 0; i < resResult.length; i++) {
                // 创建p元素
                var pre = document.createElement('pre');
                pre.innerHTML = resResult[i].info;
                // 将p元素加入result结构中
                $(this.rootEle).find('.result-box:last').get(0).appendChild(pre);
                // 将浏览器的下拉条移动到最下方
                $(this.rootEle).find('.content-terminal').scrollTop($(this.rootEle).find('.content-terminal').get(0).scrollHeight);
            }
        },
        /**
         * 处理返回的retMsg数据
         */
        dealRetMsg: function (msg) {
            // 创建p元素
            var pre = document.createElement('pre');
            pre.innerHTML = msg;
            // 将p元素加入result结构中
            $(this.rootEle).find('.result-box:last').get(0).appendChild(pre);
            // 将浏览器的下拉条移动到最下方
            $(this.rootEle).find('.content-terminal').scrollTop($(this.rootEle).find('.content-terminal').get(0).scrollHeight);

        },
        /**
         * 循环请求数据
         */
        loopRequest: function (resResult) {
            var that = this;
            this.dealData(resResult);
            var timer = setTimeout(function () {
                return that.getData();
            }, 500);

        },

        /**
         * 添加input和result结构
         */
        addInputResult: function () {
            $(this.rootEle).find('.content-terminal').get(0).appendChild(this.bindSearchDom());
            $(this.rootEle).find('.content-terminal').get(0).appendChild(this.bindResultDom());
            // 将光标焦点设在新的input上
            $(this.rootEle).find('.search-input:last').focus();
        },

        /**
         * ctrl+C事件
         */
        quitKeyCode: function (event) {
            if (event.ctrlKey && event.keyCode === this.keydownCode.QUIT) {
                /**
                 * 因为每个控制台对象都绑定了这个事件
                 * 所以这个事件会被运行多次
                 * 之前我已经维护了一份公共属性，nowFocusTerminal，里面保存的是当前获取焦点的控制台
                 * 如果控制台ctrl+c事件运行时，判断当前控制台的rootEle属性等于之前获取焦点的控制台
                 * 就将执行对当前控制台的方法
                 * 
                 * 目前没有想到更好的解决办法
                 */
                if (this.nowFocusTerminal === this.rootEle) {
                    this.cmd_status = 'off';
                    this.addInputResult();
                }
            }
        },

        /**
         * 当前窗口设置为焦点
         */
        getFocus: function () {
            $(this.rootEle).find('.search-input:last').focus();
            $(this.rootEle).get(0).style.zIndex = this.zIndex;
            this.setPostion();
        },

        /**
         * 设置控制台的位置
         */
        setPostion: function () {
            this.__proto__.left += 20;
            this.__proto__.top += 20;
            this.__proto__.zIndex += 1;
            if (this.left === 400 && this.top === 400) {
                this.__proto__.left = 200;
                this.__proto__.top = 200;
            }
        },

        /**
         * 功能：
         * 1. 将输入的命令存储起来
         * 2. 将inputValuesIndex指针指向数组的最后一位
         */
        saveInputValue: function (inputValue) {
            /**
             * 输入的命令存储下来功能
             * 
             * 1.首先判断输入的命令不能为空
             * 2.然后判断是否已经存储了这个命令，如果已经存储了这个命令，就删除这个命令
             * 3.最后将输入的命令存储下来
             */
            for (var i = 0; i < this.inputValues.length; i++) {
                if (inputValue === this.inputValues[i]) {
                    this.inputValues.splice(i, 1);
                }
            }
            this.inputValues.push(inputValue);

            // 将inputValuesIndex指针指向数组的最后一位
            this.inputValuesIndex = this.inputValues.length;
        },
        /**
         * 键盘up键向上获取inputValues的值 
         */
        upHistoryInputValue: function () {
            if (this.inputValuesIndex > 0) {
                // 移动指针
                this.inputValuesIndex = this.inputValuesIndex - 1;
                // 将数组当前指针下的值传到input中
                $(this.rootEle).find('.search-input:last').get(0).value = this.inputValues[this.inputValuesIndex];
            }
        },
        /**
         * 键盘down键向下获取inputValues的值
         */
        downHistoryInputValue: function () {
            if (this.inputValuesIndex < this.inputValues.length - 1) {
                // 移动指针
                this.inputValuesIndex = this.inputValuesIndex + 1;
                // 将数组当前指针下的值传到input中
                $(this.rootEle).find('.search-input:last').get(0).value = this.inputValues[this.inputValuesIndex];
            }
        },

        /**
         * 绑定事件
         */
        bindEvent: function (event) {
            var that = this;
            // 新初始化的控制台，设置为焦点
            this.getFocus();
            /**
             * input输入框监听键盘事件
             */
            $(this.rootEle).on('keydown', $(this.rootEle).find('.form-box:last'), function (event) {
                event.stopPropagation();
                var inputDom = event.target;
                //如果按了enter
                if (event.keyCode === that.keydownCode.ENTER) {
                    // 记录按了几次enter键
                    that.enterTimes += 1;
                    // 将input设置为不可输入状态，并且改变鼠标的样式
                    inputDom.disabled = true;
                    inputDom.style.cursor = 'default';
                    // 将控制台的状态设置为“on”
                    that.cmd_status = 'on';
                    // 如果输入的命令不为空,
                    if (inputDom.value !== '') {
                        // 存储输入的名命令
                        that.saveInputValue(inputDom.value);
                        // 向服务其请求数据
                        that.getData(inputDom.value);
                    } else { //input输入为空
                        // 直接添加input和result结构
                        that.addInputResult();
                    }
                }
                // 如果按了up键
                if (event.keyCode === that.keydownCode.UP) {
                    that.upHistoryInputValue();
                }
                // 如果按了down键
                if (event.keyCode === that.keydownCode.DOWN) {
                    that.downHistoryInputValue();
                }
            });

            /**
             * 点击控制台
             */

            this.rootEle.addEventListener('click', function (event) {
                event.stopPropagation();
                // 在类的原型中保存当前获取焦点的控制台，所有的实例都是共享这一数据
                that.__proto__.nowFocusTerminal = that.rootEle;
                // 将当前点击的控制台获取焦点显示
                that.getFocus();
            });

            /**
             * 每个实例化的对象都会给window对象绑定一个每个实例化对象的keyup事件，注意是每个实例化的对象
             * 所以说有几个控制台，就会给window对象绑定几次
             * 虽然quitKeyCode的逻辑是一样的，方法名也是一样的，但是里面运行参数是不一样的
             * 目前没有找到解决的办法..........
             */
            window.addEventListener('keyup', this.quitKeyCode.bind(this));

            /**
             * 关闭控制台
             */
            $(this.rootEle).find('.close-terminal').on('click', function (event) {
                event.stopPropagation();
                that.cmd_status = 'off';
                document.body.removeChild($(that.rootEle)[0]);
            });

            /**
             * 拖动
             */
            $(this.rootEle).find('.header-terminal').get(0).addEventListener('mousedown', function (event) {
                event.stopPropagation();
                //鼠标样式
                this.style.cursor = "move";
                // 设置组件的层级z-index
                that.rootEle.style.zIndex = that.zIndex;
                // 鼠标相对于物体的距离
                var x = event.clientX - that.rootEle.offsetLeft;
                var y = event.clientY - that.rootEle.offsetTop;
                // 鼠标移动
                var move = function (event) {
                    that.rootEle.style.left = (event.clientX - x) + 'px';
                    that.rootEle.style.top = (event.clientY - y) + 'px';
                };
                //松开鼠标
                var stop = function (event) {
                    document.removeEventListener('mousemove', move);
                    document.removeEventListener('mouseup', stop);
                    that.rootEle.style.cursor = "normal"; //设置放开的样式
                };
                document.addEventListener('mousemove', move);
                document.addEventListener('mouseup', stop);
            });
        },
        /**
         * 对象初始化事件
         */
        _init: function () {
            this.bindDom();
            this.bindEvent();
            this.setPostion();  //设置下一个控制台出现的位置
        }
    };
    return Popup;
})();
