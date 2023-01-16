// auth
$('.auth_btn').click(function(e) {

    e.preventDefault();

    $('input').removeClass('error');

    let login = $('input[name = "login"]').val(),
        password = $('input[name = "password"]').val();
    
    $.ajax({
        url: '/portal/?path=auth/log',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success: function (data) {

            if(data.status) {
                document.location.href = '/portal?path=profile';
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
        name = $('input[name = "name"]').val(),
        confirm = $('input[name = "confirm"]').val();
    
    $.ajax({
        url: '/portal/?path=registration/newUser',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password,
            name: name,
            confirm: confirm
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

// send new

    let img = '';
    let fonImg = '';

    $('input[name = "img"]').change(function (e) {
       img = e.target.files[0];
    });

    $('input[name = "fon_img"]').change(function (e) {
        fonImg = e.target.files[0];
    });

$('.send_btn').click(function(e) {

    e.preventDefault();

    $('input').removeClass('error');

    let author = $('input[name = "author"]').val(),
        data = $('input[name = "data"]').val(),
        text = $('textarea[name = "text"]').val(),
        name = $('input[name = "newsName"]').val();

    let formData = new FormData();
    formData.append('author', author);
    formData.append('data', data);
    formData.append('text', text);
    formData.append('img', img);
    formData.append('fon_img', fonImg);
    formData.append('newsName', name);



    $.ajax({
        url: '/portal/?path=news/saveNews',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success: function (data) {


            if(data.status) {
                $('.msg').removeClass('none').text(data.message);
                document.querySelector('.creation_form').reset();
            } else {

                if(data.type === 1) {
                    data.fields.forEach(field => {
                        $(`input[name = "${field}"]`).addClass('error');
                        $(`textarea[name = "${field}"]`).addClass('error');
                    })
                }

                $('.msg').removeClass('none').text(data.message);
            }

        }


    })
})


// send comment

$('.comment_btn').click(function(e) {

    e.preventDefault();


    let comment = $('textarea[name = "comment"]').val(),
        page = $('input[name = "page"]').val();

    $.ajax({
        url: '/portal/?path=comments',
        type: 'POST',
        dataType: 'json',
        data: {
            comment: comment,
            page: page
        },
        success: function (data) {
            if(data.status) {
                
                document.querySelector('.comment_form').reset();
            } else  {
                alert("Нужно больше текста..");
            }


        }


    })
})


$('.comments_answer_btn').click(function(e) {

    e.preventDefault();

    $('.comments_answer').removeClass('none_answer');


})

