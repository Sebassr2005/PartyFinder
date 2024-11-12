const singinbtnlink = document.querySelector('.singinbtn-link');
const singupbtnlink = document.querySelector('.singupbtn-link');
const wrapper = document.querySelector('.wrapper');

singupbtnlink.addEventListener('click', () => { 
    wrapper.classList.toggle('active'); 
});

singinbtnlink.addEventListener('click', () => { 
    wrapper.classList.toggle('active'); 
});

const menuBtn = document.querySelector('.mobile-menu-btn');
const nav = document.querySelector('nav');

menuBtn.addEventListener('click', () => {
    nav.classList.toggle('active');
});
