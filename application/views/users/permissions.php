<style media="screen">
    .styled-checkbox{
        height: 25px;
        width: 100%
    }
</style>


<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="card card-primary">

                        <div class="card-header" data-toggle="collapse" data-target="#form" style="cursor: pointer;">
                            <h3 class="card-title">Search User</h3>
                            <div class="card-tools">
                                <i class="fas fa-plus"></i> Show/Hide
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div id="form" class="collapse show">
                            <!-- form start -->

                            <?php echo form_open_multipart('', ''); ?>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select User<span class="req">*</span></label>
                                    <div class="input-group">
                                        <select class="form-control select2" name="user_id" required style="width: 100%; !important">
                                            <?php foreach ($users as $key => $user) { ?>
                                                <option value="<?php echo $user->id; ?>" >
                                                    <?php echo $user->fullname; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <input type="submit" name="search" class="btn btn-primary float-right" value="Search">
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>

                    <?php if($this->input->post('search')){ ?>

                    <?php echo form_open_multipart('', ''); ?>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Set permission for <?php echo $fullname; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" class="styled-checkbox" id="allcb" <?php if(count($modules) == 13){
                                                echo "checked";
                                            } ?> />
                                        </th>
                                        <th>Menu Name</th>
                                        <th>Sub Menu</th>
                                        <th class="text-center">Add</th>
                                        <th class="text-center">Update</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <input type="hidden" name="users_id" value="<?php echo $users_id; ?>">

                                    <!-- <tr>
                                        <td>
                                            <input class="styled-checkbox" <?php if (in_array('dashboard', $modules)) {
                                                echo "checked";}?> name="checked_key[]" type="checkbox" id="dashboard"  value="dashboard"/>
                                        </td>
                                        <td>Dashboard</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr> -->
                                     <!-- All Employee -->
                                    <tr>
                                        <td>
                                            <input class="styled-checkbox"  name="checked_key[]" type="checkbox" onchange="checkFn(this, 'marketer')" <?php if (in_array('marketer', $modules)) {
                                                echo "checked";}?> value="marketer"/>
                                        </td>
                                        <td rowspan="3">Employee</td>
                                        <td> All Employee </td>
                                        <td>
                                            <input type="checkbox" id="marketer_0" <?php if (isset($access->marketer_all) && in_array('add', $access->marketer_all)) {
                                                echo "checked";}?> name="marketer_all[]" value="add" class="styled-checkbox marketer">
                                        </td>
                                        <td> <input type="checkbox" id="marketer_1" <?php if (isset($access->marketer_all) && in_array('update', $access->marketer_all)) {
                                            echo "checked";}?> name="marketer_all[]" value="update" class="styled-checkbox marketer"> </td>
                                        <td> <input type="checkbox" id="marketer_2" <?php if (isset($access->marketer_all) && in_array('delete', $access->marketer_all)) {
                                            echo "checked";}?> name="marketer_all[]" value="delete" class="styled-checkbox marketer"> </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td> Balance Stats </td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <!-- <td>
                                            <input type="checkbox" id="marketer_3" <?php if(isset($access->balance_stats) && in_array('add', $access->balance_stats)){
                                                echo "checked";} ?> name="balance_stats[]" value="add" class="styled-checkbox marketer">
                                        </td>
                                        <td>
                                            <input type="checkbox" id="marketer_4" <?php if(isset($access->balance_stats) && in_array('update', $access->balance_stats)){
                                        echo "checked";} ?> name="balance_stats[]" value="update" class="styled-checkbox marketer">
                                        </td>
                                        <td>
                                            <input type="checkbox" id="marketer_5" <?php if(isset($access->balance_stats) && in_array('delete', $access->balance_stats)){
                                        echo "checked";} ?> name="balance_stats[]" value="delete" class="styled-checkbox marketer">
                                        </td> -->
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td> Transactions </td>
                                        <td> <input type="checkbox" id="marketer_3" <?php if(isset($access->marketer_trx) && in_array('add', $access->marketer_trx)){
                                        echo "checked";} ?> name="marketer_trx[]" value="add" class="styled-checkbox marketer"> </td>
                                        <td> <input type="checkbox" id="marketer_4" <?php if(isset($access->marketer_trx) && in_array('update', $access->marketer_trx)){
                                        echo "checked";} ?> name="marketer_trx[]" value="update" class="styled-checkbox marketer"> </td>
                                        <td> <input type="checkbox" id="marketer_5" <?php if(isset($access->marketer_trx) && in_array('delete', $access->marketer_trx)){
                                        echo "checked";} ?> name="marketer_trx[]" value="delete" class="styled-checkbox marketer"> </td>
                                    </tr>

                                    <!-- Salary -->
                                    <tr>
                                        <td>
                                            <input class="styled-checkbox" <?php if (in_array('salary', $modules)) {
                                                echo "checked";}?>  name="checked_key[]" type="checkbox" onchange="checkFn(this, 'salary')"  value="salary"/>
                                        </td>
                                        <td rowspan="8">Salary</td>
                                        <td> Bouns </td>
                                        <td>
                                            <input type="checkbox" id="salary_0" <?php if(isset($access->bonus) && in_array('add', $access->bonus)){
                                            echo "checked";} ?> name="bonus[]" value="add" class="styled-checkbox salary">
                                        </td>

                                        <td>
                                            <!-- <input type="checkbox" id="salary_1" <?php if(isset($access->bonus) && in_array('update', $access->bonus)){
                                        echo "checked";} ?> name="bonus[]" value="update" class="styled-checkbox salary">  -->
                                            -
                                        </td>

                                        <td>
                                            <!-- <input type="checkbox" id="salary_2" <?php if(isset($access->bonus) && in_array('delete', $access->bonus)){
                                            echo "checked";} ?> name="bonus[]" value="delete" class="styled-checkbox salary"> -->
                                            -
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td> Incentive </td>
                                        <td>
                                            <input type="checkbox" id="salary_1" <?php if(isset($access->incentive) && in_array('add', $access->incentive)){
                                            echo "checked";} ?> name="incentive[]" value="add" class="styled-checkbox salary">
                                        </td>
                                        <td>
                                        -
                                        <!-- <td> <input type="checkbox" id="salary_4" <?php if(isset($access->incentive) && in_array('update', $access->incentive)){
                                        echo "checked";} ?> name="incentive[]" value="update" class="styled-checkbox salary"> -->
                                        </td>
                                        <td>
                                            -
                                            <!-- <input type="checkbox" id="salary_5" <?php if(isset($access->incentive) && in_array('delete', $access->incentive)){
                                        echo "checked";} ?> name="incentive[]" value="delete" class="styled-checkbox salary"> -->
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td> Advanced </td>
                                        <td>
                                            <input type="checkbox" id="salary_2" <?php if(isset($access->advanced) && in_array('add', $access->advanced)){
                                            echo "checked";} ?> name="advanced[]" value="add" class="styled-checkbox salary">
                                        </td>
                                        <td> <input type="checkbox" id="salary_3" <?php if(isset($access->advanced) && in_array('update', $access->advanced)){
                                        echo "checked";} ?> name="advanced[]" value="update" class="styled-checkbox salary"> </td>
                                        <td> <input type="checkbox" id="salary_4" <?php if(isset($access->advanced) && in_array('delete', $access->advanced)){
                                        echo "checked";} ?> name="advanced[]" value="delete" class="styled-checkbox salary"> </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td> Attendance </td>
                                        <td>
                                            <input type="checkbox" id="salary_5" <?php if(isset($access->advanced) && in_array('add', $access->advanced)){
                                            echo "checked";} ?> name="attendance[]" value="add" class="styled-checkbox salary">
                                        </td>
                                        <td>
                                           <!--  <input type="checkbox" id="salary_6" <?php if(isset($access->advanced) && in_array('update', $access->advanced)){
                                        echo "checked";} ?> name="attendance[]" value="update" class="styled-checkbox salary">  -->
                                        -
                                        </td>
                                        <td>
                                            <!-- <input type="checkbox" id="salary_7" <?php if(isset($access->advanced) && in_array('delete', $access->advanced)){
                                        echo "checked";} ?> name="attendance[]" value="delete" class="styled-checkbox salary">  -->
                                        -
                                        </td>
                                    </tr>


                                    <tr>
                                        <td></td>

                                        <td> Leave </td>
                                        <td>
                                            <input type="checkbox" id="salary_6" <?php if(isset($access->advanced) && in_array('add', $access->advanced)){
                                            echo "checked";} ?> name="leave[]" value="add" class="styled-checkbox salary">
                                        </td>
                                        <td> <input type="checkbox" id="salary_7" <?php if(isset($access->advanced) && in_array('update', $access->advanced)){
                                        echo "checked";} ?> name="leave[]" value="update" class="styled-checkbox salary"> </td>
                                        <td> <input type="checkbox" id="salary_8" <?php if(isset($access->advanced) && in_array('delete', $access->advanced)){
                                        echo "checked";} ?> name="leave[]" value="delete" class="styled-checkbox salary"> </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td> Payment Generate </td>
                                        <td>
                                            <input type="checkbox" id="salary_9" <?php if(isset($access->payment_generate) && in_array('add', $access->payment_generate)){
                                            echo "checked";} ?> name="payment_generate[]" value="add" class="styled-checkbox salary">
                                        </td>
                                        <td>
                                            <!-- <input type="checkbox" id="salary_10" <?php if(isset($access->payment_generate) && in_array('update', $access->payment_generate)){
                                                echo "checked";} ?> name="payment_generate[]" value="update" class="styled-checkbox salary"> -->

                                                -
                                        </td>
                                        <td>
                                             <!-- <input type="checkbox" id="salary_11" <?php if(isset($access->payment_generate) && in_array('delete', $access->payment_generate)){
                                        echo "checked";} ?> name="payment_generate[]" value="delete" class="styled-checkbox salary"> -->
                                            -
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td> Give Payment </td>
                                        <td>
                                            <input type="checkbox" id="salary_10" <?php if(isset($access->payment) && in_array('add', $access->payment)){
                                            echo "checked";} ?> name="payment[]" value="add" class="styled-checkbox salary">
                                        </td>
                                        <td>
                                            <!-- <input type="checkbox" id="salary_13" <?php if(isset($access->payment) && in_array('update', $access->payment)){
                                        echo "checked";} ?> name="payment[]" value="update" class="styled-checkbox salary">  -->
                                        -
                                        </td>
                                        <td>
                                            <!-- <input type="checkbox" id="salary_14" <?php if(isset($access->payment) && in_array('delete', $access->payment)){
                                        echo "checked";} ?> name="payment[]" value="delete" class="styled-checkbox salary">  -->
                                        -
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td> Paid Records </td>
                                        <td>
                                            <!-- <input type="checkbox" id="salary_15" <?php if(isset($access->paid) && in_array('add', $access->paid)){
                                            echo "checked";} ?> name="paid[]" value="add" class="styled-checkbox salary"> -->

                                            -

                                        </td>
                                        <td>
                                            <!-- <input type="checkbox" id="salary_13" <?php if(isset($access->paid) && in_array('update', $access->paid)){
                                        echo "checked";} ?> name="paid[]" value="update" class="styled-checkbox salary">  -->
                                        -
                                        </td>
                                        <td>
                                            -
                                            <!-- <input type="checkbox" id="salary_14" <?php if(isset($access->paid) && in_array('delete', $access->paid)){
                                        echo "checked";} ?> name="paid[]" value="delete" class="styled-checkbox salary">
 -->                                         </td>
                                    </tr>

                                    <!-- Claim -->
                                    <tr>
                                        <td>
                                            <input class="styled-checkbox" <?php if (in_array('claim', $modules)) {
                                                echo "checked";}?>  name="checked_key[]" type="checkbox" onchange="checkFn(this, 'claim')"  value="claim"/>
                                        </td>
                                        <td>Claim</td>
                                        <td> All Claim </td>
                                        <td>
                                            <input type="checkbox" id="claim_0" <?php if(isset($access->claim_all) && in_array('add', $access->claim_all)){
                                            echo "checked";} ?> name="claim_all[]" value="add" class="styled-checkbox claim">
                                        </td>
                                        <td> <input type="checkbox" id="claim_1" <?php if(isset($access->claim_all) && in_array('update', $access->claim_all)){
                                        echo "checked";} ?> name="claim_all[]" value="update" class="styled-checkbox claim"> </td>
                                        <td> <input type="checkbox" id="claim_2" <?php if(isset($access->claim_all) && in_array('delete', $access->claim_all)){
                                        echo "checked";} ?> name="claim_all[]" value="delete" class="styled-checkbox claim"> </td>
                                    </tr>

                                    <!-- Chalan -->
                                    <tr>
                                        <td>
                                            <input class="styled-checkbox" <?php if (in_array('chalan', $modules)) {
                                                echo "checked";}?>  name="checked_key[]" type="checkbox" onchange="checkFn(this, 'chalan')"  value="chalan"/>
                                        </td>
                                        <td rowspan="3">Chalan</td>
                                        <td> New Chalan </td>
                                        <td>
                                            <input type="checkbox" id="chalan_0" <?php if(isset($access->chalan_new) && in_array('add', $access->chalan_new)){
                                            echo "checked";} ?> name="chalan_new[]" value="add" class="styled-checkbox chalan">
                                        </td>
                                        <td>
                                             <!-- <input type="checkbox" id="chalan_1" <?php if(isset($access->chalan_new) && in_array('update', $access->chalan_new)){
                                                 echo "checked";} ?> name="chalan_new[]" value="update" class="styled-checkbox chalan"> -->
                                                 -
                                        </td>
                                        <td>
                                            <!-- <input type="checkbox" id="chalan_2" <?php if(isset($access->chalan_new) && in_array('delete', $access->chalan_new)){
                                                echo "checked";} ?> name="chalan_new[]" value="delete" class="styled-checkbox chalan"> -->
                                                -
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td> Markets </td>
                                        <td>
                                            <input type="checkbox" id="chalan_1" <?php if(isset($access->markets) && in_array('add', $access->markets)){
                                            echo "checked";} ?> name="markets[]" value="add" class="styled-checkbox chalan">
                                        </td>
                                        <td> <input type="checkbox" id="chalan_2" <?php if(isset($access->markets) && in_array('update', $access->markets)){
                                        echo "checked";} ?> name="markets[]" value="update" class="styled-checkbox chalan"> </td>
                                        <td> <input type="checkbox" id="chalan_3" <?php if(isset($access->markets) && in_array('delete', $access->markets)){
                                        echo "checked";} ?> name="markets[]" value="delete" class="styled-checkbox chalan"> </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td> All Chalan </td>
                                        <td>
                                            <input type="checkbox" id="chalan_4" <?php if(isset($access->all_chalan) && in_array('add', $access->all_chalan)){
                                            echo "checked";} ?> name="all_chalan[]" value="add" class="styled-checkbox chalan">
                                            <span class="text-muted">Received</span>

                                        </td>
                                        <td> <input type="checkbox" id="chalan_5" <?php if(isset($access->all_chalan) && in_array('update', $access->all_chalan)){
                                        echo "checked";} ?> name="all_chalan[]" value="update" class="styled-checkbox chalan"> </td>
                                        <td> <input type="checkbox" id="chalan_6" <?php if(isset($access->all_chalan) && in_array('delete', $access->all_chalan)){
                                        echo "checked";} ?> name="all_chalan[]" value="delete" class="styled-checkbox chalan"> </td>
                                    </tr>

                                    <!-- Company Invoice -->
                                    <tr>
                                        <td>
                                            <input class="styled-checkbox" <?php if (in_array('invoice', $modules)) {
                                                echo "checked";}?>  name="checked_key[]" type="checkbox" onchange="checkFn(this, 'invoice')"  value="invoice"/>
                                        </td>
                                        <td>Company Invoice</td>
                                        <td> Invoice </td>
                                        <td>
                                            <input type="checkbox" id="invoice_0" <?php if(isset($access->invoice_all) && in_array('add', $access->invoice_all)){
                                            echo "checked";} ?> name="invoice_all[]" value="add" class="styled-checkbox invoice">
                                        </td>
                                        <td>
                                             <input type="checkbox" id="invoice_1" <?php if(isset($access->invoice_all) && in_array('update', $access->invoice_all)){
                                                 echo "checked";} ?> name="invoice_all[]" value="update" class="styled-checkbox invoice">
                                        </td>
                                        <td>
                                            <input type="checkbox" id="invoice_2" <?php if(isset($access->invoice_all) && in_array('delete', $access->invoice_all)){
                                                echo "checked";} ?> name="invoice_all[]" value="delete" class="styled-checkbox invoice">
                                        </td>
                                    </tr>

                                    <!-- Banking -->
                                    <tr>
                                        <td>
                                            <input class="styled-checkbox" <?php if (in_array('bank', $modules)) {
                                                echo "checked";}?>  name="checked_key[]" type="checkbox" onchange="checkFn(this, 'bank')"  value="bank"/>
                                        </td>
                                        <td rowspan="2">Banking</td>
                                        <td> Accounts </td>
                                        <td>
                                            <input type="checkbox" id="bank_0" <?php if(isset($access->bank_all) && in_array('add', $access->bank_all)){
                                            echo "checked";} ?> name="bank_all[]" value="add" class="styled-checkbox bank">
                                        </td>
                                        <td> <input type="checkbox" id="bank_1" <?php if(isset($access->bank_all) && in_array('update', $access->bank_all)){
                                        echo "checked";} ?> name="bank_all[]" value="update" class="styled-checkbox bank"> </td>
                                        <td> <input type="checkbox" id="bank_2" <?php if(isset($access->bank_all) && in_array('delete', $access->bank_all)){
                                        echo "checked";} ?> name="bank_all[]" value="delete" class="styled-checkbox bank"> </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td> Transactions </td>
                                        <td>
                                            <input type="checkbox" id="bank_3" <?php if(isset($access->bank_trx) && in_array('add', $access->bank_trx)){
                                            echo "checked";} ?> name="bank_trx[]" value="add" class="styled-checkbox bank">
                                        </td>
                                        <td> <input type="checkbox" id="bank_4" <?php if(isset($access->bank_trx) && in_array('update', $access->bank_trx)){
                                        echo "checked";} ?> name="bank_trx[]" value="update" class="styled-checkbox bank"> </td>
                                        <td> <input type="checkbox" id="bank_5" <?php if(isset($access->bank_trx) && in_array('delete', $access->bank_trx)){
                                        echo "checked";} ?> name="bank_trx[]" value="delete" class="styled-checkbox bank"> </td>
                                    </tr>


                                    <!-- Cost -->
                                    <tr>
                                        <td>
                                            <input class="styled-checkbox" <?php if (in_array('cost', $modules)) {
                                                echo "checked";}?>  name="checked_key[]" type="checkbox" onchange="checkFn(this, 'cost')"  value="cost"/>
                                        </td>
                                        <td rowspan="2">Cost</td>
                                        <td> Field of Cost </td>
                                        <td>
                                            <input type="checkbox" id="cost_0" <?php if(isset($access->fieldofcost) && in_array('add', $access->fieldofcost)){
                                            echo "checked";} ?> name="fieldofcost[]" value="add" class="styled-checkbox cost">
                                        </td>
                                        <td> <input type="checkbox" id="cost_1" <?php if(isset($access->fieldofcost) && in_array('update', $access->fieldofcost)){
                                        echo "checked";} ?> name="fieldofcost[]" value="update" class="styled-checkbox cost"> </td>
                                        <td> <input type="checkbox" id="cost_2" <?php if(isset($access->fieldofcost) && in_array('delete', $access->fieldofcost)){
                                        echo "checked";} ?> name="fieldofcost[]" value="delete" class="styled-checkbox cost"> </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td> All Cost </td>
                                        <td>
                                            <input type="checkbox" id="cost_3" <?php if(isset($access->all_cost) && in_array('add', $access->all_cost)){
                                            echo "checked";} ?> name="all_cost[]" value="add" class="styled-checkbox cost">
                                        </td>
                                        <td> <input type="checkbox" id="cost_4" <?php if(isset($access->all_cost) && in_array('update', $access->all_cost)){
                                        echo "checked";} ?> name="all_cost[]" value="update" class="styled-checkbox cost"> </td>
                                        <td> <input type="checkbox" id="cost_5" <?php if(isset($access->all_cost) && in_array('delete', $access->all_cost)){
                                        echo "checked";} ?> name="all_cost[]" value="delete" class="styled-checkbox cost"> </td>
                                    </tr>


                                    <!-- Logbook -->
                                    <tr>
                                        <td>
                                            <input class="styled-checkbox" <?php if (in_array('logs', $modules)) {
                                                echo "checked";}?>  name="checked_key[]" type="checkbox" onchange="checkFn(this, 'logs')"  value="logs"/>
                                        </td>
                                        <td rowspan="2">Logbook</td>
                                        <td>Vehicle</td>
                                        <td>
                                            <input type="checkbox" id="logs_0" <?php if(isset($access->logbook_vehicle) && in_array('add', $access->logbook_vehicle)){
                                            echo "checked";} ?> name="logbook_vehicle[]" value="add" class="styled-checkbox logs">
                                        </td>
                                        <td> <input type="checkbox" id="logs_1" <?php if(isset($access->logbook_vehicle) && in_array('update', $access->logbook_vehicle)){
                                        echo "checked";} ?> name="logbook_vehicle[]" value="update" class="styled-checkbox logs"> </td>
                                        <td> <input type="checkbox" id="logs_2" <?php if(isset($access->logbook_vehicle) && in_array('delete', $access->logbook_vehicle)){
                                        echo "checked";} ?> name="logbook_vehicle[]" value="delete" class="styled-checkbox logs"> </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>Records</td>
                                        <td>
                                            <input type="checkbox" id="logs_3" <?php if(isset($access->logbook_record) && in_array('add', $access->logbook_record)){
                                            echo "checked";} ?> name="logbook_record[]" value="add" class="styled-checkbox logs">
                                        </td>
                                        <td> <input type="checkbox" id="logs_4" <?php if(isset($access->logbook_record) && in_array('update', $access->logbook_record)){
                                        echo "checked";} ?> name="logbook_record[]" value="update" class="styled-checkbox logs"> </td>
                                        <td> <input type="checkbox" id="logs_5" <?php if(isset($access->logbook_record) && in_array('delete', $access->logbook_record)){
                                        echo "checked";} ?> name="logbook_record[]" value="delete" class="styled-checkbox logs"> </td>
                                    </tr>


                                    <!-- Sale -->
                                    <tr>
                                        <td>
                                            <input class="styled-checkbox" <?php if (in_array('sale', $modules)) {
                                                echo "checked";}?>  name="checked_key[]" type="checkbox" onchange="checkFn(this, 'sale')"  value="sale"/>
                                        </td>
                                        <td rowspan="4">Sale</td>
                                        <td>Sale's Representative</td>
                                        <td>
                                            <input type="checkbox" id="sale_0" <?php if(isset($access->spot_person) && in_array('add', $access->spot_person)){
                                            echo "checked";} ?> name="spot_person[]" value="add" class="styled-checkbox sale">
                                        </td>
                                        <td> <input type="checkbox" id="sale_1" <?php if(isset($access->spot_person) && in_array('update', $access->spot_person)){
                                        echo "checked";} ?> name="spot_person[]" value="update" class="styled-checkbox sale"> </td>
                                        <td> <input type="checkbox" id="sale_2" <?php if(isset($access->spot_person) && in_array('delete', $access->spot_person)){
                                        echo "checked";} ?> name="spot_person[]" value="delete" class="styled-checkbox sale"> </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>Spot Sale</td>
                                        <td>
                                            <input type="checkbox" id="sale_3" <?php if(isset($access->spot_sale) && in_array('add', $access->spot_sale)){
                                            echo "checked";} ?> name="spot_sale[]" value="add" class="styled-checkbox sale">
                                        </td>
                                        <td> <input type="checkbox" id="sale_4" <?php if(isset($access->spot_sale) && in_array('update', $access->spot_sale)){
                                        echo "checked";} ?> name="spot_sale[]" value="update" class="styled-checkbox sale"> </td>
                                        <td> <input type="checkbox" id="sale_5" <?php if(isset($access->spot_sale) && in_array('delete', $access->spot_sale)){
                                        echo "checked";} ?> name="spot_sale[]" value="delete" class="styled-checkbox sale"> </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>Payments</td>
                                        <td>
                                            <input type="checkbox" id="sale_6" <?php if(isset($access->sale_payment) && in_array('add', $access->sale_payment)){
                                            echo "checked";} ?> name="sale_payment[]" value="add" class="styled-checkbox sale">
                                        </td>
                                        <td> <input type="checkbox" id="sale_7" <?php if(isset($access->sale_payment) && in_array('update', $access->sale_payment)){
                                        echo "checked";} ?> name="sale_payment[]" value="update" class="styled-checkbox sale"> </td>
                                        <td> <input type="checkbox" id="sale_8" <?php if(isset($access->sale_payment) && in_array('delete', $access->sale_payment)){
                                        echo "checked";} ?> name="sale_payment[]" value="delete" class="styled-checkbox sale"> </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>Gifts</td>
                                        <td>
                                            <input type="checkbox" id="sale_9" <?php if(isset($access->gift) && in_array('add', $access->gift)){
                                            echo "checked";} ?> name="gift[]" value="add" class="styled-checkbox sale">
                                        </td>
                                        <td> <input type="checkbox" id="sale_10" <?php if(isset($access->gift) && in_array('update', $access->gift)){
                                        echo "checked";} ?> name="gift[]" value="update" class="styled-checkbox sale"> </td>
                                        <td> <input type="checkbox" id="sale_11" <?php if(isset($access->gift) && in_array('delete', $access->gift)){
                                        echo "checked";} ?> name="gift[]" value="delete" class="styled-checkbox sale"> </td>
                                    </tr>

                                    <!-- Loan -->
                                    <tr>
                                        <td>
                                            <input class="styled-checkbox" <?php if (in_array('loan', $modules)) {
                                                echo "checked";}?>  name="checked_key[]" type="checkbox" onchange="checkFn(this, 'loan')"  value="loan"/>
                                        </td>
                                        <td rowspan="2">Loan</td>
                                        <td>All Loans</td>
                                        <td>
                                            <input type="checkbox" id="loan_0" <?php if(isset($access->loan_all) && in_array('add', $access->loan_all)){
                                            echo "checked";} ?>  name="loan_all[]" value="add" class="styled-checkbox loan">
                                        </td>
                                        <td> <input type="checkbox" id="loan_1" <?php if(isset($access->loan_all) && in_array('update', $access->loan_all)){
                                        echo "checked";} ?>  name="loan_all[]" value="update" class="styled-checkbox loan"> </td>
                                        <td> <input type="checkbox" id="loan_2" <?php if(isset($access->loan_all) && in_array('delete', $access->loan_all)){
                                        echo "checked";} ?> name="loan_all[]"  value="delete" class="styled-checkbox loan"> </td>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>Transactions</td>
                                        <td>
                                            <input type="checkbox" id="loan_3" <?php if(isset($access->loan_trx) && in_array('add', $access->loan_trx)){
                                            echo "checked";} ?> name="loan_trx[]" value="add" class="styled-checkbox loan">
                                        </td>
                                        <td> <input type="checkbox" id="loan_4" <?php if(isset($access->loan_trx) && in_array('add', $access->loan_trx)){
                                        echo "checked";} ?> name="loan_trx[]" value="update" class="styled-checkbox loan"> </td>
                                        <td> <input type="checkbox" id="loan_5" <?php if(isset($access->loan_trx) && in_array('add', $access->loan_trx)){
                                        echo "checked";} ?> name="loan_trx[]" value="delete" class="styled-checkbox loan"> </td>
                                    </tr>

                                    <!-- Report -->
                                    <tr>
                                        <td>
                                            <input class="styled-checkbox" <?php if (in_array('report', $modules)) {
                                                echo "checked";}?>  name="checked_key[]" type="checkbox" onchange="checkFn(this, 'report')"  value="report"/>
                                        </td>
                                        <td rowspan="7">Report</td>
                                        <td>Chalan Report</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>Cost Report</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>Logbook Report</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>Employee Report</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>Profit Report</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>User Activity Report</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>
                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>Daily Report</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>

                                    <!-- SMS -->
                                    <tr>
                                        <td>
                                            <input class="styled-checkbox" <?php if (in_array('settings', $modules)) {
                                                echo "checked";}?>  name="checked_key[]" type="checkbox" onchange="checkFn(this, 'sms')"  value="sms"/>
                                        </td>
                                        <td rowspan="3">SMS</td>
                                        <td>Send SMS</td>
                                        <td>
                                            <input type="checkbox" id="sms_0" <?php if(isset($access->loan_all) && in_array('add', $access->loan_all)){
                                            echo "checked";} ?>  name="send_sms[]" value="add" class="styled-checkbox sms">
                                        </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>SMS Report</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>SMS Stats</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>


                                    <!-- Settings -->
                                    <tr>
                                        <td>
                                            <input class="styled-checkbox" <?php if (in_array('settings', $modules)) {
                                                echo "checked";}?>  name="checked_key[]" type="checkbox" onchange="checkFn(this, 'settings')"  value="settings"/>
                                        </td>
                                        <td rowspan="4">Settings</td>
                                        <td>Configure Setup</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>Incentive & Salary</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>Users Management</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>

                                    <tr>
                                        <td></td>

                                        <td>User's permission</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
        					<input type="submit" name="update" class="btn btn-primary float-right" value="Update">
        				</div>

                        <?php echo form_close();?>
                    </div>
                    <!-- /.card -->

                    <?php  } ?>

                </div>
            </div>
        </div>
    </section>
</div>


<script type="text/javascript">
    $('#allcb').change(function () {
        $('tbody tr td input[type="checkbox"]').prop('checked', $(this).prop('checked'));
    });

    function checkFn(cb, type){

        var classLen = document.getElementsByClassName(type);

        if(cb.checked){
            for(var i = 0; i < classLen.length; ++i)
            $('#'+type+'_'+i).prop('checked', true);
        }else {
            for(var i = 0; i < classLen.length; ++i)
            $('#'+type+'_'+i).prop('checked', false);
        }
    }

</script>
