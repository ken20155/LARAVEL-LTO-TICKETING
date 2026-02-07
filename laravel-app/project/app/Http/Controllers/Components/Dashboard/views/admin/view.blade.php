<style>
.scrollable {
    height: 500px;
    overflow: auto; /* Enables scroll in both directions when content overflows */
    border: 1px solid #ccc; /* Optional: just for visual reference */
    padding: 10px; /* Optional: for spacing inside the div */
}
</style>
<!-- CTA -->

<!-- Cards -->
<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
    <!-- Card -->
    <div
      class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
    >
      <div
        class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
      >
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path
            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
          ></path>
        </svg>
      </div>
      <div>
        <p
          class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
        >
          Total Users
        </p>
        <p
          class="text-lg font-semibold text-gray-700 dark:text-gray-200"
        >
          <?= number_format($total_violators->total_violators) ?>
        </p>
      </div>
    </div>
    <!-- Card -->
    <div
      class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
    >
      <div
        class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
      >
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path
            fill-rule="evenodd"
            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </div>
      <div>
        <p
          class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
        >
          Total Issued Tickets
        </p>
        <p
          class="text-lg font-semibold text-gray-700 dark:text-gray-200"
        >
        <?= number_format($total_vio->total_vio) ?>
        </p>
      </div>
    </div>
  
    <div
      class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
    >
      <div
        class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
      >
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path
            fill-rule="evenodd"
            d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </div>
      <div>
        <p
          class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
        >
          Total Pending Tickets
        </p>
        <p
          class="text-lg font-semibold text-gray-700 dark:text-gray-200"
        >
          <?= $pending_total->total ?>
        </p>
      </div>
    </div>
      <!-- Card -->
      <div
      class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
    >
      <div
        class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
      >
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path
          fill-rule="evenodd"
          d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
          clip-rule="evenodd"
        ></path>
      </svg>
      </div>
      <div>
        <p
          class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
        >
          Total Collections
        </p>
        <p
          class="text-lg font-semibold text-gray-700 dark:text-gray-200"
        >
        <?php
        $total = 0;
        if ($res) {
        foreach ($res as $key => $R) { 
          $vi = json_decode($R->violation_desc);
          foreach ($vi as $key => $V) {
              $total += $V->price;
          }   
        ?>
      <?php } 
        }
      ?>

      ₱<?= number_format($total,2);?>
        </p>
      </div>
    </div>
    <!-- Card -->
    </div>
    
    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto scrollable">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr
          class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
        >
          <th class="px-4 py-3 text-center" colspan="5" style="background-color:grey;color:rgb(255, 255, 255)">All Tickets</th>
        </tr>
          <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
          >
            <th class="px-4 py-3">Violators</th>
            <th class="px-4 py-3">Amount</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Date</th>
            <th class="px-4 py-3">Action</th>
          </tr>
        </thead>
        <tbody
          class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 "
        >

        <?php 
        if ($res) {
        foreach ($res as $key => $R) { 
            $price = [];
            $vi = json_decode($R->violation_desc);
            foreach ($vi as $key => $V) {
                $price[] = $V->price;
            }   
          ?>
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
                <div>
                  <p class="font-semibold"> <?= $R->full_name ?></p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 text-sm">
              ₱<?= number_format(array_sum($price),2);?>
            </td>
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
            <td class="px-4 py-3 text-sm">
              <?= date(LONGDATETIME,strtotime($R->added_date)) ?> 
            </td>
            <td>
              <div class="flex items-center space-x-4 text-sm">
                <div class="flex items-center space-x-4 text-sm">
                   
                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-teal-600 border border-transparent rounded-full active:bg-teal-600 hover:bg-teal-700 focus:outline-none focus:shadow-outline-teal" aria-label="Edit"  data-id = "<?= $R->ticket_id ?>" id="printTicket">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                      </svg>
                                    

                                    </button>
                                                                
                                    
                                </div>
                    </div>

            </td>
          </tr>
        <?php } 
        
        }?>
        </tbody>
      </table>
    </div>

    </div>
    
    <!-- Charts -->
    <h2
    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200" style="color:#fff !important"
    >
    Charts
    </h2>
    <div class="grid gap-6 mb-8 md:grid-cols-2">
    <div
      class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
    >
      <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
        Tickets
      </h4>
      <canvas id="pie2"></canvas>
      <div
        class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
      >
        <!-- Chart legend -->
        <div class="flex items-center">
          <span
            class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"
          ></span>
          <span>Unpaid</span>
        </div>
        <div class="flex items-center">
          <span
            class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
          ></span>
          <span>Paid</span>
        </div>
      </div>
    </div>
    <div
      class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
    >
      <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
        Monthly Collection
      </h4>
      <canvas id="line2"></canvas>
      <div
        class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
      >
        <!-- Chart legend -->
        <div class="flex items-center">
          <span
            class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
          ></span>
          <span>Unpaid</span>
        </div>
        <div class="flex items-center">
          <span
            class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
          ></span>
          <span>Paid</span>
        </div>
      </div>
    </div>
    </div>

    <div id="modal-view" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center" style="z-index: 50; ">
      <div class="bg-white w-96 p-6 rounded-lg shadow-lg relative" style="
                    min-width: 370px;
          ">
          <header class="flex justify-end">
              <button
              type="button"
                class="inline-flex items-center justify-center w-2 h-2 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                aria-label="close"
                id="closeModal"
              >
                <svg
                  class="w-4 h-4"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  role="img"
                  aria-hidden="true"
                >
                  <path
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                  ></path>
                </svg>
              </button>
            </header>
            <!-- Modal body -->
            <div class="mb-6">
              <!-- Modal title -->
              <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300" id="action-text"></p>
              <!-- Modal description -->
              <p class="text-sm text-gray-700 dark:text-gray-400 modal-body" >
              
              </p>
            </div>
            <footer
              class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
              id="footer-custom"
            >
              
            </footer>
      </div>
  </div>