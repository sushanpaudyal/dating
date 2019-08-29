$.validator.setDefaults({
    submitHandler: function() {
        alert("submitted!");
    }
});

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
                equalTo: "#password"
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
                equalTo: "Please enter the same password as above"
            },
            agree: "Please accept our policy",
        }
    });


});
