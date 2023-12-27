// Validate the form before submitting it
function validateForm() {
    var name = document.getElementById("name1");
    var email = document.getElementById("mail1");
    var phone = document.getElementById("phno1");
    var gender = document.getElementById("gender1");
    var dob = document.getElementById("dob1");
    var dept = document.getElementById("dept1");
  
    if (name.value === "") {
      alert("Please enter your name.");
      name.focus();
      return false;
    }
  
    if (email.value === "") {
      alert("Please enter your email address.");
      email.focus();
      return false;
    }
  
    if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email.value)) {
      alert("Please enter a valid email address.");
      email.focus();
      return false;
    }
  
    if (phone.value === "") {
      alert("Please enter your phone number.");
      phone.focus();
      return false;
    }
  
    if (gender.value === "") {
      alert("Please enter your gender.");
      gender.focus();
      return false;
    }
  
    if (dob.value === "") {
      alert("Please enter your date of birth.");
      dob.focus();
      return false;
    }
  
    if (dept.value === "") {
      alert("Please enter your department.");
      dept.focus();
      return false;
    }
  
    return true;
  }
  
  // Add an event listener to the submit button
  document.getElementById("update_profile").addEventListener("click", function() {
    if (!validateForm()) {
      return false;
    }
  });
  