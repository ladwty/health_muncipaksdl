document.addEventListener('DOMContentLoaded', function () {
  // Carousel
  new Swiper('.carousel-selection', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 10,
    speed: 800,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
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

  // FAQ
  document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
      const faq = button.parentElement;
      faq.classList.toggle('open');
    });
  });

  // Event Calendar
  const calendarEl = document.getElementById('calendar');

  if (!calendarEl) {
    console.error('Calendar container not found.');
    return;
  }

  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    height: 'auto',
    events: [
      {
        title: 'Maternity Check Up',
        start: '2025-06-11',
        description: 'Free Maternity check up'
      },
      {
        title: 'Free Vaccination',
        start: '2025-06-28',
        description: 'City-wide vaccination drive'
      },
      {
        title: 'Maternity Check Up',
        start: '2025-07-09',
        description: 'Free Maternity check up'
      },
      {
        title: 'Health Talk',
        start: '2025-07-05',
        description: 'Seminar on preventive care'
      },
      {
        title: 'Free Vaccination',
        start: '2025-07-23',
        description: 'City-wide vaccination drive'
      },
    ],
    eventClick: function(info) {
      alert(info.event.title + '\n' + (info.event.extendedProps.description || ''));
    }
  });

  calendar.render();
});
