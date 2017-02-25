window.onload = function()
{   
   
	var set_array = document.getElementById('all_set').getElementsByTagName('li');
	var set_box = document.getElementById('for_obtain_div').getElementsByTagName('div');
	var set_number = set_array.length;
	var box_number = set_box.length;
	var i = 0;

	for(;i<set_number;i++)
	{
		set_array[i].index = i;
		set_array[i].onclick = function()
		{
			for(var j = 0;j < box_number;j++)
			{
				set_array[j].className = 'none';
				set_box[j].className = 'hide_box';
			}
            this.className = 'this_set';
            set_box[this.index].className = '';
		}
	}
	
}