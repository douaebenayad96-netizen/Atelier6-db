// Gestion des options de couleur
document.addEventListener('DOMContentLoaded', function() {
    // Couleurs
    const colorOptions = document.querySelectorAll('.color-option');
    colorOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Retirer la sélection de toutes les couleurs
            colorOptions.forEach(opt => {
                opt.classList.remove('selected');
                opt.querySelector('i')?.remove();
            });
            
            // Ajouter la sélection à la couleur cliquée
            this.classList.add('selected');
            this.innerHTML = '<i class="fas fa-check"></i>';
        });
    });

    // Tailles
    const sizeOptions = document.querySelectorAll('.size-option');
    sizeOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Retirer la sélection de toutes les tailles
            sizeOptions.forEach(opt => opt.classList.remove('selected'));
            
            // Ajouter la sélection à la taille cliquée
            this.classList.add('selected');
        });
    });

    // Quantité
    const quantityInput = document.querySelector('.quantity-input');
    const minusBtn = document.querySelector('.quantity-btn.minus');
    const plusBtn = document.querySelector('.quantity-btn.plus');

    minusBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });

    plusBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    });
});