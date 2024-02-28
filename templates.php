<?php include('includes/header.php')?>
<?php include('includes/navbar.php')?>
<?php
$page_title="templates page";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <style>
        .img-link {
            display: block;
            width: 75%;
            cursor: pointer;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3>Registration form</h3>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST">
                                <div class="form-group mb-3">
                                    <!-- Wrap the image with an anchor tag -->
                                    <a href="resumeinfo1.php">
                                        <img class="img-link" src="includes/temp1.jpeg">
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php include('includes/footer.php')?>
