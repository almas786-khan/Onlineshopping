/*Assignment 4
this is javascript page to check validations on user input
Created By: Almas khan
Created on: August 8, 2016*/

function validateForm() 
{
    var errorText="";
	
	checkEmail();
	
	
    var name = document.forms["myForm"]["name"].value.trim();              //variable for  name
    name=name.charAt(0).toUpperCase() +name.slice(1);
    document.forms["myForm"]["name"].value = name;	

    var address = document.forms["myForm"]["address"].value.trim();            //variable for address
    address=address.charAt(0).toUpperCase() +address.slice(1);
    document.forms["myForm"]["address"].value = address;

    var city = document.forms["myForm"]["city"].value.trim();               //variable for city
    city=city.charAt(0).toUpperCase() +city.slice(1);
    document.forms["myForm"]["city"].value = city;

    var postal = document.forms["myForm"]["pCode"].value.trim();               //variable for postal code
    postal=postal.toUpperCase();  
    document.forms["myForm"]["pCode"].value = postal;

    var dob = document.forms["myForm"]["dob"].value.trim();                 //variable for date of birth
    dob=dob.charAt(0).toUpperCase() +dob.slice(1);
    document.forms["myForm"]["dob"].value = dob;

    var sunglass = document.forms["myForm"]["sunglassQuantity"].value.trim();      //variable for sunglass quantity
    sunglass=sunglass.charAt(0).toUpperCase() +sunglass.slice(1);
    document.forms["myForm"]["sunglassQuantity"].value = sunglass;

    var bag = document.forms["myForm"]["bagQuantity"].value.trim();      //variable for bags quantity
    bag=bag.charAt(0).toUpperCase() +bag.slice(1);
    document.forms["myForm"]["bagQuantity"].value = bag;


    if (name == null || name == "" || name.length<3 ) 
    {
        errorText+="Please enter your Name atleast 4 character<br>";
		document.forms["myForm"]["name"].focus();
    }
    if (dob == null || dob == "") 
    {
        errorText+="Please enter your date of Birth in numeric<br>";
		document.forms["myForm"]["dob"].focus();
    }
    if (address == null || address == "" || address.length<3) 
    {
        errorText+="Please enter your address  atleast 4 character<br>";
		document.forms["myForm"]["address"].focus();
    }
    if (city == null || city == "" || city.length < 3) 
    {
        errorText+="Please enter your city atleast 4 character<br>";
		document.forms["myForm"]["city"].focus();
    }
    if (postal == null || postal == "") 
    {
        errorText+="Please enter your postal code<br>";
		document.forms["myForm"]["pCode"].focus();
    }
    if (sunglass == null && bag== null)
    {
        errorText+="Please enter the quantity for any one product";
		//document.forms["myForm"]["sunglassQuantity"].focus();
    }
    if (sunglass=="" && bag=="")
    {
        errorText+="Please enter the quantity for any one product"
		//document.forms["myForm"]["sunglassQuantity"].focus();
    }
    if (sunglass % 1 != 0 || bag % 1 != 0)
    {
        errorText+="Please enter quantity in number"
		//document.forms["myForm"]["sunglassQuantity"].focus();
    }
    document.getElementById("error").innerHTML=errorText;
    
	if (errorText.length != 0)
	{	
		return false;
	}
	else
	{		
		return true;		
	}

function checkEmail()     //function for checking email
	{
		var re = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
		var email = document.forms["myForm"]["email"].value.trim();
		document.forms["myForm"]["email"].value=email;

		if (email == null || email == "") 
		{
			errorText+="Please enter your email id<br>";      
			document.forms["myForm"]["email"].focus();		   
		}
		else if (re.test(email) == false)
		{
			errorText+="Please enter valid email id<br>";
			document.forms["myForm"]["email"].focus();  
		}
	}
	function postalMatch()   // This function checks whether input text matches the given format of postal code or not.
	{
		var strMatch = /^[A-Za-z]\d[A-Za-z]\d[A-Za-z]\d$/;
		var postal=document.forms["myforms"]["pCode"].value.trim();
		if (postal == null || postal == "") 
		{
		   errorText+="Please enter postal code.<br>";       
		}
		else if (postal.match(strMatch)==false)
			{
				errorText+="Please enter valid postal in this format(eg. L0L0L0)<br>";
			}
		
	}
}
