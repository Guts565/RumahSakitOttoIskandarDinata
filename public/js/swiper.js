// Swiper Initialization
const swiper = new Swiper(".swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    spaceBetween: 10,
    autoHeight: false,
    speed: 1200,
    lazyPreloadPrevNext: 0,
    // mousewheel: {
    //     invert: false,
    // },
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },
    autoplay: {
        delay: 5000, // Set your desired delay (5000ms = 5 seconds)
        disableOnInteraction: false,
        waitForTransition: true,
    },
    // If we need pagination
    pagination: {
        el: ".swiper-pagination",
        type: "bullets",
    },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    // And if we need scrollbar
    scrollbar: {
        el: ".swiper-scrollbar",
    },
});

// Update doctor profile function
let currentDoctorIndex = 0;
// const doctors = JSON.parse(document.getElementById("doctor-data").textContent);
const doctorsPerSlide = 4;

function updateDoctorProfile(startIndex) {
    for (let i = 0; i < doctorsPerSlide; i++) {
        const doctorIndex = (startIndex + i) % doctors.length;
        const doctor = doctors[doctorIndex];

        const profileElement = document.getElementById("doctor-profile-" + i);
        const imgElement = profileElement.querySelector("img");
        imgElement.src = doctor.image
            ? assetPath + "/" + doctor.image
            : "https://st3.depositphotos.com/6672868/13701/v/450/depositphotos_137014128-stock-illustration-user-profile-icon.jpg";
        imgElement.alt = doctor.nama;
        profileElement.querySelector("#doctor-name-" + i).innerText =
            doctor.nama;
        profileElement.querySelector("#doctor-poliklinik-" + i).innerText =
            doctor.poli.poli;

        const jadwalElement = profileElement.querySelector(
            "#doctor-jadwal-" + i
        );
        jadwalElement.innerHTML = ""; // Clear previous schedule

        doctor.jadwals.forEach((jadwal) => {
            const jadwalText = `${jadwal.hari} - ${jadwal.waktu}`;
            const p = document.createElement("p");
            p.innerText = jadwalText;
            jadwalElement.appendChild(p);
        });
    }
}

updateDoctorProfile(currentDoctorIndex);

swiper.on("slideChange", function () {
    if (swiper.realIndex === 0) {
        currentDoctorIndex =
            (currentDoctorIndex + doctorsPerSlide) % doctors.length;
        updateDoctorProfile(currentDoctorIndex);
    }
});