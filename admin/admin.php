<?php 

session_start();
include "connection.php";
if(! $_SESSION['lgd']) {
    header("Location: auth.php" ); // verify session Authentification
}

$conn=cnxBD(); // global variable
$query = "SELECT * FROM films";
// select from films table
try {
    $statement = $conn->prepare($query);  
    $statement->execute();
    $showfilms = $statement->fetchAll();
} catch (PDOException $e){
    echo ($e ->getMessage());
}
$query = "SELECT * FROM projection";
// select from projection table
try {
    $stat2 = $conn->prepare($query);  
    $stat2->execute();
    $projection = $stat2->fetchAll();
} catch (PDOException $er){
    echo ($er ->getMessage());
}

$query = "SELECT * FROM reservation";
// select from reservation table
try {
    $stat = $conn->prepare($query);  
    $stat->execute();
    $reservation = $stat->fetchAll();
} catch (PDOException $err){
    echo ($err ->getMessage());
}

$sql = "SELECT * FROM clients";
// select from clients table
try {
    $st = $conn->prepare($sql);  
    $st->execute();
    $clients = $st->fetchAll();
} catch (PDOException $eror){
    echo ($eror ->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Icon Logo -->
    <link rel="icon" href="../img/logo.png" type="image/png" sizes="16x16">

    <title>Gestion Du Cinema</title>
    <style>
        body {
            color: #566787;
            background: rgb(8, 8, 8);
            font-family: 'Varela Round', sans-serif;
            font-size: 16px;
            display: flex;
        }

        .wrapper {
            display: flex;
            position: relative;
        }

        .wrapper .main_content {
            width: 100%;
            text-align: center;
        }

        .wrapper .main_content .header {
            padding: 20px;
            color: #fff;
            border-bottom: 2px solid #e0e4e8;
            text-align: center;
            padding-top: 30px;
            font-size: 40px;
        }

        .wrapper .main_content .info {
            margin: 20px;
            color: #717171;
            line-height: 25px;
        }

        .wrapper .main_content .info div {
            margin-bottom: 20px;
        }

        @media (max-height: 500px) {
            .social_media {
                display: none !important;
            }
        }

        section {
            display: flex;
            height: 100vh;
            position: relative;
            left: 22%;
            width: auto;
            align-items: right;
            justify-content: center;
            color: #96c7e8;
            font-size: 14px;
            padding-bottom: 80vh;
            border-bottom: 2px solid #e0e4e8;

        }

        .table-responsive {
            margin: 20px 0;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 13px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            width: fit-content;

        }

        .table-title {
            padding-bottom: 12px;
            background: #006aa7;
            color: #fff;
            padding: 14px 30px;
            margin: -20px -25px 10px;
            border-radius: 13px 13px 0px 0px;
        }

        .table-title h2 {
            margin: 8px 0 0;
            font-size: 20px;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            display: justify;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        f table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }

        /* Custom checkbox */

        .custom-checkbox {
            position: relative;
        }

        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }

        .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }

        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }

        .custom-checkbox input[type="checkbox"]:checked+label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            border-color: #fff;
        }

        .custom-checkbox input[type="checkbox"]:disabled+label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }

        /* Modal styles */

        .modal .modal-dialog {
            max-width: 400px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 3px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
        /////////////////////
        $(document).ready(function() {
            $(".btn-group .btn").click(function() {
                var inputValue = $(this).find("input").val();
                if (inputValue != 'all') {
                    var target = $('table tr[data-status="' + inputValue + '"]');
                    $("table tbody tr").not(target).hide();
                    target.fadeIn();
                } else {
                    $("table tbody tr").fadeIn();
                }
            });
            // Changing the class of status label to support Bootstrap 4
            var bs = $.fn.tooltip.Constructor.VERSION;
            var str = bs.split(".");
            if (str[0] == 4) {
                $(".label").each(function() {
                    var classStr = $(this).attr("class");
                    var newClassStr = classStr.replace(/label/g, "badge");
                    $(this).removeAttr("class").addClass(newClassStr);
                });
            }
        });
    </script>
</head>

<body>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <div class="wrapper">

        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="../php/index.php" class="list-group-item list-group-item-action py-2 ripple active"
                        aria-current="true">
                        <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Clients dashboard</span>
                    </a>
                    <a href="#sec1" class="list-group-item list-group-item-action py-2 ripple ">
                        <i class="fas fa-film fa-fw me-3"></i><span>Add Film</span>
                    </a>
                    <a href="#sec3" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fas fa-camera-retro me-3"></i><span>Create Projection</span></a>
                    <a href="#sec4" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fas fa-list-ul fa-fw me-3"></i><span>Show Reservation</span></a>
                    <a href="#sec5" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-database fa-fw me-3"></i><span>Export CSV</span>
                    </a>
                    <a href="#sec6" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-users fa-fw me-3"></i><span>Manage Clients</span></a>
                    <a href="logout.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-door-closed fa-fw me-3"></i><span>Logout</span></a>

                </div>
            </div>
        </nav>
        <div class="main_content">
            <div class="header">Welcome Admin !! Have a nice day.</div>

            <section id="sec1">


                <div class="container">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h2>Insert <b>Film</b></h2>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="#addfilm" class="btn btn-success" data-toggle="modal"><i
                                                class="material-icons">&#xE147;</i> <span>Add New Film</span></a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id Film</th>
                                        <th>Film Title</th>
                                        <th>Film Director</th>
                                        <th>Acteur</th>
                                        <th>Annee</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($showfilms as $output) {?>
                                    <tr>
                                        <td><?php echo $output['id_film'];?></td>
                                        <td><?php echo $output['titre'];?></td>
                                        <td><?php echo $output['realisateur'];?></td>
                                        <td><?php echo $output['acteur'];?></td>
                                        <td><?php echo $output['annee'];?></td>
                                        <?php $msg="delete.php?id=".$output['id_film']; ?>
                                        <td><a href='<?php echo $msg ?>' class="btn btn-danger" data-toggle="modal">
                                                <i class="material-icons">&#xE15C;</i> <span
                                                    style=' display: flex;margin-left: auto; margin-right: auto;'>Delete</span></a>
                                        </td>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="addfilm" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="addFilm.php" method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Film
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="id_film" class="col-form-label">Id Film</label>
                                        <input type="number" name="id_film" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="titre" class="col-form-label">Film Title</label>
                                        <input type="text" name="titre" id="title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="realisateur" class="col-form-label">Film Director</label>
                                        <input type="text" name="realisateur" class="form-control" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="acteur" class="col-form-label">Acteur</label>
                                        <textarea type="text" name="acteur" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="annee" class="col-form-label">Annee</label>
                                        <input type="date" name="annee" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default btn-block" data-dismiss="modal"
                                        value="Cancel">
                                    <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal HTML -->
                <div id="deleteFilm" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form>
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Employee</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete these Records?</p>
                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section id="sec3">

                <div class="container-lg">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2>Create <b>Projection</b></h2>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="addProjection.php"><button type="button"
                                                class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id </th>
                                        <th>Film Title</th>
                                        <th>Time</th>
                                        <th>Prix</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($projection as $out) {?>
                                    <tr>
                                        <td><?php echo $out['id_projection'];?></td>
                                        <td><?php echo $out['film'];?></td>
                                        <td><?php echo $out['time'];?></td>
                                        <td><?php echo $out['prix'];?></td>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>


            <section id="sec4">
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h2>Show <b>Reservation</b></h2>
                                    </div>

                                </div>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id Client</th>
                                        <th>Film Title</th>
                                        <th>Date</th>
                                        <th>Prix</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($reservation as $outcome) {?>
                                    <tr>
                                        <td><?php echo $outcome['id_client'];?></td>
                                        <td><?php echo $outcome['titre'];?></td>
                                        <td><?php echo $outcome['time'];?></td>
                                        <td><?php echo $outcome['prix'];?></td>

                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </section>
            <section id="sec5">
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h2><b>Export</b> CSV</h2>
                                    </div>
                                    <div class="col-sm-7">
                                        <a href="export.php" class="btn btn-secondary"><i
                                                class="material-icons">&#xE24D;</i>
                                            <span>Export Form CSV</span></a>

                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id Client</th>
                                        <th>Film Title</th>
                                        <th>Date</th>
                                        <th>Prix</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($reservation as $outcome) {?>
                                    <tr>
                                        <td><?php echo $outcome['id_client'];?></td>
                                        <td><?php echo $outcome['titre'];?></td>
                                        <td><?php echo $outcome['time'];?></td>
                                        <td><?php echo $outcome['prix'];?></td>

                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <section id="sec6">
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Manage <b>Clients</b></h2>
                                    </div>

                                    <div class="col-xs-6">
                                        <a href="newClient.php" class="btn btn-success"><i
                                                class="material-icons">&#xE147;</i><span>Add New Client</span></a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id Client</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($clients as $out) {?>
                                    <tr>
                                        <td><?php echo $out['id'];?></td>
                                        <td><?php echo $out['username'];?></td>
                                        <td><?php echo $out['email'];?></td>
                                        <td><?php echo $out['tele'];?></td>
                                        <?php  $msg="deleteClients.php?id=".$out['id'];  ?>
                                        <td><a href='<?php echo $msg ?>' class="btn btn-danger" data-toggle="modal">
                                                <i class="material-icons">&#xE15C;</i> <span
                                                    style=' display: flex;margin-left: auto; margin-right: auto;'>Delete</span></a>
                                        </td>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</body>

</html>