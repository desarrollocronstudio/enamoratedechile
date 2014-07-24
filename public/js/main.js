$(function(){
	$("header .mobile.menu").click(function(){
		$("header ul").toggle();
	});

	/* SIGN UP */
	$(document).on("click","#signup .facebook-connect",function(){
		var obj = this;
		var $parent = $(this).parent();
		facebook_connect(function(response){
			FB.api("/me?fields=id,name,email",function(data){
				$(obj).hide();
				$profile_info = $parent.find(".mini-profile").fadeIn();
				$profile_info.find("img").attr("src","https://graph.facebook.com/"+data.id+"/picture");
				$profile_info.find(".name").html(data.name);
				$("#signup [name=name]").val(data.name);
				$("#signup [name=email]").val(data.email);
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
					
				})
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
			$.getJSON("/login/check-login",function(res){
				if(res.loged){
					window.location.reload();
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
			//window.location.reload();
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
				$("#signup").parent().remove();
				window.location.reload();
			}else{
				$(this).data("sending",false);
				$(this).find("[type=submit]").val("Iniciar sesión");
				alert(res.msg);
			}
		});
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



function show_popup(name,cb,data,canClose){
	data = data || false;
	if(typeof(canClose) == "undefined")canClose = true;
	$.get("/partials/"+name,data,function(res){
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