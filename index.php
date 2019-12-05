<?php require 'app/inc/header.php'; ?>
<div class="row">
    <div class="mx-auto">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">
                        Registered Users
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-hover">
                        <?php

                        function lists()
                        {
                            include('calls/list_account.php');


                            ?>
                            <table id="myTable" class="table table-bordered table-sm">
                                <thead class="text-primary">
                                    <th class="text-center" style="width: 10em; font-size: 15px; font-weight: 400;">Account ID</th>
                                    <th class="text-center" style="width: 10em; font-size: 15px; font-weight: 400;">First Name</th>
                                    <th class="text-center" style="width: 10em; font-size: 15px; font-weight: 400;">Last Name</th>
                                    <th class="text-center" style="width: 10em; font-size: 15px; font-weight: 400;">Phone</th>
                                    <th class="text-center" style="width: 10em; font-size: 15px; font-weight: 400;">Address</th>
                                    <th class="text-center" style="width: 10em; font-size: 15px; font-weight: 400;">Gender</th>
                                    <th class="text-center" style="width: 10em; font-size: 15px; font-weight: 400;">Balance</th>
                                    <th class="text-center" style="width: 10em; font-size: 15px; font-weight: 400;">Date Created</th>
                                    <th class="text-center" style="width: 10em; font-size: 15px; font-weight: 400;">Action</th>
                                </thead>
                                <tbody>
                                <?php

                                    for ($i = 0; $i < $count; $i++) {
                                        //echo $i;

                                        $transactions = json_decode($output[0])->data[$i];
                                        //print_r($transactions);

                                        $accountId = $transactions->account_id;
                                        $firstName = $transactions->firstname;
                                        $lastName = $transactions->lastname;
                                        $phone = $transactions->phone;
                                        $address = $transactions->address;
                                        $gender = $transactions->gender;
                                        $balance = $transactions->balance;
                                        $dateCreated = $transactions->date_created;


                                        echo "<tr>
                                                    <td class='text-center'>$accountId</td>
                                                    <td class='text-center'>$firstName</td>
                                                    <td class='text-center'>$lastName</td>
                                                    <td class='text-center'>$phone</td>
                                                    <td class='text-center'>$address</td>
                                                    <td class='text-center'>$gender</td>";
                                        echo  "<td class='text-center'>&#8358;" . number_format($balance) . "</td>
                                                    <td class='text-center'>" . substr($dateCreated, 0, 10) . "</td>
                                                    <td class='text-center'>
                                                    <a href='calls/delete_account.php?account_id=$accountId'>
                                                            <i class='fa fa-trash text-danger'></i>
                                                        </a>
                                                    </td>
                                        
                                                </tr>";
                                    }
                                }

                                echo lists();

                                ?>

                                </tbody>
                            </table>

                    </div>
                </div>

            </div>
        </div>

        <?php require 'app/inc/footer.php'; ?>