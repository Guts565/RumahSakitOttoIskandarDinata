document.addEventListener("DOMContentLoaded", function () {
    const imageInput = document.getElementById("image");
    const imagePreview = document.getElementById("imagePreview");
    const cropperModal = document.getElementById("cropperModal");
    const cropperImage = document.getElementById("cropperImage");
    const cropButton = document.getElementById("cropButton");
    const closeButton = document.getElementById("closeButton");
    let cropper;
    let format;

    imageInput.addEventListener("change", function (event) {
        const file = event.target.files[0];
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
    });

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

    // Close button event listener
    closeButton.addEventListener("click", function () {
        event.preventDefault(); // Prevent form submission
        cropper.destroy();
        cropperModal.style.display = "none";
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const btnTambahJadwal = document.getElementById("btnTambahJadwal");
    const formJadwalBaru = document.getElementById("formJadwalBaru");

    btnTambahJadwal.addEventListener("click", function () {
        formJadwalBaru.style.display = "block";
    });
});

let jadwalIdToDelete = null;

function setJadwalId(id) {
    jadwalIdToDelete = id;
}

document
    .getElementById("confirmDeleteBtn")
    .addEventListener("click", function () {
        if (jadwalIdToDelete !== null) {
            fetch(`{{ url('/admin/jadwal') }}/${jadwalIdToDelete}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
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

document.getElementById("image").addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document
                .getElementById("imagePreview")
                .setAttribute("src", e.target.result);
        };
        reader.readAsDataURL(file);
    }
});
