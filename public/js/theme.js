document.addEventListener("DOMContentLoaded", () => {
    const themeToggle = document.getElementById("themeToggle");
    const icon = document.getElementById("icon");
    const body = document.body;
    const nav = document.querySelector(".nav");
    const bottomNavBar = document.getElementById("bottom-nav-bar"); // Add this line

    themeToggle.addEventListener("click", () => {
        if (body.classList.contains("light-mode")) {
            body.classList.replace("light-mode", "dark-mode");
            nav.classList.replace("light-mode", "dark-mode");
            bottomNavBar.classList.replace("light-mode", "dark-mode"); // Update this line
            icon.src = "assets/icons/sun.svg";
            icon.alt = "Dark mode icon";
        } else {
            body.classList.replace("dark-mode", "light-mode");
            nav.classList.replace("dark-mode", "light-mode");
            bottomNavBar.classList.replace("dark-mode", "light-mode"); // Update this line
            icon.src = "assets/icons/moon.svg";
            icon.alt = "Light mode icon";
        }
    });
});
