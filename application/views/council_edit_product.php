<div class="container">

    <div style="display: flex; justify-content:center; margin-top: 100px; text-align: center;">
        <?php
        $this->table->set_heading(['#', 'Product Name', 'description', 'Size', 'Type', 'Price Band', 'Company Name']);
        $this->table->set_caption('Products');
        $this->table->set_template(array(
            'table_open' => '<table class="table table-striped table-hover">'
        ));
        echo $this->table->generate($products);

        ?>


    </div>
</div>