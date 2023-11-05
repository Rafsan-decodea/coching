document.querySelector(".register-container").style.display = "none";
document.getElementById("registernew").addEventListener("click", function () {
    // Hide the login container
    document.querySelector(".login-container").style.display = "none";
    // Show the new container
    document.querySelector(".register-container").style.display = "block";
});

document.getElementById("login").addEventListener("click", function () {
    // Hide the login container
    document.querySelector(".login-container").style.display = "block";
    // Show the new container
    document.querySelector(".register-container").style.display = "none";
});


