function checkInsertFields() {
    //Regex
    const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
    const nameRegex = /^[A-Z][a-z_-]{3,19}$/;
    const genderRegex = /^M$|^F$|^T$/;

    //Checking Birthday Date
    if(birthDate.value.match(dateRegex) === null) {
        const removeElement = document.getElementById('birthDayAlert')
        if (removeElement) {
            removeElement.remove()
        }
        birthDate.style.borderColor = 'red';
        const para = document.createElement("p");
        para.id = 'birthDayAlert'
        const node = document.createTextNode("Data format for birthday is YYYY-MM-DD");
        para.appendChild(node);
        const element = document.getElementById('form')
        element.appendChild(para);
        birthDate.attributes.status.value = "false";
    } else {
        const removeElement = document.getElementById('birthDayAlert')
        if (removeElement) {
            removeElement.remove()
        }
        birthDate.style.borderColor = 'green';
        birthDate.attributes.status.value = "true";
    }

    //Checking Hire Date
    if(hireDate.value.match(dateRegex) === null) {
        const removeElement = document.getElementById('hireDateAlert')
        if (removeElement) {
            removeElement.remove()
        }
        hireDate.style.borderColor = 'red';
        const para = document.createElement("p");
        para.id = 'hireDateAlert'
        const node = document.createTextNode("Data format for hire date is YYYY-MM-DD");
        para.appendChild(node);
        const element = document.getElementById('form')
        element.appendChild(para);
        hireDate.attributes.status.value = "false";
    } else {
        const removeElement = document.getElementById('hireDateAlert')
        if (removeElement) {
            removeElement.remove()
        }
        hireDate.style.borderColor = 'green';
        hireDate.attributes.status.value = "true";
    }

    //Checking First Name
    if(firstName.value.match(nameRegex) === null) {
        const removeElement = document.getElementById('firstNameAlert')
        if (removeElement) {
            removeElement.remove()
        }
        firstName.style.borderColor = 'red';
        const para = document.createElement("p");
        para.id = 'firstNameAlert'
        const node = document.createTextNode("First name must initiate with capital letter");
        para.appendChild(node);
        const element = document.getElementById('form')
        element.appendChild(para);
        firstName.attributes.status.value = "false";
    } else {
        const removeElement = document.getElementById('firstNameAlert')
        if (removeElement) {
            removeElement.remove()
        }
        firstName.style.borderColor = 'green';
        firstName.attributes.status.value = "true";
    }

    //Checking Last Name
    if(lastName.value.match(nameRegex) === null) {
        const removeElement = document.getElementById('lastNameAlert')
        if (removeElement) {
            removeElement.remove()
        }
        lastName.style.borderColor = 'red';
        const para = document.createElement("p");
        para.id = 'lastNameAlert'
        const node = document.createTextNode("Last name must initiate with capital letter");
        para.appendChild(node);
        const element = document.getElementById('form')
        element.appendChild(para);
        lastName.attributes.status.value = "false";
    } else {
        const removeElement = document.getElementById('lastNameAlert')
        if (removeElement) {
            removeElement.remove()
        }
        lastName.style.borderColor = 'green';
        lastName.attributes.status.value = "true";
    }

    //Checking Gender
    if(gender.value.match(genderRegex) === null) {
        const removeElement = document.getElementById('genderAlert')
        if (removeElement) {
            removeElement.remove()
        }
        gender.style.borderColor = 'red';
        const para = document.createElement("p");
        para.id = 'genderAlert'
        const node = document.createTextNode("Gender must be M, F or T");
        para.appendChild(node);
        const element = document.getElementById('form')
        element.appendChild(para);
        gender.attributes.status.value = "false";
    } else {
        const removeElement = document.getElementById('genderAlert')
        if (removeElement) {
            removeElement.remove()
        }
        gender.style.borderColor = 'green';
        gender.attributes.status.value = "true";
    }
}

function validateForm() {

    const birthDate = document.getElementById('birthDate')
    const firstName = document.getElementById('firstName')
    const lastName = document.getElementById('lastName')
    const gender = document.getElementById('gender')
    const hireDate = document.getElementById('hireDate')

    checkInsertFields();
    let birthDateValue = birthDate.attributes.status.value;
    let firstNameValue = firstName.attributes.status.value;
    let lastNameValue = lastName.attributes.status.value;
    let genderValue = gender.attributes.status.value;
    let hireDateValue = hireDate.attributes.status.value;

    if(birthDateValue=='true' &&
        firstNameValue=='true' &&
        lastNameValue=='true' &&
        genderValue=='true' &&
        hireDateValue=='true') {
        const removeElement = document.getElementById('submitAlert')
        if (removeElement) {
            removeElement.remove()
        }
            let submitButton = document.getElementById('Submit')
            submitButton.type = "submit"
    } else {
        const removeElement = document.getElementById('submitAlert')
        if (removeElement) {
            removeElement.remove()
        }
        const para = document.createElement("p");
        para.id = 'submitAlert'
        const node = document.createTextNode("There's an error in one of the fields.");
        para.appendChild(node);
        const element = document.getElementById('form')
        element.appendChild(para);
    }
}

function validateFormDeletion () {

    const deleteConfirm = document.getElementById('deleteConfirm')
    if (deleteConfirm.checked !== true) {
        const removeElement = document.getElementById('checkBoxAlert')
        if (removeElement) {
            removeElement.remove()
        }
        const deleteConfirmText = document.getElementById('checkboxText')
        deleteConfirmText.style.color = 'red';
        const para = document.createElement("p");
        para.id = 'checkBoxAlert'
        const node = document.createTextNode("You need to mark the checkbox to delete.");
        para.appendChild(node);
        const element = document.getElementById('form')
        element.appendChild(para);
    } else {
        const removeElement = document.getElementById('checkBoxAlert')
        if (removeElement) {
            removeElement.remove()
        }
        let submitButton = document.getElementById('Submit')
        submitButton.type = "submit"
    }
}

function validateRegisterForm() {

    const userName = document.getElementById('userName')
    const password = document.getElementById('password')

    if (userName.value!='' && password.value!='') {
        userName.attributes.status.value = true;
        password.attributes.status.value = true;
    } else {
        userName.style.borderColor = 'red';
        password.style.borderColor = 'red';
    }

    let userNameValue = userName.attributes.status.value;
    let passwordValue = password.attributes.status.value;

    if(userNameValue=='true' &&
        passwordValue=='true') {
        const removeElement = document.getElementById('submitAlert')
        if (removeElement) {
            removeElement.remove()
        }
        let submitButton = document.getElementById('Submit')
        submitButton.type = "submit"
    } else {
        const removeElement = document.getElementById('submitAlert')
        if (removeElement) {
            removeElement.remove()
        }
        const para = document.createElement("p");
        para.id = 'submitAlert'
        const node = document.createTextNode("Username or Password cannot be blank");
        para.appendChild(node);
        const element = document.getElementById('form')
        element.appendChild(para);
    }
}