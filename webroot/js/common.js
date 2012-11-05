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
    		$('input[name=name], input[name=email]').blur(function(){ $(".RegisterErrorsServer").hide(); });	// hide field containing server errors in same way as $.validate to maintain consistency
            $('.btnCopy').click(function() {
            	$(".RegisterErrorsServer").hide();	// hide field containing server errors as client validation may duplicate
            	$('#submit').trigger('click');	// validate/submit
            });
        }
    }
    return _apputil;
}

var _apputil = apputil();