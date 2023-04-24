<div class="container">

    <div class="row">
        <div class="container">
            <?php
            if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            }
            ?>

        </div>
    </div>
    <div style="display: flex; justify-content:center; margin-top: 100px; text-align: center;">



        <?php
        $this->table->set_heading(['#', 'Product Name', 'description', 'Size', 'Type', 'Price Band', 'Price', 'Company Name']);
        $this->table->set_caption('Products');
        $this->table->set_template(array(
            'table_open' => '<table class="table table-striped table-hover">'
        ));

        foreach ($products as $p) {
            $id = $p["id"];
            $product_name = $p["product_name"];
            $product_description = $p["product_description"];
            $size = $p["size"];
            $type = $p["type"];
            $price_band = $p["price_band"];
            $price = $p["price"];
            $sme_name = $p["sme_name"];

            $vote_button = "<a href='" . base_url("index.php/resident/vote/" . $id) . "'><span class='btn btn-primary' style='color: white; align-self: right;'>Add Product</span></a>";


            $this->table->add_row($id, $product_name, $product_description, $size, $type, $price_band, $price, $sme_name, $vote_button);
        }

        echo $this->table->generate();
        ?>
    </div>
</div>