function vfunc1(){
    var email=document.forms["myform1"]["email"].value;
    var password=document.forms["myform1"]["password"].value;
    if(email==null || email==""){
        document.getElementById("errorbox").innerHTML="Enter Email Id";
        return false;
    }
    if(password==null || password==""){
        document.getElementById("errorbox").innerHTML="Enter Password";
        return false;
    }
    if(email != '' && password != ''){
        alert("Login Successful");
    }

}