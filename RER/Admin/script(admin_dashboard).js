// script(admin_dashboard).js

// Toggle theme
var themeToggle = document.getElementById("themeToggle");
themeToggle.onclick = function() {
    document.body.classList.toggle("dark-mode");
}

// Optional: Chat support functionality can be added here
document.getElementById("chatSupport").onclick = function() {
    // Implement chat support logic or redirect to chat page
    alert("Chat support is currently unavailable.");
}