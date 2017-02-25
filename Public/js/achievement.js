window.onload = function()
{
   var li_array = document.getElementById('select_box').getElementsByTagName('li');
   for(var i = 0;i < li_array.length;i++)
   {
       li_array[i].onclick = function()
       {
           for (var j = 0;j<li_array.length;j++) 
           {
               li_array[j].style.borderBottom = 'none';
           }
           this.style.borderBottom = '2px solid #51a47a';
       }
   }
}