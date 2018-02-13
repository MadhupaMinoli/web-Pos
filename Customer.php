<?php
include "header.php"

?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Customer
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Customer</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <!--/.col (left) -->
                <!-- right column -->

                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Manage Customer</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form id="customerForm" action="phpController/customer-controller.php" method="post" enctype="application/x-www-form-urlencoded" class="needs-validation">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Customer Id</label>
                                    <input type="text" id="customerId" name="customerId" class="form-control" placeholder="Customer Id" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input type="text" id="customerName" name="customerName" class="form-control" placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Customer Address</label>
                                    <input type="text" id="customerAddress" name="customerAddress" class="form-control" placeholder="Enter Address" required>
                                </div>
                                <div class="form-group">
                                    <label>Contact No</label>
                                    <input type="text" id="contactNo" name="contactNo" class="form-control" placeholder="Enter contact no" required>
                                </div>
                                <div class="form-group">
                                    <div >
                                        <div class="col-md-8"></div>
                                        <button class="btn btn-primary id="btnSave" type="submit"  >Save</button>
                                        <button id="btnDeleteCustomer" type="reset"  class="btn btn-primary">Delete </button>

                                        <button id="btnAllCustomer" type="button" class="btn btn-primary">View All Customer</button>

                                    </div>
                                </div>
                            </form>

                            <!-- /.box -->
                        </div>
                        <!--/.col (right) -->

                    </div>


                    <!-- /.row -->
        </section>
        <!-- /.content -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <!--/.col (left) -->
                <!-- right column -->

                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Customers</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">

                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="tblCustomer" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> Customer Id</th>
                                            <th>Customer Name</th>
                                            <th>Customer Address</th>
                                            <th>Contact No</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!--/.col (right) -->

                    </div>
                    <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    </div>
    <!-- ./wrapper -->
</div>



    <?php include "footer.php"?>
<script src="js/customer-controller.js"></script>
</body>
</html>

