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


  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
 