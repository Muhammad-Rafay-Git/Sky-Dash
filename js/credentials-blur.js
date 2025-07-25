document.addEventListener('DOMContentLoaded', function () {
  var form = document.getElementById('blur-password-form');
  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var input = document.getElementById('blur-password-input').value;
      var error = document.getElementById('blur-password-error');
      if (input === '17nov2006') {
        document.getElementById('credentials-blur-container').classList.add('unblur');
        error.style.display = 'none';
        document.getElementById('blur-password-input').value = '';
      } else {
        error.style.display = 'block';
      }
    });
  }
});