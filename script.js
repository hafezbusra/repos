

window.onload = function() {
    var hari = new Date();
    document.getElementById("greeting").innerHTML = getGreeting(hari);
};

function getGreeting(hari){
    var t = hari.getHours();
if (t > 20) return "G'night";
if (t > 16) return "Good Evening";
if (t > 11) return "Good Afternoon";
if (t > 4) return "Good Morning!";
return "A little early isn't it?";
 
}
