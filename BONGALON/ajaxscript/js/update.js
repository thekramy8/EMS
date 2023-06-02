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


/// UPDATE CLIENT LIST

 