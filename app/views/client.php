<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients Management</title>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- Custom JavaScript for AJAX -->
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            var dataTable = $('#clientTable').DataTable({
                "ajax": {
                    "url": "get_clients.php", // Replace with the actual endpoint to fetch clients
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "id" },
                    { "data": "fullName" },
                    { "data": "CIN" },
                    { "data": "address" },
                    { "data": "phone" },
                    { "data": "email" },
                    {
                        "data": "id",
                        "render": function (data) {
                            return '<button class="editBtn" data-client-id="' + data + '">Edit</button>' +
                                   '<button class="deleteBtn" data-client-id="' + data + '">Delete</button>';
                        }
                    }
                ]
            });

            // Define function to handle delete action
            function deleteClient(id) {
                if (confirm("Are you sure you want to delete this client?")) {
                    // Perform AJAX request to delete client
                    $.ajax({
                        type: "POST",
                        url: "controllerS/client.php",
                        data: {
                            action: 'deleteClient',
                            delete_id: id
                        },
                        success: function (response) {
                            // Reload DataTable after successful deletion
                            dataTable.ajax.reload();
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            }

            // Handle delete button click event
            $('#clientTable').on('click', '.deleteBtn', function () {
                var clientId = $(this).data('client-id');
                deleteClient(clientId);
            });

            // Show modal for adding/editing clients
            $('#addBtn').on('click', function () {
                $('#fullName').val('');
                $('#CIN').val('');
                $('#address').val('');
                $('#phone').val('');
                $('#email').val('');
                $('#clientId').val('');
                $('#clientModal').show();
            });

            // Handle edit button click event
            $('#clientTable').on('click', '.editBtn', function () {
                var clientId = $(this).data('client-id');

                // Perform AJAX request to get client details for editing
                $.ajax({
                    type: "GET",
                    url: "get_client_details.php", // Replace with the actual endpoint to fetch client details
                    data: { id: clientId },
                    dataType: 'json',
                    success: function (client) {
                        // Fill modal fields with client details
                        $('#fullName').val(client.fullName);
                        $('#CIN').val(client.CIN);
                        $('#address').val(client.address);
                        $('#phone').val(client.phone);
                        $('#email').val(client.email);
                        $('#clientId').val(client.id);

                        // Show modal for editing
                        $('#clientModal').show();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // Handle save button click event
            $('#saveBtn').on('click', function () {
                // Perform AJAX request to save client details
                $.ajax({
                    type: "POST",
                    url: "controller/client.php",
                    data: {
                        action: ($('#clientId').val() === '') ? 'addClient' : 'editClient',
                        id: $('#clientId').val(),
                        fullName: $('#fullName').val(),
                        CIN: $('#CIN').val(),
                        address: $('#address').val(),
                        phone: $('#phone').val(),
                        email: $('#email').val()
                    },
                    success: function (response) {
                        // Reload DataTable after successful save
                        dataTable.ajax.reload();
                        // Hide modal after saving
                        $('#clientModal').hide();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // Handle close button click event
            $('#closeBtn').on('click', function () {
                // Hide modal
                $('#clientModal').hide();
            });
        });
    </script>
</head>
<body>

    <h2>Clients Management</h2>

    <!-- Add button for showing modal -->
    <button id="addBtn">Add Client</button>

    <!-- Table for displaying clients -->
    <table id="clientTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>CIN</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <!-- Modal for adding/editing clients -->
    <div id="clientModal" style="display: none;">
        <h3>Add/Edit Client</h3>
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName">
        <label for="CIN">CIN:</label>
        <input type="text" id="CIN" name="CIN">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <input type="hidden" id="clientId" name="clientId">
        <button id="saveBtn">Save</button>
        <button id="closeBtn">Close</button>
    </div>

</body>
</html>
