//开始时隐藏发布草稿页面
function hidden_box(){
	$('#publish_wrap').css('display','none');
	$('#box_text_new_continue').css('display','none');
	$('#box_text_new_publish').css('display','none');
}
window.onload = hidden_box ;

//新建草稿的按钮
$("#button_new_continue").click(function(){
	$('#box_new_continue').css('display','none');
	$('#box_text_new_continue').css('display','block');
});
$("#button_new_publish").click(function(){
	$('#box_new_publish').css('display','none');
	$('#box_text_new_publish').css('display','block');
});

//接龙草稿按钮和发布草稿按钮的点击事件
$("#jielong_draft").click(function(){
	var jielong_draft = document.getElementById('jielong_draft');
	var publish_draft = document.getElementById('publish_draft');
	var jielong_wrap = document.getElementById('jielong_wrap');
	var publish_wrap = document.getElementById('publish_wrap');
	var test = jielong_draft.style.color.innerHTML;

	publish_wrap.style.display = 'none';
	jielong_wrap.style.display = 'block';
	publish_draft.style.borderBottom = 'none';
	publish_draft.style.color = '#5D5E5E';
	jielong_draft.style.borderBottom = '2px solid #51a47a';
	jielong_draft.style.color = '#51a47a';

});
$("#publish_draft").click(function(){
	var jielong_draft = document.getElementById('jielong_draft');
	var publish_draft = document.getElementById('publish_draft');
	var jielong_wrap = document.getElementById('jielong_wrap');
	var publish_wrap = document.getElementById('publish_wrap');
	var test = jielong_draft.style.color.innerHTML;

	jielong_wrap.style.display = 'none';
	publish_wrap.style.display = 'block';
	jielong_draft.style.color = '#5D5E5E';
	jielong_draft.style.borderBottom = 'none';
	publish_draft.style.borderBottom = '2px solid #51a47a';
	publish_draft.style.color = '#51a47a';
});

//在新建草稿时检查里面是否有内容
function check_new_continue(){
	editor_new_continue.sync();//将KindEditor的数据同步到textarea标签。
	var value_content = $("#text_new_continue").val();

	if(value_content==''){
		alert('信息未填完整');
		return false;
	}
}
function check_new_publish(){
	editor_new_publish.sync();
	var value_content = $('#text_new_publish').val();

	if(value_content==''){
		alert('信息未填完整');
		return false;
	}
}