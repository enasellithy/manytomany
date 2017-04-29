/*$(document).ready(function(){
	$("button").click(function(){
		$.ajax({
			url:"login",
			type:"POST",
			beforeSend:function(){
				$(".help-block").html('<h1>Hello</h1>');
			},
			success:function(r){
				$(".help-block").html("Good");
			}
		});
		return false;
	});
});*/
/*var loginForm = $("#loginForm");
loginForm.submit(function(e){
    e.preventDefault();
    var formData = loginForm.serialize();

    $.ajax({
        url:'login',
        type:'POST',
        data:formData,
        success:function(data){
            console.log(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
});*/

/*$('#login-form').on('submit',function(e){
	e.preventDefault();
	//console.log('Submit');
	$.post($(this).attr('action'),{email:$('#email').val(),
		password:('#password').val()},function(response){
		console.log(response);
	});
});*/