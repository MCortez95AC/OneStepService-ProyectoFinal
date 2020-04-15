$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
        "paging": true,
        "lengthMenu": [[3,5,8,10,-1],[3,5,8,10,"All"]],
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": true,
    });
});