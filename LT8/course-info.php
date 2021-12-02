<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link href="css/modern.css" rel="stylesheet">
    <script src="js/settings.js"></script>

    <script type="text/javascript">
        function validate_price() {
            let price = document.getElementById("price").value;
            let error;

            if (isNaN(price)) {
                error = "Invalid price";
                document.getElementById("price-error").innerHTML = error;
                document.getElementById('price').className = "form-control is-invalid";
                return false;
            } else if (price.length > 15) {
                error = "Price length cannot be greater than 15";
                document.getElementById("price-error").innerHTML = error;
                document.getElementById('price').className = "form-control is-invalid";
                return false;
            } else {
                error = "";
                document.getElementById("price-error").innerHTML = error;
                document.getElementById('price').className = "form-control";
                return true;
            }
        }

        function validate_discount() {
            let discount = document.getElementById("discount").value;
            let error;

            if (isNaN(discount)) {
                error = "Invalid amount";
                document.getElementById("discount-error").innerHTML = error;
                document.getElementById('discount').className = "form-control is-invalid";
                return false;
            } else if (discount.length > 15) {
                error = "Discount length cannot be greater than 15";
                document.getElementById("discount-error").innerHTML = error;
                document.getElementById('discount').className = "form-control is-invalid";
                return false;
            } else {
                error = "";
                document.getElementById("discount-error").innerHTML = error;
                document.getElementById('discount').className = "form-control";
                return true;
            }
        }

        function validate_form() {
            let correctPrice = validate_price();
            let correctDiscount = validate_discount();
            if (correctPrice && correctDiscount) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="wrapper">
        <?php
        include 'sidebar.php';
        ?>
        <div class="main">
            <?php
            include 'navbar.php';
            ?>
            <main class="content">
                <div class="container-fluid">

                    <div class="header">
                        <h1 class="header-title">
                            Add Manager
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Manager</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="card-title mb-8 text-success">
                                        <?php
                                        if (isset($message)) {
                                            echo $message;
                                        }
                                        ?>
                                    </h1>
                                    <h5 class="card-title mb-0">Course Information</h5>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="inputUsername">Course Name:</label>
                                                <input type="text" class="form-control text-dark" id="id" name="id" disabled value="Machine Learning">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputUsername">Course ID:</label>
                                                <input type="text" class="form-control text-dark" id="name" disabled value="CSC-2209">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="text-center">
                                            <img src="https://d1m75rqqgidzqn.cloudfront.net/wp-data/2020/08/10144622/shutterstock_714415102.png" class="img-fluid card-img-hover landing-img" alt="Machine Learning" />
                                                <div class="mt-2">
                                                    <label class="form-label" for="customFile">Change Image</label>
                                                    <form method="post">
                                                        <input type="file" name="crop_image" class="crop_image form-control" id="upload_image" />
                                                    </form>
                                                    <label id="picture-error" class="error validation-error small form-text invalid-feedback"></label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Course Price</h5>
                                    <h6 class="card-subtitle text-muted">Add price or discount for this course</h6>
                                </div>
                                <div class="card-body">
                                    <form name="regForm" onsubmit="return validate_form()" method="post">
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-2 text-sm-right">Price:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="price" name="price" placeholder="Enter course price" onblur="validate_price()" onkeyup="validate_price()">
                                                <label id="price-error" class="error validation-error small form-text invalid-feedback"></label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-2 text-sm-right">Discount:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter discount" onblur="validate_discount()" onkeyup="validate_discount()">
                                                <label id="discount-error" class="error validation-error small form-text invalid-feedback"></label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10 ml-sm-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="submit" class="btn btn-light">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <?php
            include 'footer.php';
            ?>

        </div>

    </div>

    <!-- Javascript Start from here -->
    <script src="js/app.js"></script>



</body>

</html>