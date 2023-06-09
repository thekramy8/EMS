$(document).on('submit',"#updateClientForm",function(e){
    e.preventDefault();
   
    var formData = new FormData(this);
    formData.append("update_user",true);
    $.ajax({ 
      type:"POST",url:"./ajaxscript/update.php",data:formData,
      processData:false,contentType:false,
    
      success:function(response)
      {
          var result = jQuery.parseJSON(response); 
          if(result.status == 422)
          {
              $('#errorMessage').removeClass('d-none');   
              $('#errorMessage').text(result.message);
          }
          else if(result.status == 200)
          {
           $('#errorMessage').removeClass('d-none'); 
           
           $('#editIndividual').modal('hide');
           $('#updateClientForm')[0].reset();

              alertify.set('notifier','positions','top-right'); 
              alertify.success(result.message); 
              $('#clientList').load(location.href+ " #clientList");;
              $("#editindividual").modal("hide"); 
              console.log(result.message);
          } 
          loadContent('client'); 
         // abortController.abort();
       $(document).off('submit', '#updateClientForm');
      } 


    });
  //  xhr.abort(); 
}); 

 
/// UPDATE USER ACCOUNT LIST   

$(document).on('submit',"#update_user_entity_form",function(e){
  e.preventDefault();
 
  var formData = new FormData(this);
  formData.append("update_account",true);
  $.ajax({ 
    type:"POST",url:"./ajaxscript/update.php",data:formData,
    processData:false,contentType:false,
  
    success:function(response)
    {
        var result = jQuery.parseJSON(response); 
        if(result.status == 422)
        {
          alertify.set('notifier','positions','top-right'); 
          alertify.success(result.message); 
        }
        else if(result.status == 200)
        {
       
         $('#editAccountModal').modal('hide');
         $('#update_user_entity_form')[0].reset();
          
            alertify.set('notifier', 'delay', 1);
            alertify.set('notifier','positions','top-right'); 
            alertify.success(result.message); 

            $('#userList').load(location.href+ " #userList");;
           
          } 
        loadContent('userlist'); 
       // abortController.abort();
     $(document).off('submit', '#update_user_entity_form');
    } 
  });
//  xhr.abort(); 
});  


// $(document).on('submit',"#update_entity_Form",function(e){
//   e.preventDefault();
 
//   var formData = new FormData(this);
//   formData.append("legal_update_user",true);
//   $.ajax({ 
//     type:"POST",url:"./ajaxscript/update.php",data:formData,
//     processData:false,contentType:false,
  
//     success:function(response)
//     {
//         var result = jQuery.parseJSON(response); 
//         if(result.status == 500)
//         {
//           alertify.set('notifier','positions','top-right'); 
//           alertify.success(result.message); 
//         }
//         else if(result.status == 200)
//         {
   
         
//          $('#editentityUserModal').modal('hide');
//          $('#update_entity_Form')[0].reset();

//             alertify.set('notifier','positions','top-right'); 
//             alertify.success(result.message); 
//           //   $('#clientList').load(location.href+ " #clientList");;
//           //   $("#editindividual").modal("hide"); 
         
//         } 
//         loadContent('entitylist'); 
//        // abortController.abort();
//      $(document).off('submit', '#update_entity_Form');
//     } 


//   });
// //  xhr.abort(); 
// }); 




