/* Carosel*/
new Swiper('.carousel-selection', {
  loop: true,


  slidesPerView: 1,
  spaceBetween: 10,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  breakpoints: {

    768: {
      slidesPerView: 2,
      spaceBetween: 15,
    },

    1024: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
  },
});

/* Faq*/
 document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
      const faq = button.parentElement;
      faq.classList.toggle('open');
    });
  });

 window.onload = function () {
    const modal = document.getElementById("privacy-modal");
    const agreeBtn = document.getElementById("agree-btn");
    const disagreeBtn = document.getElementById("disagree-btn");

    if (!localStorage.getItem("agreedToPrivacy")) {
      modal.style.display = "flex";
    }

    agreeBtn.onclick = function () {
      localStorage.setItem("agreedToPrivacy", "true");
      modal.style.display = "none";
    };

    disagreeBtn.onclick = function () {
      alert("You must agree to proceed.");
    };
  };
