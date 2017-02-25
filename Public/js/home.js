$(window).ready()
{

    var experience_item = document.getElementById('experience_item');
    var experience_add;
    var experience_present = parseInt(experience_item.getAttribute('value'));
    function experience_change(experience_add)
    {
       experience_item.setAttribute('value',experience_present + experience_add);
    }
    experience_change(40);
}