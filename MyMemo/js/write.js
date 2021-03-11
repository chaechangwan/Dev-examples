document.querySelector('.save').addEventListener('click', openModal);
document.querySelector('.md_X').addEventListener('click', closeModal);
function openModal(){
    document.querySelector('.modal').classList.remove('hidden');
}
function closeModal(){
    document.querySelector('.modal').classList.add('hidden');
}