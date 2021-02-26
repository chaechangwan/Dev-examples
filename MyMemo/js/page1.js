let httpRequest = 0;
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
            resp.forEach(function(element, idx, array){
                const li = document.createElement('li');
                li.innerHTML = element.memo_content;
                ul.appendChild(li);
            });
            console.log(resp);
        }
    }              
}