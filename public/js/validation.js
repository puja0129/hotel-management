document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form[data-validate="true"]');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const errors = [];

            // 1. Required Fields
            const requiredFields = form.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    showError(field, 'This field is required.');
                } else {
                    hideError(field);
                }
            });

            // 2. Email Validation
            const emailFields = form.querySelectorAll('input[type="email"]');
            emailFields.forEach(field => {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (field.value && !emailRegex.test(field.value)) {
                    isValid = false;
                    showError(field, 'Please enter a valid email address.');
                }
            });

            // 3. Password Strength (Minimum length check removed by user request)
            const passwordFields = form.querySelectorAll('input[type="password"][name="password"]');
            passwordFields.forEach(field => {
                if (field.value) {
                    // No complexity rules currently enforced
                }
            });

            // 4. Password Confirmation Check
            const confirmPassword = form.querySelector('input[name="password_confirmation"]');
            const password = form.querySelector('input[name="password"]');
            if (confirmPassword && password && confirmPassword.value !== password.value) {
                isValid = false;
                showError(confirmPassword, 'Passwords do not match.');
            }

            // 5. Mobile Number Validation (10 digits)
            const phoneField = form.querySelector('input[name="phone"]');
            if (phoneField && phoneField.value) {
                if (!/^\d{10}$/.test(phoneField.value)) {
                    isValid = false;
                    showError(phoneField, 'Phone number must be exactly 10 digits.');
                }
            }

            // 6. Date Logic (Check-in / Check-out)
            const checkIn = form.querySelector('input[name="check_in"]');
            const checkOut = form.querySelector('input[name="check_out"]');
            if (checkIn && checkOut) {
                const today = new Date().toISOString().split('T')[0];
                if (checkIn.value < today) {
                    isValid = false;
                    showError(checkIn, 'Check-in date cannot be in the past.');
                }
                if (checkOut.value <= checkIn.value) {
                    isValid = false;
                    showError(checkOut, 'Check-out date must be after check-in date.');
                }
            }

            if (!isValid) {
                e.preventDefault();
                console.log('Form validation failed.');
            }
        });
    });

    function showError(field, message) {
        let errorSpan = field.parentNode.querySelector('.js-error-message');
        if (!errorSpan) {
            errorSpan = document.createElement('span');
            errorSpan.className = 'js-error-message';
            errorSpan.style.color = '#f43f5e';
            errorSpan.style.fontSize = '0.75rem';
            errorSpan.style.marginTop = '5px';
            errorSpan.style.display = 'block';
            field.parentNode.appendChild(errorSpan);
        }
        errorSpan.innerText = message;
        field.style.borderColor = '#f43f5e';
    }

    function hideError(field) {
        const errorSpan = field.parentNode.querySelector('.js-error-message');
        if (errorSpan) {
            errorSpan.remove();
        }
        field.style.borderColor = '';
    }
});
