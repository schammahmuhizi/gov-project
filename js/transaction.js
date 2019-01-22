$(document).ready(function(){
	$("#postidea").click(function(){
		var postContent = $("#postContent").val();
		$.get("operations.php",
		    {
		    	content : postContent
		    },
		    function(data, status){
		    	  if(data == 'posted'){
		    	  	$("#posted").show();
		    	  }
		    	  else{
		    	  	$("#notposted").show();
		    	  }
		    });
		fetchdata();
	});
	fetchdata();
	function fetchdata(){
		var id = 2;
		$.get("operations.php",
		{
			getposts : id
		},
		function(data,status){
			$(".ideas").html(data);
		});
	}
})