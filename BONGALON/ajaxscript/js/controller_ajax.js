    
   // SAVING TO DATABASE//
    $('#saveClientBtn').on('click', function(e) {
        e.preventDefault();
    
        var formData = new FormData($('#saveuserForm')[0]);
        formData.append("save_user", true);
    
        $.ajax({
            type: "POST",
            url: "./ajaxscript/user_actionclass_ajax.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = jQuery.parseJSON(response);
    
                if (res.status == 422) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.set('notifier', 'delay', 3);
                    alertify.success(res.message);
                } else if (res.status == 200) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.set('notifier', 'delay', 1);
                    alertify.success(res.message);
    
                
                    $('#addIndividual').modal('hide');
                    $('#saveuserForm')[0].reset();
    
                    loadContent('client');
                }
            }
        });
    })
       // SAVING TO DATABASE//

      // DELETE TO DATABASE// 
$(document).on('click','#delete_user',function(e){
       e.preventDefault();
       var btnValue = $(this).val();
       Swal.fire({
        title: 'Are you sure to delete this user?',
        icon: 'warning', 
        width:'500px' ,  
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      
      
     }).then((result) => {
        if (result['isConfirmed']){

            $.ajax({
                type:"POST", 
                url:"./ajaxscript/user_actionclass_ajax.php",
                data:{'delete_user': true,'user_id':btnValue},

                success: function(response)
                {
                    var result = jQuery.parseJSON(response); 
                    if(result.status == 500)
                    {
                        Swal.fire(result.message);
                    }else
                    {
                        alertify.set('notifier','positions','top-right'); 
                        alertify.success(result.message); 
                        loadContent('client');
                    }
                }
            });
        }
  });
}); 


// VIEW USER 



        

   


   
