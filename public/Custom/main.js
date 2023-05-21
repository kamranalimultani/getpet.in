document.addEventListener("DOMContentLoaded", function() {
    // Check if modal was previously shown
    if (!sessionStorage.getItem("modalShown")) {
      // Show the modal
      var myModal = new bootstrap.Modal(document.getElementById("myModal"));
      myModal.show();
      
      // Store modal shown information in the session
      sessionStorage.setItem("modalShown", true);
    }
  });