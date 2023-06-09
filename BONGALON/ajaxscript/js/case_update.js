
$(document).on('submit',"#assign_lawyer_Form",function(e){
    e.preventDefault();
   
    var formData = new FormData(this);
    formData.append("update_case",true);
    $.ajax({ 
      type:"POST",url:"./ajaxscript/case_actionclass.php",data:formData,
      processData:false,contentType:false,
    
      success:function(response)
      {
          var result = jQuery.parseJSON(response); 
         
          if(result.status == 200)
          {
         
           $('#assign_lawyer_Modal').modal('hide');
           $('#assign_lawyer_Form')[0].reset();
  
              alertify.set('notifier','positions','top-right'); 
              alertify.success(result.message); 
  
            //  $('#userList').load(location.href+ " #userList");;
             
            } 
          loadContent('case'); 
         // abortController.abort();
       $(document).off('submit', '#assign_lawyer_Form');
      } 
  
  
    });
  //  xhr.abort(); 
  }); 

// ASSIGN STATUS IN CASE
  $(document).on('submit',"#update_case_status_Form",function(e){
    e.preventDefault();
   
    var formData = new FormData(this);
    formData.append("update_case_status",true);
    $.ajax({ 
      type:"POST",url:"./ajaxscript/case_status_update.php",data:formData,
      processData:false,contentType:false,
    
      success:function(response)
      {
          var result = jQuery.parseJSON(response); 
         
          if(result.status == 200)
          {
         
           $('#case_update_Modal').modal('hide');
           $('#update_case_status_Form')[0].reset();
  
              alertify.set('notifier','positions','top-right'); 
              alertify.success(result.message); 
  
            //  $('#userList').load(location.href+ " #userList");;
             
            } 
          loadContent('task_progress'); 
         // abortController.abort();
       $(document).off('submit', "#update_case_status_Form");
      } 
  
  
    });
  //  xhr.abort(); 
  });