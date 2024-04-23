const singinbtnlink = document.querySelector('.singinbtn-link');
const singupbtnlink = document.querySelector('.singupbtn-link');
const wrapper = document.querySelector('.wrapper');

singupbtnlink.addEventListener('click', () => { 
    wrapper.classList.toggle('active'); 
});

singinbtnlink.addEventListener('click', () => { 
    wrapper.classList.toggle('active'); 
});