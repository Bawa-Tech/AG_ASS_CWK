<div class="container">
    <div class="row">
        <div class="container mt-4" style="display: flex;">
        </div>
    </div>
    <div style="display: flex; justify-content:center; margin-top: 100px; text-align: center;">
        <?php
        $this->table->set_heading('#', 'Product Name', 'description', 'Size', 'Type', 'Price Band', 'Price', 'Company Name');
        $this->table->set_caption('Products');
        $this->table->set_template(array(
            'table_open' => '<table class="table table-striped table-hover">'
        ));
        $rows = array();
        foreach ($products as $product) {
            $rows[] = array(
                $product->id,
                $product->name,
                $product->description,
                $product->size,
                $product->type,
                $product->price_band,
                $product->company_name,
            );
        }
        echo $this->table->generate($rows);
        ?>
    </div>
</div>
