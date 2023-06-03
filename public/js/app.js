let checkboxes = document.querySelectorAll('.checkbox');
let totalbox = document.querySelector('.total');
let totalAmount = 0;
totalbox.textContent = totalAmount;

checkboxes.forEach(function(checkbox) {
    let grandparent = checkbox.closest('.input-group');
    let price = grandparent.querySelector('em').textContent;
    checkbox.addEventListener('click', function() {
        if(checkbox.checked) {
            totalAmount += parseFloat(price);
        }else {
            totalAmount -= parseFloat(price)
        }
        totalbox.textContent = totalAmount.toFixed(2);
    })
})


