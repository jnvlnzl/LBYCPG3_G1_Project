document.addEventListener('DOMContentLoaded', function() {
    const reserveButtons = document.querySelectorAll('.reserve-btn');

    reserveButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemID = this.getAttribute('data-item-id');
            const itemName = this.getAttribute('data-item-name');
            const itemImage = this.getAttribute('data-item-image');
            const quantity = 1; // default quantity for reserve

            // Send the data to PHP via AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'addToCart.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert('Item added to your bag!');
                }
            };
            xhr.send(`itemID=${itemID}&itemName=${itemName}&quantity=${quantity}&image=${itemImage}`);
        });
    });
});