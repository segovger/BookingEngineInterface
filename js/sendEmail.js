function prueba(){
    alert('jaló');
}

function sendEmail() {
    var name = $("#name");
    var lastname = $("#last_name");
    var email = $("#email");
    var precioReserva = $("#precioReserva");
    var pagoPendiente = $("#pagoPendiente");

    if (isNotEmpty(name) && isNotEmpty(lastname) && isNotEmpty(email)) {
        $.ajax({
           url: 'sendEmail.php',
           method: 'POST',
           dataType: 'json',
           data: {
               name: name.val(),
               lastname: lastname.val(),
               email: email.val(),
               precioReserva: precioReserva.val(),
               pagoPendiente: pagoPendiente.val()
               //body: body.val()
           }, success: function (response) {
                if (response.status == "success")
                    alert('Email Has Been Sent!');
                else {
                    alert('Please Try Again!');
                    console.log(response);
                }
           }
        });
    }
}

function isNotEmpty(caller) {
    if (caller.val() == "") {
        caller.css('border', '1px solid red');
        return false;
    } else
        caller.css('border', '');

    return true;
}