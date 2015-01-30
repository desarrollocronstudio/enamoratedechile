$(function(){
	var swiped = false;
	$("header .mobile.menu").click(function(){
		if(!swiped){
			$("#content,header.mobile").animate({left:270},500);
			swiped = true;
		}else{
			$("#content,header.mobile").animate({left:0},500);
			swiped=false;
		}
		
	});
	 $(".face").click(function(){
        FB.ui({
            method: 'share',
            href: CURRENT_URL,
        },function(response) {

        });
        return false;
    });
	$('.tw').click(function(event) {
		var url = "http://twitter.com/share?text=Encuentra los mejores datos a lo largo de todo Chile";
	    var width  = 575,
	        height = 400,
	        left   = ($(window).width()  - width)  / 2,
	        top    = ($(window).height() - height) / 2,
	        url    = url,
	        opts   = 'status=1' +
	                 ',width='  + width  +
	                 ',height=' + height +
	                 ',top='    + top    +
	                 ',left='   + left;
	    
	    window.open(url, 'twitter3', opts);
	 
	    return false;
	  });

	/* SIGN OUT */
	$(document).on("click",".sign_out",function(){
		var _this = this;
		FB.logout(function(){
			window.location = _this.href;
		});
		return false;
	});
	/* SIGN UP */
	$(document).on("click","#signup .facebook-connect",function(){
		var obj = this;
		var $parent = $(this).parent();
		facebook_connect(function(response){
			$.getJSON(BASE_URL+"/login/check-login",function(res){
				if(res.loged){
                    $("#signup").parent().remove();
                    $("body").trigger("connected");
					//window.location.reload();
				}else{
					FB.api("/me?fields=id,name,email",function(data){
						$(obj).hide();
						$profile_info = $parent.find(".mini-profile").fadeIn();
						$profile_info.find("img").attr("src","https://graph.facebook.com/"+data.id+"/picture");
						$profile_info.find(".name").html(data.name);
						$("#signup [name=name]").val(data.name);
						$("#signup [name=email]").val(data.email);
					});
				}
			});
		});
		return false;
	});
	$(document).on("submit","#signup form",function(e){
		var obj = this;
		if($(this).data("sending"))return false;
		$(this).data("sending",true);
		$(this).find("[type=submit]").val("Registrando...");
		$.post(BASE_URL+"/signup",$(this).serialize(),function(res){
			if(res.validation_failed){
				$(obj).data("sending",false);
				$(obj).find("[type=submit]").val("Registrar");
				var msg = "Se encontraron los siguientes errores: \n";
				for(var i in res.errors){
					var error = res.errors[i];
					msg += "- "+error+"\n";
				}
				alert(msg);
			}else{
				$("#signup").parent().remove();
				show_popup("thanks",function($popup){
					
				});
				$("#signup").html();
			}
		});
		e.preventDefault();
	});

	/* LOGIN! */
	$(document).on("click","#login .facebook-connect",function(){
		var obj = this;
		var $parent = $(this).parent();
		facebook_connect(function(response){
			$.getJSON(BASE_URL + "/login/check-login",function(res){
				if(res.loged){
                    $("#login").parent().remove();
                    $("body").trigger("connected");
                    //window.location.reload();
				}else{
					if(res.facebook){
						$(obj).closest('.popup').remove();
						show_popup('signup',function(){
							FB.api("/me",function(data){
								$("#signup [name=name]").val(data.name);
								$("#signup [name=email]").val(data.email);
							});
						});	
					}else{
						alert("Usuario y contraseña no coinciden")
					}
				}
			});
		});
		return false;
	});
	$(document).on("submit","#login form",function(e){
		var obj = this;
		if($(this).data("sending"))return false;
		$(this).data("sending",true);
		$(this).find("[type=submit]").val("Iniciando sesión...");
		$.post(BASE_URL+"/login",$(this).serialize(),function(res){
			if(res.loged){
				$("#login").parent().remove();
                $("body").trigger("connected");
				//window.location.reload();
			}else{
				$(obj).data("sending",false);
				$(obj).find("[type=submit]").val("Iniciar sesión");
				alert(res.msg);
			}
		});
		e.preventDefault();
	});

	$(document).on("submit","#forgot form",function(e){
		var obj = this;
		if($(this).data("sending"))return false;
		$(this).data("sending",true);
		$(this).find("[type=submit]").val("Recuperando...");
		$.post(BASE_URL+"/forgot",$(this).serialize(),function(res){
			if(!res.status){
				$(obj).data("sending",false);
				$(obj).find("[type=submit]").val("Recuperar");
				$("#forgot .msg").html("Ocurrió un error. Revisa que tu RUT esté bien ingresado.");
			}else{
				$("#forgot .msg").html("Revisa tu correo con las instrucciones para continuar.");
				$("#forgot input").remove();
				$("#forgot .btn-red").remove();
				$a = $("<a class='btn-red'>").html("OK").click(function(){
					$(this).closest(".popup").remove();
				});
				$("#forgot .wrapper").append($a);
			}
		},"json");
		e.preventDefault();
	});


	$(document).on("click",".signup",function(){
		show_popup("signup");
		return false;
	});
	$(document).on("click",".login",function(){
		show_popup("login");
		return false;
	});
});


var loading_popup = false;
function show_popup(name,cb,data,canClose){
	data = data || false;
	if(typeof(canClose) == "undefined")canClose = true;
	if(loading_popup)return false;
	loading_popup = true;

	var popup_url = "/partials/"+name;
	$.get(BASE_URL+popup_url,data,function(res){
		ga('send', 'pageview',popup_url);

		var $popup = $("<div class='popup'>");
		$popup.html(res).hide();
		$("body").append($popup);
		$popup.fadeIn(function(){
			if(typeof(cb)=="function")cb($popup);
		});
		$popup.close = function(){
			$popup.fadeOut(function(){
				$(this).remove();
			});
		}
		loading_popup = false;
		if(canClose){
			$popup.click(function(e){
				if(e.target != this)return;
				$popup.close();
			});
		}
		
	});
}

function facebook_connect(on_success, on_failure){
	FB.login(function(response) {
		if (response.authResponse) {
			if(typeof(on_success) == "function")on_success(response);
		} else {
			if(typeof(on_failure) == "function")on_failure(response);
		}
	});
}

$("body").bind("connected",function(){
    window.location.reload();
    return true;

});

$(document).bind('fb_load',function(){
	FB.Event.subscribe('comment.create', function(targetUrl) {
		console.log('Add Comment '+targetUrl);
		ga('send','social', 'facebook', 'comment', targetUrl);

	});

	FB.Event.subscribe('comment.remove', function(targetUrl) {

		ga('send','social', 'facebook', 'uncomment', targetUrl);

	});

	FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {
			if(!LOGED_IN)window.location.reload();
		} else if (response.status === 'not_authorized') {
			// the user is logged in to Facebook,
			// but has not authenticated your app
		} else {
			// the user isn't logged in to Facebook.
		}
	});
});