
$(document).ready(function(){

	$("#current_pwd").keyup(function () {
		var current_pwd = $("#current_pwd").val();
		// alert(current_pwd);
		$.ajax({
			type: 'get',
			url: '/admin/check-pwd',
			data: {current_pwd:current_pwd},
			success:function(resp){
				// alert(resp);
				if(resp == "false"){
					$("#chkPwd").html("<font color='red'> Current Password is Incorrect </font>");
				} else {
                    $("#chkPwd").html("<font color='green'> Current Password is Matches </font>");
                }
			},error:function() {
				alert("Error");
            }
		})
    });


	// Enable Disable User
	$(".userStatus").change(function () {
		var user_id = $(this).attr('rel');
		if($(this).prop("checked") == true){
			// alert("test1");
			$.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				type: 'post',
				url: '/admin/update-user-status',
				data: {status: '1', user_id: user_id},
				success: function (resp) {
                }, error: function () {
					alert("Error");
                }
			});
		} else {
            // alert("test2");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-user-status',
                data: {status: '0', user_id: user_id},
                success: function (resp) {
                }, error: function () {
                    alert("Error");
                }
            });
		}
    });

	// Enable Disable Photos
    $(".userPhotoStatus").change(function () {
        var photo_id = $(this).attr('rel');
        if($(this).prop("checked") == true){
            // alert("test1");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-photo-status',
                data: {status: '1', photo_id: photo_id},
                success: function (resp) {
                }, error: function () {
                    alert("Error");
                }
            });
        } else {
            // alert("test2");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-photo-status',
                data: {status: '0', photo_id: photo_id},
                success: function (resp) {
                }, error: function () {
                    alert("Error");
                }
            });
        }
    });





    $('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
            current_pwd:{
                required: true,
                minlength:6,
                maxlength:20
            },
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
});
