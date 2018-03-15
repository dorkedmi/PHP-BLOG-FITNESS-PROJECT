$(document).ready(function() {
    $('.schedule li a').click(function(){
        var day = $(this).html();
        request = $.ajax({
             url: "classes/schedule.controller.php",
             type: "POST",
             data: {day: day},
             datatype: 'json'
          })
        request.done(function(response){
          $("#scheduler").html("");
            var obj = JSON.parse(response);
            $.each(obj, function(i, item){
               $("#scheduler").append('<div class="col-md-3 col-sm-6"><div class="program program-schedule"><img src="images/'+obj[i].class_name+'.svg"><small>'+obj[i].hour+'</small><h3>'+obj[i].class_name+'</h3><span>'+obj[i].trainer_name+'</span></div></div>'); 
            });
        });
    });
       //ajax for calander for first time loading 
    var day = "sunday";
        request = $.ajax({
             url: "classes/schedule.controller.php",
             type: "POST",
             data: {day: day},
             datatype: 'json'
          })
        request.done(function(response){
          $("#scheduler").html("");
            var obj = JSON.parse(response);
            $.each(obj, function(i, item){
               $("#scheduler").append('<div class="col-md-3 col-sm-6"><div class="program program-schedule"><img src="images/'+obj[i].class_name+'.svg"><small>'+obj[i].hour+'</small><h3>'+obj[i].class_name+'</h3><span>'+obj[i].trainer_name+'</span></div></div>'); 
            });
        });
    //ajax for trainers
    request = $.ajax({
             url: "classes/trainer.controller.php",
             type: "POST",
             datatype: 'json'
          })
        request.done(function(response){
          $("#test").html("");
            var obj = JSON.parse(response);
            $.each(obj, function(i, item){
               $("#test").append('<div class="col-md-4 col-sm-6"><div class="team-section-grid" style="background-image: url(data:image/jpeg;base64,'+obj[i].profile_picture+');"><div class="overlay-section"><div class="desc"><h3>'+obj[i].first_name+" "+obj[i].last_name+'</h3><span>'+obj[i].plan_leader+'</span><p>'+obj[i].quotes+'</p><p class="fh5co-social-icons"><a href="'+obj[i].email+'"><i class="icon-email"></i></a></p></div></div></div></div>');
                    
            });
        });
    
    request = $.ajax({
             url: "classes/GetPosts.controller.php",
             type: "POST",
             datatype: 'json'
          })
        request.done(function(response){
            var obj = JSON.parse(response);
            $.each(obj, function(i, item){
                var date = obj[i].time;
                date = date.split(/ |:|-/);
               $("#blog-section").append('<div class="col-md-6 col-md-offset-0"><div class="fh5co-blog"><div class="meta-date text-center"><p><span class="date">'+date[2]+'</span><span>'+date[1]+'</span><span>'+date[0]+'</span></p></div><div class="desc desc2"><h3><a href=""#>'+obj[i].title+'<br>'+obj[i].subject+'</a></h3><span class="posted_by">Posted by: '+obj[i].trainer_first_name+' '+obj[i].trainer_last_name+'</span></i></a></span><p>'+obj[i].post_data+'</p><a href="views/post.php?id='+obj[i].post_id+'" class="btn btn-default">Read More</a></div></div></div>');
                
                
            });
        });
});

function onSubmit( form ){
        var data = JSON.stringify( $(form).serializeArray() ); //  <-----------
        data = JSON.parse(data)
    request = $.ajax({
             url: "classes/PricingPlan.controller.php",
             type: "POST",
             data: data,
             datatype: 'json'
          })
        request.done(function(response){
            if(response == "unable to execute")
                {
                    $(".modal-body").html('<div class="panel panel-default"><div class="panel-heading"><h3 class="panel-title">Already paid</h3></div></div>');
                }
            else{
                $(".modal-body").html('<div class="panel panel-default"><div class="panel-heading"><h3 class="panel-title">'+response+'</h3></div></div>');
            }
        });
        return false; //don't submit
    }

