function showAdmin() {
    document.getElementById('Admin-table').style.display = 'block';
    document.getElementById('Passengers-table').style.display = 'none';
    document.getElementById('createnews').style.display = 'none';
    document.getElementById('Menu').style.display = 'none';
    document.getElementById('Order').style.display = 'none';
  }
  function showCostumers() {
    document.getElementById('Admin-table').style.display = 'none';
    document.getElementById('Passengers-table').style.display = 'block';
    document.getElementById('createnews').style.display = 'none';
    document.getElementById('Menu').style.display = 'none';
    document.getElementById('Order').style.display = 'none';
  }
  
  function showNews() {
    document.getElementById('Admin-table').style.display = 'none';
    document.getElementById('Passengers-table').style.display = 'none';
    document.getElementById('createnews').style.display = 'block';
    document.getElementById('Menu').style.display = 'none';
    document.getElementById('Order').style.display = 'none';
  }
  
  function showMenu() {
    document.getElementById('Admin-table').style.display = 'none';
    document.getElementById('Passengers-table').style.display = 'none';
    document.getElementById('createnews').style.display = 'none';
    document.getElementById('Menu').style.display = 'block';
    document.getElementById('Order').style.display = 'none';
  }
  
  function showOrders() {
    document.getElementById('Admin-table').style.display = 'none';
    document.getElementById('Passengers-table').style.display = 'none';
    document.getElementById('createnews').style.display = 'none';
    document.getElementById('Menu').style.display = 'none';
    document.getElementById('Order').style.display = 'block';
  }
  
  
  
  
  
  
  $(document).ready(function () {
    var quantityInput = $('#quantity');

    $('#increase-btn').click(function () {
      var currentValue = parseInt(quantityInput.val());
      quantityInput.val(currentValue + 1);
    });

    $('#decrease-btn').click(function () {
      var currentValue = parseInt(quantityInput.val());
      if (currentValue > 1) {
        quantityInput.val(currentValue - 1);
      }
    });
  });



  document.addEventListener("DOMContentLoaded", function() {
    // Initialize the quantity and total on page load
    insertText();

    // Add click event listeners to the increase and decrease buttons
    document.getElementById("increase-btn").addEventListener("click", increaseQuantity);
    document.getElementById("decrease-btn").addEventListener("click", decreaseQuantity);
  });

  function insertText() {
    var inputElement = document.getElementById("quantity");
    var totalElement = document.getElementById("total");

    // Initialize the quantity and total values
    var initialQuantity = 1;
    var initialTotal = calculateTotal(initialQuantity);

    inputElement.value = initialQuantity;
    totalElement.value = initialTotal;
  }

  function increaseQuantity() {
    var inputElement = document.getElementById("quantity");
    var totalElement = document.getElementById("total");

    // Get the current quantity value
    var currentQuantity = parseInt(inputElement.value, 10);

    // Increase the quantity
    var newQuantity = currentQuantity + 1;

    // Update the input field
    inputElement.value = newQuantity;

    // Update the total based on the new quantity
    var newTotal = calculateTotal(newQuantity);
    totalElement.value = newTotal;
  }

  function decreaseQuantity() {
    var inputElement = document.getElementById("quantity");
    var totalElement = document.getElementById("total");

    // Get the current quantity value
    var currentQuantity = parseInt(inputElement.value, 10);

    // Ensure the quantity doesn't go below 1
    if (currentQuantity > 1) {
      // Decrease the quantity
      var newQuantity = currentQuantity - 1;

      // Update the input field
      inputElement.value = newQuantity;

      // Update the total based on the new quantity
      var newTotal = calculateTotal(newQuantity);
      totalElement.value = newTotal;
    }
  }

  function calculateTotal(quantity) {
    // You can replace this with your actual formula for calculating the total
    // In this example, I'm doubling the quantity for simplicity
    return quantity * 2;
  }


  
  
  
  
  
  
  
  
  
  
  
  
  
  
 