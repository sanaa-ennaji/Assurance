<?php

require "../controllers/article.php";


?>

<!DOCTYPE html>     
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Management</title>
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

    <?php include 'sidebar.html' ?>
    <div class="container mt-5">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#articleModal">
            Add Article
        </button>
        <table id="articleTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Client</th>
                    <th>Insurer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td>
                            <?= $article['id']; ?>
                        </td>
                        <td>
                            <?= $article['title']; ?>
                        </td>
                        <td>
                            <?= $article['description']; ?>
                        </td>
                        <td>
                            <?= $article['clientName']; ?>
                        </td>
                        <td>
                            <?= $article['insurerName']; ?>
                        </td>
                        <td>

                            <button type="button" class="btn btn-warning btn-sm edit-btn" data-toggle="modal"
                                data-target="#articleModal" data-id="<?= $article['id']; ?>"
                                data-title="<?= $article['title']; ?>" data-description="<?= $article['description']; ?>"
                                data-clientId="<?= $article['clientId']; ?>" data-insurerId="<?= $article['insurerId']; ?>">
                                Edit
                            </button>
                            <form action="../controllers/article.php" method="post" style="display:inline-block;">
                                <input type="hidden" name="action" value="deleteArticle">
                                <input type="hidden" name="delete_id" value="<?= $article['id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel w-100vw"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Article Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="articleForm" action="../controllers/article.php" method="post">
                        <input type="hidden" name="action" id="action" value="addArticle">
                        <input type="hidden" name="id" id="articleId">

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" class="form-control" id="description" name="description" >
                        </div>
                        <div class="form-group">
                            <label for="clientId">Client:</label>
                            <select class="form-control" id="clientId" name="clientId" >
                                <?php foreach ($clients as $client): ?>
                                    <option value="<?= $client['id']; ?>"><?= $client['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="insurerId">Insurer:</label>
                            <select class="form-control" id="insurerId" name="insurerId" >
                                <?php foreach ($insurers as $insurer): ?>
                                    <option value="<?= $insurer['id']; ?>"><?= $insurer['nom']; ?></option>
                                <?php endforeach; ?>
                            </select>
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
            $('#articleTable').DataTable();
            $('.edit-btn').click(function () {
                var id = $(this).data('id');
                var title = $(this).data('title');
                var description = $(this).data('description');
                var clientId = $(this).data('clientId');
                var insurerId = $(this).data('insurerId');

                $('#action').val('editArticle');
                $('#articleId').val(id);
                $('#title').val(title);
                $('#description').val(description);
                $('#clientId').val(clientId);
                $('#insurerId').val(insurerId);
            });
        });
    </script>
</body>

</html>
