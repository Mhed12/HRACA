firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
      	

  } //else {
    // No user is signed in.

  //}
});


function login(){
	var userEmail = document.getElementById('email_field').value;
	var userPass = document.getElementById('password_field').value;

firebase.auth().createUserWithEmailAndPassword(userEmail, userPass).catch(function(error) {
  // Handle Errors here.
  var errorCode = error.code;
  var errorMessage = error.message;
  // ...
  window.alert("Error : " + errorMessage);

});

}

function logout(){
	firebase.auth().signOut().then(function() {
  // Sign-out successful.
  window.location = "http://localhost/CustomerAssistanceSystem/";

}).catch(function(error) {
  // An error happened.
});

}