<div class="container">
    <div class="row">
        <div class="container mt-4" style="display: flex;">
            <!-- <button class="btn btn-primary" style="align-self: right;"> Add Product</button> -->
            <a href="<?php echo base_url("index.php/sme/add_product"); ?>"><span class="btn btn-primary" style="color: white; align-self: right;">Add Product</span></a>
        </div>
    </div>

    <div class="row mt-4 pt-4">
        <form class="form" action=<?php echo base_url("index.php/sme/products") ?> method="post">
            <div class="row">
                <div class="col-md-2">
                    <label for="inputEmail3" class="">Type</label>

                    <select name="type" id="" class="form-control">
                        <option value="">Select type</option>
                        <option value="household">Household</option>
                        <option value="office">Office</option>
                        <option value="outdoors">outdoors</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="inputEmail3" class="">Price less then</label>
                    <div class="">
                        <input class="form-control" type="number" name="price_less_then" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="container">
                        <button class="form-control mt-4">Search</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <div style="display: flex; justify-content:center; margin-top: 10px; text-align: center;">


        <?php

        if (is_null($products)) {
            echo "No Result";
        } else {
            $this->table->set_heading(['#', 'Product Name', 'description', 'Size', 'Type', 'Price Band', 'Price', 'Company Name']);
            $this->table->set_caption('Products');
            $this->table->set_template(array(
                'table_open' => '<table class="table table-striped table-hover pt-0 mt-0">'
            ));


            echo $this->table->generate($products);
        }




        ?>


    </div>
</div>