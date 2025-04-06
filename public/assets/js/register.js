document.addEventListener('DOMContentLoaded', function() {
    const passwordField = document.getElementById('password');
    const rules = {
        charLength: {
            regex: /.{12,}/,
            element: document.getElementById('char-length')
        },
        symbol: {
            regex: /[!@#$%^&*(),.?":{}|<>]/,
            element: document.getElementById('symbol')
        },
        number: {
            regex: /\d/,
            element: document.getElementById('number')
        },
        uppercase: {
            regex: /[A-Z]/,
            element: document.getElementById('uppercase')
        },
        lowercase: {
            regex: /[a-z]/,
            element: document.getElementById('lowercase')
        }
    };

    passwordField.addEventListener('input', function() {
        const password = passwordField.value;

        Object.values(rules).forEach(rule => {
            if (rule.regex.test(password)) {
                rule.element.classList.remove('neutral', 'invalid');
                rule.element.classList.add('valid');
            } else {
                rule.element.classList.remove('neutral', 'valid');
                rule.element.classList.add('invalid');
            }
        });
    });
});