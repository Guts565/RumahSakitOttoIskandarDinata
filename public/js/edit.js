const btnTambahJadwal = document.getElementById("btnTambahJadwal");
const formJadwalBaru = document.getElementById("formJadwalBaru");

btnTambahJadwal.addEventListener("click", function () {
    formJadwalBaru.style.display = "block";
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
