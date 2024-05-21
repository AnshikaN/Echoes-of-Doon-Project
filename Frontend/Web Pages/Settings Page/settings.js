// Get references to element
//js added for darkmode and for toggle notifications
//changes ae stored locally.
const darkModeToggle = document.getElementById('dark-mode');
const notificationsToggle = document.getElementById('notifications');
const saveButton = document.querySelector('.save-button');

// Apply saved settings if any
applySavedSettings();

// Add event listeners
darkModeToggle.addEventListener('change', toggleDarkMode);
notificationsToggle.addEventListener('change', toggleNotifications);
saveButton.addEventListener('click', saveChanges);

// Function to toggle dark mode
function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
}

// Function to toggle notifications
function toggleNotifications() {
    if (notificationsToggle.checked) {
        alert('Notifications turned on');
    } else {
        alert('Notifications turned off');
    }
}

// Function to save changes
function saveChanges() {
    // Save settings to local storage or backend/database
    // For example, you can save the settings using localStorage:
    localStorage.setItem('darkMode', darkModeToggle.checked);
    localStorage.setItem('notifications', notificationsToggle.checked);

    alert('Changes saved successfully!');
}

// Function to apply saved settings
function applySavedSettings() {
    // Retrieve settings from local storage or backend/database
    // For example, retrieve the settings if saved in localStorage:
    const darkModeEnabled = localStorage.getItem('darkMode') === 'true';
    const notificationsEnabled = localStorage.getItem('notifications') === 'true';

    // Apply settings to the toggles
    darkModeToggle.checked = darkModeEnabled;
    notificationsToggle.checked = notificationsEnabled;

    // Apply dark mode if it was enabled
    if (darkModeEnabled) {
        document.body.classList.add('dark-mode');
    }
}
