
function hidden_box(){
	$('#inner_wrap1').css('display','block');
	$('#inner_wrap2').css('display','none');
	$('#inner_wrap3').css('display','none');
	$('#button_rap').css({'color':'#fff','background':'#51a47a'});
}
window.onload = hidden_box ;
//根据不同的按钮展示不同的页面
$("#button_rap").click(function(){
	$('#inner_wrap1').css('display','block');
	$('#inner_wrap2').css('display','none');
	$('#inner_wrap3').css('display','none');
	$('#button_rap').css({'color':'#fff','background':'#51a47a'});
	$('#button_own').css({'color':'#000','background':'#fff'});
	$('#button_free').css({'color':'#000','background':'#fff'});
});
$("#button_own").click(function(){
	$('#inner_wrap1').css('display','none');
	$('#inner_wrap2').css('display','block');
	$('#inner_wrap3').css('display','none');
	$('#button_rap').css({'color':'#000','background':'#fff'});
	$('#button_own').css({'color':'#fff','background':'#51a47a'});
	$('#button_free').css({'color':'#000','background':'#fff'});
});
$("#button_free").click(function(){
	$('#inner_wrap1').css('display','none');
	$('#inner_wrap2').css('display','none');
	$('#inner_wrap3').css('display','block');
	$('#button_rap').css({'color':'#000','background':'#fff'});
	$('#button_own').css({'color':'#000','background':'#fff'});
	$('#button_free').css({'color':'#fff','background':'#51a47a'});
});

function rap_check(){
	rap_rule_editor.sync();
	rap_start_editor.sync();

	var value_name = $('#rap_title_content').val();
	var value_rule = $('#rap_rule_content').val();
	var value_content = $('#rap_start_content').val();

	if(value_name==''||value_rule==''||value_content==''){
		alert('信息未填完整');
		return false;
	}

	if(value_name.length>20){
		alert('文章名长度请小于20个字符');
		return false;
	}

	if(value_rule.length>500){
		alert('规则请小于500个字符');
		return false;
	}

	if(value_content.length>2500){
		alert('文章一楼请小于2500个字符');
		return false;
	}

	return true;
}

function one_check(){
	one_rule_editor.sync();
	one_start_editor.sync();

	var value_name = $('#one_title_content').val();
	var value_rule = $('#one_rule_content').val();
	var value_content = $('#one_start_content').val();

	if(value_name==''||value_rule==''||value_content==''){
		alert('信息未填完整');
		return false;
	}

	if(value_name.length>20){
		alert('文章名长度请小于20个字符');
		return false;
	}

	if(value_rule.length>500){
		alert('规则请小于500个字符');
		return false;
	}

	if(value_content.length>2500){
		alert('文章一楼请小于2500个字符');
		return false;
	}

	return true;
}

function free_check(){
	free_start_editor.sync();

	var value_name = $('#free_title_content').val();
	var value_content = $('#free_start_content').val();

	if(value_name==''||value_content==''){
		alert('信息未填完整');
		return false;
	}

	if(value_name.length>20){
		alert('文章名长度请小于20个字符');
		return false;
	}

	if(value_content.length>2500){
		alert('文章一楼请小于2500个字符');
		return false;
	}

	return true;
}

