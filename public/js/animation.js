document.addEventListener("DOMContentLoaded", function () {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            // console.log(entry.target); // Log the element being observed
            if (entry.isIntersecting) {
                // console.log("Element is intersecting:", entry.target); // Log when the element becomes visible
                entry.target.classList.add("custom-show");
            } else if (entry.isIntersecting) {
                // console.log("Element is intersecting:", entry.target); // Log when the element becomes visible
                entry.target.classList.add("custom-show-slide");
            } else {
                // console.log("Element is not intersecting:", entry.target); // Log when the element becomes invisible
                entry.target.classList.remove("custom-show");
            }
        });
    });

    const hiddenElements = document.querySelectorAll(".custom-hidden");
    const slide = document.querySelectorAll(".custom-hidden-slide");
    hiddenElements.forEach((el) => {
        // console.log("Observing element:", el); // Log the elements being observed
        observer.observe(el);
    });
    slide.forEach((el) => {
        // console.log("Observing element:", el); // Log the elements being observed
        observer.observe(el);
    });
});

document.getElementById("logo-link").addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("top").scrollIntoView({ behavior: "smooth" });
});
