function validateForm()
{
	var alphaExp = /^[a-zA-Z ]+$/;
	var NumExp = /^[0-9\(\)\/\+ \-]*$/;
	var cardExp = /^([0-9][ ]*){13,18}$/;//^[0-9]{13,18}$/;
	var emailExp = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;    //([\w\-]+\@[\w\-]+\.[\w\-]+)/;
	var firstName=document.forms["myForm"]["firstName"].value;
	if (firstName==null || firstName=="")
	{
		alert("First name must be filled out");
		return false;
	}else if(firstName.match(alphaExp)){
  
	}else{
  alert("First Name Need to be letters only!");
  return false;
  }


var lastName=document.forms["myForm"]["lastName"].value;
if (lastName==null || lastName=="")
  {
  alert("Last name must be filled out");
  return false;
  }else if(lastName.match(alphaExp)){
  
  }else{
  alert("Last Name Need to be letters only!");
  return false;
  }

var address =document.forms["myForm"]["address"].value;
if (address==null || address=="")
  {
  alert("Address must be filled out");
  return false;
  }
  
var email=document.forms["myForm"]["email"].value;
var atpos=email.indexOf("@");
var dotpos=email.lastIndexOf(".");
if (!email.match(emailExp))//atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
  
var phone =document.forms["myForm"]["phone"].value;
if (phone==null || phone=="")
  {
  alert("Phone Number must be filled out");
  return false;
  }else if(phone.match(NumExp)){
  
  }else{
  alert("Phone Number Need to be Numbers and +()\/ signs only!");
  return false;
  }

var cardNum=document.forms["myForm"]["cardNum"].value;
var nCheck = 0, nDigit = 0, bEven = false;
if (cardNum==null || cardNum=="")
  {
  alert("Credit Card Number must be filled out");
  return false;
  }else if(cardNum.match(cardExp)){
  
  }else{
  alert("Card Number Need to be Numbers only!");
  return false;
  }
 cardNum = cardNum.replace(/\D/g, "");
 for (var n = cardNum.length - 1; n >= 0; n--) {
		var cDigit = cardNum.charAt(n),
			  nDigit = parseInt(cDigit, 10);
 
		if (bEven) {
			if ((nDigit *= 2) > 9) nDigit -= 9;
		}
 
		nCheck += nDigit;
		bEven = !bEven;
	}
 
	if((nCheck % 10) == 0)
	{
		
	}else{
	alert("Credit card number is wrong!");
	return false;
	}
	
	var today = new Date();
	var year = document.forms["myForm"]["year"].value;
	var month = document.forms["myForm"]["month"].value;
	if(year == today.getFullYear())
	{
		if(month <= today.getMonth())
		{
			alert("Credit card Expired!");
			return false;
		}	
	}
	if(year < today.getFullYear())
	{
		alert("Credit Card Expired!");
		return false;
	}	

}
