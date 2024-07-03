// Swiper Initialization
const swiper = new Swiper(".swiper", {
    direction: "horizontal",
    loop: true,
    // spaceBetween: 10,
    autoHeight: false,
    speed: 1300,
    initialSlide: 0,
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },
    autoplay: {
        delay: 20000, // Set your desired delay (5000ms = 5 seconds)
        disableOnInteraction: false,
        waitForTransition: true,
        reverseDirection: false,
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

$(document).ready(function () {
    // console.log("Doctors: ", doctors);
    // console.log("Polis: ", polis);

    let currentPoliIndex = 0;
    let displayedDoctors = {};
    let lastPoliIndex = null; // To keep track of the last displayed poli

    // Initialize displayedDoctors to keep track of which doctors have been shown for each poli
    polis.forEach((poli) => {
        displayedDoctors[poli.id] = [];
    });

    function updateDoctorProfile(poliIndex) {
        // const currentPoli = polis[poliIndex];
        // const doctorsInPoli = doctors.filter(
        //     (doctor) => doctor.idPoli === currentPoli.id
        // );
        let doctorsToShow = [];
        let attempts = 0;

        while (doctorsToShow.length === 0 && attempts < polis.length) {
            const currentPoli = polis[poliIndex];
            const doctorsInPoli = doctors.filter(
                (doctor) => doctor.idPoli === currentPoli.id
            );

            // If no doctors in the current poli, skip to the next poli
            if (doctorsInPoli.length === 0) {
                poliIndex = (poliIndex + 1) % polis.length;
                attempts++;
                continue;
            }

            // Get doctors who haven't been displayed yet
            for (let i = 0; i < doctorsInPoli.length; i++) {
                const doctor = doctorsInPoli[i];
                if (!displayedDoctors[currentPoli.id].includes(doctor.id)) {
                    doctorsToShow.push(doctor);
                    displayedDoctors[currentPoli.id].push(doctor.id);
                    if (doctorsToShow.length >= 4) break;
                }
            }

            // If there are less than 4 doctors, wrap around and display from the beginning again
            if (doctorsToShow.length < 4) {
                for (let i = 0; i < doctorsInPoli.length; i++) {
                    const doctor = doctorsInPoli[i];
                    if (!doctorsToShow.includes(doctor)) {
                        doctorsToShow.push(doctor);
                        displayedDoctors[currentPoli.id].push(doctor.id);
                        if (doctorsToShow.length >= 4) break;
                    }
                }
            }

            // Reset tracking if all doctors have been displayed
            if (
                displayedDoctors[currentPoli.id].length >= doctorsInPoli.length
            ) {
                displayedDoctors[currentPoli.id] = [];
            }

            if (doctorsToShow.length === 0) {
                poliIndex = (poliIndex + 1) % polis.length;
                attempts++;
            } else {
                break; // Exit loop if we have doctors to show
            }
        }

        // Skip poli if it has no doctors
        if (doctorsToShow.length === 0) {
            // console.log(`No dokter in this poli ${currentPoli.poli}`);
            return;
        }

        // console.log("Current Poli: ", polis[poliIndex]);
        // console.log("Doctors to Show: ", doctorsToShow);

        const profileContainer = document.querySelector("#slide-doctor .grid");
        profileContainer.innerHTML = ""; // Clear the container

        doctorsToShow.forEach((doctor, i) => {
            const image_url = doctor.image
                ? `${assetPath}/${doctor.image}`
                : "https://st3.depositphotos.com/6672868/13701/v/450/depositphotos_137014128-stock-illustration-user-profile-icon.jpg";

            const profileHtml = `
            <div class="text-center mx-auto flex flex-col items-center" id="doctor-profile-${i}">
                    <img class="h-96 w-96 rounded mx-auto object-cover" id="doctor-img-${i}" src="${image_url}" alt="${
                doctor.nama
            }">
                    <h2 class="text-3xl font-bold text-white mt-2" id="doctor-name-${i}">${
                doctor.nama
            }</h2>
                    <p class="text-3xl text-white mt-2" id="doctor-poliklinik-${i}">${
                polis[poliIndex].poli
            }</p>
                <div class="text-md text-white mt-2 text-left" id="doctor-jadwal-${i}">
                    ${doctor.jadwals
                        .map(
                            (jadwal) =>
                                `<p class="">${jadwal.hari}: ${jadwal.waktu}</p>`
                        )
                        .join("")}
                </div>
            </div>
            `;
            profileContainer.innerHTML += profileHtml;

            // Sort schedules
            const jadwalElement = document.querySelector(
                `#doctor-profile-${i} #doctor-jadwal-${i}`
            );
            sortSchedules($(jadwalElement));
        });

        // Center the profiles if less than 4
        profileContainer.style.display = "grid";
        profileContainer.style.gridTemplateColumns =
            "repeat(auto-fit, minmax(300px, 1fr))";
        profileContainer.style.gap = "2rem"; // Adjust the gap as needed

        lastPoliIndex = poliIndex; // Update lastPoliIndex
    }

    function sortSchedules(scheduleCell) {
        const dayOrder = {
            Senin: 1,
            Selasa: 2,
            Rabu: 3,
            Kamis: 4,
            Jumat: 5,
            Sabtu: 6,
            Minggu: 7,
        };

        const schedules = scheduleCell.find("p").get();
        schedules.sort(function (a, b) {
            const dayA = $(a).text().trim().split(":")[0];
            const dayB = $(b).text().trim().split(":")[0];
            return dayOrder[dayA] - dayOrder[dayB];
        });
        scheduleCell.empty();
        $.each(schedules, function (index, schedule) {
            scheduleCell.append(schedule);
        });
    }

    swiper.on("slideChange", function () {
        if (swiper.realIndex === 2 && swiper.previousIndex !== 0) {
            do {
                currentPoliIndex = (currentPoliIndex + 1) % polis.length;
            } while (currentPoliIndex === lastPoliIndex);
            updateDoctorProfile(currentPoliIndex);
        }
    });

    // Initialize with the first department
    updateDoctorProfile(currentPoliIndex);
});
