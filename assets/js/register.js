$(document).ready(function(){
	$("#registerForm").hide();
	console.log("document is ready");

	$("#hideLogin").click(function(){
		$("#loginForm").hide();
		$("#registerForm").show();
	});

	$("#hideRegister").click(function(){
		$("#registerForm").hide();
		$("#loginForm").show();
	});
})