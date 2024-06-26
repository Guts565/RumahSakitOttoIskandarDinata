$(document).ready(function () {
    // Map days of the week to numerical values
    const dayOrder = {
        Senin: 1,
        Selasa: 2,
        Rabu: 3,
        Kamis: 4,
        Jumat: 5,
        Sabtu: 6,
        Minggu: 7,
    };

    // Function to sort schedules within each doctor's schedule cell
    function sortSchedules() {
        $("#dokterTable tbody tr").each(function () {
            const scheduleCell = $(this).find("td:eq(1)");
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
        });
    }

    // Call the sorting function before initializing DataTable
    sortSchedules();

    // DataTable Initialization
    $("#dokterTable").DataTable({
        columnDefs: [
            {
                targets: "no-sort",
                orderable: false,
            },
        ],
        pageLength: 4,
        lengthMenu: [4, 10, 25, 50],
        language: {
            sProcessing: "Sedang memproses...",
            sLengthMenu: "Tampilkan _MENU_ entri",
            sZeroRecords: "Tidak ditemukan data yang sesuai",
            sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
            sSearch: "Cari:",
            oPaginate: {
                sFirst: "Pertama",
                sPrevious: "Sebelumnya",
                sNext: "Berikutnya",
                sLast: "Terakhir",
            },
        },
    });

    // Delete Modal Functionality
    $(document).on("click", ".delete-button", function () {
        var dokterId = $(this).data("id");
        $("#deleteForm").attr("action", "/admin/" + dokterId);
        $("#confirmDeleteModal").modal("show");
    });

    // $("#deleteForm").submit(function (event) {
    //     event.preventDefault(); // Prevent default form submission

    //     var dokterId = $(this).data("id");
    //     var deleteUrl = $(this).attr("action");

    //     // Lakukan permintaan DELETE dengan AJAX
    //     $.ajax({
    //         url: deleteUrl,
    //         type: "DELETE",
    //         data: { _token: "{{ csrf_token() }}" },
    //         success: function (response) {
    //             // Handle success response
    //             console.log("Data berhasil dihapus!");
    //             // Lakukan tindakan setelah penghapusan
    //         },
    //         error: function (xhr, status, error) {
    //             // Handle error response
    //             console.error("Gagal menghapus data:", error);
    //         },
    //     });
    // });

    $("#cancelDeleteButton").click(function () {
        $("#confirmDeleteModal").addClass("hidden");
    });

    // Check for selected doctors
    if (typeof selecteddokter !== "undefined" && selecteddokter.length > 0) {
        $("#confirmDeleteModal").removeClass("hidden");
        $("#confirmDeleteModal").on(
            "click",
            "#confirmDeleteButton",
            function () {
                $.ajax({
                    url: "/dokter/deleteSelected",
                    type: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        dokter_ids: selecteddokter,
                    },
                    success: function (response) {
                        location.reload();
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    },
                });
            }
        );
    }
});
