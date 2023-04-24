<div class="container">

    <div style="display: flex; justify-content:center; margin-top: 100px; text-align: center;">

        <!-- <form action="" method="POST"> -->
        <div class="row">
            <?php
            if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            }
            ?>
            <form class="form" action=<?php echo base_url("index.php/council/handle_change_sme") ?> method="post">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">SME Name (Do not edit this) (It will have no effect)</label>
                    <div class="col-sm-3">
                        <input type="text" required value="<?php echo $product['sme_name'] ?>" name="previous_sme" class="form-control" id="inputEmail3">
                    </div>

                    <label for="inputEmail3" class="col-sm-2 col-form-label">Choose new</label>
                    <div class="col-sm-2">
                        <!-- <input type="text" required value="<?php echo $product['sme_name'] ?>" name="product_name" class="form-control" id="inputEmail3"> -->
                        <select name="new_sme_name" id="">
                            <option value=""> Choose new SME</option>

                            <?php
                            foreach ($smes as $s) {
                                echo "<option values='" . $s['company_name'] . "'>" . $s['company_name'] . "</option>";
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-9">
                        <input type="text" disabled required value="<?php echo $product['product_name'] ?>" name="product_name" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputContact" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <input type="text" disabled name="product_description" value="<?php echo $product['product_description'] ?>" class="form-control" id="inputContact">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputContact1" class="col-sm-3 col-form-label">Size</label>
                    <div class="col-sm-9">
                        <input type="number" value="<?php echo $product['size'] ?>" disabled name="size" class="form-control" id="inputContact1">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputContact1" class="col-sm-3 col-form-label">Type</label>
                    <div class="col-sm-9">
                        <!-- <input type="number" name="size" class="form-control" id="inputContact1"> -->
                        <select name="type" value="<?php echo $product['type'] ?>" disabled required class="form-control" id="">
                            <option value="household">Household</option>
                            <option value="office">Office</option>
                            <option value="outdoors">Outdoors</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputContact1" class="col-sm-3 col-form-label">Price Band</label>
                    <div class="col-sm-9">
                        <select required value="<?php echo $product['price_band'] ?>" disabled name="price_band" class="form-control" id="">
                            <option value="low">Low Range</option>
                            <option value="mid">Mid Range</option>
                            <option value="high">High Range</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputContact1" class="col-sm-3 col-form-label">Price in Pounds</label>
                    <div class="col-sm-9">
                        <input type="number" value="<?php echo $product['price'] ?>" disabled name="price" class="form-control" id="inputContact1">

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <div class="form-check">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
        <!-- </form> -->

    </div>
</div>