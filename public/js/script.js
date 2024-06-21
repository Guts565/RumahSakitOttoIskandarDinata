$(document).ready(function () {
    $('#dokterTable').DataTable({
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false
        }],
        "language": {
            "sProcessing": "Sedang memproses...",
            "sLengthMenu": "Tampilkan _MENU_ entri",
            "sZeroRecords": "Tidak ditemukan data yang sesuai",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix": "",
            "sSearch": "Cari:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Berikutnya",
                "sLast": "Terakhir"
            }
        }
    });

    $('.delete-button').click(function () {
        var dokterId = $(this).data('id');
        $('#deleteForm').attr('action', '/dokter/' + dokterId);
        $('#confirmDeleteModal').removeClass('hidden');
    });

    $('#cancelDeleteButton').click(function () {
        $('#confirmDeleteModal').addClass('hidden');
    });

    // Kondisi untuk mengecek apakah ada dokter yang dipilih
    if (typeof selecteddokter !== 'undefined' && selecteddokter.length > 0) {
        $('#confirmDeleteModal').removeClass('hidden');
        $('#confirmDeleteModal').on('click', '#confirmDeleteButton', function () {
            $.ajax({
                url: '/dokter/deleteSelected',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    dokter_ids: selecteddokter
                },
                success: function (response) {
                    location.reload();
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    }
});
