let account = document.querySelector('.user-acc');

document.querySelector('#user-btn').onclick = () =>{
   account.classList.add('active');
}

document.querySelector('#close').onclick = () =>{
   account.classList.remove('active');
}


window.onscroll = () =>{
   navbar.classList.remove('active');
   myOrders.classList.remove('active');
   cart.classList.remove('active');
};

let slides = document.querySelectorAll('.home-bg .home .slide-container .slide');
let index = 0;

function next(){
   slides[index].classList.remove('active');
   index = (index + 1) % slides.length;
   slides[index].classList.add('active');
}

function prev(){
   slides[index].classList.remove('active');
   index = (index - 1 + slides.length) % slides.length;
   slides[index].classList.add('active');
}

let accordion = document.querySelectorAll('.faq .accordion-container .accordion');

accordion.forEach(acco =>{
   acco.onclick = () =>{
      accordion.forEach(remove => remove.classList.remove('active'));
      acco.classList.add('active');
   }
});