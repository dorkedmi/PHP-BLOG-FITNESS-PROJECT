$(document).ready(function() {
    loadUsers();
    loadTrainers();
    //ajax for users
    function loadUsers(){
    request = $.ajax({
             url: "/php/fitness/classes/dashUser.controller.php",
             type: "POST",
             datatype: 'json'
          })
        request.done(function(response){
          $("#test").html("");
            var obj = JSON.parse(response);
            var password = "e10adc3949ba59abbe56e057f20f883e";
            $.each(obj, function(i, item){
                if(password == obj[i].password_hash) //mini dycript for md5 for stupid password....
                    {
                        password = "123456";
                    }
                var table = '<tr>';
                table += '<td><input type="radio" name="id" value="'+obj[i].user_id+'"></td>';
                table += '<td>'+obj[i].first_name+'</td>';
                table += '<td>'+obj[i].last_name+'</td>';
                table += '<td>'+obj[i].email+'</td>';
                table += '<td>'+password+'</td>';
                table += '<td>'+obj[i].gender+'</td>'; 
                table += '<td>'+obj[i].plan_id+'</td>';   
                table += '<td><img src="data:image/jpeg;base64,'+obj[i].profile_picture+'" border=3 height=60 width=40></td>';
                                        	
                $("#usersTable").append(table);
            });
        });
    }
    //ajax for trainers
function loadTrainers(){
    request = $.ajax({
             url: "/php/fitness/classes/dashTrainer.controller.php",
             type: "POST",
             datatype: 'json'
          })
        request.done(function(response){
          $("#test").html("");
            var obj = JSON.parse(response);
            var password = "e10adc3949ba59abbe56e057f20f883e";
            $.each(obj, function(i, item){
                if(password == obj[i].password) //mini dycript for md5 for stupid password....
                    {
                        password = "123456";
                    }
                var table = '<tr>';
                table += '<td><input type="radio" name="id" value="'+obj[i].id+'" onclick="radioLoader(this.value)"></td>';
                table += '<td>'+obj[i].first_name+'</td>';
                table += '<td>'+obj[i].last_name+'</td>';
                table += '<td>'+obj[i].email+'</td>';
                table += '<td>'+password+'</td>';
                table += '<td>'+obj[i].gender+'</td>';  
                table += '<td>'+obj[i].experties+'</td>';
                table += '<td>'+obj[i].lesson_price+'</td>'
                table += '<td>'+obj[i].quotes+'</td>'; 
                table += '<td><img src="data:image/jpeg;base64,'+obj[i].profile_picture+'" border=3 height=60 width=40></td>';
                                        	
                $("#trainersTable").append(table);
            });
        });
    }
});

function onUpdateTrainer( form ){
        var data = JSON.stringify( $(form).serializeArray() ); //  <-----------
        data = JSON.parse(data)
    request = $.ajax({
             url: "/php/fitness/classes/updateTrainer.controller.php",
             type: "POST",
             data: data,
             datatype: 'json'
          })
        request.done(function(response){
            loadTrainers();
        });
        return false; //don't submit
    }

function radioLoader( id ){
    $("#trainer_id").html(id);
}