//modal
document.querySelector('.save').addEventListener('click', openModal);
document.querySelector('.md_X').addEventListener('click', closeModal);
function openModal(){
    document.querySelector('.modal').classList.remove('hidden');
}
function closeModal(){
    document.querySelector('.modal').classList.add('hidden');
}

//submit
const check_no = document.getElementById('no');
const check_yes = document.getElementById('yes');
check_no.addEventListener('click', check_no_submit);
check_yes.addEventListener('click', check_yes_submit);

function check_no_submit(){
    const frm = document.frm;
    frm.submit();
}
function check_yes_submit(){
    const frm = document.frm;
    const check = document.querySelector('input[name="check"]');
    check.value = 'y';
    frm.submit();
}
