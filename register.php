<?php require 'app/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-0">
            <h2>Create An Account</h2>
            <p>Please fill out this form to register with us</p>
            <form action="calls/register_account.php" method="POST">
                <div class="form-group">
                    <label for="firstname">First Name: <sup>*</sup></label>
                    <input type="text" name="firstname" class="form-control form-control-lg" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name: <sup>*</sup></label>
                    <input type="text" name="lastname" class="form-control form-control-lg" required>

                </div>
                <div class="form-group">
                    <label for="phone">Phone: <sup>*</sup></label>
                    <input type="text" name="phone" class="form-control form-control-lg" required>
                </div>

                <div class="form-group">
                    <label for="address">Address: <sup>*</sup></label>
                    <input type="text" name="address" class="form-control form-control-lg" required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Gender</label>
                    <select type="text" name="gender" class="form-control" id="exampleFormControlSelect1" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <br />
                <div class="row">
                    <div class="col">
                        <input type="submit" name="submit" value="Register" class="btn btn-success btn-block form-control-lg">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'app/inc/footer.php'; ?>