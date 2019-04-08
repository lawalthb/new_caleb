$(document).ready(function() { 
	$(".open-close").click(function (argument) {
		$(".logoicon").toggle("show");
	});


	$(".scheme-holders img").click(function (e) {
		$(".scheme-holders img").removeClass("active");
		$(".scheme-holders #"+e.target.id).addClass("active");
		$("#colorpika").val(e.target.id);
	});
	
  $(window).load(function() { 


  });
});