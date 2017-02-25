/**
 * Created by htx on 2016/9/2.
 */
var li_list = document.getElementById('ul_list').getElementsByTagName('li');
var participate_box  = document.getElementById('participate_box');
var call_me  = document.getElementById('call_me');
var private_call  = document.getElementById('private_call');
var system_info  = document.getElementById('system_info');
var divs = [participate_box,call_me,private_call,system_info];

function clear() {
   for(var i=0;i<li_list.length;i++){
       li_list[i].className = '';
   }
}
function hidden() {
    for(var i=0;i<divs.length;i++){
        divs[i].className = 'hidden_select';
    }
}
//clear();
$(document).ready(function () {

    for(var i=0;i<li_list.length;i++){
        li_list[i].index = i

        li_list[i].onclick = function () {
            clear();
            hidden();
            li_list[this.index].className = 'this_select';
            divs[this.index].className = '';
        }
    }
});

