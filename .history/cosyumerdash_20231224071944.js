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
    var totalInput = $('#total');
    var currentPrice = 0;

    $('#increase-btn').click(function () {
        var currentValue = parseInt(quantityInput.val());
        quantityInput.val(currentValue + 1);

        // Add the current price to the total
        updateTotal(currentValue + 1);
    });

    $('#decrease-btn').click(function () {
        var currentValue = parseInt(quantityInput.val());
        if (currentValue > 1) {
            quantityInput.val(currentValue - 1);

            // Subtract the current price from the total
            updateTotal(currentValue - 1);
        }
    });

    // Function to update the total based on the current quantity
    function updateTotal(quantity) {
        var totalPrice = quantity * currentPrice;
        totalInput.val(totalPrice);
    }

    // Event handler for fetching item data
    $(document).on('click', '.buy-now-btn', function () {
        var menuID = $(this).data('id');

        // AJAX request to fetch data for the selected item
        $.ajax({
            type: 'POST',
            url: 'fetch_item_data.php',
            data: { menuID: menuID },
            dataType: 'json',
            success: function (data) {
                // Set the value of the input field to the fetched price
                currentPrice = parseFloat(data.Price);
                totalInput.val(currentPrice);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});

  
  
  
  
  
  
  
  
  
  
  
  
  
 