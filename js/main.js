/* main.js */
// Tab functionality in results section
const tabs = document.querySelectorAll('.tab');
tabs.forEach(tab => {
  tab.addEventListener('click', () => {
    tabs.forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    // Optionally add logic to toggle the visible tab content
  });
});
