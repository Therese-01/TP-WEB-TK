document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.supprimer').forEach(function(bouton) {
        bouton.addEventListener('click', function() {
            const nomProduit = this.getAttribute('data-nom');

            // Crée un formulaire en POST
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'panier.php';

            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'supprimer';
            input.value = nomProduit;

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        });
    });
});
