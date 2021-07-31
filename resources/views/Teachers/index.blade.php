<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Inner Page - Flexor Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Flexor - v2.4.1
  * Template URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


  <main id="main">

    <section style="padding-top: 100px"">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>All Teacher</h4>
                            <a class="btn btn-success" href="" id="addTeacherBtn">Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                               <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Institute</th>
                                        <th>Action</th>
                                    </tr>
                               </thead>
                                <tbody id="teachersShow">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                           <h4 class="addT">Add New Teacher</h4>
                           <h4 class="updateT">Update Teacher</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" id="getEditId">
                            <input type="hidden" id="getDeleteId">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="teacherName" class="form-control" placeholder="Name">
                                <span class="text-danger" id="nameError"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" id="teacherTitle" name="title" class="form-control" placeholder="Title">
                                <span class="text-danger" id="titleError"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Institute</label>
                                <input type="text" id="teacherIstitute" name="institute" class="form-control" placeholder="Institute">
                                <span class="text-danger" id="instituteError"></span>
                            </div>
                            <div class="form-group">
                                <input id="addButton" type="submit" class="btn btn-primary" value="Add">
                                <input id="updateButton" type="submit" class="btn btn-secondary" value="Update">
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>


    {{-- Add Teacher Modal --}}
    <div class="modal fade" id="addTeacherModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="teacherName" class="form-control" placeholder="Name">
                        <span class="text-danger" id="nameError"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" id="teacherTitle" name="title" class="form-control" placeholder="Title">
                        <span class="text-danger" id="titleError"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Institute</label>
                        <input type="text" id="teacherIstitute" name="institute" class="form-control" placeholder="Institute">
                        <span class="text-danger" id="instituteError"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input id="addButton" type="submit" class="btn btn-primary" value="Add Teacher">
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Teacher Modal --}}
    <div class="modal fade" id="editTeacherModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="getEditId">
                    <input type="hidden" id="getDeleteId">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="teacherName" class="form-control" placeholder="Name">
                        <span class="text-danger" id="nameError"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" id="teacherTitle" name="title" class="form-control" placeholder="Title">
                        <span class="text-danger" id="titleError"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Institute</label>
                        <input type="text" id="teacherIstitute" name="institute" class="form-control" placeholder="Institute">
                        <span class="text-danger" id="instituteError"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input id="updateButton" type="submit" class="btn btn-primary" value="Update Teacher">
                </div>
            </div>
        </div>
    </div>

  </main><!-- End #main -->

  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/js/sweetalert2@11.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
