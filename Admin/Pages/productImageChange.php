<?php include '../Includes/header.php' ?>

<div class="product">
    <h3 class="text-center">Change Product Images</h3>
</div>
<div class="product mb-5" id="product">
    <div class="row">
        <div class="d-flex align-items-center ">
            <div class="col-md-3"><input type="text" class="input-dark" id="item_code" placeholder="Enter Item Code"></div>
            <div class="col-md-2"><button class="button_master btn_primary button-sm" id="searchBtn">Search</button></div>
        </div>

    </div>
    <div class="row mt-5" style="display: none;margin: top 2rem;" id="product_row">
        <div class="col-md-3">
            <img src="" alt="" id="image_1" class="image_product" width="100%">
           
        </div>

        <div class="col-md-3">
            <img src="" alt="" id="image_2" class="image_product" width="100%">
            

        </div>
    </div>
    <div class="col-md-3" id="product_row_file">
        <form action="" id="changeProductForm" enctype="multipart/form-data" method="POST">
        <input type="hidden" id="txtItemCode" name="txtItemCode">
        <input type="hidden" id="imagepath_01" name="oldImage_01">
        <input type="hidden" id="imagepath_02" name="oldImage_02">

            <div class="mb-3 mt-3">
                <label for="formFileSm" class="form-label text-secondary">Image 01</label>
                <input class="form-control form-control-sm bg-dark btn-dark" id="formFileSm" name="image_1" type="file">
            </div>
            <div class="mb-3">
                <label for="formFileSm" class="form-label text-secondary">Image 02</label>
                <input class="form-control form-control-sm bg-dark btn-dark" id="formFileSm" name="image_2" type="file">
            </div>
            <div class="mb-3">

                <button type="submit" class="button_master btn_primary">Change Images</button>

            </div>

        </form>
    </div>

</div>
</div>
</div>
<?php include '../includes/footer.php' ?>

<script>
    $(document).ready(() => {

        $("#searchBtn").click((e) => {
            if ($("#item_code").val().length > 5) {

                $.ajax({
                    type: "POST",
                    url: "../Library/PHP/getproducts.php",
                    data: {

                        item_code: $("#item_code").val(),
                        form_name: "getimage"

                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response);
                        $("#product_row,#product_row_file").slideDown();
                        $("#image_1").attr("src", "../Library/PHP/" + response.image);
                        $("#image_2").attr("src", "../Library/PHP/" + response.image_2);
                        $("#imagepath_01").val(response.image);
                        $("#imagepath_02").val(response.image_2);
                        $("#txtItemCode").val(response.item_code);

                    }
                });




            } else {

                alert("Item Code Should be greater than 5 characters");
            }


        });


        // upload images 
        $("#changeProductForm").submit(function(e) {

            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "../Library/PHP/uploadImages.php",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(response) {

                    console.log(response);
                    alert("Image Uploaded");

                    // Swal.fire({

                    //     icon: 'success',
                    //     title: 'Welcome',
                    //     showConfirmButton: false,
                    //     timer: 1500,
                    //     toast: 'true'
                    // });
                }
            });
        });

    });
</script>