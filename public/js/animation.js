document.addEventListener("DOMContentLoaded", function () {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("custom-show");
            } else if (entry.isIntersecting) {
                entry.target.classList.add("custom-show-slide");
            } else {
                entry.target.classList.remove("custom-show");
            }
        });
    });

    const hiddenElements = document.querySelectorAll(".custom-hidden");
    const slide = document.querySelectorAll(".custom-hidden-slide");
    hiddenElements.forEach((el) => {
        observer.observe(el);
    });
    slide.forEach((el) => {
        observer.observe(el);
    });
});

// document.getElementById("logo-link").addEventListener("click", function (e) {
//     e.preventDefault();
//     document.getElementById("top").scrollIntoView({ behavior: "smooth" });
// });
