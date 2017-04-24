$(function () {
    $("form :input.required").each(function () {
        var $required = $("<strong>*</strong>");
        $(this).parent().append($required);
    });
    
    $('form :input').blur(function () {
        var $parent = $(this).parent();
        $parent.find(".formtips").remove();
        //Validate the Username
        if ($(this).is('#username')) {
            if (this.value == "") {
                var errorMsg = 'Your name can not be none';
                $parent.append('<span class="formtips onError">' + errorMsg + '</span>');
            } else {
                var okMsg = 'OK';
                $parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
            }
        }       
        //Validate the Password
        if ($(this).is('#password')) {
            if (this.value == "") {
                var errorMsg = 'Password can not be none';
                $parent.append('<span class="formtips onError">' + errorMsg + '</span>');
            } else {
                var okMsg = 'OK';
                $parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
            }
        }
        //Validate the email
        if ($(this).is('#email')) {
            if (this.value == "" || (this.value != "" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(this.value))) {
                var errorMsg = 'Please input a correct email address';
                $parent.append('<span class="formtips onError">' + errorMsg + '</span>');
            } else {
                var okMsg = 'OK';
                $parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
            }
        }
        //Validate the phone
        if ($(this).is('#phone')) {
            if (this.value == "" || (this.value != "" && !/^[0-9]*$/.test(this.value))) {
                var errorMsg = 'Please input your correct phone number';
                $parent.append('<span class="formtips onError">' + errorMsg + '</span>');
            } else {
                var okMsg = 'OK';
                $parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
            }
        }
    }).keyup(function () {
        $(this).triggerHandler("blur");
    }).focus(function () {
        $(this).triggerHandler("blur");
    });//end blur

    $('#submit').click(function () {
        $("form :input.required").trigger('blur');
        var numError = $('form .onError').length;
        if (numError) {
            return false;
        }
    });

    //Reset
    $('#reset').click(function () {
        $(".formtips").remove();
    });
})
