$('#submit_entity').on('click',function(e){
    e.preventDefault();
    console.log('ss');
    var formData =  new FormData($('#add_entity_form')[0]); 
    formData.append('save_client',true); 
    var serializedData = new URLSearchParams(formData).toString();
    
    $.ajax({
        type:'POST',url:"./ajaxscript/client_actionclass.php",data:serializedData,
        processData:false,contentType:false,
        success:function(response)
        { 
            var result = jQuery.parseJSON(response);
            if(result.status == 404)
            {
                alertify.set('notifier', 'position', 'top-right');
                alertify.set('notifier', 'delay', 1); 
                alertify.success(result.message);
            }else if(result.status == 500)
            {
                alertify.set('notifier', 'position', 'top-right');
                alertify.set('notifier', 'delay', 1); 
                alertify.success(result.message);
            }else if(result.status == 400)
            {
                alertify.set('notifier', 'position', 'top-right');
                alertify.set('notifier', 'delay', 1); 
                alertify.success(result.message);
                $('#addEntityModal').modal('hide');
                $('#add_entity_form')[0].reset();

                
                //loadContent('userlist');
            }
            //$(document).off('submit', '#add_entity_form'); 
        }
    })
});
 