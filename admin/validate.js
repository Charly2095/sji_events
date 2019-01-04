function validate()
{
    var username=document.getElementById("username").value;
    var password=document.getElementById("password").value;
    if(username != "Admin")
        alert("Invalid Username");
    else if(password != "Admin")
        alert("Invalid Password");
}