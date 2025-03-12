/* auth.js */
const modal = document.getElementById('auth-modal');
const loginBtn = document.getElementById('login-btn');
const getStartedBtn = document.getElementById('get-started-btn');
const closeModalBtn = document.querySelector('.close-modal');
const modalTabs = document.querySelectorAll('.modal-tab');
const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');

function openModal() {
  if (modal) {
    modal.classList.add('active');
  }
}

function closeModal() {
  if (modal) {
    modal.classList.remove('active');
  }
}

if (loginBtn) {
  loginBtn.addEventListener('click', openModal);
}
if (getStartedBtn) {
  getStartedBtn.addEventListener('click', openModal);
}
if (closeModalBtn) {
  closeModalBtn.addEventListener('click', closeModal);
}

modalTabs.forEach(tab => {
  tab.addEventListener('click', () => {
    modalTabs.forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    const tabName = tab.getAttribute('data-modal-tab');
    if (tabName === 'login') {
      loginForm.style.display = 'block';
      registerForm.style.display = 'none';
    } else {
      loginForm.style.display = 'none';
      registerForm.style.display = 'block';
    }
  });
});

if (loginForm) {
  loginForm.addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Login functionality would be implemented with backend integration.');
    closeModal();
  });
}
if (registerForm) {
  registerForm.addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Registration functionality would be implemented with backend integration.');
    closeModal();
  });
}
