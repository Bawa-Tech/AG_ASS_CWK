<div class="container">

    <div style="display: flex; justify-content:center; margin-top: 100px; text-align: center;">


        <div style="height: 550px; width: 350px;">
        <!-- <div style="height: 550px; width: 350px; background-color:azure"> -->
            <h2>Resident LOGIN</h2>

            <?php
            if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            }
            ?>

            <form action=<?php echo base_url("index.php/resident/handle_login")?> method="post">
                <!-- @csrf -->
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" required name="username" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" required name="password" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <div class="form-check">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>

</div>
