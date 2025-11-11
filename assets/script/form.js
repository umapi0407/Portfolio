document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();
    let formData = new FormData(this);
    
    fetch("php_form.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === "success") {
            alert("Your message has been sent successfully!");
            document.getElementById("contactForm").reset();
        } else {
            alert("Something went wrong. Please try again.");
        }
    })
    .catch(error => console.error("Error:", error));
});