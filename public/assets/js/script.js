const myButton = document.getElementById("checkbox");

myButton.addEventListener("click", function () {
    myButton.style.backgroundColor = "#f75600";
    myButton.style.borderColor = "#f75600";
});

// Initialize popup as usual
$(document).ready(function () {
    $(".view").magnificPopup({
        type: "image",
        closeOnContentClick: true,
        mainClass: "mfp-img-mobile",
        image: {
            verticalFit: true,
        },
    });
});
