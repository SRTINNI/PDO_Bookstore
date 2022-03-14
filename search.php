<?php
$conn=mysqli_connect('localhost','root','','Bookstore');

if(isset($_POST['search'])){
    $searchKey = $_POST['search'];
    $sql = "SELECT * FROM books WHERE title LIKE '%$searchKey%'";
}else{
$sql = "SELECT * FROM books";
$searchKey="";
}

$result= mysqli_query($conn,$sql);
?>
<div class="container">
    <div class="row">
        <div class="col-md- col-md-offset-2" style="margin-top:5%;">
        <div class="row">
            <form action="" method="POSt">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Search by title" value="<?php echo $searchKey;?>">
                </div>
                <div class="col-md-6 text-left">
                    <button class="btn btn-success">Search</button> 
                </div>
            </form>
            <br>
            <br>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                 <th>Author</th>
                <th>Available</th>
                <th>Pages</th>
                <th>ISBN</th>
            </tr>
            <?php while($row= mysqli_fetch_object($result)){ ?>
            <tr>
                <td><?php echo $row->title; ?> </td>
                <td><?php echo $row->author; ?> </td>
                <td><?php echo $row->available; ?> </td>
                <td><?php echo $row->pages; ?> </td>
                <td><?php echo $row->isbn; ?> </td>
            </tr>
                <?php } ?>

        </table>
        </div>
    </div>
</div>



