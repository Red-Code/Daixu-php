/**
 * Created by CLY on 2016/8/28.
 */
var resgister_form = document.getElementById('register_form');
//var phone_box = document.getElementById('phone_box');
var acount_box = document.getElementById('acount_box');
var user_box = document.getElementById('user_box');
var pwd_box = document.getElementById('pwd_box');
var pwda_box = document.getElementById('pwda_box');
//var phone = document.getElementById('phone');
var user_account = document.getElementById('user_account');
var my_username = document.getElementById('username');
var my_password = document.getElementById('password');
var password_again = document.getElementById('password_again');
//var phone_hint_info = document.getElementById('phone_hint_info');
var acount_hint_info = document.getElementById('acount_hint_info');
var user_hint_info = document.getElementById('user_hint_info');
var pwd_hint_info = document.getElementById('pwd_hint_info');
var pwda_hint_info = document.getElementById('pwda_hint_info');
//var phone_icon = document.getElementById('phone_icon');
var acount_icon = document.getElementById('acount_icon');

var user_icon = document.getElementById('user_icon');
var pwd_icon = document.getElementById('pwd_icon');
var pwda_icon = document.getElementById('pwda_icon');
var agree_protocol = document.getElementById("agree_protocol");
var user_regExp = /[^\w\u4e00-\u9fa5]/g;
var phone_regExp = /1[\d]{10}/;
var acount_right;
var username_right;
var password_right;

//表单验证 begin 如果表单中有错误则表单不能被提交
register_form.onsubmit = function () {
    if(user_account.value==="")
    {
        alert("账号不能为空！");
        return false;
    }
    else if(my_password.value===''){
        alert("密码不能为空！")
        return false;
    }
    else if(my_username.value===''){
        alert("昵称不能为空！")
        return false;
    }
    else if(acount_right==false || password_right==false || username_right==false){
        alert("请输入正确的信息！")
        return false;
    }

    if(agree_protocol.checked == false){
        alert("用户服务未勾选！")
        return false;
    }
}
//表单验证 end


//phone number identify begin
user_account.onblur = function(){
    //没有正确输入11位电话号码
    //if(!phone_regExp.test(this.value)) {
    //    phone_hint_info.innerHTML = "请输入11位电话号码！";
    //    phone_box.className = "form-group has-error has-feedback";
    //    phone_icon.className = "glyphicon glyphicon-remove form-control-feedback";
    //}
    if(user_account.value == ''){
        acount_right = false;
        acount_hint_info.innerHTML = "不能为空";
        acount_box.className = "form-group has-error has-feedback";
        acount_icon.className = "glyphicon glyphicon-remove form-control-feedback";
    }
    else if(!/^[\da-z]+$/i.test(user_account.value)) {
        acount_right = false;
        acount_hint_info.innerHTML = "账号格式错误";
        acount_box.className = "form-group has-error has-feedback";
        acount_icon.className = "glyphicon glyphicon-remove form-control-feedback";
    }

    else if(user_account.value.length>30){
        acount_right = false;
        acount_hint_info.innerHTML = "账号长度请小于30个字符";
        acount_box.className = "form-group has-error has-feedback";
        acount_icon.className = "glyphicon glyphicon-remove form-control-feedback";
    }else{
        //输入正确!
        acount_right = true;
        acount_hint_info.innerHTML = "输入正确!";
        acount_box.className = "form-group has-success has-feedback";
        acount_icon.className = "glyphicon glyphicon-ok form-control-feedback";
    }
}
//phone number identify end


