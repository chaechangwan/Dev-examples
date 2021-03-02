var item = document.querySelectorAll('.item');
var cnt = 0
function activeFunc(){
    item[cnt].classList.add('active');
    cnt++;
    if(cnt >= item.length){
        clearInterval(addActive);
    }
}

var addActive = setInterval(activeFunc, 130);