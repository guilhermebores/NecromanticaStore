document.addEventListener('DOMContentLoaded', function() {
    const checkoutForm = document.querySelector('form');

    if (checkoutForm) {
        checkoutForm.addEventListener('submit', function(e) {
            const name = document.getElementById('name').value;
            const address = document.getElementById('address').value;

            if (!name || !address) {
                e.preventDefault();
                alert('Por favor, preencha todos os campos obrigatórios!');
            }
        });
    }
});
