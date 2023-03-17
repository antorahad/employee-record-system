<?php
include("config.php");
?>

<?php
if (isset($_POST['search'])) {
    $emp_search = $_POST['emp_search'];
    $queary = "SELECT * FROM employee WHERE id = '$emp_search'";
    $data = mysqli_query($db, $queary);
    $result = mysqli_fetch_assoc($data);
}
?>

<?php
if (isset($_POST['save'])) {
    $emp_name = $_POST['emp_name'];
    $emp_gender = $_POST['emp_gender'];
    $emp_mobile = $_POST['emp_mobile'];
    $emp_email = $_POST['emp_email'];
    $emp_department = $_POST['emp_department'];
    $emp_address = $_POST['emp_address'];

    $query = "INSERT INTO employee (name, gender, mobile, email, department, address) VALUES ('$emp_name', ' $emp_gender', '$emp_mobile', '$emp_email', '$emp_department', '$emp_address')";

    $data = mysqli_query($db, $query);

    if ($data) {
?>
        <script>
            alert('Employee details saved into the record successfully');
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Employee details did not saved into the record');
        </script>
<?php
    }
}
?>

<?php
if (isset($_POST['update'])){
    $id = $_POST['emp_search'];
    $emp_name = $_POST['emp_name'];
    $emp_gender = $_POST['emp_gender'];
    $emp_mobile = $_POST['emp_mobile'];
    $emp_email = $_POST['emp_email'];
    $emp_department = $_POST['emp_department'];
    $emp_address = $_POST['emp_address'];

    $queary = "UPDATE employee SET name = '$emp_name', gender = '$emp_gender', mobile = '$emp_mobile', email = '$emp_email', department = '$emp_department', address = '$emp_address' WHERE id= '$id'";
    $data = mysqli_query($db, $queary);
    if ($data) {
        ?>
                <script>
                    alert('Employee record updated successfully');
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Failed to update employee record');
                </script>
        <?php
            }
}
?>

<?php
if (isset($_POST['delete'])) {
    $id = $_POST['emp_search'];
    $queary = "DELETE FROM employee WHERE id = '$id' ";
    $data = mysqli_query($db, $queary);
    if ($data) {
?>
        <script>
            alert('Employee record deleted successfully');
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Failed to delete employee record');
        </script>
<?php
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Record System</title>
    <!-- Favicon link -->
    <link rel="shortcut icon" href="img/hr.png" type="image/x-icon">
    <!-- CSS link -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="index.php" method="POST" class="form shadow position-absolute top-50 start-50 translate-middle">
                        <h1 class="text-center mb-3">Employee Record System</h1>
                        <div class="mb-3">
                            <input type="text" name="emp_search" class="form-control" placeholder="Search ID" value="<?php if (isset($_POST['search'])) {
                                                                                                                            echo $result['id'];
                                                                                                                        } ?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="emp_name" class="form-control" placeholder="Employee Name" value="<?php if (isset($_POST['search'])) {
                                                                                                                            echo $result['name'];
                                                                                                                        } ?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="emp_gender" class="form-control" placeholder="Employee Gender" value="<?php if (isset($_POST['search'])) {
                                                                                                                                echo $result['gender'];
                                                                                                                            } ?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="emp_mobile" class="form-control" placeholder="Mobile Number" value="<?php if (isset($_POST['search'])) {
                                                                                                                                echo $result['mobile'];
                                                                                                                            } ?>">
                        </div>
                        <div class="mb-3">
                            <input type="email" name="emp_email" class="form-control" placeholder="Email Address" value="<?php if (isset($_POST['search'])) {
                                                                                                                                echo $result['email'];
                                                                                                                            } ?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="emp_department" class="form-control" placeholder="Employee Department" value="<?php if (isset($_POST['search'])) {
                                                                                                                                    echo $result['department'];
                                                                                                                                } ?>">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="emp_address" placeholder="Employee Address"><?php if (isset($_POST['search'])) {
                                                                                                                    echo $result['address'];
                                                                                                                } ?></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="search" class="btn btn-primary text-white">Search</button>
                            <button type="submit" name="save" class="btn btn-success text-white">Save</button>
                            <button type="submit" name="update" class="btn btn-warning text-white">Update</button>
                            <button type="submit" name="delete" onclick="return confirmdelete()" class="btn btn-danger text-white">Delete</button>
                            <button type="reset" name="clear" class="btn btn-secondary text-white">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        function confirmdelete(){
           return confirm("Are you sure you want to delete this record?");
        }
    </script>
</body>

</html>