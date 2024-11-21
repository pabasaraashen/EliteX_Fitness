let searchForm =document.querySelector('.search-form');

document.querySelector('#search-btn').onclick=()=>{
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
}

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick=()=>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
}

let loginForm =document.querySelector('.login-form');

document.querySelector('#login-btn').onclick=()=>{
    loginForm.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
}





window.onscroll = () =>{
    searchForm.classList.remove('active');
    navbar.classList.remove('active');
};

window.onscroll = () =>{
    menu.classList.remove('active');
    navbar.classList.remove('active');
};



var swiper = new Swiper(".home-slider", {
    spaceBetween: 30,
    effect: "fade",
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });


  var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    grabCursor:true,
    loop:true,
    autoplay:{
      delay: 7500,
      disableOnInteraction:false,
    },
    breakpoints:{
      0:{
        slidesPerView:1,
      },
      600:{
        slidesPerView:2,
      }
    }
      
   
  });