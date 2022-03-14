<?php 
require 'db.php';

$sql = 'SELECT *FROM books';
$statement = $connection->prepare($sql);
$statement->execute();
$books = $statement->fetchAll(PDO::FETCH_OBJ);

?>
<?php require 'header.php';?>
<div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>All books</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Available</th>
                        <th>Pages</th>
                        <th>ISBN</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($books as $book): ?>
                        <tr>
                        <td><?=$book->id;?></td>
                        <td><?=$book->title;?></td>
                        <td><?=$book->author;?></td>
                        <td><?=$book->available;?></td>
                        <td><?=$book->pages;?></td>
                        <td><?=$book->isbn;?></td>
                        <td>
                            <a href="edit.php?id=<?=$book->id?>" class="btn btn-info">Edit</a>
                            <a onclick="return confirm('Are really want to delete this?')" href="delete.php?id=<?=$book->id?>" class="btn btn-danger">Delete</a>
                            
                        </td>
                        </tr>
                        
                    <?php endforeach;?>

                </table>
            </div>
        </div>
    </div>

<?php require 'footer.php';?> 