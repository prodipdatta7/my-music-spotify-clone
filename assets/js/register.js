$(document).ready(function() {
	$("#hideLogin").click(function() {
		console.log("log in text clicked");
		$("#loginForm").hide() ;
		$("#registerForm").show() ;
	});

	$("#hideRegister").click(function() {
		$("#loginForm").show() ;
		$("#registerForm").hide() ;
	});
});