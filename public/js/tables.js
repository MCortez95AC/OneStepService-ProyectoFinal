$(function () {
    $('#products').DataTable({
        "paging": true,
        "lengthMenu": [[3,5,8,10,-1],[3,5,8,10,"All"]],
        "searching": true,
        "ordering": true,
        "info": false,
        /* "autoWidth": true, */
    });
});

$(function () {
    $('#targetPersonal').DataTable({
        "paging": true,
        "lengthMenu": [[5,10,-1],[5,10,"All"]],
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": true,
    });
});
