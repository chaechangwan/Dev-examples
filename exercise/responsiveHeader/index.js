const dropbtn = document.querySelector('#toggle-btn');
const toggleValue = document.querySelector('#toggle-value');
dropbtn.addEventListener('click', () => {
    toggleValue.value === 'open' ? menuClose() : menuOpen();
})

function menuClose(){
        const menu = document.querySelector('.menu');
        const sns = document.querySelector('.sns');
        menu.classList.add('hidden');
        sns.classList.add('hidden');
        toggleValue.value = 'close';
}

function menuOpen(){
    const menu = document.querySelector('.menu');
    const sns = document.querySelector('.sns');
    menu.classList.remove('hidden');
    sns.classList.remove('hidden');
    toggleValue.value = 'open';
}