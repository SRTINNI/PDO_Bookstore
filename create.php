<?php require 'header.php';
?>
<?php 
require 'db.php';

$message='';
if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['available'])&& isset($_POST['pages'])&& isset($_POST['isbn'])){
    echo 'Submitted';
    $title = $_POST['title'];
    $author = $_POST['author'];
    $available = $_POST['available'];
    $pages = $_POST['pages'];
    $isbn = $_POST['isbn'];

    $sql = 'INSERT INTO books(title,author,available,pages,isbn) VALUES(:title,:author,:available,:pages,:isbn)';

    $statement = $connection ->prepare($sql);

    if($statement->execute([':title'=>$title,':author'=>$author,':available'=>$available,':pages'=>$pages,':isbn'=>$isbn])){
        $message = 'data inserted successfully';
    }

}                               
        
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Create a book</h2>
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
                    <input type="text" name="title" id="title" class="form-control">

                </div>
                <div class="form-group mt-3">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="available">Available</label>
                    <input type="text" name="available" id="available" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="pages">Pages</label>
                    <input type="int" name="pages" id="pages" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="isbn">ISBN</label>
                    <input type="int" name="isbn" id="isbn" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-info">Create a book</button>
                </div>
                
            </form>
        </div>
    </div>
</div>