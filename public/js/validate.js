// public/js/validate.js

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        let valid = true;
        let errors = [];

        // Name
        const name = form.querySelector('[name="name"]');
        if (name && name.value.trim() === '') {
            valid = false;
            errors.push('Name is required.');
        }

        // Email
        const email = form.querySelector('[name="email"]');
        if (email && !/^\S+@\S+\.\S+$/.test(email.value)) {
            valid = false;
            errors.push('A valid email is required.');
        }

        // Password
        const password = form.querySelector('[name="password"]');
        if (password && password.value.length < 6) {
            valid = false;
            errors.push('Password must be at least 6 characters.');
        }

        // Confirm Password
        const passwordConfirmation = form.querySelector('[name="password_confirmation"]');
        if (password && passwordConfirmation && password.value !== passwordConfirmation.value) {
            valid = false;
            errors.push('Passwords do not match.');
        }

        // Role
        const role = form.querySelector('[name="role"]');
        if (role && !role.value) {
            valid = false;
            errors.push('Role is required.');
        }

        // Company Name
        const company = form.querySelector('[name="company_name"]');
        if (company && company.value.trim() === '') {
            valid = false;
            errors.push('Company name is required.');
        }

        // Show errors
        let errorDiv = document.getElementById('js-errors');
        if (!errorDiv) {
            errorDiv = document.createElement('div');
            errorDiv.id = 'js-errors';
            errorDiv.style.color = 'red';
            form.prepend(errorDiv);
        }
        errorDiv.innerHTML = '';
        if (!valid) {
            e.preventDefault();
            errorDiv.innerHTML = errors.map(e => `<div>${e}</div>`).join('');
        }
    });
});
