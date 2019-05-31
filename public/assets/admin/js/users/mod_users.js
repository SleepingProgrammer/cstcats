
//AJAX CRUD
$(document).ready(function(){
    mods_table = $("#moderators-datatable").DataTable();

    var url = "users";
  
    $(document).on("click", ".delete-user", function(){
        var user_id = $(this).val();           
        $.ajaxSetup({
            headers: {
                'csrf-token': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
  
            type: "DELETE",
            url: url + '/' + user_id,
            success: function (data) {
                console.log(data);
                $("#user" + user_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
  
  
  
    $(document).on("click", ".edit-user",function(){
        var user_id = $(this).val();
        console.log(user_id);
        $.get('userData/' + user_id, function (data) {
            //success data
            console.log("Data:" + data);
            $('#user_id').val(data.id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#role').val(data.role);
            $('#approved').val(data.approved);
            $('#can_post').val(data.can_post);
            $('#can_comment').val(data.can_comment);
            $('#moderator-btn-save').val("update");
            $('#moderator_modal').modal('show');
        });
    });
  
    //display modal form for creating new user
    $('#btn-add').click(function(){
        $('#moderator-btn-save').val("add");
        $('#frmUser').trigger("reset");
        $("#name").val("");
        $("#email").val("");
        $("#role").val("moderator");
        $("#registeredFrom").val("Admin Form");
        $('#moderator_modal').modal('show');
    });
  
    //create new user / update existing user
    $("#moderator-btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'csrf-token': $('meta[name="_token"]').attr('content')
            }
        })
  
        e.preventDefault(); 

        var formData = $('#frmUser').serialize();
  
        var state = $(this).val();
        
        var type = "POST"; //for creating new resource
        var user_id = $('#user_id').val();
        
        if (state == "update"){
          type = "PUT"; //for updating existing resource
          url += '/' + user_id;
      }
  
        $.ajax({
            type: type,
            url: url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                if(data.error){ 
                    toastr["error"](data.error, "Error");    
                    return;
                }
                console.log("Success");
                var newData = null;
                
                //if Moderator
                if(data.role=="moderator"){

                    newData = {
                        "0" : data.name,
                        "1" : data.email,
                        "2" : data.created_at,
                        "3" : '<button type="button" class="btn btn-default btn-sm edit-user" value="' + data.id + '"> <i class="icon-fa icon-fa-pencil"></i> Edit</button>\
                        <button type="button" class="btn btn-default btn-sm delete-user" value="' + data.id + '"> <i class="icon-fa icon-fa-trash"></i> Delete</button>'
                      };

                    if(state=="add"){
                        tbl_r = mods_table.row.add(newData).node().id = "user" + data.id;  
                        toastr["success"]("New Moderator added.", "Success");      
                    }
                    else if(state=="update"){
                        toastr["success"]("Moderator information updated.", "Success");    
                    }
    
                    mods_table.row("#user" + data.id).data(newData).draw(false);
                }
                else if(data.role=="user"){
                    //if User
                    if(data.approved==1){
                        newData = {
                            "0" : data.name,
                            "1" : data.email,
                            "2" : data.created_at,
                            "3" : '<a href="users/' + data.id + '" class="btn btn-default btn-sm"><i class="icon-fa icon-fa-search"></i> View User</a>\
                            <button type="button" class="btn btn-default btn-sm edit-user" value="' + data.id + '"> <i class="icon-fa icon-fa-pencil"></i> Edit</button>\
                            <button type="button" class="btn btn-default btn-sm delete-user" value="' + data.id + '"> <i class="icon-fa icon-fa-trash"></i> Delete</button>'
                          };
                        console.log("Approved User");
                        if(state=="add"){
                            tbl_r = users_table.row.add(newData).node().id = "user" + data.id; 
                            toastr["success"]("New User added.", "Success");       
                        }
                        else if(state=="update"){
                            toastr["success"]("User information updated.", "Success");    
                        }
                        console.log("User" + data.id);
        
                        users_table.row("#user" + data.id).data(newData).draw(false);
                    }
                    //if Applicant
                    else if(data.approved==0){
                        newData = {
                            "0" : data.name,
                            "1" : data.email,
                            "2" : data.created_at,
                            "3" : '<a href="users/' + data.id + '" class="btn btn-default btn-sm"><i class="icon-fa icon-fa-search"></i> View Applicant</a>\
                            <button type="button" class="btn btn-default btn-sm edit-user" value="' + data.id + '"> <i class="icon-fa icon-fa-pencil"></i> Edit</button>\
                            <button type="button" class="btn btn-default btn-sm delete-user" value="' + data.id + '"> <i class="icon-fa icon-fa-trash"></i> Delete</button>'
                          };
                        if(state=="add"){
                            tbl_r = applicants_table.row.add(newData).node().id = "user" + data.id;    
                        }
        
                        applicants_table.row("#user" + data.id).data(newData).draw(false);
                    }
                }
                
                $('#frmUser').trigger("reset");
                $('#moderator_modal').modal('hide');
            },
            error: function (data) {
                console.log(data);
                notie.alert({ type: 3, text: "Something went wrong." });
            }
        });
    });
  
  });
  