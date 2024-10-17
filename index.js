document.addEventListener("DOMContentLoaded", () => {
  // Initialize elements
  const aboutSection = document.getElementById("right-about");
  const toTopButton = document.querySelector("#toTop");
  const scrollArrow = document.querySelector(".Scrollarrow");
  const welcomePage = document.querySelector("#welcomepage");

  const loginButton = document.getElementById("btn1");
  const aboutUsButton = document.querySelector(".about");
  const overlay = document.querySelector(".overlay");
  const form = document.querySelector(".form");
  const closeBtn = document.querySelector("#closeBtn");

  // Show about section on load
  aboutSection?.classList.add("unfold");

  // Scroll to about page
  aboutUsButton?.addEventListener("click", () => {
    const aboutPage = document.getElementById("about-page");
    if (aboutPage) {
      aboutPage.scrollIntoView({ behavior: "smooth" });
    } else {
      console.error("Element with id 'about-page' not found.");
    }
  });

  // Handle scroll arrow functionality
  if (scrollArrow) {
    scrollArrow.addEventListener("click", () => {
      document
        .getElementById("main-page")
        ?.scrollIntoView({ behavior: "smooth" });
    });

    scrollArrow.addEventListener("mouseover", () => {
      welcomePage.style.backgroundColor = "#333333";
      welcomePage.style.color = "white";
    });

    scrollArrow.addEventListener("mouseout", () => {
      welcomePage.style.backgroundColor = "#add8e6";
      welcomePage.style.color = "black";
    });
  }

  // Login functionality
  loginButton?.addEventListener("click", () => {
    console.log("Login button clicked");
    overlay?.classList.remove("hidden"); // Show overlay
    form?.classList.remove("hidden"); // Show login form
  });

  // Close form functionality
  const hideForm = () => {
    overlay?.classList.add("hidden"); // Hide overlay
    form?.classList.add("hidden"); // Hide login form
  };

  closeBtn?.addEventListener("click", hideForm);

  // Close form when overlay is clicked
  overlay?.addEventListener("click", hideForm);

  // Scroll to top functionality
  toTopButton?.addEventListener("click", () => {
    welcomePage.scrollIntoView({ behavior: "smooth" });
  });

  // Show or hide the "toTop" button based on scroll position
  window.addEventListener("scroll", () => {
    toTopButton.style.display = window.scrollY > 100 ? "block" : "none"; // Show or hide the button
  });
});
