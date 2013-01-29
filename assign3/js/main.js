(function () {

    var myForm = $('#contactForm');
    var empDialog = $('#addNewEmpDialog');
    var spamForm = $('#spamForm');

    //do this when the form is submitted
    myForm.submit(function (e) {
        $.post("ajax_subscribe.php", myForm.serialize(), function (data) {
            console.log(data);
            if (data === 'Sucess') {
                $('.main').hide('fast', function(){
                    $('.thanks').show('slow');
                });
            }
        });

        return false;
    });

    spamForm.submit(function (e) {
        $.post("ajax_spam.php", spamForm.serialize(), function (data) {
            console.log(data);
        });
        return false;
    });

    $('#sendBtn').click(function () {

        if ($('.thanks').is(':visible')) {
            $('.thanks, .spam').toggle();
        } else {
            $('.main, .spam').toggle();
        };


    });

}());
