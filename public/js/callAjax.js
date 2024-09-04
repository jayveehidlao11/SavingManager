function callAJAX(params,usebbox = true){
   
    set_csrf_token();
    
    $.ajax({
        url:params.url,
        type:params.type,
        data:params.data,
        success:function(data){
            params.returnValue(data);
            
            
            if(usebbox){
                bootboxOption(params.bbType,params.bbmsg,data.message)
            }
          
            
        }
    })
    
}

function bootboxOption(bbType,bboxmessage='',successMessage=''){
   
    switch(bbType){
        case "confirm":
            bootbox.confirm({
                message:bboxmessage,
                callback: function(result) { 
                    /* result is a boolean; true = OK, false = Cancel*/
                    if(result){
                        bootbox.alert(successMessage)
                    }
                }
                });

          break;
        case "alert":
            bootbox.alert(successMessage);
        break;
        default:
            bootbox.alert(successMessage);
    }
}
function set_csrf_token(){
      // Get the CSRF token from the meta tag
      var csrfToken = $('meta[name="csrf-token"]').attr('content');

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': csrfToken
          }
      });
}