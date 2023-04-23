<?php include '../Includes/header.php' ?>

<div class="product">
    <h3 class="text-center">MANAGE PRODUCTS</h3>
</div>
<div class="col-md-12">
    <div class="row">
        <table class="table table-dark" id="ProductTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ITEM CODE</th>
                    <th>ITEM NAME</th>
                    <th>ITEM DESCRIPTION</th>
                    <th>BRAND NAME</th>
                    <th>Quantity </th>
                    <th>COST PRICE(LKR)</th>
                    <th>RETAIL PRICE(LKR)</th>
                    <th>Update</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="product" id="product" style="display: none;">
    <h2 class="text-center mb-5">UPDATE PRODUCTS</h2>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <input class="input-dark" type="hidden" id="product_id" name="product_id" />
            <div class="mb-3">
                <div class="">
                    <div class="">
                        <span class="cat">Category</span>
                        <select class="input-dark" id="category" name="category">
                            <option value="" disabled selected>Select Category</option>
                            <option value="mobilephones">Mobile Phones</option>
                            <option value="mobilephoneaccessories">Mobile Phone Accessories</option>
                            <option value="Speakers">Speakers</option>
                            <option value="smartdevices">Smart Devices</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="">
                    <span class="inputs">Item ID</span>
                    <input class="input-dark" type="text" placeholder="Item ID" id="item_id" name="item_id" />
                </div>
            </div>

            <div class="mb-3">
                <div class="">
                    <span class="inputs">Brand</span>
                    <select class="input-dark" id="brand" name="brand">
                        <option value="" disabled selected>Select Brand</option>
                        <option value="Xiaomi">Xiaomi</option>
                        <option value="Real Me">Real Me</option>
                        <option value="Apple">Apple</option>
                        <option value="Samsung">Samsung</option>
                        <option value="Infinix">Infinix</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <div class="">
                    <span class="inputs">Item Name</span>
                    <input class="input-dark" type="text" placeholder="Item Name" id="item_name" name="item_name" />
                </div>
            </div>

            <div class="mb-3">
                <div class="">
                    <span class="inputs">Display</span>
                    <input class="input-dark" type="text" placeholder="Display" id="item_display" name="item_display" />
                </div>
            </div>

            <div class="mb-3">
                <div class="">
                    <span class="inputs">Battery</span>
                    <input class="input-dark" type="text" placeholder="Battery" id="item_battery" name="item_battery" />
                </div>
            </div>
            <div class="mb-3">
                <div class="">
                    <span class="inputs">Quantity </span>
                    <input class="input-dark" type="text" placeholder="Quantity" id="quantity" name="Quantity" />
                </div>
            </div>

        </div>

        <div class="col-md-6 col-sm-12">

            <div class="mb-3">
                <div class="">
                    <span class="inputs">Camera</span>
                    <input class="input-dark" type="text" placeholder="Camera" id="item_camera" name="item_camera" />
                </div>
            </div>

            <div class="mb-3">
                <div class="">
                    <span class="inputs">Ram</span>
                    <input class="input-dark" type="text" placeholder="Ram" id="item_ram" name="item_ram" />
                </div>
            </div>

            <div class="mb-3">
                <div class="">
                    <span class="inputs">Rom</span>
                    <input class="input-dark" type="text" placeholder="Rom" id="item_rom" name="item_rom" />
                </div>
            </div>

            <div class="mb-3">
                <div class="">
                    <div class="">
                        <span class="cat">Warranty Period</span>
                        <select class="input-dark" id="warranty" name="warranty">
                            <option value="" disabled selected>Select Warranty Time</option>
                            <option value="1 Year">1 Year</option>
                            <option value="6 Months">6 Months</option>
                            <option value="3 months">3 months</option>
                            <option value="1 month">1 month</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="">
                    <span class="inputs">Cost Price</span>
                    <input class="input-dark" type="text" placeholder="Cost Price" id="cost_price" name="cost_price" />
                </div>
            </div>

            <div class="mb-3">
                <div class="">
                    <span class="inputs">Retail Price</span>
                    <input class="input-dark" type="text" placeholder="Retail Price" id="retail_price" name="retail_price" />
                </div>
            </div>


            <div class="mb-3">

                <div class="">
                    <span class="inputs">Description</span>
                    <textarea class="input-dark" type="text" placeholder="" id="item_description" name="item_description"></textarea>
                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3 offset-md-4">
        <button id="update" class="button_master btn_primary">Update</button>
    </div>
</div>
</div>
</div>
<?php include '../includes/footer.php' ?>

