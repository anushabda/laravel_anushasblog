       
    function cloneComment(index,newID,detail,post_id){
        var replieslength= detail.replies.length;
        var replystring="";
        if(replieslength!=0){
        for(var i=replieslength-1;i>=0;i--){
             replystring+=`<div class="media mb-4">
                       <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                       
                            <div class="media-body" >
                                <h5 class="mt-0">
                               ${ detail.replies[i].username}
                           </h5>
                                ${ detail.replies[i].replytext}
                           </div>
                        </div>`;
        }
    }
        return `
            <div id="${newID}">
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                        <h5 class="mt-0">
                            ${detail.username}
                        </h5>
                        <span></span>
                        ${detail.comment}
                        <div>
                </div>
                <button type="button" id="replybtn${detail.comment_id}" class="replybtn">Replies </button>
                    <div class="replydiv" id="replydiv${detail.comment_id}" style="display:none">
                    <form class="repform" id="${detail.comment_id}">
                       <input type="hidden" name="post_id" value = "${post_id}" />
                        <input  type="hidden" name="comment_id" value="${detail.comment_id}" />

                        <textarea class="form-control" rows="3" id="replytext${detail.comment_id}" name="replytext"></textarea>

                        <button id="replysubmit${detail.comment_id}" class="replysubmit" type="submit">Submit</button>
                        </form>
                     
                       <div id="appendreply${detail.comment_id}"></div>
                       ${replystring}
                        </div><!--end of reply section-->
                       
            </div>
        `
    }

    // --------------------Toggle the Reply Section----------------------------------------------
    function replyToggler(){

            $('.replybtn').click(function(){
                var idhh=$(this).attr('id');
                var idd =idhh.substring(8);
                $('#replydiv'+idd).toggle();
            
            });
        }
    
     //-----------------------Sumit the Reply to the comment-----------------------------------
     
        function replySubmitter(replyurl,frmID,form_data){   
                                  
            jQuery.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                },
            });

            jQuery.ajax({
                // url: " {{ route('comment.reply')}}",
                url: replyurl,
                method: 'post',
                enctype: 'form-data',
                data:
                {
                // "token":"{{csrf_token()}}",
                    form_data:form_data,
                },
                success : function(result){
                            console.log(result);
                            //alert(result.success);
                            //var data= {'success':result.success,'frmID':frmID};
                           //return data;
                           $('#appendreply'+frmID).prepend(`<div class="media mb-4">
                           <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                           <div class="media-body" >
                               <h5 class="mt-0">
                              ${result.username}
                          </h5>
                          ${ result.reply}
                          </div>
                       </div>`)
                           $('#'+frmID).trigger('reset');
                            //commentUpdate();
                        },
                error   :function(xhr,status,error){
                            var statusCode = xhr.status;
                            var errors = JSON.parse(xhr.responseText);
                            
                            switch(statusCode){
                            case 400: {
                               var errormsgs= errors.errormsgs.replytext;
                               alert(errormsgs);                            
                            break;    }
                            case 401: {
                                alert(errors.errormsgs);
                                break;
                                      }
                            }//end switch
                        },  //end error
                    });
             
    }


