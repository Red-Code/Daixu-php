/**
 * Created by htx on 2016/9/1.
 */

var user_acount = document.getElementById('user_acount');
var user_password = document.getElementById('user_password');
var login_from = document.getElementById('login_from');

window.onload = function () {

    login_from.onsubmit = function () {
        if(user_acount.value=='' || user_password.value==''){
            alert("账户或密码不能为空！")
            return false;
        }
        else{
            return true;
        }
    }

}