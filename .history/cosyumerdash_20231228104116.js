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
        url: 'fetch_item_data.php', // Create a separate PHP file for handling the AJAX request
        data: { menuID: menuID },
        dataType: 'json',
        success: function(data) {
            // Update the modal content with the fetched data
            $('#BuyNow .modal-title').text(data.Name);

            // Extract the file name from the image path
            var fileName = data.Image.split('/').pop();

            // Update the content of the fileNameContainer element with an input field
            $('#fileNameContainer').html(`
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <input  type="text" class="form-control text-center" value="${fileName}" readonly>
                    </div>
                </div>
            `);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
  
  
  

 
  
  
  
  
  
  
  
  
  
  
 