window.onload = function(){

    // var achieve_box=document.getElementById("rank_inf_box_achieve");
    // var story_box=document.getElementById("rank_inf_box_story");
    // var achieve=document.getElementById("charts_left");
    // var story=document.getElementById("charts_right");

    var achievement = document.getElementById("chengjiu"); 
    var heat = document.getElementById("redu");
    var selection_ps = document.getElementById("selection").getElementsByTagName("p");

    for(var i=0;i<3;i++){
        selection_ps[i].index = i;
        selection_ps[i].onclick = function(){
            for(var j=0;j<3;j++){
                selection_ps[j].style.border="1px solid #fff";
                selection_ps[j].style.color="#000";
            }
            selection_ps[this.index].style.border="1px solid #53A47B";
            selection_ps[this.index].style.color="#53A47B";
        }
    }

    function click_story(){

        var achieve_box=document.getElementById("rank_inf_box_achieve");
        var story_box=document.getElementById("rank_inf_box_story");
        var achieve=document.getElementById("charts_left");
        var story=document.getElementById("charts_right");
        story_box.style.display="block";
        achieve_box.style.display="none";
        document.getElementById("charts_right").style.backgroundColor="#FFFFFF";
        document.getElementById("charts_left").style.backgroundColor="#C5C5C5";

    }
    function click_achieve(){

        var achieve_box=document.getElementById("rank_inf_box_achieve");
        var story_box=document.getElementById("rank_inf_box_story");
        var achieve=document.getElementById("charts_left");
        var story=document.getElementById("charts_right");
        story_box.style.display="none";
        achieve_box.style.display="block";
        story.style.backgroundColor="#C5C5C5";
        achieve.style.backgroundColor="#FFFFFF";
    }

    achievement.onclick = click_achieve;
    heat.onclick = click_story;

}