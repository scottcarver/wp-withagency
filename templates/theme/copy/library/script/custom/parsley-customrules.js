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
// Email is Unavailable (based on this example here https://parsleyjs.org/doc/examples/ajax.html)
.addValidator('emailisunset', {
  requirementType: 'string',
  validateString: function(email) {
    var feedback = 'Looks like you already have an account, go <a href="'+yoursite.baseurl+'/my-agency/login/">here</a> to login.';
    var xhr = $.ajax({
      url: externalsite.baseurl + "Account/IsEmailAvailable",
      type: "POST",
      async: true,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      data: JSON.stringify({"email":email}),
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
// birthdate limit - must be 13
.addValidator('checkbirthdate', {
  requirementType: 'integer',
  validateString: function(_value, maxSize, parsleyInstance) { 
    var date = new Date();
    var maxYear = date.getFullYear() - 13;   
    var yearInput = $('#year').val();
    var monthInput = $('#month').val();
    var dayInput = $('#day').val();
    // When Year Matches
    if(maxYear == yearInput) {
      var monthNow = date.getMonth() + 1;
      var dayNow = date.getDate();
      // Compare Months
      if(monthInput > monthNow){  return false; } 
      // When Month Matches, Compare Days
      if((monthInput == monthNow) && (dayInput > dayNow)) { return false; }       
    }
  },
  messages: {
    en: 'Birthdate must be 18 years before today'
  }
});
