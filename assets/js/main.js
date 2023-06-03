function getVideoThumb() {
  const videoSection = document.querySelector('section.videos');

  if (videoSection) {
    const videos = videoSection.querySelectorAll('.videos-card');
    videos.forEach((video) => {
      const url = video.href;
      let image = video.querySelector('.img');

      const pattern1 = 'https://www.youtube.com/watch?v='
      const pattern2 = 'https://youtube.com/watch?v='
      const pattern3 = 'https://www.youtu.be/'
      const pattern4 = 'https://youtu.be/'

      if (url.indexOf(pattern1) != -1 || url.indexOf(pattern2) != -1) {
        let valid = url.split('watch?v=')[1].substring(0, 11);
        let imageThumb = `https://img.youtube.com/vi/${valid}/hqdefault.jpg`;
        image.src = imageThumb;
      } else if (url.indexOf(pattern3) != -1 || url.indexOf(pattern4) != -1) {
        let valid = url.split('be/')[1].substring(0, 11);
        let imageThumb = `https://img.youtube.com/vi/${valid}/hqdefault.jpg`;
        image.src = imageThumb;
      } else {
        image = ''
      }
    })
  }
}

function accordion() {
  document.querySelectorAll('.accordion-header').forEach((accordionHeader) => {
    accordionHeader.addEventListener('click', () => {
      let accordionBody = accordionHeader.nextElementSibling;

      accordionHeader.classList.toggle('active');
      if (accordionHeader.classList.contains('active')) {
        accordionBody.style.maxHeight = `${accordionBody.scrollHeight}px`;
      } else {
        accordionBody.style.maxHeight = `0px`;
      }
    })
  })
}

function openHeaderMenu() {
  const header = document.querySelector('.header');
  const button = document.querySelector('.burger-menu');
  const menu = document.querySelector('.menu.desktop-hidden');

  if (window.innerWidth < 980) {
    button.addEventListener('click', () => {
      menu.classList.toggle('open-menu');
      button.classList.toggle('active-toggle');
      if (document.body.style.overflowY != 'hidden') {
        document.body.style.overflowY = "hidden";
      } else {
        document.body.style.overflowY = "scroll";
      }
    })
    // open - menu
    window.addEventListener('click', (e) => {
      if (!menu.contains(e.target) && !button.contains(e.target)) {
        menu.classList.remove('open-menu');
        button.classList.remove('active-toggle');
        // document.body.style.overflowY = "scroll";
      }
    })
  }
}

function hasAdminBar() {
  document.addEventListener("DOMContentLoaded", function (event) {
    if (document.querySelector('#wpadminbar')) {
      document.querySelector('.header').style.top = '32px';
      if (document.querySelector('.sidebar-filters')) {
        document.querySelector('.sidebar-filters').style.top = '32px';
      }
    }
  });
}

function fixedHeader() {
  const offset = 700
  const header1 = document.querySelector('.header')
  let lastScrollY = window.scrollY

  document.addEventListener('scroll', (e) => {
    console.log(window.scrollY);
    if (window.scrollY < lastScrollY && window.scrollY > 32) {
      header1.style.transform = `translateY(-32px)`;
    } else if (window.scrollY < lastScrollY && window.scrollY <= 32) {
      header1.style.transform = `translateY(0)`;
    } else {
      if (window.scrollY >= header1.offsetHeight) {
        header1.style.transform = `translateY(-112px)`;
      }
    }
    lastScrollY = window.scrollY
  })
}

function toggleActive(element) {
  element.classList.toggle('active');
}

function searchField() {
  const search = document.querySelector('.search');
  if (search) {
    const searchInput = search.querySelector('#order-search');
    const searchClear = search.querySelector('.clear');
    const searchLens = search.querySelector('.lens');

    // searchInput.addEventListener('focus', () => {
    //   searchClear.style.display = 'block';
    //   searchLens.style.display = 'none';
    // });

    // while (searchInput.value) {
    //   searchClear.addEventListener('click', () => {
    //     console.log('hehe');
    //     searchInput.value = '';
    //   })
    // }

    // searchInput.addEventListener('focusout', () => {
    //   searchClear.style.display = 'none';
    //   searchLens.style.display = 'block';
    // });

    searchInput.addEventListener('click', () => {
      console.log('input');
    });
    searchInput.addEventListener('input', () => {
      if (searchInput.value.length > 0) {
        searchClear.style.display = 'block';
        searchLens.style.display = 'none';
      } else {
        searchClear.style.display = 'none';
        searchLens.style.display = 'block';
      }
    });
    searchClear.addEventListener('click', () => {
      searchInput.value = '';
    });
    // searchLens.addEventListener('click', () => {
    //   console.log('lens');
    // });
  }
}

