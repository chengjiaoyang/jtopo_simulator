(function (window, document) {
    var Drag = function (options) {
        this.rootEle = document.getElementById(options.rootEleId);
        /**
         * 破坏组件行为：
         * 修改拖动事件的柄
         */
        this.headerEle=this.rootEle.getElementsByClassName('header-terminal')[0];
        // 鼠标开始的位置
        this._init();
    };


    Drag.prototype = {
        zIndex: 1000,
        setZindex: function () {
            this.__proto__.zIndex += 1;
        },
        bindEvent: function () {
            var that = this;
            /**
             * 修改拖动事件的监听句柄
             */
            this.headerEle.addEventListener('mousedown', function (event) {
                event.stopPropagation();
                //鼠标样式
                that.headerEle.style.cursor = "move";
                // 设置组件的层级z-index
                that.rootEle.style.zIndex = that.zIndex;
                that.setZindex();
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
                document.addEventListener('mousemove',move);
                document.addEventListener('mouseup', stop);
            });
        },


        _init: function () {
            this.bindEvent();
        }
    };
    window.dragBox = function (obj) {
        new Drag(obj);
    };
})(window, document);