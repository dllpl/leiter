$('#send').click(function (e) {
    e.preventDefault();
    $('.alert').css('display', 'none')
    let name = $('input[name="name"]').val();
    let phone = $('input[name="phone"]').val();
    let message = $('textarea[name="message"]').val();

    if (name === '' || phone === '' || message === '') {
        $('.alert').css('display', '').text('Заполните пустые поля');
        return
    }


    let formData = new FormData();
    formData.append('name', name);
    formData.append('phone', phone);
    formData.append('message', message);

    $.ajax({
        url: '../php/send-email.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success(data) {
            if (data.status) {
                $('.alert').css('display', '').text(data.message);
                setTimeout(function () {
                    window.location.reload()
                }, 1500)
            }git init
        }
    });

})