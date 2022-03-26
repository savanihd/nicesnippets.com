//Count variable ued for progress bar
var count = 0;

var rules = [];

//Loops through all forms on the page and ads popover to all password fields with the class validate.
$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
    for (var i = 0; i < document.forms.length; i++) {
        for (var j = 0; j < document.forms[i].elements.length; j++) {
            var control = document.forms[i].elements[j];
            if (control.type.toString() == "password" && control.classList.contains("validate")) {
                addPasswordField(control);
            }
            else if (control.type.toString() == "password" && control.classList.contains("verify")) {
                addVerifyField(control);
            }

        }
    }

});

/**
 * Ads popover to element e.
 * Popover contains status bar
 * @param e
 */
function addPasswordField(e) {
    //Set Popover Attributes
    e.setAttribute("data-placement", "right");
    e.setAttribute("data-toggle", "popover");
    e.setAttribute("data-trigger", "focus");
    e.setAttribute("data-html", "true");
    e.setAttribute("title", "Password Requirements");
    e.setAttribute("onfocus", "onFocus(this)");
    e.setAttribute("onblur","onBlur(this)");
    e.setAttribute("onkeyup", "checkPassword(this)");

    //Create progress bar container
    var progressBardiv = document.createElement("div");
    var id = e.id;
    var num = id.match(/\d/g);
    num = num.join("");
    progressBardiv.id = "progress" + num;
    $(progressBardiv).addClass("progress");

    //Progress bar element
    var progressBar = document.createElement("div");
    $(progressBar).addClass("progress-bar");
    $(progressBar).addClass("bg-info");
    progressBar.id = "progressBar" + num;
    progressBar.setAttribute("role", "progressbar");
    progressBar.setAttribute("aria-valuenow", "100");
    progressBar.setAttribute("aria-valuemin", "0");
    progressBar.setAttribute("aria-valuemax", "100");
    progressBar.style.width = "0%";
    progressBardiv.appendChild(progressBar);

    //Add popover data including the progress bar
    e.setAttribute("data-content", '&bull; Between 10-12 Characters <br/>&bull; An upper Case Letter<br/> &bull; A Number<br/> &bull; At Least 1 of the Following (_,-,#,%,*,+)<br/> &bull; None of the Following ($,&,=,!,@) <br/>' + progressBardiv.outerHTML);
}

//TODO: Add validation to check the repeat password field
function addVerifyField(e) {
    e.setAttribute("data-placement", "right");
    e.setAttribute("data-toggle", "popover");
    e.setAttribute("data-trigger", "focus");
    e.setAttribute("data-content","Passwords Do Not Match!");
    e.setAttribute("data-html", "true");
    e.setAttribute("onfocus", "checkVerify(this)");
    e.setAttribute("onkeyup", "checkVerify(this)");

}

//TODO: Check to see if the 2 passwords are the same
function checkVerify(e) {
    var id = e.id;
    var num = id.match(/\d/g);
    num = num.join("");
    if (e.value == document.getElementById("password" + num).value) {
        $(e).popover('hide');
        $(e).addClass("has-success");
    } else {
        $(e).popover('show');
        $(e).removeClass("has-success");
        var popover = $(e).attr("data-content", 'Passwords Do Not Match!');
        popover.setContent();
    }

}

function checkRules() {
    for (var i = 0; i < rules.length; i++) {
        
    }

}

/**
 * Checks to see if all of the requirements ar met.
 * Updates progress bar and popover
 * @param e password field element
 */
function checkPassword(e) {
    var id = e.id;
    var num = id.match(/\d/g);
    num = num.join("");
    count = 0;
    var password = e.value;
    var length = checkLength(password);
    var upper = checkUpperCase(password);
    var digit = checkDigit(password);
    var special = checkSpecialCharacters(password);
    var prohibited = checkProhibitedCharacter(password);
    if (length.length + upper.length + digit.length + special.length + prohibited.length == 0) {
        $(e).popover('hide');
        $(e).addClass("is-invalid");
        return true;
    } else {
        $(e).popover('show');
        $(e).removeClass("is-valid");
        setProgressBar(count, e);
        var popover = $(e).attr("data-content", length + upper + digit + special + prohibited + ' <br/>' + document.getElementById("progress" + num).outerHTML).data('bs.popover');
        popover.setContent();
        return false;
    }

}

/**
 * Checks to see if the password contains an approved special character
 * @param string password to test
 * @returns {string} string to add to the popover
 */
function checkSpecialCharacters(string) {
    var specialChar = /[_\-#%*\+]/;
    if (specialChar.test(string) == false) {
        return addPopoutLine("At Least 1 of the Following (_,-,#,%,*,+)");
    }
    else {
        count++;
        return "";
    }
}

/**
 * Checks to see if any prohibited special characters are present in the password.
 * @param string passwor dot test
 * @returns {string} string to add to the popover
 */
function checkProhibitedCharacter(string) {
    var specialChar = /[$&=!@]/;
    if (specialChar.test(string) == true) {
        return addPopoutLine("None of the Following ($,&,=,!,@)");
    }
    else {
        count++;
        return "";
    }
}

/**
 * Checks to see if there is at least 1 digit in the password
 * @param string password to test
 * @returns {string} string to add to the popover
 */
function checkDigit(string) {
    var hasNumber = /\d/;
    if (hasNumber.test(string) == false) {
        return addPopoutLine("A Number");
    }
    else {
        count++;
        return "";
    }
}

/**
 * Checks to ensure at least 1 character is upper case
 * @param string password to test
 * @returns {string} string to add to the popover
 */
function checkUpperCase(string) {
    if (string.replace(/[^A-Z]/g, "").length == 0) {
        return addPopoutLine("An upper Case Letter");
    }
    else {
        count++;
        return "";
    }
}

/**
 * Checks the length of the password
 * @param string password to test
 * @returns {string} string to add to the popover
 */
function checkLength(string) {
    if (string.length > 13 || string.length < 10) {
        return addPopoutLine("Between 10-12 Characters");
    }
    else {
        count++;
        return "";
    }

}

/**
 * sets the progress bar (e) to the percent
 * @param percent percent to set progress bar to
 * @param e  password field element
 */
function setProgressBar(percent, e) {
    var id = e.id;
    var num = id.match(/\d/g);
    num = num.join("");
    percentNum = (percent / 5) * 100;
    percent = percentNum.toString() + "%";
    $("#progressBar" + num).css("width", percent);
}

/**
 * returns string that is formatted with a bullet point and <br> at the end for the popover.
 * @param string popover text
 * @returns {string} formatted popover string
 */
function addPopoutLine(string) {
    return "&bull;" + string + "<br/>";
}

/**
 * On focus event that checks the password when the focus is gained.
 * @param e password element
 */
function onFocus(e) {
    var id = e.id;
    var num = id.match(/\d/g);
    num = num.join("");
    checkPassword(e);
}

function onBlur(e)
{
    var id = e.id;
    var num = id.match(/\d/g);
    num = num.join("");

    if(checkPassword(e) == false)
    {

    }

}

function addRule(name, text, regex) {
    var rule = {};
    rule.name = name;
    rule.text = text;
    rule.expression = regex;

}

