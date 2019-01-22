<div class="row" >
	<div class="header-box">
		<div class="logo col-sm-4 col-xs-3">
			<img src="img/rwanda.jpg">
		</div>
		<div class="language-box col-sm-8 col-xs-9">
			<div style="float: right;">
				<span>Language :</span>
				<button class="btn english" onclick="changelanguage(1);">English</button>
				<button class="btn kinyarwanda" onclick="changelanguage(0);"> Kinyarwanda</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
		$(document).ready(function(){
			Get_language();
			GetBankInfo();
		function Get_language(){
				$.get("database.php",{
				getlanguage : 1
				},
				function(data,status){
					if(data == 0){
						$(".head-text").html("Shaka Irangamuntu yawe yatakaye");
						$(".search_item").attr("placeholder","Nomero z'ikarita canga izina");
						$(".input-field").attr("placeholder","Nomero z'ikarita canga izina");
						$(".found-text").html("Ikarita zabashije kuboneka :");
						$(".idNumber").html("No. z'irangamuntu :");
						$(".idNames").html("nyirayo :");
						$(".StationLocated").html("iri kuri :");
						$(".title-id").html("Irangamuntu");
						$(".title-driver").html("Peremi");

						//$(".footer-text").html("");
						$(".price-text").html("Igiciro");
						$(".bank-text").html("Banki");
						$(".accName-text").html("Konti");
						$(".accNumber-text").html("Numero za Konti");
					}
				});
			}
		function changelanguage(language){
			$.get("database.php",{
			chlanguage : language
			},
			function(data,status){
				Get_language();
				document.location.reload();
			});
		}
		GetBankInfo();
		function GetBankInfo(){
			$.get("database.php",{
			GetInfo : 1
			},
			function(data,status){
			});
		}

		$(".english").click(function(){
			changelanguage(1);
		});
		$(".kinyarwanda").click(function(){
			changelanguage(0);
		});	
		})
	</script>