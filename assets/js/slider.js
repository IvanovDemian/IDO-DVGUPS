const swiper = new Swiper(".banner", {
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 8000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

let partnersObj;
if (window.innerWidth < 1400) {
  partnersObj = {
    slidesPerView: 4,
    slidesPerGroup: 4,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
  };
}
if (window.innerWidth < 900) {
  partnersObj = {
    slidesPerView: 2,
    slidesPerGroup: 2,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
  };
} else {
  partnersObj = {
    slidesPerView: 6,
    spaceBetween: 50,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  };
}
const homeSwiperPartners = new Swiper("#partners-slider", partnersObj);

const footerSliderProgress = document.querySelector(".footer.desktop-hidden .swiper .autoplay-progress svg");
const progressContent = document.querySelector(".footer.desktop-hidden .swiper .autoplay-progress span");
const footerSlider = new Swiper(".footer-slider", {
  loop: true,
  autoplay: {
    delay: 7000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  }
});

const timetableSwiper = new Swiper(".timetable-swiper", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    renderBullet: function (index, className) {
      return '<span class="' + className + '">' + (index + 1) + "</span>";
    },
  },
});

const statisticsSwiper = new Swiper(".statistics-swiper", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

const historySwiper = new Swiper(".history-swiper", {
  slidesPerView: 2,
  slidesPerGroup: 2,
  spaceBetween: 16,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  }
});

const postSwiperThumbs = new Swiper(".post-thumbs-slider", {
  // loop: true,
  slidesPerView: 4,
  spaceBetween: 10,
  freeMode: true,
  watchSlidesProgress: true,
});
const postSwiperMain = new Swiper(".post-main-slider", {
  // slidesPerView: 1,
  loop: true,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: postSwiperThumbs,
  },
});