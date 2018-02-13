<?php
include "header.php"?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Item
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Item</li>
        </ol>
    </section>
    <section class="content">
    <div class="row">
        <!-- left column -->
        <!--/.col (left) -->
        <!-- right column -->

        <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Manage Item</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form id="itemForm" action="phpController/item-controller.php" method="post"
                          enctype="application/x-www-form-urlencoded" class="needs-validation">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Item Id</label>
                            <input type="text" id="itemId" name="itemId" class="form-control"
                                   placeholder="Item Id" readonly>
                        </div>
                        <div class="form-group">
                            <label>Item Name</label>
                            <input type="text" id="itemName" name="itemName" class="form-control"
                                   placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" id="quantity" name="quantity" class="form-control"
                                   placeholder="Enter Quantity" required>
                        </div>
                        <div class="form-group">
                            <label>Unit Price $</label>
                            <input type="text" id="unitPrice" name="unitPrice" class="form-control"
                                   placeholder="Enter Unit Price" required>
                        </div>
                        <div class="form-group">
                            <div>
                                <div class="col-md-8"></div>
                                <button id="btnSave" type="submit" class="btn btn-primary">Save</button>
                                <button id="btnDeleteItem" type="reset" class="btn btn-primary">Delete</button>
                                <button id="btnAllItem" type="button" class="btn btn-primary">View All Item</button>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- /.row -->
</section>
    <!-- Main content -->
    <section id="alerts" class="content">
        <div class="row">
            <!-- left column -->
            <!--/.col (left) -->
            <!-- right column -->

            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Items</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box">

                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="tblItem" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th> Item Id</th>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>

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

</div>

</div>
<!-- ./wrapper -->
</div>




<?php
include "footer.php"?>
<script src="js/item-controller.js"></script>
</body>
</html>