// username identify begin
// get the focus
my_username.onfocus = function(){
    //user_hint_info.innerHTML = "8-25个字符,数字,字母,下划线，汉字组合,汉字占两个字符";
    //user_hint_info.style.visibility = 'visible';

}
// lost the focus
my_username.onblur = function(){
    var my_username_length = getLength(this.value)
    //含有非法字符
    if(user_regExp.test(this.value)){
        username_right = false;
        user_hint_info.innerHTML = "含有非法字符！";
        user_box.className = "form-group has-error has-feedback";
        user_icon.className = "glyphicon glyphicon-remove form-control-feedback";
    }
    //长度为空
    else if(my_username_length == ""){
        username_right = false;
        user_hint_info.innerHTML = "不能为空！";
        user_box.className = "form-group has-error has-feedback";
        user_icon.className = "glyphicon glyphicon-remove form-control-feedback";
    }
    //字符长度小于8
    //else if(my_username_length < 8){
    //    user_hint_info.innerHTML = "字符长度小于8";
    //    user_box.className = "form-group has-error has-feedback";
    //    user_icon.className = "glyphicon glyphicon-remove form-control-feedback";
    //}
    //字符长度大于25
    else if(my_username.value.length > 15){
        username_right = false;
        user_hint_info.innerHTML = "字符长度大于15";
        user_box.className = "form-group has-error has-feedback";
        user_icon.className = "glyphicon glyphicon-remove form-control-feedback";
    }
    //输入正确!
    else{
        username_right = true;
        user_hint_info.innerHTML = "输入正确!";
        user_box.className = "form-group has-success has-feedback";
        user_icon.className = "glyphicon glyphicon-ok form-control-feedback";
    }
}
// get the string's length
function getLength(str){
    return str.replace(/[^\x00-xff]/g,"xx").length;
}

// username identify finish

//password identify begin
// get the focus
my_password.onfocus = function(){
    //pwd_hint_info.innerHTML = "6-16个字符,数字,字母,符号组合,不能单独输入字母，数字，符号";
    //pwd_hint_info.style.visibility = 'visible';
}

//when the key is bouncing
//my_password.onkeyup = function(){
//    //解除再次输入密码的禁用状态
//    if (this.value.length == 6) {
//        password_again.removeAttribute("disabled");
//    }
//    else if(this.value.length == 5){
//        password_again.setAttribute("disabled","");
//    }
//}

//lost the focus
my_password.onblur = function(){
    //全为数字
    var pwd_regExp_n = /[^\d]/g;
    var pwd_regExp_c = /[^a-zA-Z]/g;

    //长度为空
    if(this.value == ""){
        password_right = false;
        pwd_hint_info.innerHTML = "不能为空！";
        pwd_box.className = "form-group has-error has-feedback";
        pwd_icon.className = "glyphicon glyphicon-remove form-control-feedback";
    }
    else if(!pwd_regExp_n.test(this.value)){
        password_right = false;
        pwd_hint_info.innerHTML = "不能全为数字！";
        pwd_box.className = "form-group has-error has-feedback";
        pwd_icon.className = "glyphicon glyphicon-remove form-control-feedback";
    }

    //全为字母
    else if(!pwd_regExp_c.test(this.value)){
        password_right = false;
        pwd_hint_info.innerHTML = "不能全为字母！";
        pwd_box.className = "form-group has-error has-feedback";
        pwd_icon.className = "glyphicon glyphicon-remove form-control-feedback";
    }

    //字符长度小于6
    else if(this.value.length < 6){
        password_right = false;
        pwd_hint_info.innerHTML = "字符长度小于6";
        pwd_box.className = "form-group has-error has-feedback";
        pwd_icon.className = "glyphicon glyphicon-remove form-control-feedback";
    }

    //字符长度大于16
    else if(this.value.length > 15){
        password_right = false;
        pwd_hint_info.innerHTML = "字符长度大于15";
        pwd_box.className = "form-group has-error has-feedback";
        pwd_icon.className = "glyphicon glyphicon-remove form-control-feedback";
    }

    //输入正确!
    else{
        password_right = true;
        pwd_hint_info.innerHTML = "输入正确!";
        pwd_box.className = "form-group has-success has-feedback";
        pwd_icon.className = "glyphicon glyphicon-ok form-control-feedback";
        pwda_hint_info.innerHTML = "请再输入一次密码！";
    }
}
//password identify finish

//password_again identify begin
//password_again.onblur = function(){
//    if (password_again.value != password.value) {
//        pwda_hint_info.innerHTML = "两次密码不一致请重新输入！";
//        pwda_box.className = "form-group has-error has-feedback";
//        pwda_icon.className = "glyphicon glyphicon-remove form-control-feedback";
//    }
//    else{
//        pwda_hint_info.innerHTML = "输入正确!";
//        pwda_box.className = "form-group has-success has-feedback";
//        pwda_icon.className = "glyphicon glyphicon-ok form-control-feedback";
//    }
//}
//password_again identify begin


