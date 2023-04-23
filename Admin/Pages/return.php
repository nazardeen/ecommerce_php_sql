<?php include '../Includes/header.php' ?>

<div class='section-1'>

    <div class="col-md-12 p-2">

        <h2 class="mb-3"> Manage Returns </h2>
        <div class="row">
            <div class="col-sm-5">
                <div class="row">
                    <div class="input-group mb-4">
                        <input type="hidden" class="input-dark" id="returnID" name="returnID" disabled>
                    </div>
                </div>
            </div>

            <!-- return invoice search items table start  -->
            <div class="col-sm-12" style="display:none">
                <table class="table table-striped table-dark" id="tbl-sales" width="100%">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </table>
            </div>
            <!-- return invoice search items table end  -->

            <!-- product add table -->
            <div class="col-sm-12">
                <!-- product add table end-->

                <div class="col-sm-5">
                    <div class="input-group mb-4">
                        <input type="text" class="input-dark" name="purchase_ID" id="order_ID" placeholder="Enter Invoice ID" required>
                    </div>
                </div>

                <!-- product table form start  -->

                <form id="frmProduct">
                    <table class="table table-striped" style="display: none;color: #fff;" id="topTable">
                        <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Amount</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody class="tbd">
                            <tr>
                                <td>
                                    <input type="text" class="input-dark" name="procode" id="procode" placeholder="Procode" required readonly>
                                </td>
                                <td>
                                    <input type="text" class="input-dark" name="proname" id="proname" placeholder="proname" readonly>
                                </td>
                                <td>
                                    <input type="text" class="input-dark" name="description" id="description" placeholder="description" readonly>
                                </td>
                                <td>
                                    <input type="text" class="input-dark" name="price" id="price" placeholder="price" readonly>
                                </td>
                                <td>
                                    <input type="number" class="input-dark" name="qty" id="qty" placeholder="qty" min="1" value="1" required>
                                </td>
                                <td>
                                    <input type="text" class="input-dark" name="tot_cost" id="tot_cost" readonly>
                                </td>
                                <td>
                                    <button class="btn btn-outline-success" type="button" onclick="addproduct()">Add</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </form>
                <!-- product table form end  -->

                <!-- return item table start  -->
                <table class="table tbale-bordered" id="productlist" style="display: none;color: #fff;">

                    <thead>
                        <tr>
                            <th>Remove</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Amount</th>

                        </tr>
                    </thead>

                    <tbody class="rettbl">

                    </tbody>
                </table>
                <!-- return item table end  -->

                <!-- col sm 8 goes from here -->
                <div class="col-sm-4 float-end" id="TotalGroup" style="display: none;">
                    <div class="col s12 m6 offset-m4">
                        <div class="form-group" id="totalGroup">
                            <label>Total</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rs.</span>
                                </div>
                                <input type="text" class="input-dark" name="total" id="total" value="0" disabled>
                            </div>
                        </div>




                        <!-- submit button from here -->
                        <div class="form-group mt-3 float-end">
                            <button type="button" class="Admin_button_master admin_btn_primary" id="save" onclick="AddInvoice()">Add</button>
                            <button type="button" class="Admin_button_master admin_btn_delete" id="reset">Reset</button>
                        </div>
                    </div>
                </div>

                <!-- row end  -->
            </div>
        </div>

    </div>

    <?php include '../Includes/footer.php' ?>

    <script>
        // get max return id
        get_Maxitemcode();

        function get_Maxitemcode() {


            $.ajax({

                url: "../Library/php/maxReturnID.php",
                type: "GET",
                dataType: "JSON",
                data: {
                    form_name: "getMaxID"
                },

                success: function(data) {

                    $("#returnID").val(data);
                },

                error: function(xhr) {
                    console.log('Request Status: ' + xhr.status);
                    console.log('Status Text: ' + xhr.statusText);
                    console.log(xhr.responseText);
                    var text = $($.parseHTML(xhr.responseText)).filter('.trace-message').text();

                }


            });
        }

        // get products by invoice id 
        $("#order_ID").on("keyup", function() {

            $(".tbd").empty();
            if ($(this).val().length > 3) {
                $.ajax({

                    type: 'POST',
                    url: '../Library/php/returnCtrl.php',
                    dataType: 'JSON',
                    data: {
                        order_id: $(this).val(),
                        form_name: "getProducts"
                    },


                    success: function(data) {
                        //
                        console.log(data);
                        $dlen = data.length;
                        $tbldraw = "";
                        while ($dlen > 0) {
                            $("#topTable").fadeIn();
                            $tbldraw = $tbldraw + '<tr><td><input type="text" class="input-dark ret_procode" value="' + data[$dlen - 1].item_code + '" name="procode"  placeholder="Procode" required readonly></td><td><input type="text" class="input-dark ret_proname" name="proname"  value="' + data[$dlen - 1].product_name + '" placeholder="proname" readonly></td><td><input type="text" class="input-dark ret_desc" name="description" value="' + data[$dlen - 1].product_description + '"  placeholder="description" readonly></td><td><input type="text" class="input-dark ret_retailPrice" name="price" value="' + data[$dlen - 1].retail_price + '"  placeholder="price" readonly></td><td><input type="number" class="input-dark ret_qty" name="qty"  value="' + data[$dlen - 1].quantity + '" placeholder="qty" min="1" max="' + data[$dlen - 1].quantity + '" required></td><td><input type="text" class="input-dark ret_total" value="' + data[$dlen - 1].Total + '" name="tot_cost" readonly></td><td><button class="Admin_button_master admin_btn_primary returnadd" type="button" >Add</button></td></tr>';

                            $dlen--;

                        }
                        $(".tbd").empty();
                        $(".tbd").append($tbldraw);

                    },
                    error: function(xhr, status, error) {

                        console.log(xhr.responseText);
                    }

                });
            } else {

                clearTables();
            }




        });


        // adding row into the bottom table 
        $("body").on("click", ".returnadd", function() {

            $("#TotalGroup,#productlist").slideDown();

            $sss = "<tr>" +
                "<td> <button type='button' class='Admin_button_master admin_btn_delete' onclick='deleteproductrow(this)'>Delete</button> </td>" +
                "<td>" + $(this).parent().parent().find(".ret_procode").val() + "</td>" +
                "<td>" + $(this).parent().parent().find(".ret_proname").val() + "</td>" +
                "<td>" + $(this).parent().parent().find(".ret_desc").val() + "</td>" +
                "<td>" + $(this).parent().parent().find(".ret_retailPrice").val() + "</td>" +
                "<td>" + $(this).parent().parent().find(".ret_qty").val() + "</td>" +
                "<td>" + $(this).parent().parent().find(".ret_retailPrice").val() * $(this).parent().parent().find(".ret_qty").val() + "</td>" + "</tr>"

            $(".rettbl").append($sss);

            total += Number($(this).parent().parent().find(".ret_retailPrice").val() * $(this).parent().parent().find(".ret_qty").val());
            $("#total").val(total);
        })


        // delete product table row
        var total = 0;
        var product_total_cost;

        function deleteproductrow(e) {

            product_total_cost = parseInt($(e).parent().parent().find('td:last').text(), 10);
            total -= product_total_cost;
            $("#total").val(total);

            $(e).parent().parent().remove();
            $("#procode").focus();
        }

        // cancel return 
        $("#reset").click(() => {
            $(".tbd").empty();
            $("#productlist").empty();
            $("#productlist,#TotalGroup,#productlist").fadeOut();
            $("#total,#order_ID").val("");


        });


        clearTables = () => {


            $("#topTable,#TotalGroup,#productlist").slideUp();
            $(".rettbl").empty();
            $(".tbd").empty();
            $("#total").val("");
        }
        // proceed returns 
        function AddInvoice() {

            var table_data = [];
            $('#productlist tbody tr').each(function(row, tr) {

                var sub = {

                    'procode': $(tr).find('td:eq(1)').text(),
                    'pname': $(tr).find('td:eq(2)').text(),
                    'desc': $(tr).find('td:eq(3)').text(),
                    'price': $(tr).find('td:eq(4)').text(),
                    'qty': $(tr).find('td:eq(5)').text(),
                    'total_cost': $(tr).find('td:eq(6)').text(),


                };

                table_data.push(sub);
            });

            $.ajax({
                type: "POST",
                url: "../Library/php/returnCtrl.php",
                dataType: "JSON",
                data: {

                    return_id: $("#returnID").val(),
                    order_id: $("#order_ID").val(),
                    total: $("#total").val(),
                    data: table_data,
                    form_name: "add_returns"
                },
                success: function(data) {

                    console.log(data.last_id);

                    get_Maxitemcode();
                    Swal.fire({
                        position: 'top-end',
                        toast: true,
                        icon: 'success',
                        title: 'Return has been Success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    clearTables();
                    $("#order_ID").val("");
                    $("#order_ID").focus();


                },
                error: function(xhr) {

                    console.log(xhr.responseText);
                }
            });



        }
    </script>