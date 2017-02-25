window.onload = function()
{

	var first_row_lis = document.getElementById('first_row').getElementsByTagName('li');
	var second_row_lis = document.getElementById('second_row').getElementsByTagName('li');
	var third_row_lis = document.getElementById('third_row').getElementsByTagName('li');
	var prise = document.getElementById('prise');

    change(first_row_lis);
    change(second_row_lis);
    change(third_row_lis);
    
    prise.onclick = function()
    {
       
    }

	function change(variable)
	{
       for(var i = 0;i < variable.length;i++)
	  	{
	       variable[i].onclick = function()
	       {
	          for(var j = 0;j < variable.length;j++)
	          {
	             variable[j].className = 'none';
	          }
	          this.className = 'this_page';
	       }
	    }
	}
}

$(document).ready(function() {
	//1为恐怖悬疑，2为都市言情，3为玄幻，4为古风，5为其他
	switch (static_article_classify){
		case '1':
			$('#classify_classify_fear').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
		case '2':
			$('#classify_classify_modern').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
		case '3':
			$('#classify_classify_fantasy').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
		case '4':
			$('#classify_classify_history').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
		case '5':
			$('#classify_classify_other').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
		default :
			$('#classify_classify_all').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
	}

	//1为个人创作，2为抢接续写，3为自由续写，4为精品
	switch (static_article_mode){
		case '1':
			$('#classify_mode_one').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
		case '2':
			$('#classify_mode_rap').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
		case '3':
			$('#classify_mode_free').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
		case '4':
			$('#classify_mode_fine').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
		default :
			$('#classify_mode_all').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
	}

	//1为最新，2为最热
	switch (static_article_order){
		case '1':
			$('#classify_order_new').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
		case '2':
			$('#classify_order_total').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
		default :
			$('#classify_order_new').css({
				'border': '1px solid #51A47B',
				'color': '#51A47B'
			});
			break;
	}
});