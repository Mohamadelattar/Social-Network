
$(document).ready(function() {

	//On click signup, hide login and show registration form
	$("#signup").click(function() {
		$("#first").slideUp("slow", function(){
			$("#second").slideDown("slow");
		});
	});

	//On click signup, hide registration and show login form
	$("#signin").click(function() {
		$("#second").slideUp("slow", function(){
			$("#first").slideDown("slow");
		});
	});


});
/*
function Inverser()
{
    document.getElementById("first").style("display : none");
    document.getElementById("second").style("display : block");

}
function show()
{
    document.getElementById("first").style("display : block");
    document.getElementById("second").style("display : none");

}

*/