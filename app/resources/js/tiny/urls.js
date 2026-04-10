/**
 * Tiny URL Helper
 * 
 * Handles elements with `data-method` attribute to perform 
 * non-GET requests (POST, PUT, DELETE, etc.) using hidden forms.
 */
(function () {
    const handleMethod = (e) => {
        const element = e.currentTarget;
        const method = element.getAttribute('data-method').toUpperCase();
        const url = element.getAttribute('href');

        // GET requests are handled normally by the browser
        if (method === 'GET') return;

        e.preventDefault();

        // Confirmation check if data-confirm is present
        const confirmation = element.getAttribute('data-confirm');
        if (confirmation && !confirm(confirmation)) {
            return;
        }

        // Create a hidden form
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = url;
        form.style.display = 'none';

        // Add method spoofing for PUT, PATCH, DELETE
        if (method !== 'POST') {
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = method;
            form.appendChild(methodInput);
        }

        // Add CSRF token if available (common in many frameworks)
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (csrfToken) {
            const tokenInput = document.createElement('input');
            tokenInput.type = 'hidden';
            tokenInput.name = '_csrf';
            tokenInput.value = csrfToken.getAttribute('content');
            form.appendChild(tokenInput);
        }

        document.body.appendChild(form);
        form.submit();
    };

    /**
     * Bind listeners to elements with data-method
     */
    const bindMethodLinks = () => {
        const elements = document.querySelectorAll('[data-method]');
        elements.forEach(el => {
            // Avoid double binding
            if (el.dataset.methodBound) return;

            el.addEventListener('click', handleMethod);
            el.dataset.methodBound = "true";
        });
    };

    // Initial binding
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bindMethodLinks);
    } else {
        bindMethodLinks();
    }

    // Expose to Tiny global if it exists for manual/dynamic re-binding
    if (window.Tiny) {
        window.Tiny.bindUrls = bindMethodLinks;
    }
})();
