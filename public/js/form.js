// $(document).ready(function(){
//
//
//     var element = $("#html-content-holder"); // global variable
//     var getCanvas; // global variable
//
//     $("#btn-Preview-Image").on('click', function () {
//         html2canvas(element, {
//             onrendered: function (canvas) {
//                 $("#previewImage").append(canvas);
//                 getCanvas = canvas;
//             }
//         });
//     });
//
//     $("#btn-Convert-Html2Image").on('click', function () {
//         var imgageData = getCanvas.toDataURL("image/png");
//         // Now browser starts downloading it instead of just showing it
//         var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
//         $("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);
//     });
//
// });


//validations //валидация
/*
$(document).ready(function () {
    $('form[id="new_ad"]').validate({
        rules: {
            title: { required: true, minlength: 2,
            },
            description: 'required',
        },
        messages: {
            title: '! Ad name is required At least 2 characters !',
            description: '! Write something !',
        }
    });
});

$(document).ready(function () {
    $('form[id="edit_ad"]').validate({
        rules: {
            title: { required: true, minlength: 2,
            },
            description: 'required',
        },
        messages: {
            title: '! Ad name is required At least 2 characters !',
            description: '! Write something !',
        }
    });
});

$(document).ready(function () {
    $('#reg').submit(function (e) {
    });
    $('form[id="reg"]').validate({
        rules: {
            username: { required: true, minlength: 5,
            },
            email: { required: true, email: true,
            },
            password: { required: true, minlength: 6,
            },
            confirm_password: { equalTo: "#password",
            }
        },
        messages: {
            username: 'Username must be at least 5 characters long',
            email: 'Please, enter correct email address',
            password: 'Password must be at least 8 characters long',
            confirm_password: 'Passwords does not match',
        },

        submitHandler: function (form) {
            form.submit();
        }
    });
});

$(document).ready(function () {
    $('#login').submit(function (e) {
    });
    $('form[id="login"]').validate({
        rules: {
            email: { required: true, email: true,
            },
            password: { required: true, minlength: 6,
            }
        },
        messages: {
            email: 'Please, enter your email address',
            password: 'Password must be at least 8 characters long',
        },

        submitHandler: function (form) {
            form.submit();
        }
    });
});

$(document).ready(function () {
    $('form[id="text"]').validate({
        rules: {
            text: { required: true, minlength: 2,
            },
        },
        messages: {
            text: '! Please, type at least 2 characters !',
        }
    });
});

//create with ajax

$(document).ready(function () {
    $('#new_ad').submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "../public/pageId.php",
            data: new FormData(this),
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                if (result.success == false) {
                    location.href = 'create.php';
                } else {
                    location.href = 'ad.php?id=' + result.id;
                }
            },
        });
    });
});

//edit with ajax

$(document).ready(function () {
    $('#edit_ad').submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                location.href = 'index.php';
            }
        });
    });
});
*/
