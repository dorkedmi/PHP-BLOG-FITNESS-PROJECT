$(document).ready(function() {
    
        var post_id = $("#post_id").val();
        request = $.ajax({
             url: "/php/fitness/classes/GetPosts.controller.php",
             type: "POST",
             data: {post_id: post_id},
             datatype: 'json'
          })
        request.done(function(response){
           var obj = JSON.parse(response);
            $("#post_title").html(obj[0].title);
            $("#trainer_name").html('Author: <b>'+obj[0].trainer_first_name+' '+obj[0].trainer_last_name+'</b>');
            $("#post_subject").html('| Subject: <b>'+obj[0].subject+'<b> |');
            $("#post_date").html('<b>'+obj[0].time+'</b>');
            $("#post_data").html(obj[0].post_data);
            loadComments(post_id);
        });

});
function onSubmit( form ){
        var data = JSON.stringify( $(form).serializeArray() ); //  <-----------
        data = JSON.parse(data)
    request = $.ajax({
             url: "/php/fitness/classes/AddComment.controller.php",
             type: "POST",
             data: data,
             datatype: 'json'
          })
        request.done(function(response){
            var post_id = $("#post_id").val();
                     loadComments(post_id);
                
        });
        return false; //don't submit
    }

function loadComments( post_id ){
    request = $.ajax({
             url: "/php/fitness/classes/LoadComments.controller.php",
             type: "POST",
             data: {post_id: post_id},
             datatype: 'json'
          })
        request.done(function(response){
            var user_id = $("#user_id").val();
            $("#commentArea").html("");
                var obj = JSON.parse(response);
            $.each(obj, function(i, item){
                if(user_id == 3)
                   {
                   $("#commentArea").append('<div class="col-sm-2"></div><div class="col-sm-8"><div class="panel panel-white post panel-shadow"><div class="post-heading"><div class="pull-left image"><img src="data:image/jpeg;base64,'+obj[i].user_profile_picture+'" class="img-circle avatar" alt="user profile image"></div><div class="pull-left meta"><div class="title h5"><a><b>'+obj[i].user_first_name+' '+obj[i].user_last_name+' </b></a>made a post.</div><h6 class="text-muted time">At: '+obj[i].time+'</h6></div></div><div class="post-description"><p>'+obj[i].comment_data+'</p><button type="button" class="btn btn-default col-md-2" onclick="delComment('+obj[i].comment_id+')">delete</button></div></div></div><div class="col-sm-2" style="width:100%;"></div>');
                   }
                else if(user_id == obj[i].user_id){
                        $("#commentArea").append('<div class="col-sm-2"></div><div class="col-sm-8"><div class="panel panel-white post panel-shadow"><div class="post-heading"><div class="pull-left image"><img src="data:image/jpeg;base64,'+obj[i].user_profile_picture+'" class="img-circle avatar" alt="user profile image"></div><div class="pull-left meta"><div class="title h5"><a><b>'+obj[i].user_first_name+' '+obj[i].user_last_name+' </b></a>made a post.</div><h6 class="text-muted time">At: '+obj[i].time+'</h6></div></div><div class="post-description"><p>'+obj[i].comment_data+'</p><button type="button" class="btn btn-default col-md-2" onclick="delComment('+obj[i].comment_id+')">delete</button></div></div></div><div class="col-sm-2" style="width:100%;"></div>');
                        }
                    else{
                        $("#commentArea").append('<div class="col-sm-2"></div><div class="col-sm-8"><div class="panel panel-white post panel-shadow"><div class="post-heading"><div class="pull-left image"><img src="data:image/jpeg;base64,'+obj[i].user_profile_picture+'" class="img-circle avatar" alt="user profile image"></div><div class="pull-left meta"><div class="title h5"><a><b>'+obj[i].user_first_name+' '+obj[i].user_last_name+' </b></a>made a post.</div><h6 class="text-muted time">At: '+obj[i].time+'</h6></div></div><div class="post-description"><p>'+obj[i].comment_data+'</p></div></div></div><div class="col-sm-2" style="width:100%;"></div>');
                    }
               
                
            });
        });
    }
function delComment( comment_id ){
    request = $.ajax({
             url: "/php/fitness/classes/DelComment.controller.php",
             type: "POST",
             data: {comment_id: comment_id},
             datatype: 'json'
          })
        request.done(function(response){
                     var post_id = $("#post_id").val();
                     loadComments(post_id);
                
        });
        return false; //don't submit
    }

