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
  
  
 

$(document).on('click', '.buy-now-btn', function() {
  // Get the MenuID from the clicked button
  var menuID = $(this).data('id');

  // AJAX request to fetch data for the selected item
  $.ajax({
      type: 'POST',
      url: 'fetch_item_data.php',
      data: { menuID: menuID },
      dataType: 'json',
      success: function(data) {
          // Update the modal title with the fetched data name
          $('#BuyNow .productname').val(data.Name); // Assuming you're using an input field
      },
      error: function(xhr, status, error) {
          console.error(xhr.responseText);
      }
  });
});
  
  
  

 
  
  
  
  
  
  
  
  
  
  
 