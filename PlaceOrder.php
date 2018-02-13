<?php
include "header.php" ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Place Order

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Place Order</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">


                    <form role="form" enctype="application/x-www-form-urlencoded" action="">
                        <div class="box-header with-border">
                            <button class="btn btn-primary" id="btnNew" type="reset">New Order</button>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="date" id="pickDate">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Order ID</label>
                                <input class="form-control" name="orderID" id="txtOrderID" placeholder="Enter Order ID" readonly>
                            </div>
                            <div class="form-group">
                                <label>Customer ID</label>
                                <select class="form-control select2" data-placeholder="Select a Customer" id="txtCustomer" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Item ID</label>
                                <select class="form-control select2" data-placeholder="Select an Item" id="txtItem" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" name="description" id="txtDescription" placeholder="Description">
                            </div>
                            <div class="form-group">
                                <label>Quantity on Hand</label>
                                <input class="form-control" name="qtyOnHand" id="txtQtyOnHand" placeholder="Quantity on Hand">
                            </div>
                            <div class="form-group">
                                <label>Unit Price</label>
                                <input class="form-control" name="unitPrice" id="txtPrice" placeholder="Unit Price">
                            </div>
                            <div class="form-group">
                                <label>Ordered Quantity</label>
                                <input class="form-control" name="orderedQty" id="txtOrderedQty" placeholder="Ordered Quantity">
                            </div>
                            <div class="form-group">
                                <label>Total</label>
                                <input class="form-control" name="total" id="txtTotal" placeholder="Total Price">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" id="btnAdd">Add</button>
                            <button type="button" class="btn btn-primary" id="btnRemove">Remove</button>
                        </div>
                    </form>
                </div>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Order Details</h3>
                    </div>
                    <div class="box-body">
                        <table id="tblOrder" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Item Id</th>
                                <th>Description</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer">
                        <button type="button" class="btn btn-primary" id="btnPlaceOrder" data-toggle="modal" data-target="#modal-success">Place Order</button>
                        <div class="description-block pull-right">
                            <div class="description-header">
                                Net Total
                            </div>
                            <input type="text" class="form-control" name="total" id="netTotal">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>


    </div>
    <!-- ./wrapper -->
    </div>


<?php

include "footer.php"?>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="js/order-controller.js"></script>
</body>
</html>

