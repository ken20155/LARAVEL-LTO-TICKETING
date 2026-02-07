<?php 
if (isset($ticket_again) && $ticket_again) {
    ?>
    <input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= 'add' ?>">
    <input type="hidden" class="form-control" id="validationDefault01" name = "ticket_id" value = "<?= $data ? $data->ticket_id : '' ?>">
    <?php
}else{
?>
<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "ticket_id" value = "<?= $data ? $data->ticket_id : '' ?>">
<?php
}
?>


<?php 
   
?>

<div class="grid-container scrollable-div">



    <div class="col-12 grid-item">
        <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Full Name</span>
        <input
            type="text"
            name="full_name"
            value="<?= $data ? $data->full_name : '' ?>"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            required
        />
        </label>
    </div>
    <div class="col-12 grid-item">
        <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Plate No.</span>
        <input
            type="text"
            name="plate_no"
            value="<?= $data ? $data->plate_no : '' ?>"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            required
        />
        </label>
    </div>

    <div class="col-12 grid-item">
        <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Address</span>
        <input
            name="address"
            value="<?= $data ? $data->address : '' ?>"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            required
        />
        </label>
    </div>
    <div class="col-12 grid-item">
        <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Vehicle Types</span><br>
        <select id="mySelectVehicleType1" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" name="vehicle_type" required>
            <option value="" selected disabled>- Select -</option>
            <?php
            // Define an associative array with vehicle types categorized by groups
            $vehicleTypes = [
                "Private Vehicles" => [
                    "Sedans",
                    "SUVs",
                    "MPVs",
                    "Pickup Trucks",
                    "Vans",
                    "Motorcycles",
                    "Scooters"
                ],
                "Public Utility Vehicles (PUVs)" => [
                    "Jeepneys",
                    "UV Express",
                    "Buses",
                    "Tricycles",
                    "Pedicabs"
                ],
                "Commercial Vehicles" => [
                    "Delivery Trucks",
                    "Cargo Vans",
                    "Passenger Vans",
                    "Mini Trucks",
                    "Taxi Cabs",
                    "App-Based Transport Services"
                ],
                "Special Purpose Vehicles" => [
                    "Ambulances",
                    "Fire Trucks",
                    "Police and Patrol Cars",
                    "Garbage Trucks",
                    "Armored Trucks"
                ],
                "Agricultural Vehicles" => [
                    "Tractors"
                ]
            ];
            ?>
            <?php foreach ($vehicleTypes as $category => $types): ?>
                <optgroup label="<?php echo $category; ?>">
                    <?php foreach ($types as $type): 
                    $selected = $data && $data->vehicle_type == $type ? 'selected' : ''; 
                    ?>
                        <option value="<?php echo $type; ?>" <?= $selected ?>><?php echo $type; ?></option>
                    <?php endforeach; ?>
                </optgroup>
            <?php endforeach; ?>
        </select>
        </label>
    </div>
    <div class="col-12 grid-item">
        <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Valid IDs</span><br>
        <select id="mySelectVehicleType2" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" name="valid_id" required>
            <option value="" selected disabled>- Select -</option>
            <?php
            // Define an associative array with vehicle types categorized by groups
            $validIDs = [
                "Philippine Passport",
                "PhilID (Philippine Identification System)",
                "Driver's License",
                "Social Security System (SSS) ID",
                "Unified Multi-Purpose ID (UMID)",
                "Government Service Insurance System (GSIS) eCard",
                "Professional Regulation Commission (PRC) ID",
                "Voter’s ID",
                "Postal ID",
                "Senior Citizen ID",
                "Person with Disabilities (PWD) ID",
                "PhilHealth ID",
                "Barangay Clearance or Barangay ID",
                "School ID",
                "Taxpayer Identification Number (TIN) ID",
                "Alien Certificate of Registration (ACR) I-Card",
                "Others"
            ];
            ?>
            <?php foreach ($validIDs as $validIDstype): 
            $selected2 = $data && $data->valid_id == $validIDstype ? 'selected' : ''; 
            ?>
                <option value="<?php echo $validIDstype; ?>" <?= $selected2 ?>><?php echo $validIDstype; ?></option>
            <?php endforeach; ?>
        </select>
        </label>
    </div>
    <div class="col-12 grid-item">
        <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Valid ID Number</span>
        <input
            type="text"
            name="valid_id_no"
            value="<?= $data ? $data->valid_id_no : '' ?>"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            
        />
        </label>
    </div>
    <div class="col-12 grid-item">
        <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Upload ID</span>


        <div class="relative">
            <input class="block w-full pl-20 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" 
            type="file"
            name="upload_file"
            id="upload_file"
            <?= $data ? '' : 'required' ?>
            accept="image/*"
            capture="camera"
            >
            <button id = "viewAccountUploadID" type="button" class="absolute inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-l-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              View
            </button>
          </div>

        </label>
    </div>

    <div class="col-12 grid-item">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Violations</span>
            <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name = "violations[]" multiple="" required>
                <?php if ($res) { 
                    $json_decode_data = $data ? json_decode($data->violation_desc) : false;
              
                    $v_id = [];
                    if ($json_decode_data) {
                        foreach ($json_decode_data as $key => $S) {
                            $v_id[] = $S->id;
                        }
                    }
                   
                    ?>
                    <?php foreach ($res as $key => $R) { 
                            $is_selected = in_array($R->violation_id, $v_id) ? 'selected' : '';
                            ?>
                            <option value="<?= $R->violation_id ?>" <?= $is_selected ?>>
                                <?= $R->violation_desc ?> - ₱ <?= $R->violation_price ?>
                            </option>

                    <?php } ?>
                <?php } ?>

            </select>
        </label>
    </div>
</div>
