// document.getElementById('login-form').addEventListener('submit', function(event) {
//     event.preventDefault();

//     const email = document.getElementById('email').value;
//     const password = document.getElementById('password').value;

//     fetch('{{ url('auth/login') }}', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
//         },
//         body: JSON.stringify({ email: email, password: password })
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.token) {
//             localStorage.setItem('token', data.token);
//             window.location.href = data.redirect; // Redirect to the profile page
//         } else {
//             alert('Login failed!');
//         }
//     })
//     .catch(error => console.error('Error:', error));
// });
