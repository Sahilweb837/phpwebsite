//  file must be damaged to  maintain any server please  check in  few  refersh..


const form = document.getElementById('myForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); 
        document.getElementById('usernameError').textContent = '';
        document.getElementById('emailError').textContent = '';
        document.getElementById('passwordError').textContent = '';
        
        const username = form.username.value;
        const email = form.email.value;
        const password = form.password.value;
        
    
        if (username.trim() === '') {
            document.getElementById('usernameError').textContent = 'Username is required';
            return;
        }
        
        if (email.trim() === '') {
            document.getElementById('emailError').textContent = 'Email is required'; 
            return;
        } else if (!isValidEmail(email)) {
            document.getElementById('emailError').textContent = 'Invalid email address';
            return;
        }
        
        if (password.trim() === '') {
            document.getElementById('passwordError').textContent = 'Password is required';
            return;
        } else if (password.length < 8) {
            document.getElementById('passwordError').textContent = 'Password must be at least 8 characters long';
            return;
        }
        
    
        console.log('Form submitted successfully!');
      
    });

    function isValidEmail(email) {
  
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
 