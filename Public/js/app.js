window.onload = function () {
            var container = document.getElementById('container');
            var list = document.getElementById('list');
            var prev = document.getElementById('prev');
            var next = document.getElementById('next');
            var index = 1;
            var len = 5;
            var animated = false;
            var interval = 3000;
            var timer;
            

            function animate (offset) {
                if (offset == 0) {
                    return;
                }
                animated = true;
                var time = 300;
                var inteval = 10;
                var speed = offset/(time/inteval);
                var top = parseInt(list.style.top) + offset;

                var go = function (){
                    if ( (speed > 0 && parseInt(list.style.top) < top) || (speed < 0 && parseInt(list.style.top) > top)) {
                        list.style.top = parseInt(list.style.top) + speed + 'px';
                        setTimeout(go, inteval);
                    }
                    else {
                        list.style.top = top + 'px';
                        if(top>0){
                           list.style.top = '-4000px'; 
                        }
                        if(top<-4000) {
                            list.style.top = '0px';
                        }
                        animated = false;
                    }
                }
                go();
            }


            function play() {
                timer = setTimeout(function () {
                    next.onclick();
                    play();
                }, interval);
            }
            function stop() {
                clearTimeout(timer);
            }

            next.onclick = function () {
                
                if (animated) {
                    return;
                }
                if (index == 5) {
                    index = 1;
                }
                else {
                    index += 1;
                }
                animate(-1000);
            }
            prev.onclick = function () {

                if (animated) {
                    return;
                }
                if (index == 1) {
                    index = 5;
                }
                else {
                    index -= 1;
                }
                animate(1000);
            }
            play();

}