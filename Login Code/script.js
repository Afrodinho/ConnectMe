const menu_btn = document.querySelector('.dropdown');
const mobile_menu = document.querySelector('.mobile-dropdown');
const menu_bg = document.querySelector('.faded_bg');
/* const popups = document.getElementsByClassName('.mobile-dropdown');*/


menu_btn.addEventListener('click', function(){
    menu_btn.classList.toggle('is-active');
    mobile_menu.classList.toggle('is-active');
});

/* 

click out of popup function



window.addEventListener('click', ({target}) =>{
    
    const popup = target.closest('.popup');
    const clickedOnClosedPopup = .popup && !popup.classList.contains('show');
    
   popups.forEach(p => p.classList.remove('show'));

if(clickedOnClosedPopup) popup.classList.add('show');
    
});



*/