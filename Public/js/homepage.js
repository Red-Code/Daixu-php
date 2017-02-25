window.onload = function()
{

    var left_slideImg = document.getElementById('left_slideImg');
    var list = document.getElementById('list');
    var buttons = document.getElementById('buttons').getElementsByTagName('span');
    var prev = document.getElementById('prev');
    var next = document.getElementById('next');
    var index = 1;
    var len = 5;
    var animated = false;
    var interval = 3000;
    var timer;


    function animate (offset) 
    {
        if (offset == 0) 
        {
            return;
        }
        animated = true;
        var time = 300;
        var inteval = 10;
        var speed = offset/(time/inteval);
        var left = parseInt(list.style.left) + offset;

        var go = function ()
        {
            if ( (speed > 0 && parseInt(list.style.left) < left) || (speed < 0 && parseInt(list.style.left) > left)) 
            {
                list.style.left = parseInt(list.style.left) + speed + 'px';
                setTimeout(go, inteval);
            }
            else 
            {
                list.style.left = left + 'px';
                if(left>-200)
                {
                    list.style.left = -690 * len + 'px';
                }
                if(left<(-690 * len)) 
                {
                    list.style.left = '-690px';
                }
                animated = false;
            }
        }
        go();
    }

    function showButton() 
    {
        for (var i = 0; i < buttons.length ; i++) 
        {
            if( buttons[i].className == 'on')
            {
                buttons[i].className = '';
                break;
            }
        }
        buttons[index - 1].className = 'on';
    }

    function play() 
    {
        timer = setTimeout(function () {
            next.onclick();
            play();
        }, interval);
    }
    function stop() 
    {
        clearTimeout(timer);
    }

    next.onclick = function () 
    {
        if (animated) {
            return;
        }
        if (index == 5) {
            index = 1;
        }
        else {
            index += 1;
        }
        animate(-690);
        showButton();
    }
    prev.onclick = function () 
    {
        if (animated) {
            return;
        }
        if (index == 1) {
            index = 5;
        }
        else {
            index -= 1;
        }
        animate(690);
        showButton();
    }

    for (var i = 0; i < buttons.length; i++) 
    {
        buttons[i].onclick = function ()
        {
            if (animated) {
                return;
            }
            if(this.className == 'on') {
                return;
            }
            var myIndex = parseInt(this.getAttribute('index'));
            var offset = -690 * (myIndex - index);

            animate(offset);
            index = myIndex;
            showButton();
        }
    }

    left_slideImg.onmouseover = stop;
    left_slideImg.onmouseout = play;

    play();
}

//控制右侧的用户信息栏的展示
$(document).ready(function() {
    var demo = $.cookie('user_id');
    if(demo){
        $('#user_info_login').css('display','block');
    }
    /*function $(selector){
        return document.getElementById(selector);
    }*/
    var calendar_wrap = document.getElementById('calendar_wrap');
    var come_sign = document.getElementById('come_sign');

    function show_calendar(_year,_month,_day,month_alldays,first_day_week){
        var show_str = '';
        var today = new Date(),
        //给每个日期添加不同的样式
            _className='';
        //为了之后判断是否每一行的日期达到7天而换行准备的变量
        var line_feed = first_day_week;

        //显示日历头部
        show_str = "<table><thead><tr><td><span id='pre_month'>&lt;</span></td><td colspan='5' id='show_date'>" + _year + '-' + _month + '-' + _day + "</td><td><span id='next_month'><a>&gt;</a></span></td></tr>";

        //显示星期
        show_str += "<tr><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr></thead><tbody><tr>";

        //如果这个月的第一天不是星期天 即说明这个月日历表上有上一个月的日期
        for(var i=0;i<first_day_week;i++){
            show_str += "<td></td>";
        }
        //循环输出这个月的日期
        for(var j=1;j<=month_alldays;j++){
            //如果当前日期已经过了输入的日期添加样式
            if(_year < today.getFullYear() || _month < (today.getMonth()+1) || j < today.getDate()){
                _className = "td_previous";
            }
            //如果输入的日期等于当前日期添加样式
            if(_year === today.getFullYear() && _month === (today.getMonth()+1) && j === today.getDate()){
                _className = "td_current";
            }
            //如果当前日期还未到输入的日期添加演示
            if(_year > today.getFullYear() || (_year > today.getFullYear() && _month > (today.getMonth()+1) )|| j > today.getDate()){
                _className = "td_after";
            }
            show_str += "<td class='" + _className + "'>"   + j + "</td>";
            line_feed++;
            //如果line_feed 为7  说明一行日期已经输入满了 需要换行了所以。。。
            if((line_feed%7)===0){
                show_str += "</tr><tr>";
            }
        }
        //显示尾部
        show_str += "</tbody></table>";

            calendar_wrap.innerHTML = show_str;
        // $('calendar_wrap').innerHTML = show_str;
    }

    function handle(event){
        //now_date 为得到当前的日期
        var now_date = new Date(),
        //得到当前的四位数表示的年份
            now_year = now_date.getFullYear(),
        //得到当前的月份
            now_month = now_date.getMonth() + 1,
        //得到当前的天数
            now_day = now_date.getDate(),
        //得到这个月的总天数
            now_month_alldays = (new Date(now_year, now_month, 0)).getDate(),
        //first_day_of_week 此变量代表这个月第一天是星期几
        //如果 first_day_of_week 为0 说明这个月的日历表上不需要上个月的数据
        //如果 first_day_of_week 不为0 假如为4 说明这个月的第一天是星期四，那前面星期1到星期三就是上一个月的数据
            first_day_of_week = (new Date(now_year,(now_month-1),1)).getDay();
        //alert(first_day_of_week);
        var next_month = now_month;
        var pre_month = now_month;
        //显示当前时间的日历
        show_calendar(now_year,now_month,now_day,now_month_alldays,first_day_of_week);
        calendar_wrap.style.display = "block";
        eventUtil.stopPropagation(event);
        document.onclick = function(){
            calendar_wrap.style.display = "none";
            }
        /*$('calendar_wrap').style.display = "block";
        eventUtil.stopPropagation(event);
        document.onclick = function(){
            $('calendar_wrap').style.display = "none";
        }*/
    }

    eventUtil.addHandler(come_sign,'click',handle);


});

var eventUtil = {
    addHandler:function(element,type,handler){
        if(element.addEventListener){
            element.addEventListener(type,handler,false);
        }else if(element.attachEvent){
            element.attachEvent('on'+type,handler);
        }else{
            element['on'+type] = handler;
        }
    },
    removeHandler:function(element,type,handler){
        if(element.removeEventListener){
            element.removeEventListener(type,handler,false);
        }else if(element.detachEvent){
            element.detachEvent('on'+type,handler);
        }else{
            element['on'+type] = null;
        }
    },
    getEvent:function(event){
        return event?event:window.event;
    },
    getType:function(event){
        return event.type;
    },
    getElement:function(event){
        return event.target || event.srcElement;
    },
    preventDefault:function(event){
        if(event.preventDefault){
            event.preventDefault();
        }else{
            event.returnValue = false;
        }
    },
    stopPropagation:function(event){
        if(event.stopPropagation){
            event.stopPropagation();
        }else{
            event.cancelBubble = true;
        }
    }
}