/**
 * Created by CLY on 2016/5/25.
 */
$(document).ready(function() {
    var demo = $.cookie('user_id');
    if(demo){
        $('#title_personal').css('display','block');
        $('#title_login').css('display','none');
    }

    var news_num = $('#notice_news_num').html();
    if(news_num!='a'){
        $('#notice_news_num').css('display','block');
    }
});

