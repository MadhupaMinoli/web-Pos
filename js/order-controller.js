$("#tblOrder").DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false,
});

$('.select2').select2();

$('#pickDate').datepicker({
    autoclose: true,
    format: "yyyy-mm-dd"
});

    loadCustomers();
    loadItems();
var netTotal=0.0;
$("#btnAdd").click(function (ev) {
    var table = $("#tblOrder").DataTable();
    var itemID = $("#txtItem").select2("data")[0].id;
    var description = $("#txtDescription").val();
    var unitPrice = $("#txtPrice").val();
    var qty = $("#txtOrderedQty").val();
    var total = parseFloat(unitPrice) * parseFloat(qty);
    table.row.add([itemID, description, unitPrice, qty, total]).draw(false);
    netTotal+=total;
    $("#netTotal").val(netTotal);

});

$("#txtItem").on('change', function (ev) {

    var data = $("#txtItem").select2("data");
    var itemID = data[0].id;
    $.ajax({
        method: 'GET',
        url : '../myphpPOS/phpController/item-controller.php?all=true',
        aysnc: true
    }).done(function(response){
        var items = JSON.parse(response);
        for(var index in items){
            if(items[index][0] === itemID){
                $("#txtDescription").val(items[index][1]);
                $("#txtQtyOnHand").val(items[index][3]);
                $("#txtPrice").val(items[index][2]);
            }
        }
    }).fail(function(xhr, status, error){
        console.log(error);
    });
    $("#txtOrderedQty").focus();
});

$("#txtOrderedQty").keyup(function (ev) {
    var qty = $("#txtOrderedQty").val();

    if(qty){
        var temp = parseFloat(qty);
        if (isNaN(temp)){
            $("#txtOrderedQty").val('');
        }else{
            $("#txtTotal").val(parseFloat(qty) * parseFloat($("#txtPrice").val()));
        }
    }else{
        $("#txtTotal").val("");
    }
});


$("#btnPlaceOrder").click(function (ev) {
    var table = $("#tblOrder").DataTable();
    var rows = [];
    for(var i = 0; i < table.data().length ; i++){
        rows.push(table.data()[i]);
    }
    var orderDetails = JSON.stringify(rows);
    $.ajax({
        method: 'POST',
        url : '../myphpPOS/phpController/order-controller.php',
        async: true,
        contentType: 'application/x-www-form-urlencoded',
        data: {
            orderID : $("#txtOrderID").val(),
            date : $("#pickDate").val(),
            customerID : $("#txtCustomer").select2("data")[0].id,
            orderDetails : orderDetails
        }
    }).done(function(response){
        console.log(response);
    }).fail(function(xhr, status, error){
        console.log(error);
    });
});

function loadCustomers() {

    $.ajax({
        method: 'GET',
        url : "../myphpPOS/phpController/customer-controller.php?all=true",

    }).done(function(response){
        var customers = JSON.parse(response);
        for(var index in customers){
            var option = new Option(customers[index][0],customers[index][0],false,false);
            $("#txtCustomer").append(option).trigger('change');
        }
    }).fail(function(xhr, status, error){
        console.log(error);
    });
}

function loadItems() {

    $.ajax({
        method: 'GET',
        url : '../myphpPOS/phpController/item-controller.php?all=true',
        aysnc: true
    }).done(function(response){
        var items = JSON.parse(response);
        for(var index in items){
            var option = new Option(items[index][0],items[index][0],false,false);
            $("#txtItem").append(option).trigger('change');
        }
    }).fail(function(xhr, status, error){
        console.log(error);
    });
}

