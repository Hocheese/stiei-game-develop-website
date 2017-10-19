;(function($) {
    function Slider(elem, options) {
        this.$container = elem;
        this.default = {
            width: this.$container.width() - 2,
            height: this.$container.height() - 2,
            bgColor: '#E8E8E8',// 默认背景颜色
            progressColor: '#FFE97F',// 滑动中背景颜色
            handleColor: '#fff',// 滑块颜色
            succColor: '#78D02E',// 滑动成功背景颜色
            text: 'slide to unlock',
            succText: 'ok!',
            failText: 'no!',
            textColor: '#000',// 默认字体颜色
            succTextColor: '#000',// 成功字体颜色
            failTextColor: '#000',// 失败字体颜色
            successFunc : function() {
                // 验证检测
                // var user = document.getElementById('_user').value;
                // var pwd = document.getElementById('_pwd').value;

                // console.log(user);

                // if((user == "") && (pwd == "")) {
                //     document.getElementById('s_prompt').style.display = "";
                // }
                // else {
                    
                // }
                Slider.initStyle();
            }
        };
        this.options = $.extend({}, this.default, options);
        this.isSuccess = false;
    }
    Slider.prototype = {
        /**
         * 创建
         */
        create: function() {
            var $container = this.$container;// 创建一个容器
            var options = this.options;// 创建一个选项
            initDOM();
            initStyle();
            /**
             * 初始化DOM
             */
            function initDOM() {
                var template = '<div class="slide-to-unlock-bg"><span>' +
                    options.text +
                    '</span></div><div class="slide-to-unlock-progress"></div><div class="slide-to-unlock-handle"></div>';
                $container.html(template);
            }
            /**
             * 初始化样式
             */
            function initStyle() {
                $container.css({
                    position: 'relative',
                });
                $container.find('span').css({
                    lineHeight: options.height + 'px',
                    fontSize: options.height / 3.5,
                    color: options.textColor
                });
                $container.find('.slide-to-unlock-bg').css({
                    width: options.width + 'px',
                    height: options.height + 'px',
                    backgroundColor: options.bgColor,
                });
                $container.find('.slide-to-unlock-progress').css({
                    backgroundColor: options.progressColor,
                    height: options.height - 2 + 'px'
                });
                $container.find('.slide-to-unlock-handle').css({
                    backgroundColor: options.handleColor,
                    height: (options.height - 0) + 'px',
                    lineHeight: (options.height - 0) + 'px',
                    width: (Math.floor(options.width / 8)) + 'px',
                });
            }
        },
        /**
         * 绑定拖动事件
         */
        bindDragEvent: function() {
            var that = this;
            var $container = this.$container;
            var options = this.options;
            var downX;
            var $prog = $container.find('.slide-to-unlock-progress'),
                $bg = $container.find('.slide-to-unlock-bg'),
                $handle = $container.find('.slide-to-unlock-handle');
            var succMoveWidth = $bg.width() - $handle.width();
            $handle.on('mousedown', null, mousedownHandler);
            /**
             * 获得限制数字 
             */
            function getLimitNumber(num, min, max) {
                if (num > max) {
                    num = max;
                } else if (num < min) {
                    num = min;
                }
                return num;
            }
            /**
             * 鼠标按下处理器 
             */
            function mousedownHandler(event) {
                downX = event.clientX;
                $(document).on('mousemove', null, mousemoveHandler);
                $(document).on('mouseup', null, mouseupHandler);
            }
            /**
             * 鼠标移动处理程序 
             */
            function mousemoveHandler(event) {
                var moveX = event.clientX;
                var diffX = getLimitNumber(moveX - downX, 0, succMoveWidth);
                $prog.width(diffX);
                $handle.css({
                    left: diffX
                });
                if (diffX === succMoveWidth) {
                    // 滑动完成后, 调用 detection 方法
                    detection();
                }
                event.preventDefault();
            }
            /**
             * 鼠标抬起处理器
             */
            function mouseupHandler(event) {
                if (!that.isSuccess) {
                    $prog.animate({
                        width: 0
                    }, 100);
                    $handle.animate({
                        left: 0
                    }, 100);
                }
                $(document).off('mousemove', null, mousemoveHandler);
                $(document).off('mouseup', null, mouseupHandler);
            }
            /**
             * 检测
             */
            function detection() {
                var user = document.getElementById('_user').value;
                var pwd = document.getElementById('_pwd').value;

                console.log(user);

                if((user == "") && (pwd == "")) {
                    document.getElementById('s_prompt').style.display = "";
                }
                else {
                    $prog.css({
                    backgroundColor: options.succColor,
                    });
                    $container.find('span').css({
                        color: options.succTextColor
                    });
                    that.isSuccess = true;
                    $container.find('span').html(options.succText);
                    $handle.off('mousedown', null, mousedownHandler);
                    $(document).off('mousemove', null, mousemoveHandler);
                    setTimeout(function() {
                        options.successFunc && options.successFunc();
                    }, 30);
                }
            }
        }
    };
    $.fn.extend({
        slideToUnlock: function(options) {
            return this.each(function() {
                var slider = new Slider($(this), options);
                slider.create();
                slider.bindDragEvent();
            });
        }
    });
})(jQuery);