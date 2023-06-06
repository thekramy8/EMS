
//SAVE LEGAL ENTITY
$(document).on('click','#save_legal_btn',function(e){
    e.preventDefault();
    
    //INSTANCIATE THR FORM FOR DATA COLLECTION 
    //CALL THE ID OF FORM  ZERO PARAMETER TO VOID DUPLICATION SUBMIT

    var formData =  new FormData($('#save_entity_Form')[0]);
    formData.append('save_legal_information',true);

    //CALL THE AJAX IMPLEMENTATIO FOR ASYNCHRONOUS 

    $.ajax({ 
        type:"POST",
        url:"./ajaxscript/legalentity_actionclass.php",
        data: formData,
        processData: false,
        contentType: false,

        success:function(response){
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
                }else if(result.status == 423){
                
                alertify.set('notifier', 'position', 'top-right');
                alertify.set('notifier', 'delay', 1); 
                alertify.success(result.message)
            }
            else if(result.status == 400)
            {
                alertify.set('notifier', 'position', 'top-right');
                alertify.set('notifier', 'delay', 1); 
                alertify.success(result.message);

                $('#addEntityModal').modal('hide');
                $('#add_entity_form')[0].reset();
              
               //loadContent('entitylist');
                //$('#userList').DataTable().ajax.reload();
            }
        }
    }); 
});