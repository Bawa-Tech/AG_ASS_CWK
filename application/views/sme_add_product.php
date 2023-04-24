<div class="container">
    <div style="display: flex; justify-content:center; margin-top: 100px; text-align: center;">
        <div style="height: 550px; width: 350px;">
            <!-- <div style="height: 550px; width: 350px; background-color:azure"> -->
            <h2>SME Add Product</h2>

            <?php
            if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            }
            ?>
            <form class="form" action=<?php echo base_url("index.php/sme/handle_add_product") ?> method="post">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-9">
                        <input type="text" required name="product_name" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputContact" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <input type="text" name="product_description" class="form-control" id="inputContact">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputContact1" class="col-sm-3 col-form-label">Size</label>
                    <div class="col-sm-9">
                        <input type="number" name="size" class="form-control" id="inputContact1">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputContact1" class="col-sm-3 col-form-label">Type</label>
                    <div class="col-sm-9">
                        <!-- <input type="number" name="size" class="form-control" id="inputContact1"> -->
                        <select name="type" required class="form-control" id="">
                            <option value="household">Household</option>
                            <option value="office">Office</option>
                            <option value="outdoors">Outdoors</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputContact1" class="col-sm-3 col-form-label">Price Band</label>
                    <div class="col-sm-9">
                        <select required name="price_band" class="form-control" id="">
                            <option value="low">Low Range</option>
                            <option value="mid">Mid Range</option>
                            <option value="high">High Range</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputContact1" class="col-sm-3 col-form-label">Price in Pounds</label>
                    <div class="col-sm-9">
                        <input type="number" name="price" class="form-control" id="inputContact1">

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <div class="form-check">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>