window.Parsley
.addValidator('nospaces', {
  requirementType: 'string',
  validateString: function(value, requirement) {
    return value.indexOf(" ") == -1
  },
  messages: {
    en: 'This value cannot contain spaces',
  }
})
// Do not Allow P.O. Box
.addValidator('nopobox', {
  requirementType: 'string',
  validateString: function(value) {
    var returnVal = false;
    if( value.toLowerCase().replace('po', 'p.o.').indexOf("p.o. box") == -1 ){ returnVal = true; }
    return returnVal;
  },
  messages: {
    en: 'This value cannot be a P.O. Box. See the note above',
  }
})
// Only allow some characters in passwords
.addValidator('limitcharacters', {
  requirementType: 'string',
  validateString: function(value, requirement) {
    if(value.match(/[^!@#$%^&*()a-zA-Z0-9]/)) {
     return false; 
    }
  },
  messages: {
    en: 'Your password can only contain letters, numbers, and any of these special characters (!@#$%^&*())',
  }
})
// password '3 of 4' validation
.addValidator('password', {
  validateString: function(value, requirement) {      
    var matches = 0;
    
    // special character
    if(value.match(/[!@#$%^&*()]/)) { matches++; }
    
    // lowercase
    if(value.match(/[a-z]/)) { matches++; }

    // uppercase
    if(value.match(/[A-Z]/)) { matches++; }
    
    // number
    if(value.match(/[0-9]/)) { matches++; }
    
    if(matches < 3) {
      return false;
    }
  },
  messages: {
    en: 'Your password must contain at least 3 of the following:<br>at least 1 special character (!@#$%^&*())<br>at least 1 number<br>at least 1 uppercase letter<br>at least 1 lowercase letter'
  }
})
// Max File Size
.addValidator('maxFileSize', {
  requirementType: 'integer',
  validateString: function(_value, maxSize, parsleyInstance) {
    var files = parsleyInstance.$element[0].files;
    return files.length != 1  || files[0].size <= maxSize * 1024;
  },
  messages: {
    en: 'This file should not be larger than %s Kb'
  }
})
// Email is Unset (based on this example here https://parsleyjs.org/doc/examples/ajax.html)
.addValidator('emailisunset', {
  requirementType: 'string',
  validateString: function(email) {
    var feedback = 'Looks like you already have an account, go <a href="'+olsite.baseurl+'/my-agency/login/">here</a> to login.';
    var xhr = $.ajax({
      url: olUserLib.getOLAPIBase() + "Account/EmailAvailable",
      type: "POST",
      async: true,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      data: JSON.stringify({"email":email, "applicationType":"Mobile"}),
    });
    // Return a Promise. It will return true, unless rejected, then false
    return xhr.then(function(response) {
      if(response.available == false){return $.Deferred().reject(feedback);}
    });
  },
  // The following error message will still show if the xhr itself fails
  // (404 because zip does not exist, network error, etc.)
  messages: {en: 'Email is not available'}
})
// birthdate limit - must be 18
.addValidator('maxbirthdate', {
  requirementType: 'integer',
  validateString: function(_value, maxSize, parsleyInstance) { 
    var d = new Date();
    var maxYear = d.getFullYear() - 18;   
    var yearInput = $('#akYear').val();
    var monthInput = $('#akMonth').val();
    var dayInput = $('#akDay').val();

    // TODO: feels verbose, reduce this?
    // if year entered is exactly 18 years ago the month/date must be today or earlier
    if(maxYear == yearInput) {
      var monthNow = d.getMonth() + 1;
      var dayNow = d.getDate();
      
      if(monthInput > monthNow){
        return false;
      } 
      
      if((monthInput == monthNow) && (dayInput > dayNow)) {
        return false;
      }       
    }

  },
  messages: {
    en: 'Birthdate must be 18 years before today'
  }
});
