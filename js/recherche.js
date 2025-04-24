document.querySelectorAll('.supprimer-article').forEach(btn => {
    btn.addEventListener('click', () => {
        let id = btn.getAttribute('data-id');
        // ensuite faire la suppression via fetch/ajax ou redirection
    });
});
