<?php include '../shared/head.php';
     include '../shared/nav.php';
     include '../genral/configDB.php';
     include '../genral/functions.php';

     if (isset($_POST['send'])) {
         $name = $_POST['name'];
         $insert ="INSERT INTO `fileds` VALUES (NULL , '$name')";
         $i =  mysqli_query($conn, $insert);
         testMessage($i, "Insert");
     }
// Select Fileds Table

// Edit
$edit = false;
$name ="";
if (isset($_GET['edit'])) {
    $edit =true;
    $id = $_GET['edit'];
    $select = "SELECT * FROM fileds where id = $id";
    $ss =  mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['filed'];
    
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $update ="UPDATE `fileds` SET filed = '$name' where id = $id";
        $u =  mysqli_query($conn, $update);
        testMessage($u, "Updated");
    }
}
auth(1,2);
?>
<?php  if ($edit) :?>
<h1 class="text-center text-info display-2 b pt-5"> Edit filed : <?php echo $name?> </h1>
<?php else:?>
<h1 class="text-center text-primary display-2 b pt-5"> Add filed</h1>
<?php endif; ?>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="from-group">

                    <label for="">fileds Name </label>
                    <input name="name" value="<?php echo $name?>" type="text" class="form-control" placeholder="Name">
                </div>
                <?php  if ($edit) :?>
                <button name="update" class="btn btn-danger m-3 mx-auto w-50 btn-block"> Update</button>
                <?php else: ?>
                <button name="send" class="btn btn-info m-3 mx-auto w-50 btn-block"> Send Data </button>
                <?php endif;?>
            </form>
        </div>
    </div>
</div>

<?php include '../shared/script.php' ?>