function checkInsertFields() {
    const birthDate = document.getElementById('emp-brt-dt')
    const firstName = document.getElementById('emp-fn')
    const lastName = document.getElementById('emp-ln')
    const gender = document.getElementById('emp-g')
    const hireDate = document.getElementById('emp-hd')
    const regex = /^\d{4}-\d{2}-\d{2}$/;
    if(birthDate.value.match(regex) === null) {
        console.log("Data is not a match")
    } else {
        console.log("It worked")
    }

}

function checkFilled() {
    const activeTextarea = document.activeElement;
        activeTextarea.addEventListener('focusin', (event) => {
            event.target.style.background = 'yellow';
            event.target.style.fontStyle = 'italic';
            event.target.parentElement.style.textDecoration = 'underline';
        });

        activeTextarea.addEventListener('focusout', (event) => {
            event.target.style.background = '';
            event.target.style.fontStyle = '';
            event.target.parentElement.style.textDecoration = '';
        });
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