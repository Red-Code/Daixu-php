window.onload = function () {
    var li_array = document.getElementById('ul_list').getElementsByTagName('li');//得到ul_list的所有li标签

    function clear() {
        for(var i=0;i<6;i++){
            li_array[i].className = '';
        }
    }

    for(var j=0;j<6;j++){

        li_array[j].index = j;

        li_array[j].onclick = function () {

            for(var i=0;i<6;i++){
                li_array[i].className = '';
            }
        }

    }

}