
var fields = {};

document.addEventListener("DOMContentLoaded", function () {
    fields.firstName = document.getElementById('firstName');
    fields.lastName = document.getElementById('lastName');
    fields.email = document.getElementById('email');
    fields.phoneNumber = document.getElementById('phoneNumber');
    fields.message = document.getElementById('message');
});

function isNotEmpty(value) {
    if (value == null || typeof value == "undefined") {
        return false;
    }
    return value.length > 0;
}

function isNumber(num) {
    return (num.length > 0) && !isNaN(num);
}

function isString(string) {
    return (string.length > 0) && (typeof string === "string");
}

function isEmail(email) {
    let regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(String(email).toLowerCase());
}

function fieldValidation(field, validationFunction) {
    if (field == null) return false;

    let isFieldValid = validationFunction(field.value);
    if (!isFieldValid) {
        field.className = "error";
    } else {
        field.className = "";
    }

    return isFieldValid;
}

function isValid() {
    var valid = true;
    valid &= fieldValidation(fields.firstName, isNotEmpty);
    valid &= fieldValidation(fields.lastName, isNotEmpty);
    valid &= fieldValidation(fields.email, isNotEmpty);
    valid &= fieldValidation(fields.phoneNumber, isNumber);
    valid &= fieldValidation(fields.firstName, isNotEmpty);

    return valid;
}