function showSidebarFilters(button) {
  button.classList.add('active');
  document.querySelector('.overlay').style.display = 'block';
  document.querySelector('.sidebar-filters').classList.add('active');
  if (document.body.style.overflowY != 'hidden') {
    document.body.style.overflowY = "hidden !important";
    // document.body.style.paddingRight = "20px";
  } else {
    document.body.style.overflowY = "scroll";
    // document.body.style.paddingRight = "0px";
  }
  let activeCategory = '';
  document.querySelectorAll('.filters .categories .category-button').forEach(element => {
    if (element.classList.contains('active-category')) {
      activeCategory = element.dataset.link;
    } else {
      document.querySelector('.sidebar-filters .subcategories-alert').style.display = 'block';
      document.querySelector('.sidebar-filters .subcategories-alert').innerHTML = 'Выберите категорию, чтобы увидеть подкатегории';
    }
  })
  document.querySelectorAll('.sidebar-filters .subcategories .filter-list').forEach(element => {
    if (element.dataset.category == activeCategory) {
      element.style.display = 'flex';
      if (element.querySelector('li')) {
        document.querySelector('.sidebar-filters .subcategories-alert').style.display = 'none';
      } else {
        document.querySelector('.sidebar-filters .subcategories-alert').style.display = 'block';
        document.querySelector('.sidebar-filters .subcategories-alert').innerHTML = 'У данной категории нет подкатегорий';
      }
    } else {
      element.style.display = 'none';
    }
  })
}

function closeSidebarFilters(button) {
  if (subcatArray.length === 0 && metaValue === '') {
    document.querySelector('#ad-filters').classList.remove('active');
  }
  document.querySelector('.overlay').style.display = 'none';
  document.querySelector('.sidebar-filters').classList.remove('active');
  document.body.style.overflowY = "scroll";
}

function showMore(button) {
  const section = button.parentNode;
  const cardName = button.dataset.card;
  const cardsArray = section.querySelectorAll('.' + cardName);
  cardsArray.forEach((e, index) => {
    if (index == 2 || index == 3) {
      e.style.display = 'flex';
      e.style.opacity = '1';
    }
  });
  button.style.display = 'none';
}

function parseHoursField() {
  const hoursFields = document.querySelectorAll('.hours-field');
  hoursFields.forEach(field => {
    const fieldValue = field.innerHTML.slice(-1);
    console.log(fieldValue);
    if (fieldValue == '0' || fieldValue == '5' || fieldValue == '6' || fieldValue == '7' || fieldValue == '8' || fieldValue == '9') {
      field.innerHTML = field.innerHTML + " часов";
    } else if (fieldValue == '2' || fieldValue == '3' || fieldValue == '4') {
      field.innerHTML = field.innerHTML + " часа";
    } else {
      field.innerHTML = field.innerHTML + " час";
    }
  })
}

function crmLoading() {
  const loader = document.querySelector('.crm-loader');
  const b24form = document.querySelector('.b24-form');
  if (loader) {
    if (!b24form) {
      loader.style.display = "block";
      const target = loader.parentElement;
      const config = {
        attributes: true,
        childList: true,
        subtree: true
      };
      const observerCallback = function (mutationsList, observer) {
        for (let mutation of mutationsList) {
          // Элемент добавлен на страницу
          loader.style.display = "none";
          observer.disconnect();
        }
      };
      const observer = new MutationObserver(observerCallback);
      observer.observe(target, config);
    } else {
      loader.style.display = "none";
    }
  }
}

function tabs() {
  const tabs = document.querySelector('.tabs');
  if (tabs) {
    const tabsContentYears = tabs.querySelectorAll('.tabs-content.years>.tabs-content__item');
    tabsContentYears[0].classList.add('active');
    const tabsNavItem = tabs.querySelector('.tabs-nav__item');
    tabsNavItem.classList.add('active');
    const tabsNavs = tabs.querySelectorAll('.tabs-nav');
    tabsNavs.forEach(tabsNav => {
      const tabsContentItems = tabsNav.nextElementSibling.querySelectorAll('.tabs-content__item');
      const tabsNavItems = tabsNav.querySelectorAll('.tabs-nav__item');
      tabsNavItems.forEach(tabsNavItem => {
        tabsNavItem.addEventListener('click', () => {
          tabsNavItems.forEach(element => {
            element.classList.remove('active');
          })
          tabsNavItem.classList.add('active');
          tabsContentItems.forEach(tabsContentItem => {
            if (tabsContentItem.dataset.tab == tabsNavItem.id) {
              tabsContentItems.forEach(element => {
                element.classList.remove('active');
              })
              tabsContentItem.classList.add('active');
            }
          })
        })
      })
    })
  }
}

function checkTimetable() {
  const section = document.querySelector('.timetable');
  if (!section) return;
  if (!section.querySelector('.timetable-card')) {
    section.style.display = "none";
  }
}

function checkCatalog() {
  const catalog = document.querySelector('#catalog');
  if (!catalog) return;
  const searchFailed = catalog.querySelector('.search-failed');
  if (!catalog.querySelector('.course-card')) {
    searchFailed.style.display = "flex";
  }
}

function inputHidden() {
  const wpcf7Form = document.querySelector('.wpcf7-form');
  if (!wpcf7Form) return;
  const button = wpcf7Form.querySelector('.wpcf7-form-control.wpcf7-submit');
  const crmRight = document.querySelector('.crm-right')
  let title = crmRight.dataset.title;
  let hours = crmRight.dataset.hours;
  let form = crmRight.dataset.form;
  if (title || hours || form) {
    wpcf7Form.querySelector('.hide-title').value = title;
    wpcf7Form.querySelector('.hide-hours').value = hours;
    wpcf7Form.querySelector('.hide-form').value = form;
  } else {
    return;
  }
  
}

getVideoThumb();
accordion();
// hasAdminBar();
fixedHeader();
openHeaderMenu();
searchField();
crmLoading();
tabs();
checkTimetable();
inputHidden();
// parseHoursField();