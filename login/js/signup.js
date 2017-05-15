$(document).ready(function(){

  $("#submit").click(function(){

    var username = $("#newuser").val();
    username = username.replace(/\b[a-z]/g,function(f){return f.toUpperCase();}); // Uppercase the first letter of each word, to allow teachers to create a username in the form of Firstname Lastname, regardless of whether or not they type their name in caps.
    var password = $("#password1").val();
    var password2 = $("#password2").val();
    var email = $("#email").val();

    if((username == "") || (password == "") || (email == "")) {
      $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter a username and a password</div>");
    }
    else {
      $.ajax({
        type: "POST",
        url: "login/create",
        data: "newuser="+username+"&password1="+password+"&password2="+password2+"&email="+email,
        success: function(html){

			var text = $(html).text();
			//Pulls hidden div that includes "true" in the success response
			var response = text.substr(text.length - 4);

          if(response == "true"){

			$("#message").html(html);

					$('#submit').hide();
			}
		else {
			$("#message").html(html);
			$('#submit').show();
			}
        },
        beforeSend: function()
        {
          $("#message").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>")
        }
      });
    }
    return false;
  });
});
