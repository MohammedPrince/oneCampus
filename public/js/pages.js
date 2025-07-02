
  // --------------------------page flipping--------------------
  document.querySelectorAll('.nav-button').forEach(button => {
    button.addEventListener('click', () => {
      // Get the text content or a custom data attribute to identify the page
      const pageId = button.querySelector('span').textContent.toLowerCase().replace(/ /g, '-');
      
      // Hide all content pages
      document.querySelectorAll('.content-page').forEach(page => {
        page.style.display = 'none';
      });

      // Show the selected content page
      const targetPage = document.getElementById(pageId);
      if (targetPage) {
        targetPage.style.display = 'block';
      }
    });
  });
  document.querySelectorAll('.bottom-nav-button').forEach(button => {
    button.addEventListener('click', () => {
      // Get the target page id from the data attribute of the clicked button
      const pageId = button.getAttribute('data-target').toLowerCase();
  
      // Hide all content pages
      document.querySelectorAll('.content-page').forEach(page => {
        page.style.display = 'none';
      });
  
      // Show the selected content page
      const targetPage = document.getElementById(pageId);
      if (targetPage) {
        targetPage.style.display = 'block';
      }
    });
  });
  
  // --------------------------page responsiveness----------------
  // Reference to the elements
const mainContent = document.getElementById('main-content');
const navToggle = document.getElementById('nav-toggle');

function adjustLayout() {
  // Check screen size
  if (window.innerWidth < 770) {
    mainContent.style.marginLeft = '0';
    mainContent.style.width = '100%';
  } else {
    // Apply layout when screen is greater than 770px
    if (navToggle.checked) {
      mainContent.style.marginLeft = '100px';
      mainContent.style.width = 'calc(100% - 120px)';
    } else {
      mainContent.style.marginLeft = '210px';
      mainContent.style.width = 'calc(100% - 230px)';
    }
  }
}

// Call adjustLayout on page load
window.addEventListener('resize', adjustLayout);

// Call adjustLayout when the nav toggle changes
navToggle.addEventListener('change', adjustLayout);

// Initial call to ensure correct layout on page load
adjustLayout();

  
// ----------------------------user management nav---------------------------

// Handle click to dynamically apply active class
const navLinks = document.querySelectorAll('.nav-link');

navLinks.forEach(link => {
    link.addEventListener('click', function() {
        // Remove 'active' class from all links
        navLinks.forEach(link => link.classList.remove('active'));
        // Add 'active' class to the clicked link
        this.classList.add('active');
    });
});
const usersLink = document.getElementById('usersLink');
const addUsersLink = document.getElementById('addUsersLink');
const resetPasswordsLink = document.getElementById('resetPasswordsLink');

const usersPage = document.getElementById('users');
const addUsersPage = document.getElementById('add-users');
const resetPage = document.getElementById('reset');

// Function to hide all pages
function hideAllPages() {
    usersPage.style.display = 'none';
    addUsersPage.style.display = 'none';
    resetPage.style.display = 'none';
}

// Event listeners for navigation links
usersLink.addEventListener('click', () => {
    hideAllPages();
    usersPage.style.display = 'block';  // Show the Users page
    setActiveLink(usersLink);  // Set active link
});

addUsersLink.addEventListener('click', () => {
    hideAllPages();
    addUsersPage.style.display = 'block';  // Show the Add Users page
    setActiveLink(addUsersLink);  // Set active link
});

resetPasswordsLink.addEventListener('click', () => {
    hideAllPages();
    resetPage.style.display = 'block';  // Show the Reset Passwords page
    setActiveLink(resetPasswordsLink);  // Set active link
});

// Function to set active class to the clicked link
function setActiveLink(link) {
    const allLinks = document.querySelectorAll('.nav-link');
    allLinks.forEach(l => l.classList.remove('active'));  // Remove active class from all links
    link.classList.add('active');  // Add active class to the clicked link
}

// Initially, show the Users page
usersPage.style.display = 'block';
document.querySelectorAll('.nav-link').forEach(link => {
  link.addEventListener('click', function (e) {
    e.preventDefault();

    // Deactivate all tabs
    document.querySelectorAll('.nav-link').forEach(item => {
      item.classList.remove('active');
    });

    // Activate clicked tab
    this.classList.add('active');

    // Show corresponding tab content
    let targetTabContent = document.querySelector(this.getAttribute('href'));
    document.querySelectorAll('.tab-pane').forEach(content => {
      content.style.display = 'none'; // Hide all tab contents
    });
    targetTabContent.style.display = 'block'; // Show the corresponding tab content
  });
});

//user list script




