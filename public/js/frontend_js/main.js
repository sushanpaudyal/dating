

$().ready(function() {

    // validate signup form on keyup and submit
    $("#signupForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
                lettersonly: true
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                // equalTo: "#password"
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/check-email",
                    type: "get"
                }
            },

            agree: "required"
        },
        messages: {
            name: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters",
                lettersonly: "only letters are accepted"
            },
            email: {
                required: "Please enter a email address",
                email: "Please enter a valid email address",
                remote: "Email Already Exists"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                // equalTo: "Please enter the same password as above"
            },
            agree: "Please accept our policy",
        }
    });


    // validate signup form on keyup and submit
    $("#datingForm").validate({
        rules: {
            dob: {
                required: true,
            },
            gender: {
                required: true,
            },
            height: {
                required: true,
            },
            maritial_status :{
                required: true,
            },
            about_myself :{
                required: true,
                minlength: 20
            },
            about_partner :{
                required: true,
                minlength:  20
            }



        },
        messages: {
            dob: {
                required: "Please select a date",
            },
            gender: {
                required: "Please choose a gender",
            },
            height: {
                required: "Please choose a height",
            },
            maritial_status: {
                required: "Please enter a maritial_status",
            },
            about_myself: {
                required: "Please enter a about",
            },
            about_partner: {
                required: "Please enter a partner",
            },


        }
    });



    // Password Check Script

    $('#password').keyup(function(e) {
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{6,}).*", "g");
        if (false == enoughRegex.test($(this).val())) {
            // $('#passstrength').html('More Characters');
        } else if (strongRegex.test($(this).val())) {
            $('#passstrength').className = 'ok';
            $('#passstrength').html('Strong!');
        } else if (mediumRegex.test($(this).val())) {
            $('#passstrength').className = 'alert';
            $('#passstrength').html('Medium!');
        } else {
            $('#passstrength').className = 'error';
            $('#passstrength').html('Weak!');
        }
        return true;
    });


    $(".deleteRecord").click(function(){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        // alert(deleteFunction);
        swal({
                title: "Are You Sure? ",
                text: "You will not be able to recover this record again",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, Delete it!"
            },
            function(){
                window.location.href="/"+deleteFunction+"/"+id;
            });

    });


});
