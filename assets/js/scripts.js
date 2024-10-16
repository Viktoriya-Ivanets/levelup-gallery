document.addEventListener('DOMContentLoaded', function() {
    const uploadMessage = document.querySelector('.upload-messages');
    
    if (uploadMessage) {
        setTimeout(function() {
            uploadMessage.classList.add('hidden');
        }, 2000);
    }
});
