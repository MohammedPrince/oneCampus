// ------------------------ Your existing code for page flipping
document.querySelectorAll('.nav-button').forEach(button => {
    button.addEventListener('click', function() {
      // Remove 'selected' class from all buttons
      document.querySelectorAll('.nav-button').forEach(btn => btn.classList.remove('selected'));
  
      // Add 'selected' class to the clicked button
      this.classList.add('selected');
  
      // Hide all content pages
      document.querySelectorAll('.content-page').forEach(page => page.style.display = 'none');
  
      // Show the corresponding content page based on the button's target
      const target = this.innerText.trim().toLowerCase().replace(/\s/g, '-'); // e.g. 'user-management' 
      document.getElementById(target).style.display = 'block';
    });
  });
  
  // Add initial selected state to the first nav button and content page
  document.addEventListener('DOMContentLoaded', function() {
    const defaultButton = document.querySelector('.nav-button');
    const defaultContent = document.getElementById(defaultButton.innerText.trim().toLowerCase().replace(/\s/g, '-'));
    defaultButton.classList.add('selected');
    defaultContent.style.display = 'block';
  });
  
  // ------------------------ Your new code to sync selected icon
  function syncSelection(target) {
    // Update sidebar selection
    document.querySelectorAll('.nav-button').forEach(button => {
      const buttonTarget = button.innerText.trim().toLowerCase().replace(/\s/g, '-');
      if (buttonTarget === target) {
        button.classList.add('selected');
      } else {
        button.classList.remove('selected');
      }
    });
  
    // Update bottom nav selection
    document.querySelectorAll('.bottom-nav-button').forEach(button => {
      const buttonTarget = button.getAttribute('data-target');
      if (buttonTarget === target) {
        button.classList.add('selected');
      } else {
        button.classList.remove('selected');
      }
    });
  }
  
  // ------------------------ Sidebar Navigation (sync with bottom nav)
  document.querySelectorAll('.nav-button').forEach(button => {
    button.addEventListener('click', function() {
      const target = this.innerText.trim().toLowerCase().replace(/\s/g, '-');
      syncSelection(target); // Sync selected icon between bottom nav and sidebar
    });
  });
  
  // ------------------------ Bottom Navigation (sync with sidebar)
  document.querySelectorAll('.bottom-nav-button').forEach(button => {
    button.addEventListener('click', function() {
      const target = this.getAttribute('data-target');
      syncSelection(target); // Sync selected icon between bottom nav and sidebar
    });
  });
  
  // Add initial selected state to the first nav button (sidebar & bottom nav)
  document.addEventListener('DOMContentLoaded', function() {
    const defaultButton = document.querySelector('.nav-button');
    const defaultTarget = defaultButton.innerText.trim().toLowerCase().replace(/\s/g, '-');
    syncSelection(defaultTarget); // Sync selected icon on page load
  });
  