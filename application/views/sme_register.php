<div class="container">

    <div style="display: flex; justify-content:center; margin-top: 100px; text-align: center;">


        <div style="height: 550px; width: 350px;">
            <!-- <div style="height: 550px; width: 350px; background-color:azure"> -->
            <h2>SME Register</h2>

            <?php
            if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            }
            ?>
            <form action=<?php echo base_url("index.php/sme/handle_register") ?> method="post">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="company_name" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputContact" class="col-sm-2 col-form-label">Contact</label>
                    <div class="col-sm-10">
                        <input type="text" name="contact" class="form-control" id="inputContact">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputContact" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputContact">
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