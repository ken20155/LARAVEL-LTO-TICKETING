<div id="printContent" class="scrollable-div"> 
    <div class="printContentData" style="min-width: 370px !imporant;"> 

        <p class="text-center" style="text-align:center;">
            <span style="text-align:center;font-weight:bold">Republic of the Philippines</span><br>
            <span style="text-align:center;font-weight:bold">Municipality of Tagoloan</span><br>
            <span style="text-align:center;font-size:20px;font-weight:bold">Office of the Municipal Mayor </span><br>
            <span style="text-align:center;font-size:20px;font-weight:bold">Traffic Violation Citation Ticket</span>
        </p>
        
        

        <div class="grid-container">

            <div class="col-6 grid-item">TICKET NO:</div>
            <div class="col-6 grid-item" style="font-weight:bold"><?= $data->ticket_no ?></div>
            <div class="col-6 grid-item">DATE:</div>
            <div class="col-6 grid-item"><?= date(LONGDATETIME,strtotime($data->added_date)) ?></div>
            <div class="col-6 grid-item">FULL NAME:</div>
            <div class="col-6 grid-item"><?= $data->full_name ?></div>
            <div class="col-6 grid-item">ADDRESS:</div>
            <div class="col-6 grid-item"><?= $data->address ?></div>
            <div class="col-6 grid-item">PLATE NO:</div>
            <div class="col-6 grid-item" style="font-weight:bold"><?= $data->plate_no ?></div>
            <div class="col-6 grid-item">VEHICLE TYPE:</div>
            <div class="col-6 grid-item" style="font-weight:bold"><?= $data->vehicle_type ?></div>
            <div class="col-12 grid-item">VIOLATIONS:</div>


        
        </div>
        <div class="grid-container">
            <?php 
                $json_decode_data = $data ? json_decode($data->violation_desc) : false;
                
                $v_id = [];
                 $price = [];
                if ($json_decode_data) {
                    foreach ($json_decode_data as $key => $S) {
                        echo '
                            <div class="col-8 grid-item" style="text-align:left">-'.$S->desc.' </div>
                            <div class="col-4 grid-item" style="text-align:right">₱'.number_format($S->price,2).'</div>
                         
                        ';
                         $price[] = $S->price;
                    }
                }
            ?>
        </div>
        <div class="grid-container"  >
            <div class="col-6 grid-item" style="text-align:left;font-weight:bold">TOTAL AMOUNT</div>
            <div class="col-6 grid-item" style="text-align:right;font-weight:bold">₱ <?= number_format(array_sum($price),2);?></div>
        </div>

        <div style="font-size: 1.5em; font-weight: bold; text-align: center; ">
            CONTRARY TO LAW
        </div>
    
        <div >
            <p style="text-align: center;">
                You are hereby directed to appear before the Municipal Treasurer of Tagoloan,<br> 
                Misamis Oriental, within three (3) days from the date of this notice for appropriate<br>
                disposition of this CITATION. Failure to appear within the prescribed three <br>
                (3) days will result in the Municipal Treasurer forwarding the case to the <br>
                 Municipal Circuit Trial Court within twenty-four (24) hours for the filing of appropriate charges.
            </p>
        </div>
    
        <div style=" text-align: center; font-weight: bold;">
            <p style="text-decoration: underline;"><?= $data->first_name.' '.$data->middle_name.' '.$data->last_name ?></p>
            <p>Signed by apprehending Officer</p>
        </div>


    </div>
</div>
