$("select[name=isAdmin]").change(function(e){
    e.preventDefault();
    const value = $('select[name=isAdmin]').val();
    
    if (value === 'Yes') {
        $('#adminTrue:hidden').show();
        $('#username').removeAttr("disabled");
        $('#password').removeAttr("disabled");
        $('#password-confirm').removeAttr("disabled");
    }else {
        $('#adminTrue').hide();
        $('#username').attr("disabled","true").val('');
        $('#password').attr("disabled","true").val('');
        $('#password-confirm').attr("disabled","true").val('');
    }
    
});
