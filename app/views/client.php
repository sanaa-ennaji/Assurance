<?php

require "../controllers/client.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Management</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <link rel="stylesheet" href="style.css">
    <style>
        
 #body-pd{
    right: 0%;
  }

    
    </style>
</head>

<body>
    
    <?php  include 'sidebar.html'  ?>
    <div class="container mt-5">
        <!-- Button to trigger modal for adding/editing clients -->
        <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#clientModal">
            Add Client
        </button>

        <!-- DataTable to display clients -->
        <table id="clientTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>CIN</th>
                    <th>address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td>
                            <?= $client['id']; ?>
                        </td>
                        <td>
                            <?= $client['fullName']; ?>
                        </td>
                        <td>
                            <?= $client['CIN']; ?>
                        </td>
                        <td>
                            <?= $client['address']; ?>
                        </td>
                        <td>
                            <?= $client['phone']; ?>
                        </td>
                        <td>
                            <?= $client['email']; ?>
                        </td>
                        <td>
                            <!-- Button to trigger modal for editing client -->
                            <button type="button" class="btn btn-warning btn-sm edit-btn" data-toggle="modal"
                                data-target="#clientModal" data-id="<?= $client['id']; ?>"
                                data-fullName="<?= $client['fullName']; ?>" data-CIN="<?= $client['CIN']; ?>"
                                data-address="<?= $client['address']; ?>" data-phone="<?= $client['phone']; ?>"
                                data-email="<?= $client['email']; ?>">
                                Edit
                            </button>
                            <!-- Form for deleting client -->
                            <form action="../controllers/client.php" method="post" style="display:inline-block;">
                                <input type="hidden" name="action" value="deleteClient">
                                <input type="hidden" name="delete_id" value="<?= $client['id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Modal for adding/editing clients -->
    <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel w-100vw"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Client Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="clientForm" action="../controllers/client.php" method="post">
                        <input type="hidden" name="action" id="action" value="addClient">
                        <input type="hidden" name="id" id="clientId">

                        <div class="form-group">
                            <label for="fullName">Full Name:</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" required>
                        </div>
                        <div class="form-group">
                            <label for="CIN">CIN:</label>
                            <input type="text" class="form-control" id="CIN" name="CIN" required>
                        </div>
                        <div class="form-group">
                            <label for="address">address:</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <script>
        $(document).ready(function () {
            $('#clientTable').DataTable();
            $('.edit-btn').click(function () {
                var id = $(this).data('id');
                var fullName = $(this).data('fullName');
                var CIN = $(this).data('CIN');
                var address = $(this).data('address');
                var phone = $(this).data('phone');
                var email = $(this).data('email');

                $('#action').val('editClient');
                $('#clientId').val(id);
                $('#fullName').val(fullName);
                $('#CIN').val(CIN);
                $('#address').val(address);
                $('#phone').val(phone);
                $('#email').val(email);
            });
        });
    </script>
</body>

</html>