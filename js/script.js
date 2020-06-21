
function passfun(){
var pw=document.getElementById("pass-field");
if(pw.type === "password")
{
pw.type="text";
}
else
{
pw.type="password";
}
}