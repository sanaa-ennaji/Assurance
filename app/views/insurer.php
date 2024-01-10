<?php
require "../controllers/insurer.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurer Management</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        #body-pd {
            right: 0%;
        }
    </style>
</head>

<body>

    <?php
     include 'sidebar.html'
     ?>
    <div class="container mt-5">
        <!-- Button to trigger modal for adding/editing insurers -->
        <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#insurerModal">
            Add assurance
        </button>

        <!-- DataTable to display insurers -->
        <table id="insurerTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($insurers as $insurer): ?>
                    <tr>
                        <td>
                            <?= $insurer['id']; ?>
                        </td>
                        <td>
                            <?= $insurer['nom']; ?>
                        </td>
                        <td>
                            <?= $insurer['address']; ?>
                        </td>
                        <td>
                            <?= $insurer['phone']; ?>
                        </td>
                        <td>
                            <?= $insurer['email']; ?>
                        </td>
                        <td>

                            <button type="button" class="btn btn-warning btn-sm edit-btn" data-toggle="modal"
                                data-target="#insurerModal" data-id="<?= $insurer['id']; ?>"
                                data-nom="<?= $insurer['nom']; ?>" data-address="<?= $insurer['address']; ?>"
                                data-phone="<?= $insurer['phone']; ?>" data-email="<?= $insurer['email']; ?>">
                                Edit
                            </button>
                            <form action="../controllers/insurer.php" method="post" style="display:inline-block;">
                                <input type="hidden" name="action" value="deleteinsurer">
                                <input type="hidden" name="delete_id" value="<?= $insurer['id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="insurerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel w-100vw"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insurer Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="insurerForm" action="../controllers/insurer.php" method="post">
                        <input type="hidden" name="action" id="action" value="addinsurer">
                        <input type="hidden" name="id" id="insurerId">

                        <div class="form-group">
                            <label for="nom"> Name:</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
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
    <!-- <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <script>
        $(document).ready(function () {
            $('#insurerTable').DataTable();
            $('.edit-btn').click(function () {
                var id = $(this).data('id');
                var nom = $(this).data('nom');
                var address = $(this).data('address');
                var phone = $(this).data('phone');
                var email = $(this).data('email');

                $('#action').val('editinsurer');
                $('#insurerId').val(id);
                $('#nom').val(nom);

                $('#address').val(address);
                $('#phone').val(phone);
                $('#email').val(email);
            });
        });
    </script>
</body>

</html>
