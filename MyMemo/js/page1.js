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
            console.log(resp);
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
                img1.onclick = function(){ //addEventListener로 오류
                    changeCheck(element.memo_idx);
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
            });
            
        }
    }              
}

function changeCheck(memo_idx){
    console.log(memo_idx);
}