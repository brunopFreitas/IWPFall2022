function checkInsertFields() {
    const birthDate = document.getElementById('birthDate')
    const firstName = document.getElementById('firstName')
    const lastName = document.getElementById('lastName')
    const gender = document.getElementById('gender')
    const hireDate = document.getElementById('hireDate')
    const regex = /^\d{4}-\d{2}-\d{2}$/;
    if(birthDate.value.match(regex) === null) {
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
        console.log(birthDate.attributes.status.value)
    } else {
        const removeElement = document.getElementById('birthDayAlert')
        if (removeElement) {
            removeElement.remove()
        }
        birthDate.style.borderColor = 'green';
        birthDate.status = true;
        console.log(birthDate.attributes.status.value)
    }
    if(hireDate.value.match(regex) === null) {
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
    } else {
        const removeElement = document.getElementById('hireDateAlert')
        if (removeElement) {
            removeElement.remove()
        }
        hireDate.style.borderColor = 'green';
        hireDate.status = true;
    }

}

function validateForm() {
    //this is dumb but I'm tired, 6h in this assignment so far.

    const f1 = document.forms["userinfo"]["firstName"];

    if (f1.value == "") {
        f1.style.borderColor = 'red';
    } else {
        f1.style.borderColor = '';
    }
    const f2 = document.forms["userinfo"]["lastName"];
    if (f2.value == "") {
        f2.style.borderColor = 'red';
    } else {
        f2.style.borderColor = '';
    }
    const f3 = document.forms["userinfo"]["address1"];
    if (f3.value == "") {
        f3.style.borderColor = 'red';
    } else {
        f3.style.borderColor = '';
    }
    const f4 = document.forms["userinfo"]["address2"];
    if (f4.value == "") {
        f4.style.borderColor = 'red';
    } else {
        f4.style.borderColor = '';
    }
    const f5 = document.forms["userinfo"]["email"];
    if (f5.value == "") {
        f5.style.borderColor = 'red';
    } else {
        f5.style.borderColor = '';
    }
    const f6 = document.getElementById("checkbox1");
    if (f6.checked !== true) {
        const checkval = document.getElementById("checkboxValidator");
        checkval.style.color = 'red';
        checkval.hidden = false;
    } else {
        const checkval = document.getElementById("checkboxValidator");
        checkval.hidden = true;

    }
}