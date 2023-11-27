const navButton = document.getElementById('open');
const sidebar = document.getElementById('mySidebar');

let isSidebarOpen = false;

function toggleNav() {
  console.log('toggleNav called');
  const main = document.getElementById('main');
  
  // Check the current screen width
  const screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

  if (screenWidth < 650) {
    // Code for screens with a width less than 650px
    if (isSidebarOpen) {
      sidebar.style.width = "0";
      main.style.marginLeft = "0";
      navButton.textContent = '☰ Menu';
      isSidebarOpen = false;
    } else {
      sidebar.style.width = "100px";
      main.style.marginLeft = "100px";
      navButton.textContent = '✕ Menu';
      isSidebarOpen = true;
    }
  } else {
    // Code for screens with a width greater than or equal to 650px
    if (isSidebarOpen) {
      sidebar.style.width = "0";
      main.style.marginLeft = "0";
      navButton.textContent = '☰ Menu';
      isSidebarOpen = false;
    } else {
      sidebar.style.width = "250px";
      main.style.marginLeft = "250px";
      navButton.textContent = '✕ Menu';
      isSidebarOpen = true;
    }
  }
}

function toggleEmailContent(element, emailId) {
  const emailContent = document.getElementById('emailContent' + emailId);
  
  // Toggle the display of email content
  if (emailContent.style.display === 'block') {
      emailContent.style.display = 'none';
  } else {
      emailContent.style.display = 'block';
      // Add code to mark the email as seen in the database (AJAX or form submission)
      markEmailAsSeen(emailId);
  }
}