function onSave( form ){
        var data = JSON.stringify( $(form).serializeArray() ); //  <-----------
        data = JSON.parse(data)
    request = $.ajax({
             url: "classes/EditUserDetails.controller.php",
             type: "POST",
             data: data,
             datatype: 'json'
          })
        request.done(function(response){
            loadProfile();
        });
        return false; //don't submit
    }

function loadProfile(){
    var $user = $("#Profile");
    var user_id = $user.attr("user_id")
    request = $.ajax({
             url: "classes/ShowUserDetails.controller.php",
             type: "POST",
             data: {user_id: user_id},
             datatype: 'json'
          })
        request.done(function(response){
            $(".fh5co-overlay").addClass("card");
             $("#firstSection").html("");
            var obj = JSON.parse(response);
            var form = '<div class="col-sm-6 col-md-6">';
            form += '<h2>edit profile</h2>';
            form += '<form role="form" onsubmit="return onSave(this)">';
            form += '<div class="form-group">';
            form += '<label for="firstName">First name</label>';
            form += '<input type="text" class="form-control" id="first Name" name="first_name" value="'+obj[0].first_name+'">';
            form += '<input type="hidden" class="form-control" id="firstName" name="id" value="'+obj[0].user_id+'">';
            form += '</div>';
            //first name
            form += '<div class="form-group">';
            form += '<label for="lastName">Last name</label>';
            form += '<input type="text" class="form-control" id="last Name" name="last_name" value="'+obj[0].last_name+'">';
            form += '</div>';
            //last name
            form += '<div class="form-group">';
            form += '<label for="email">Email</label>';
            form += '<input type="email" class="form-control" id="email" name="email" value="'+obj[0].email+'">';
            form += '</div>';
            //email
            form += '<div class="form-group">';
            form += '<label for="gender">Gender</label>';
            form += '<input type="text" class="form-control" id="gender" name="gender" value="'+obj[0].gender+'">';
            form += '</div>';
            //submit
            form += '<button type="submit" class="btn btn-primary">Save Changes</button>';
            form += '</form>';
            form += '</div>';
            // profile picture
            form += '<div class="col-sm-4 col-md-4">';
            form += '<img src="data:image/jpeg;base64,'+obj[0].profile_picture+'" alt="" class="img-rounded img-responsive" />';
            form += '</div>';
            form += '<div class="col-sm-2 col-md-2">';
            form += '<blockquote>';
            form += '<h2>'+obj[0].first_name+' '+obj[0].last_name+'</h2>';
            form += '<p>';
            form += '</blockquote>';
            form += obj[0].email+'<br/>';
            if(obj[0].gender == "male")
                {
                    form += '<i class="fa fa-mars"></i> '+obj[0].gender+'<br/>';
                }
            else if(obj[0].gender == "female")
                {
                    form += '<i class="fa fa-venus"></i> '+obj[0].gender+'<br/>';
                }
            else{
                form += '<i class="fa fa-smile-o"></i> '+obj[0].gender+'<br/>';
                }
            form += '</p>';
            form += '</div>';
            
           
               $("#firstSection").html(form);

            });
    
}

$("#Profile").click(function(){
    loadProfile();
        });

$("#p_val1").click(function(){
    var $input = $( this );
    var price = $input.attr("price");
    $("#price").html('<i class="fa fa-ils">'+price+'');
});
$("#p_val2").click(function(){
    var $input = $( this );
    var price = $input.attr("price");
    $("#price").html('<i class="fa fa-ils">'+price+'');
});

$("#p_val3").click(function(){
    var $input = $( this );
    var price = $input.attr("price");
    $("#price").html('<i class="fa fa-ils"></span>'+price+'');
});

$("#p_val4").click(function(){
    var $input = $( this );
    var price = $input.attr("price");
    $("#price").html('<i class="fa fa-ils"></span>'+price+'');
});


