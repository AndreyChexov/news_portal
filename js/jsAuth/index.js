// auth
$('.auth_btn').click(function(e) {

    e.preventDefault();

    $('input').removeClass('error');

    let login = $('input[name = "login"]').val(),
        password = $('input[name = "password"]').val();
    
    $.ajax({
        url: 'logic/singIn.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success: function (data) {

            if(data.status) {
                document.location.href = '/profile.php';
            }
             else {
            
                if(data.type === 1) {
                   data.fields.forEach(field => {
                    $(`input[name = "${field}"]`).addClass('error');
                   })
                }

                $('.msg').removeClass('none').text(data.message);
                
                document.querySelector('.auth_form').reset();
            }
            
        }


    })
})
    

//reg


$('.reg_btn').click(function(e) {

    e.preventDefault();

    $('input').removeClass('error');

    let login = $('input[name = "login"]').val(),
        password = $('input[name = "password"]').val(),
        name = $('input[name = "name"]').val();
    
    $.ajax({
        url: 'logic/singUp.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password,
            name: name 
        },
        success: function (data) {


            if(data.status) {
                $('.msg').removeClass('none').text(data.message);
                document.querySelector('.reg_form').reset();
            } else {

                if(data.type === 1) {
                   data.fields.forEach(field => {
                    $(`input[name = "${field}"]`).addClass('error');
                   })
                }

                $('.msg').removeClass('none').text(data.message);
            }
            
        }


    })
})