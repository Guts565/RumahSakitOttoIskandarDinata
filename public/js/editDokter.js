document.addEventListener("DOMContentLoaded", function () {
    const imageInput = document.getElementById("image");
    const imagePreview = document.getElementById("imagePreview");
    const cropperModal = document.getElementById("cropperModal");
    const cropperImage = document.getElementById("cropperImage");
    const cropButton = document.getElementById("cropButton");
    const closeButton = document.getElementById("closeButton");
    const btnTambahJadwal = document.getElementById("btnTambahJadwal");
    const formContainer = document.getElementById("formContainer");
    const formTemplate = document.getElementById("formTemplate");
    const confirmDeleteBtn = document.getElementById("confirmDeleteBtn");
    const baseUrl = confirmDeleteBtn.getAttribute("data-url");
    let cropper;
    let format;
    let jadwalIdToDelete = null;

    // Image Input Change Event Listener
    imageInput.addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            format = file.type;

            reader.onload = function (e) {
                cropperImage.src = e.target.result;
                cropperModal.style.display = "block";

                cropper = new Cropper(cropperImage, {
                    aspectRatio: 1,
                    viewMode: 1,
                    autoCropArea: 1,
                });
            };

            reader.readAsDataURL(file);
        }
    });

    // Crop Button Event Listener
    cropButton.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent form submission

        const canvas = cropper.getCroppedCanvas({
            width: 2000,
            height: 2000,
            imageSmoothingQuality: "high", // High quality
        });

        canvas.toBlob(function (blob) {
            const url = URL.createObjectURL(blob);
            imagePreview.src = url;

            const formData = new FormData();
            formData.append("image", blob);

            // Simpan blob ke input file
            const file = new File([blob], `profile.${format.split("/")[1]}`, {
                type: format,
            });
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            imageInput.files = dataTransfer.files;

            cropper.destroy();
            cropperModal.style.display = "none";
        }, format);
    });

    // Close Button Event Listener
    closeButton.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent form submission
        cropper.destroy();
        cropperModal.style.display = "none";
    });

    // Tambah Jadwal Button Event Listener
    if (formTemplate) {
        btnTambahJadwal.addEventListener("click", function () {
            const newForm = formTemplate.content.cloneNode(true);
            formContainer.appendChild(newForm);
        });
    } else {
        console.error("Element with ID 'formTemplate' not found.");
    }

    // Confirm Delete Button Event Listener
    confirmDeleteBtn.addEventListener("click", function () {
        if (jadwalIdToDelete !== null) {
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");
            fetch(`${baseUrl}/${jadwalIdToDelete}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        document
                            .getElementById(`jadwal-${jadwalIdToDelete}`)
                            .remove();
                    } else {
                        alert("Gagal menghapus jadwal");
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan");
                });
        }
    });
});