<script>
    $(document).ready(function() {
        $('#ItemsTable').DataTable();
    });

    get_all_products();

    //end order
    var product_ID = '';

    function get_product_details(id) {

        $.ajax({
            type: "POST",
            url: "../Library/PHP/getproducts.php",
            data: {
                product_ID: id,
                form_name: "GetUpdateProduct"
            },
            dataType: "JSON",
            success: function(data) {

                $("#product").slideDown();

                $("#product_id").val(data.product_id);
                $("#category").val(data.category_name);
                $("#item_id").val(data.item_code);
                $("#brand").val(data.Brand_name);
                $("#item_name").val(data.product_name);
                $("#item_display").val(data.Display);
                $("#item_ram").val(data.ram);
                $("#item_rom").val(data.storage);
                $("#item_camera").val(data.camera);
                $("#item_battery").val(data.battery);
                $("#warranty").val(data.warranty);
                $("#cost_price").val(data.buying_price);
                $("#retail_price").val(data.retail_price);
                $("#item_description").val(data.product_description);
                $("#item_camera").val(data.camera);
                $("#quantity").val(data.quantity);
            }
        });
    }
    //start update product

    $("#update").click(function() {
        if ($("#category").val() == null) {
            Swal.fire({

                icon: 'error',
                title: 'Category Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#brand").val() == null) {

            Swal.fire({
                icon: 'error',
                title: 'Brand Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });

        } else if ($("#item_name").val() == "") {
            Swal.fire({

                icon: 'error',
                title: 'Product Name Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#item_image_1").val() == "") {
            Swal.fire({

                icon: 'error',
                title: '1st Image Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#item_image_2").val() == "") {
            Swal.fire({

                icon: 'error',
                title: '2nd Image Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#qty").val() == "") {
            Swal.fire({

                icon: 'error',
                title: 'Quantity Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#emp_joinedDate").val() == "") {
            Swal.fire({

                icon: 'error',
                title: 'Employee joined date Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#warranty").val() == null) {
            Swal.fire({

                icon: 'error',
                title: 'Warranty Period Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#cost_price").val() == "") {
            Swal.fire({

                icon: 'error',
                title: 'Cost Price Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#retail_price").val() == "") {
            Swal.fire({

                icon: 'error',
                title: 'Retail Price Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else if ($("#item_description").val() == "") {
            Swal.fire({

                icon: 'error',
                title: 'Product Description Required',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            });
        } else {
            $.ajax({
                type: "POST",
                url: "../Library/PHP/getproducts.php",
                data: {
                    product_id: $("#product_id").val(),
                    category_name: $("#category").val(),
                    item_code: $("#item_id").val(),
                    Brand_name: $("#brand").val(),
                    product_name: $("#item_name").val(),
                    Display: $("#item_display").val(),
                    ram: $("#item_ram").val(),
                    storage: $("#item_rom").val(),
                    camera: $("#item_camera").val(),
                    battery: $("#item_battery").val(),
                    warranty: $("#warranty").val(),
                    buying_price: $("#cost_price").val(),
                    retail_price: $("#retail_price").val(),
                    product_description: $("#item_description").val(),
                    camera: $("#item_camera").val(),
                    quantity: $("#quantity").val(),
                    form_name: "UpdateProduct"
                },
                dataType: "JSON",
                success: function(data) {
                    Swal.fire({
                        position: 'top-end',
                        toast: true,
                        icon: 'success',
                        title: 'Updated Product',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $("#product").fadeOut();
                    get_all_products();
                }
            });
        }





    });

    function delete_product_details(id) {

        $.ajax({
            type: "POST",
            url: "../Library/PHP/getproducts.php",
            data: {
                product_ID: id,
                form_name: "deleteProducts"
            },
            dataType: "JSON",
            success: function(data) {
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'danger',
                    title: 'Deleted One record!',
                    showConfirmButton: false,
                    timer: 1500
                });
                get_all_products();
            }
        });
    }

    // get all details from product table 
    function get_all_products() {

        $.ajax({
            type: "POST",
            url: "../Library/PHP/getproducts.php",
            dataType: "JSON",
            data: {
                form_name: "getAllproducts"
            },
            success: function(data) {

                $("#ProductTable").dataTable({

                    "destroy": true,
                    "aaData": data,
                    "scrollX": true,
                    "aoColumns": [{
                            "sTitle": "#",
                            "mData": "product_id"
                        },
                        {
                            "sTitle": "Item Code",
                            "mData": "item_code"
                        },
                        {
                            "sTitle": "Product Name",
                            "mData": "product_name"
                        },
                        {
                            "sTitle": "Description",
                            "mData": "product_description"
                        },
                        {
                            "sTitle": "Brand Name",
                            "mData": "Brand_name"
                        },
                        {
                            "sTitle": "Quantity",
                            "mData": "quantity",
                            "render": function(mData, type, row, meta) {
                                if (mData < 20) {
                                    return '<span class="badge rounded-pill text_warning">Order Soon</span>';

                                } else {
                                    return '<span class="badge rounded-pill bg-success">' + mData + '</span>';
                                }
                            }
                        },
                        {
                            "sTitle": "Cost PRICE(LKR)",
                            "mData": "buying_price"
                        },
                        {
                            "sTitle": "Selling PRICE(LKR)",
                            "mData": "retail_price"
                        },
                        {
                            "sTitle": "Update",
                            "mData": "product_id",
                            "render": function(mData, type, row, meta) {
                                return '<button class ="Admin_button_master admin_btn_primary" onclick="get_product_details(' + mData + ')" >Update</button>';

                            }
                        },
                        {
                            "sTitle": "Delete",
                            "mData": "product_id",
                            "render": function(mData, type, row, meta) {
                                return '<button class ="Admin_button_master admin_btn_delete" onclick="delete_product_details(' + mData + ')" >Delete</button>';

                            }
                        },
                    ]

                });


            }
        });
    }
</script>