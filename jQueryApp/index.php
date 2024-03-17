<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->

  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->



  <title>jQuery-AJAX Example</title>
</head>

<body>
  <div class="container my-3">
    <h2>jQuery-AJAX Example</h2>

    <!-- Button trigger Add User modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
      Add User
    </button>
    <div id="displayDataTable" class="my-3">Test</div>

  </div>


  <!-- Add User Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addUserModalLabel1">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="inputFirstName">First Name</label>
              <input class="form-control" id="inputFirstName" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="inputLastName">Last Name</label>
              <input class="form-control" id="inputLastName" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="inputMobile">Mobile</label>
              <input type="text" class="form-control" id="inputMobile">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="addUser()" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      displayData();
    });

    function displayData() {
      var displayData = "true";

      $.ajax({
        url: 'display.php',
        type: 'POST',
        data: {
          displaysend: displayData
        },
        success: function(data, status) {
          $('#displayDataTable').html(data);
        }
      });
    }

    function addUser() {
      // alert("Test");
      var fName = $('#inputFirstName').val();
      var lName = $('#inputLastName').val();
      var email = $('#inputEmail').val();
      var mobile = $('#inputMobile').val();
      // alert(fName + " " + lName);


      $.ajax({
        url: 'insert.php',
        type: 'POST',
        data: {
          fNameSend: fName,
          lNameSend: lName,
          emailSend: email,
          mobileSend: mobile
        },
        success: function(data, status) {
          $('#addUserModal').modal('toggle');
          displayData();
        }
      })
    }
  </script>
</body>

</html>