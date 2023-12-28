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


function showorderinfo(){   
document.getElementById('ordeinfo').style.display = 'none';

}















function showSweetAlert() {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Record has been successfully deleted.',
          'success'
        )
      }
    })
  }
  