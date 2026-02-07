<?php if ($res) { 
    $x = 1;
    $price = [];
    ?>
    <?php foreach ($res as $key => $R) { ?>
        <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm"><?= $x++ ?></td>
            <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                    <div class="flex items-center space-x-4 text-sm">
                       
                        <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-full active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-teal"
                            aria-label="Edit"
                            data-id = "<?= $R->ticket_id ?>"
                            id = "printTicket"
                            >
                            <svg  class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                            </svg>
                            

                            </button>
                            <?php 
                            if ($R->status == 'Pending') {
                                echo '
                               <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            aria-label="Edit"
                            data-id = "'.$R->ticket_id.'"
                            id = "viewAccount"
                            >
                            <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                ></path>
                            </svg>
                            </button>
                                ';
                            }
                            echo '


                            <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-full active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                            aria-label="Edit"
                            data-id = "'.$R->ticket_id.'"
                            id = "ticketAgain"
                            >
                                <svg  class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                                </svg>
                                
                            </button>

                                ';
                            ?>
                            
                            
                        </div>
            </td>
            <td class="px-4 py-3 text-sm">
              <?= $R->ticket_no ?>
            </td>
           
            <td class="px-4 py-3 text-sm">
                <?= $R->full_name ?> 
            </td>
            <td class="px-4 py-3 text-sm">
                <div class="px-6 py-4">
                    <ul>
                    <?php 
                    $price = [];
                    $vi = json_decode($R->violation_desc);
                    foreach ($vi as $key => $V) {
                        echo '<li>-'.$V->desc.'</li>';
                        $price[] = $V->price;
                    }    
                    ?>
                    </ul>
                  </div>
            </td>
            <td class="px-4 py-3 text-sm">₱<?= number_format(array_sum($price),2);?></td>
            <td class="px-4 py-3 text-sm"><?= date(LONGDATETIME,strtotime($R->added_date)) ?> </td>
            <td class="px-4 py-3 text-xs">
                <?php 
                if ($R->status == 'Pending') {
                   echo '
                   <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                    Pending
                  </span>
                   ';
                }else{
                    echo '<span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                    >
                    Paid
                    </span>';
                }   
                ?>
                
                
            </td>
        </tr>
    <?php } ?>
<?php }else{ ?>
    <tr class="text-gray-700 dark:text-gray-400">
        <td colspan="8" style="text-align:center">NO DATA FOUND</td>
    </tr>
<?php } ?>