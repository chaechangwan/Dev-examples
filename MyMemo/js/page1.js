let httpRequest = 0;
////////////////////////
window.onload = function(){
    search();
}
////////////////////////
function search(){
    const val = document.getElementById('search').children[1].value
    httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = getContent;
    httpRequest.open('POST', 'list_ok.php', true);
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send('key='+val);           
}
function getContent(){
    if(httpRequest.readyState == XMLHttpRequest.DONE){
        if(httpRequest.status == 200){
            const resp = JSON.parse(httpRequest.responseText);
            const ul = document.getElementById('section').firstElementChild;
            while(ul.hasChildNodes()){
                ul.removeChild(ul.firstChild);
            } 
            //console.log(resp);
            resp.forEach(function(element, idx, array){
                const li = document.createElement('li');
                const ul_dropdown = document.createElement('ul');
                const li_dropdown1 = document.createElement('li');
                const li_dropdown2 = document.createElement('li');
                const div1 = document.createElement('div');
                const div1_2 = document.createElement('div');
                const div2 = document.createElement('div');
                const a1 = document.createElement('a');
                const a2 = document.createElement('a');
                const img1 = document.createElement('img');
                const img2 = document.createElement('img');
                if(element.memo_check == "y"){
                    img1.setAttribute('src', './photo/brokenheart.png');                    
                }else{
                    img1.setAttribute('src','./photo/heart.png');
                }
                const memo_idx = element.memo_idx; //memo_idx는 언제 소멸하는 것일까, 블록의 범위는 어디까지일까(for문 한번돌때마다 블록인가 아니면 for문 전체가 한블록인가)
                img1.onclick = function(){ //addEventListener로 오류
                    changeCheck(memo_idx);
                }
                img2.setAttribute('src','./photo/trash.png');
                a1.appendChild(img1);
                a2.appendChild(img2);
                li_dropdown1.appendChild(a1);
                li_dropdown2.appendChild(a2);
                ul_dropdown.appendChild(li_dropdown1);
                ul_dropdown.appendChild(li_dropdown2);
                ul_dropdown.classList.add('dropdown');
                if(element.memo_check == "y"){
                    const div1_1 = document.createElement('img');
                    div1_1.setAttribute('src', './photo/heart.png');
                    div1.appendChild(div1_1);
                }
                const time = element.memo_regdate.substring(0, 16);
                div1_2.innerHTML = time;
                div1.appendChild(div1_2);

                li.appendChild(div1);
                div2.innerHTML = element.memo_content;
                li.appendChild(div2);
                li.appendChild(ul_dropdown);
                ul.appendChild(li);

                loadTopList();
            });
            
        }
    }              
}

function changeCheck(memo_idx){
    //console.log(memo_idx);
    httpRequest.onreadystatechange = function(){
        if(httpRequest.readyState == XMLHttpRequest.DONE){
            if(httpRequest.status == 200){
                search();
            }else{
                alert('Ajax통신에 문제발생.');
            }
        }
    }
    httpRequest.open('GET', './changeCheck_ok.php?memo_idx=' + memo_idx, true);
    httpRequest.send();
}

function loadTopList(){
    httpRequest.onreadystatechange = function(){
        if(httpRequest.readyState == XMLHttpRequest.DONE){
            if(httpRequest.status == 200){
                const res = JSON.parse(httpRequest.responseText);
                //console.log(res);
                const ul = document.querySelector('#toplist ul');
                while(ul.hasChildNodes()){
                    ul.removeChild(ul.firstChild);
                }
                res.forEach(function(element, idx, array){
                    const li = document.createElement('li');
                    li.innerHTML = element.memo_content;
                    ul.appendChild(li);
                    
                })
            }else{
                alert('AJAX통신에 문제발생');
            }
        }
    }
    httpRequest.open('GET','loadTopList_ok.php' ,true);
    httpRequest.send()
}