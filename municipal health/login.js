function login(event) {
    event.preventDefault();

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ username, password }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.json();
    })
    .then(data => {
        const message = document.getElementById("message");
        if (data.status === "success") {
            message.style.color = "lightgreen";
            message.textContent = data.message;
            setTimeout(() => {
                window.location.href = "landingpage.php";
            }, 1000);
        } else {
            message.style.color = "red";
            message.textContent = data.message;
        }
    })
    .catch(error => {
        console.error("Fetch error:", error);
        document.getElementById("message").textContent = "An error occurred.";
    });
}
