function validateForm() {

const name = document.getElementById("name").value.trim();
const note = document.getElementById("note").value.trim();

if (name === "" || note === "") {

alert("Please enter a destination and a reason.");
return false;
}

if (note.length > 50) {

alert("Reason must be 50 characters or less.");
return false;
}

return true;
}
