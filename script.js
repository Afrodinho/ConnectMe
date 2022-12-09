const menu_btn = document.querySelector('.dropdown');
const mobile_menu = document.querySelector('.mobile-dropdown');
const menu_bg = document.querySelector('.faded_bg');
/* const popups = document.getElementsByClassName('.mobile-dropdown');*/


menu_btn.addEventListener('click', function(){
    menu_btn.classList.toggle('is-active');
    mobile_menu.classList.toggle('is-active');
});
   

//
//const card = document.querySelector(".container");
//
//card.addEventListener("movement", cardMovement);
//
//function cardMovement(event){
//    const cardWidth = card.offsetWidth;
//    const cardHeight = card.offsetHeight;
//    const centerX = card.offsetLeft + cardWidth/2;
//    const centerY = card.offsetTop + cardHeight/2;
//    const mouseX = event.clientX - centerX;
//    const mouseY = event.clientY - centerY;
//    const rotateX = 25*mouseY/(cardHeight/2);
//    const rotateY = 25*mouseX/(cardWidth/2);
//    
//    card.style.transform = 'rotateX($(rotateX)deg) rotateY($(rotateY)deg)';
//}

/* 

click out of popup function



window.addEventListener('click', ({target}) =>{
    
    const popup = target.closest('.popup');
    const clickedOnClosedPopup = .popup && !popup.classList.contains('show');
    
   popups.forEach(p => p.classList.remove('show'));

if(clickedOnClosedPopup) popup.classList.add('show');
    
});



*/