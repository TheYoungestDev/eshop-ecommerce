<!-- <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css"> -->
<main>
    <section class="container py-5">
        <div class="row">
            <div class="col-md-3 myaccount-navigation py-3">
                <?php $this->load->view('front-end/' . THEME . '/pages/my-account-sidebar') ?>
            </div>
            <div class="col-md-9 py-3 padding-16-30">
                <h4 class="section-title mb-2"><?= label('address', 'Address') ?></h4>
                <form action="<?= base_url('my-account/add-address') ?>" method="POST" id="add-address-form">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="address_name" class="form-label"><?= label('name', 'Name') ?> <sup class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="address_name" name="name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="mobile_number" class="form-label"><?= label('mobile_number', 'Mobile Number') ?> <sup class="text-danger fw-bold">*</sup></label>
                            <input type="number" class="form-control" id="mobile_number" name="mobile">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="alternate_mobile" class="form-label"><?= label('alternate_mobile', 'Alternate Mobile') ?></label>
                            <input type="number" class="form-control" id="alternate_mobile" name="alternate_mobile">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address"><?= label('address', 'Address') ?> <sup class="text-danger fw-bold">*</sup></label>
                            <textarea class="form-control" name="address" id="address" placeholder="#Door no, Street Address, Locality, Area, Pincode" rows="3"></textarea>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="country" class="form-label"><?= label('country', 'Country') ?> <sup class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="country" name="country" placeholder="Select a country / region…">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="state" class="form-label"><?= label('state', 'State') ?> <sup class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="Your State">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="city" class="form-label"><?= label('city', 'City') ?> <sup class="text-danger fw-bold">*</sup></label>
                            <select name="city_id" id="city" class="form-control text-body-secondary">
                                <option value=""><?= !empty($this->lang->line('select_city')) ? $this->lang->line('select_city') : '--Select City--' ?></option>
                                <option value="0"><?= !empty($this->lang->line('other')) ? $this->lang->line('other') : 'other' ?></option>
                                <?php foreach ($cities as $row) { ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="area" class="form-label"><?= label('area', 'Area') ?> <sup class="text-danger fw-bold">*</sup></label>
                            <select name="area_id" id="area" class="form-control text-body-secondary">
                                <option value=""><?= !empty($this->lang->line('select_area')) ? $this->lang->line('select_area') : '--Select Area--' ?></option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="pincode" class="form-label"><?= label('pincode', 'Pincode') ?> <sup class="text-danger fw-bold">*</sup></label>
                            <input type="number" name="pincode" class="form-control" id="pincode">
                        </div>
                        <div class="form-check mb-3 d-flex col-md-4 gap-5">
                            <label class="form-check-label" for="home">
                                <input class="form-check-input" type="radio" name="type" id="home">
                                <?= label('home', 'Home') ?>
                            </label>
                            <label class="form-check-label" for="office">
                                <input class="form-check-input" type="radio" name="type" id="office">
                                <?= label('office', 'Office') ?>
                            </label>
                            <label class="form-check-label" for="other">
                                <input class="form-check-input" type="radio" name="type" id="other">
                                <?= label('other', 'Other') ?>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="save-address-submit-btn" value="Save"><?= label('save_address', 'Save Address') ?></button>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <div id="save-address-result"></div>
                    </div>
                </form>
            </div>
            <div>
                <table id="address_list_table" class='table-striped' data-toggle="table" data-url="<?= base_url('my-account/get-address-list') ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-show-columns="true" data-show-refresh="true" data-trim-on-search="false" data-sort-name="id" data-sort-order="desc" data-mobile-responsive="true" data-toolbar="" data-show-export="true" data-maintain-selected="true" data-export-types='["txt","excel"]' data-export-options='{
                        "fileName": "address-list",
                        "ignoreColumn": ["operate"] 
                        }' data-query-params="queryParams">
                    <thead>
                        <tr>
                            <th data-field="id" data-sortable="true">ID</th>
                            <th data-field="name" data-sortable="false"><?= !empty($this->lang->line('name')) ? $this->lang->line('name') : 'Name' ?></th>
                            <th data-field="type" data-sortable="false" class="col-md-5"><?= !empty($this->lang->line('type')) ? $this->lang->line('type') : 'Type' ?></th>
                            <th data-field="mobile" data-sortable="false"><?= !empty($this->lang->line('mobile_number')) ? $this->lang->line('mobile_number') : 'Mobile' ?></th>
                            <th data-field="alternate_mobile" data-sortable="false"><?= !empty($this->lang->line('alternate_mobile')) ? $this->lang->line('alternate_mobile') : 'Alternate Mobile' ?></th>
                            <th data-field="address" data-sortable="false"><?= !empty($this->lang->line('address')) ? $this->lang->line('address') : 'Address' ?></th>
                            <!-- <th data-field="landmark" data-sortable="false"><?= !empty($this->lang->line('landmark')) ? $this->lang->line('landmark') : 'Landmark' ?></th> -->
                            <th data-field="area" data-sortable="false"><?= !empty($this->lang->line('are')) ? $this->lang->line('area') : 'Area' ?></th>
                            <th data-field="city" data-sortable="false"><?= !empty($this->lang->line('city')) ? $this->lang->line('city') : 'City' ?></th>
                            <th data-field="state" data-sortable="false"><?= !empty($this->lang->line('state')) ? $this->lang->line('state') : 'State' ?></th>
                            <th data-field="pincode" data-sortable="false"><?= !empty($this->lang->line('pincode')) ? $this->lang->line('pincode') : 'Pincode' ?></th>
                            <th data-field="country" data-sortable="false"><?= !empty($this->lang->line('country')) ? $this->lang->line('country') : 'Country' ?></th>
                            <th data-field="action" data-events="editAddress" data-sortable="true"><?= !empty($this->lang->line('action')) ? $this->lang->line('action') : 'Action' ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <!-- address edit modal -->
    <div class="modal fade" data-bs-keyboard="false" tabindex="-1" id="address-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('my-account/edit-address') ?>" method="POST" id="edit-address-form">
                        <input type="hidden" name="id" id="address_id" value="" />
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group pb-3">
                                <label for="name" class="control-label"><?= !empty($this->lang->line('name')) ? $this->lang->line('name') : 'Name' ?></label>
                                <input type="text" class="form-control" id="edit_name" name="name" placeholder="Name" />
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group pb-3">
                                <label for="mobile_number" class="control-label"><?= !empty($this->lang->line('mobile_number')) ? $this->lang->line('mobile_number') : 'Mobile Number' ?></label>
                                <input type="text" class="form-control" id="edit_mobile" name="mobile" placeholder="Mobile Number" />
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group pb-3">
                                <label for="address" class="control-label"><?= !empty($this->lang->line('address')) ? $this->lang->line('address') : 'Address' ?></label>
                                <input type="text" class="form-control" name="address" id="edit_address" placeholder="Address" />
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 form-group edit_city pb-3">
                                <label for="city" class="control-label"><?= !empty($this->lang->line('city')) ? $this->lang->line('city') : 'City' ?></label>
                                <select name="city_id" id="edit_city" class="form-control">
                                    <option value><?= !empty($this->lang->line('select_city')) ? $this->lang->line('select_city') : '--Select City--' ?></option>
                                    <option value="0"><?= !empty($this->lang->line('other')) ? $this->lang->line('other') : 'other' ?></option>
                                    <?php foreach ($cities as $row) { ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- <input type="text" name="other_city" id="other_city" class="d-none"> -->
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group edit_area pb-3">
                                <label for="area" class="control-label"><?= !empty($this->lang->line('area')) ? $this->lang->line('area') : 'Area' ?></label>
                                <select name="area_id" id="edit_area" class="form-control">
                                    <option value=""><?= !empty($this->lang->line('select_area')) ? $this->lang->line('select_area') : '--Select Area--' ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group other_city d-none pb-3">
                                <label for="city" class="control-label"><?= !empty($this->lang->line('city')) ? $this->lang->line('city') : 'City Name' ?></label>
                                <input type="text" class="form-control" id="other_city_value" name="other_city" placeholder="City" />
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group other_areas d-none pb-3">
                                <label for="area" class="control-label">Area</label>
                                <input type="text" class="form-control" id="other_areas_value" name="other_areas" placeholder="Area Name" />
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group other_pincode d-none pb-3">
                                <label for="area" class="control-label">Pincode</label>
                                <input type="text" class="form-control " id="other_pincode_value" name="pincode_name" placeholder="Zipcode" />
                            </div>
                            <!-- <input type="text" name="other_areas" id="other_areas" class="d-none"> -->
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group edit_pincode pb-3">
                                <label for="pincode" class="control-label"><?= !empty($this->lang->line('pincode')) ? $this->lang->line('pincode') : 'Zipcode' ?></label>
                                <input type="text" class="form-control" id="edit_pincode" name="pincode" placeholder="Name" readonly />
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group pb-3">
                                <label for="state" class="control-label"><?= !empty($this->lang->line('state')) ? $this->lang->line('state') : 'State' ?></label>
                                <input type="text" class="form-control" id="edit_state" name="state" placeholder="State" />
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group pb-3">
                                <label for="country" class="control-label"><?= !empty($this->lang->line('country')) ? $this->lang->line('country') : 'Country' ?></label>
                                <input type="text" class="form-control" name="country" id="edit_country" placeholder="Country" />
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group pb-3">
                                <label for="country" class="control-label"><?= !empty($this->lang->line('type')) ? $this->lang->line('type') : 'Type : ' ?></label>
                                <div class="form-check mb-3 d-flex col-md-4 gap-5">
                                    <label class="form-check-label" for="edit_home">
                                        <input class="form-check-input" type="radio" name="type" id="edit_home" value="home" />
                                        <?= label('home', 'Home') ?>
                                    </label>
                                    <label class="form-check-label" for="edit_office">
                                        <input type="radio" class="form-check-input" name="type" id="edit_office" value="office" placeholder="Office" />
                                        <?= label('office', 'Office') ?>
                                    </label>
                                    <label class="form-check-label" for="edit_other">
                                        <input type="radio" class="form-check-input" name="type" id="edit_other" value="other" placeholder="Other" />
                                        <?= label('other', 'Other') ?>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                <input type="submit" class="btn btn-primary" id="edit-address-submit-btn" value="Save" />
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center mt-2">
                                <div id="edit-address-result"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    window.editAddress = {
        'click .edit-address': function(e, value, row, index) {
            // alert("here");
            $("#address_id").val(row.id);
            $("#edit_name").val(row.name);
            $("#edit_area").empty();
            $("#edit_mobile").val(row.mobile);
            $("#edit_address").val(row.address);
            $("#edit_state").val(row.state);
            $("#edit_country").val(row.country);
            $("#edit_pincode").val(row.pincode);
            if (row.city_id == 0 || row.city_id == "") {
                // alert("here2");
                $('.edit_area').addClass('d-none');
                // $('.edit_city').addClass('d-none');
                $('.edit_pincode').addClass('d-none');
                $('.other_areas').removeClass('d-none');
                $("#other_areas_value").val(row.area);
                $('.other_city').removeClass('d-none');
                $("#other_city_value").val(row.area);
                $('.other_pincode').removeClass('d-none');
                $("#other_pincode_value").val(row.pincode);
                $("#edit_city").val(row.city_id);
            } else {
                $("#edit_city").val(row.city_id).trigger('change', [row.area_id]);
            }

            $('input[type=radio][value=' + row.type.toLowerCase() + ']').attr('checked', true);
        }
    };
</script>
<!-- <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/locale/bootstrap-table-zh-CN.min.js"></script> -->