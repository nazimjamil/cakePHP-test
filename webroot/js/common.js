$(document).ready(function() {
    _apputil.init();

    $('#enterForm').validate({
        errorLabelContainer: $(".RegisterErrors"),
        rules: {
            'name': { required: true },
            'email': { required: true, email: true },
            'tnc': 'required'
        },
        messages: {
            'name': 'Please provide your name',
            'email': 'Your Email address is required',
            'tnc': 'Please confirm that you have read the trivia'
        }
    })

})

function apputil() {
    var _apputil = _apputil ? _apputil : {
        init:function()
        {
            $('.btnCopy').click(function() { $('#submit').trigger('click'); });
        }
    }
    return _apputil;
}

var _apputil = apputil();