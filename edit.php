<?php require 'header.php';
?>
<?php 

require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT *FROM books WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id'=>$id]);
$book = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['available'])&& isset($_POST['pages'])&& isset($_POST['isbn'])){
    echo 'Submitted';
    $title = $_POST['title'];
    $author = $_POST['author'];
    $available = $_POST['available'];
    $pages = $_POST['pages'];
    $isbn = $_POST['isbn'];

    $sql = 'UPDATE books SET title=:title,author=:author,available=:available,pages=:pages,isbn=:isbn WHERE id=:id';

    $statement = $connection ->prepare($sql);

    if($statement->execute([':title'=>$title,':author'=>$author,':available'=>$available,':pages'=>$pages,':isbn'=>$isbn,'id'=>$id])){
        header("Location:allbooks.php");
    }

}                               
        
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update book</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>

                </div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Title</label>
                    <input value="<?= $book->title;?>" type="text" name="title" id="title" class="form-control">

                </div>
                <div class="form-group mt-3">
                    <label for="author">Author</label>
                    <input value="<?=$book->author;?>" type="text" name="author" id="author" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="available">Available</label>
                    <input value="<?=$book->available;?>" type="text" name="available" id="available" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="pages">Pages</label>
                    <input value="<?=$book->pages;?>" type="int" name="pages" id="pages" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="isbn">ISBN</label>
                    <input value="<?=$book->isbn;?>" type="int" name="isbn" id="isbn" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-info">Update book</button>
                </div>
                
            </form>
        </div>
    </div>
</div>