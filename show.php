<?php 
require 'db.php';
$sql = 'SELECT * FROM students ORDER BY id ASC';
$dbstudents = $connection->query($sql);
$results = $dbstudents->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container mt-5">
  <a href="/" class="btn btn-link">Home page</a>
  <?php  if (count($results)) : ?>
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
    <?php foreach ($results as $result): ?>
        <tr>
          <td><?php echo $result->id ; ?></td>
          <td><?php echo $result->name ; ?></td>
          <td><?php echo $result->email ; ?></td>
          <td>
            <a class="btn btn-info" href="edit.php?id=<?php echo $result->id; ?>">edit</a>
            <a onclick="return confirm('Are you sure, You want to delete this entry')" class="btn btn-danger" href="delete.php?id=<?php echo $result->id; ?>">delete</a>
          </td>
        </tr>
    <?php endforeach ; ?>
  </table>
<?php else: ?>
  <h2>No records found in database</h2>
<?php endif; ?>

  
</div>
<?php require 'footer.php'; ?>