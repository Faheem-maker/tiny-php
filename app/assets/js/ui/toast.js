class Toast {
    #toastElement = null;

    get el() {
        // Lazily creates and attaches
        // an element to body
        if (this.#toastElement == null) {
            this.#toastElement = document.createElement('div');

            this.#toastElement.classList.add('fixed', 'bottom-8', 'left-1/2', '-translate-x-1/2', 'bg-gray-900', 'text-white', 'px-6', 'py-3', 'rounded-full', 'text-sm', 'font-medium', 'opacity-0', 'pointer-events-none', 'transition-all');

            document.body.appendChild(this.#toastElement);
        }

        return this.#toastElement;
    }

    success(msg) {
        this.el.innerText = msg;

        this.el.classList.remove('opacity-0');
        this.el.classList.add('opacity-100', '-translate-y-2');

        setTimeout(() => {
            this.el.classList.add('opacity-0');
            this.el.classList.remove('opacity-100', '-translate-y-2');
        }, 2000);
    }
}

document.addEventListener('DOMContentLoaded', () => window.Ui.register("toast", new Toast()));