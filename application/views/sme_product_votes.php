<div class="container">


    <div style="display: flex; justify-content:center; margin-top: 10px; text-align: center;">
        <?php

        if (is_null($products)) {
            echo "No Result";
        } else {
            $this->table->set_heading(['Product Name', 'Votes']);
            $this->table->set_caption('Products');
            $this->table->set_template(array(
                'table_open' => '<table class="table table-striped table-hover pt-0 mt-0">'
            ));

            echo $this->table->generate($products);
        }
        ?>
    </div>
</div>