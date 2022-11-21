window.onload = function() {
        document.getElementById("download").addEventListener("click", () => {
            const content = this.document.getElementById("main-left");
            var opt = {
                filename: 'myfile.pdf',
                image: { type: 'jpeg', quality: 1 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };

            html2pdf().from(content).set(opt).save();
        })
    }
    //datepicker
$(function() {
    $("#datepicker").datepicker({
        minDate: 7, // min date (7 days)
        maxDate: '+99w', // max date user can select
    });
});

$(function() {
    $("#updatedatepicker").datepicker({
        minDate: 0, // min date (7 days)
        maxDate: '+99w', // max date user can select
    });
});
//signup
function signup() {
    window.location.replace("signup.php");
}
//back to login
function login() {
    window.location.replace("login.php");
}

function validateForm() {
    let x = document.forms["loginForm"]["Email"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}