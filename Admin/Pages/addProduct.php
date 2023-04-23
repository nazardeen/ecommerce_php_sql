<?php include '../Includes/header.php' ?>

<div class="product">
    <h2 class="text-center mb-5">ADD PRODUCTS</h2>

    <form id="add_product_form" action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 col-sm-12">

                <div class="mb-3">
                    <div class="">
                        <div class="">
                            <span class="cat">Category</span>
                            <select class="input-dark" id="category" name="category">
                                <option value="" disabled selected>Select Category</option>
                                <option value="mobilephones">Mobile Phones</option>
                                <option value="mobilephoneaccessories">Mobile Phone Accessories</option>
                                <option value="SPEAKERS">Speakers</option>
                                <option value="smartdevices">Smart Devices</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="">
                        <span class="inputs">Item ID</span>
                        <input class="input-dark" type="text" readonly placeholder="Item ID" id="item_id" name="item_id" />
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
                        <span class="inputs">Image</span>
                        <input class="input-dark" type="file" accept="image/*" id="item_image_1" name="item_image_1" />
                    </div>
                </div>
                <div class="mb-3">
                    <div class="">
                        <span class="inputs">Quantity</span>
                        <input class="input-dark" type="number" id="qty" name="qty" />
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
                        <span class="inputs">Storage</span>
                        <input class="input-dark" type="text" placeholder="Rom" id="item_rom" name="item_rom" />
                    </div>
                </div>

                <div class="mb-3">
                    <div class="">
                        <div class="">
                            <span class="cat">Warranty Period</span>
                            <select class="input-dark" id="warranty" name="warranty">
                                <option value="" disabled selected>Select Warranty Time</option>
                                <option value="No warranty">No Warranty</option>
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
                        <span class="inputs">Image</span>
                        <input class="input-dark" type="file" accept="image/*" id="item_image_2" name="item_image_2" />
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
            <button id="save" type="submit" class="button_master btn_primary">Save</button>
        </div>

    </form>
</div>

</div>

</div>
<?php include '../Includes/footer.php' ?>

<script>
    get_Maxitemcode();

    // add product 
    $("#add_product_form").submit(function(e) {
        e.preventDefault();
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
                url: "../Library/php/product.php",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(response) {

                    Swal.fire({
                        position: 'top-end',
                        toast: true,
                        icon: 'success',
                        title: 'Successfully Added',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    reset();
                },
                error: function(xhr) {
                    
                    console.log(xhr.responseText);
                }
            });
        }


    });

    reset = () => {

        $("#item_display").val("");
        $("#item_battery").val("");
        $("#item_camera").val("");
        $("#item_ram").val("");
        $("#item_rom").val("");
        $("#item_name").val("");
        $("#item_image_1").val("");
        $("#item_image_2").val("");
        $("#qty").val("");
        $("#emp_joinedDate").val("");
        $("#cost_price").val("");
        $("#retail_price").val("");
        $("#item_description").val("");

    }

    $("#item_battery,#item_ram,#item_rom,#qty,#retail_price,#cost_price").keypress(function(e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            Swal.fire({
                icon: 'error',
                title: 'Should contain only Digits!',
                showConfirmButton: false,
                timer: 1500,
                toast: 'true'
            })
            return false;
        }
    });
    //end of the validation-----------------------------------------------------------

    function get_Maxitemcode() {


        $.ajax({

            url: "../Library/PHP/products/maxProductID.php",
            type: "GET",
            dataType: "JSON",

            success: function(data) {

                $("#item_id").val(data);
            },

            error: function(xhr) {
                console.log('Request Status: ' + xhr.status);
                console.log('Status Text: ' + xhr.statusText);
                console.log(xhr.responseText);
                var text = $($.parseHTML(xhr.responseText)).filter('.trace-message').text();

            }


        });
    }


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
                    icon: 'success',
                    title: 'Successfully Deleted',
                    showConfirmButton: false,
                    timer: 1500
                });

                get_all_products();
            }
        });
    }
</script>