<?php require 'app/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-0">
            <h2>Transfer</h2>
            <p>Please fill out this form</p>
            <form action="calls/transfer_call.php" method="POST">
                <div class="form-group">
                    <label for="beneficiary">Beneficiary Account ID: <sup>*</sup></label>
                    <input type="text" name="account_id" class="form-control form-control-lg" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount: <sup>*</sup></label>
                    <input type="text" name="amount" class="form-control form-control-lg" required>

                </div>

                <br />
                <div class="row">
                    <div class="col">
                        <input type="submit" name="submit" value="Transfer" class="btn btn-success btn-block form-control form-control-lg" />
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'app/inc/footer.php'; ?>