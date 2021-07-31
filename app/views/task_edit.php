<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="favicon.png">
  <title><?php echo $task->getTitle() ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="/task_edit.css">
</head>

<body>
  <?php if ($_SESSION['flash_status'] === TRUE) : ?>
    <div class="alert alert-primary" role="alert">
      <?php echo $_SESSION['flash_message'] ?>
    </div>
  <?php elseif(isset($_SESSION)) : ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $_SESSION['flash_message'] ?>
    </div>
  <?php endif; ?>
  <section class="d-flex m-5 justify-content-center">
    <div class="d-flex border p-5 rounded shadow">
      <form method="post" action="/task/<?php echo $task->getId() ?>/update">
        <div class="form-group">
          <label for="title">Title</label>
          <input required class="form-control" type="text" id="title" name="title" value="<?php echo $task->getTitle() ?>" />
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea required rows="10" class="form-control" type="text" id="description" name="description" />
          <?php echo $task->getDescription() ?>
          </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
    <section>

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>