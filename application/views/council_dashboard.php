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
        <h2 style="justify-self: center;">Welcome to Council Dashboard</h2>
    </div>
    <div class="row mt-5">
        <div class="col-md-4 mt-5">
            <button class="box">
                <a href=<?php echo base_url("index.php/council/edit_product") ?>>Edit Product</a>
            </button>
        </div>

        <div class="col-md-4 mt-5">
            <button class="box">
                <a href=<?php echo base_url("index.php/council/products") ?>>View all Products</a>
            </button>

        </div>

        <div class="col-md-4 mt-5">
            <button class="box"> View Votes on Products </button>
        </div>
    </div>
</div>