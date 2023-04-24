<style>
    .box {
        height: 150px;
        width: 150px;
        /* background-color: azure; */
        /* text-align: center; */
        /* vertical-align: middle; */
    }
</style>

<div class="container">
    <div class="container mt-5" style="text-align: center">
        <h2 style="justify-self: center;">Welcome to SME Dashboard</h2>
    </div>
    <div class="row mt-5">
        <div class="col-md-4 mt-5">
            <button class="box">
                <a href=<?php echo base_url("index.php/sme/add_product") ?>>Add Product</a>
            </button>
        </div>

        <div class="col-md-4 mt-5">
            <button class="box">
                <a href=<?php echo base_url("index.php/sme/products") ?>>View all Products</a>
            </button>

        </div>

        <div class="col-md-4 mt-5">
            <button class="box">
                <a href=<?php echo base_url("index.php/sme/product_votes") ?>>View Votes on Products</a>
            </button>
        </div>
    </div>
</div>