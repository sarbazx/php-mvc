<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title>Tasks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <header class="m-3">
        <a href="/task/add" class="btn btn-primary">Add New Task</a>
    </header>
    <?php if ($_SESSION['flash_status'] === TRUE) : ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $_SESSION['flash_message'] ?>
        </div>
    <?php elseif (isset($_SESSION)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['flash_message'] ?>
        </div>
    <?php endif; ?>
    <section>
        <h1>Tasks</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task) : ?>
                    <tr>
                        <td><?php echo $task->getTitle() ?></td>
                        <td><?php echo $task->getDescription() ?></td>
                        <td>
                            <div>
                                <a href="/task/<?php echo $task->getID() ?>" class="btn btn-primary">View</a>
                                <a href="/task/<?php echo $task->getID() ?>/edit" class="btn btn-secondary">Edit</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php if (count($tasks) > 0) : ?>
            <nav class="d-flex justify-content-center">
                <ul class="pagination">
                    <?php if ($page !== 0) : ?>
                        <li class="page-item"><a class="page-link" href="/<?php echo ($page - 1) ?>">Previous</a></li>
                    <?php endif; ?>
                    <?php for ($index = 0; $index < $total_pages - 1; $index++) : ?>
                        <li class="page-item"><a class="page-link" href="<?php echo ($index + 1) ?>"><?php echo ($index + 1) ?></a></li>
                    <?php endfor; ?>
                    <?php if ($page !== ($total_pages - 1)) : ?>
                        <li class="page-item"><a class="page-link" href="/<?php echo ($page + 1) ?>">Next</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>
        <section>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>