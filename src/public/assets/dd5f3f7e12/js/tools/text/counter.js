const clearBtn = document.getElementById('clear-btn');
const copyBtn = document.getElementById('copy-btn');
const toast = document.getElementById('toast');

function showToast(message) {
    toast.innerText = message;
    toast.classList.remove('opacity-0');
    toast.classList.add('opacity-100', '-translate-y-2');
    setTimeout(() => {
        toast.classList.add('opacity-0');
        toast.classList.remove('opacity-100', '-translate-y-2');
    }, 2000);
}

clearBtn.addEventListener('click', () => {
    textInput.value = '';
    updateCounts();
    showToast('Text cleared');
});
copyBtn.addEventListener('click', () => {
    if (textInput.value.length > 0) {
        textInput.select();
        document.execCommand('copy');
        showToast('Copied to clipboard');
    } else {
        showToast('Nothing to copy');
    }
});