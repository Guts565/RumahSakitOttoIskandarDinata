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
        pageLength: 10,
        lengthMenu: [10, 25, 50],
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

    $("#cancelDeleteButton").click(function () {
        $("#confirmDeleteModal").addClass("hidden");
    });
});
