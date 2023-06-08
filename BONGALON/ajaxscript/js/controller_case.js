$('#save_case_btn').on('click', function(e) {
    e.preventDefault();

    var formData = new FormData($('#save_case_Form')[0]);
    formData.append("save_case", true);
    

    $.ajax({
        type: "POST",
        url: "./ajaxscript/case_actionclass.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 500) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.set('notifier', 'delay', 1); 
                alertify.success(res.message);
            } else if (res.status == 200) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.set('notifier', 'delay', 1);
                alertify.success(res.message);

                $('#addCaseModal').modal('hide');
                $('#save_case_Form')[0].reset();

                loadContent('case');
            } 
        }
    });
})