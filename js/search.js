/* search.js */
document.getElementById('search-form').addEventListener('submit', function(e) {
    e.preventDefault();
    document.getElementById('results').style.display = 'block';
    document.getElementById('result-destination').textContent = document.getElementById('destination').value;
    document.getElementById('results').scrollIntoView({ behavior: 'smooth' });
  });
  