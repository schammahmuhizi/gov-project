$(document).ready(function(){

	loadNumber();
	function loadNumber(){
		$.post("../database.php",
		{
			nb_station : 1
		},
		function(data,status){
			$(".number_station").html(data);
		});

		$.post("../database.php",
		{
			nb_request : 1
		},
		function(data,status){
			$(".number_request").html(data);
		});

		$.post("../database.php",
		{
			nb_card : 1
		},
		function(data,status){
			$(".number_card").html(data);
		});

		$.post("../database.php",
		{
			nb_driver : 1
		},
		function(data,status){
			$(".number_driver").html(data);
		});
	}

		Get_language();
		function Get_language(){
				$.get("database.php",{
				getlanguage : 1
				},
				function(data,status){
					if(data == 0){
						$("#input-field").attr("placeholder","Injiza i numero z'irangamuntu cangwa izina ryawe");
					}
				});
			}
		function changelanguage(language){
			alert('good');
			$.get("database.php",{
			chlanguage : language
			},
			function(data,status){
				Get_language();
			});
		}


})