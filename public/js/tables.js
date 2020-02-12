$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
        "paging": true,
        "lengthMenu": [[5,10,25,50,-1],[5,10,25,50,"All"]],
        "searching": true,
        "ordering": false,
        "info": false,
        "autoWidth": true,
    });
});