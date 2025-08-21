// Initialize Swiper for Used technologies slider
const swiperUsedTech = new Swiper(".swiper-used-tech", {
  loop: true,
  spaceBetween: 10,
  pagination: false,
  navigation: false,
  autoplay: {
    delay: 0, // délai en millisecondes entre les diapositives
    disableOnInteraction: false, // le slider ne s'arrête pas si l'utilisateur interagit avec
  },
  // Rendre le passage plus "doux" (smooth)
  speed: 1500, // vitesse de transition en millisecondes
  breakpoints: {
    340: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
  },
});

// Initialize Swiper for CLient testimonials Slider
const swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 1.5,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 1.5,
      spaceBetween: 20,
    },
  },
});

// Word Transition Effect
document.addEventListener("DOMContentLoaded", () => {
  const roles = [
    "design and develop websites and apps.",
    "build your complete digital presence.",
  ];
  const roleElement = document.getElementById("role");
  let roleIndex = 0;
  let letterIndex = 0;
  let typingInterval;

  function typeRole() {
    roleElement.style.opacity = 0;
    setTimeout(() => {
      roleElement.textContent = "";
      letterIndex = 0;

      typingInterval = setInterval(() => {
        if (letterIndex < roles[roleIndex].length) {
          roleElement.textContent += roles[roleIndex].charAt(letterIndex);
          letterIndex++;
        } else {
          clearInterval(typingInterval);
          setTimeout(() => {
            roleIndex = (roleIndex + 1) % roles.length;
            typeRole();
          }, 1500);
        }
      }, 75);

      roleElement.style.opacity = 1;
    }, 400);
  }

  // start typing the first role
  typeRole();
});

// Project Filter
document.addEventListener("DOMContentLoaded", () => {
  const filterButtons = document.querySelectorAll(".project-list li");
  const projects = document.querySelectorAll(".project-box");

  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      filterButtons.forEach((btn) => btn.classList.remove("active"));
      button.classList.add("active");

      const filter = button.getAttribute("data-filter");

      projects.forEach((project) => {
        if (
          filter == "all" ||
          project.getAttribute("data-category") === filter
        ) {
          project.style.display = "block";
        } else {
          project.style.display = "none";
        }
      });
    });
  });
});

// Menu auto active links
document.addEventListener("DOMContentLoaded", () => {
  const section = document.querySelectorAll("section");
  const navLinks = document.querySelectorAll("ul li a");
  function setActiveLink() {
    let currentSection = "";

    section.forEach((section) => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;

      if (window.scrollY >= sectionTop - sectionHeight / 3) {
        currentSection = section.getAttribute("id");
      }
    });

    navLinks.forEach((link) => {
      link.classList.remove("active");
      if (link.getAttribute("href") === `#${currentSection}`) {
        link.classList.add("active");
      }
    });
  }
  window.addEventListener("scroll", setActiveLink);
});

// AOS Install
AOS.init();
