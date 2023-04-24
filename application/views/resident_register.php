
<div class="container">

    <div style="display: flex; justify-content:center; margin-top: 100px; text-align: center;">


        <div style="height: 550px; width: 350px;">
        <!-- <div style="height: 550px; width: 350px; background-color:azure"> -->
            <h2>Resident Register</h2>

            <?php
            if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            }
            ?>
            <form action="<?php echo base_url("index.php/resident/handle_signup")?>"method="post">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputEmail3">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputContact" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputContact">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputArea" class="col-sm-2 col-form-label">Area</label>
                    <div class="col-sm-10">
                    <select name="area" class="form-control" id="inputArea">
                        
                        <option value="">Select an area</option>
                        <?php 
                        
                        foreach ($areas as $area) {
                            // var_dump($area);
                            // die;
                           echo  '<option value="'.$area['area'].'">'. $area['area'] .'</option>';
                        
                        }
                        ?>
                    </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputAge" class="col-sm-2 col-form-label">Age Bracket</label>
                    <div class="col-sm-10">
                        <select name="age_bracket" class="form-select" aria-label="Age Bracket">
                            <option value="" selected>Choose an age bracket</option>
                            <option value="Under 18">Under 18</option>
                            <option value="18-24">18-24</option>
                            <option value="25-34">25-34</option>
                            <option value="35-44">35-44</option>
                            <option value="45-54">45-54</option>
                            <option value="55-64">55-64</option>
                            <option value="65 or over">65 or over</option>
                        </select>
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