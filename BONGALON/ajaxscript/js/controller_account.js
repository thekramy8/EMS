$('#submit_entity').on('click',function(e){
    e.preventDefault();
    console.log('ss');
    var formData =  new FormData($('#add_entity_form')[0]); 
    formData.append('save_client',true); 
   // var serializedData = new URLSearchParams(formData).toString();
    
    $.ajax({
        type:'POST',url:"./ajaxscript/account_actionclass.php",data:formData,
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
              
                loadContent('userlist');
                $('#userList').DataTable().ajax.reload();
            }
         $(document).off('submit', '#add_entity_form'); 
        }
    })
}); 

//VIEW DATA IN MODAL 

$(document).on('click','#view_user_entity',function(e){
   
    var view_entity_user = $(this).val();
   // console.log(user_id);

    $.ajax({

        type:'GET',url:'./ajaxscript/account_actionclass.php?view_entity='+view_entity_user,
        success:function(response)
        { 
            var result = jQuery.parseJSON(response);
            if(result.status == 404)
            {
                Swal.Fire(result.message);
            }else if(result.status == 200)
            { 
                $('#view_entity_modal').html("Name: <span class='name'>" + result.data.user_fullname+
                "</span><br>"
                +"Email: <span class='name'>" + result.data.user_email +"</span><br>"
                +"Role: <span class='name'>" + result.data.user_role+"</span><br>"
                ) 

                $('#view_userModal').modal('show');
            }
        }

    });

}); 

