
<div class="w-full overflow-hidden rounded-lg shadow-xs bg-white">
  <div class="w-full overflow-x-auto">
    <div class="row" id="div_laravel_datatable">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header px-4 py-4">
                    <h4 class="card-title">
                        {{-- <button type="button" class="btn btn-sm btn-primary" id="addNewAccount">Add New</button> 
                          <button type="button" class="btn btn-sm btn-info" id="refrest-datatable">Refresh</button>
                        --}}
                        {{-- <button id="addNewAccount" type="button"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                      >
                      Add New
                      </button> --}}
                      <button id="refrest-datatable" type="button"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                      >
                      Refresh
                      </button>
                    </h4>
                      <div class="grid gap-6 mb-4 md:grid-cols-2 xl:grid-cols-4">
                        <label class="block mt-2 text-sm">
                          <span class="text-gray-700 dark:text-gray-400">
                            Status
                          </span>
                          <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            id="selectStatus"
                          >
                            <option selected value='All'>All</option>
                            <option value='Pending'>Pending</option>
                            <option value='Paid'>Paid</option>
                          </select>
                        </label>
                        <label class="block mt-2 text-sm">
                          <span class="text-gray-700 dark:text-gray-400">
                            LTO's
                          </span>
                          <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            id="selectLto"
                          >
                            <option selected value='' disabled>-Select-</option>
                            <?php 
                            foreach ($data['res'] as $key => $R) {
                              echo '<option value="'.$R->user_id.'">'.$R->first_name.' '.$R->middle_name.' '.$R->last_name.'</option>';
                            }
                            ?>
                          </select>
                        </label>



                      </div>
                      <div class="grid gap-6 mb-4 md:grid-cols-2 xl:grid-cols-4">
                        <label class="block mt-2 text-sm">
                          <span class="text-gray-700 dark:text-gray-400">FROM</span>
                          <!-- focus-within sets the color for the icon when input is focused -->
                          <div
                            class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"
                          >
                            <input
                              class="filterDate block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                              placeholder="Jane Doe"
                              type="date"
                              id="start"
                            />
                            <div
                              class="absolute inset-y-0 flex items-center ml-3 pointer-events-none"
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                            </svg>
                            </div>
                          </div>
                        </label>
                        <label class="block mt-2 text-sm">
                          <span class="text-gray-700 dark:text-gray-400">TO</span>
                          <!-- focus-within sets the color for the icon when input is focused -->
                          <div
                            class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"
                          >
                            <input
                              class="filterDate block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                              placeholder="Jane Doe"
                              type="date"
                              id="end"
                            />
                            <div
                              class="absolute inset-y-0 flex items-center ml-3 pointer-events-none"
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                            </svg>
                            </div>
                          </div>
                        </label>

                      </div>
                </div>
                <div class="card-body px-2 py-2">
                    <div class="table-responsive" style="margin-right:30px">
                        <div >
                            <table class="table table-bordered w-full whitespace-no-wrap"  id="laravel_datatable">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>



<form action="" method="post" id="submit-form">
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
</form>
<div id="modal-view2" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center" style="z-index: 50; ">
  <div class="bg-white w-96 p-6 rounded-lg shadow-lg relative" style="
                min-width: 370px;
      ">
      <header class="flex justify-end">
        <button
              type="button"
                class="inline-flex items-center justify-center w-2 h-2 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                aria-label="close"
                id="closeModal2"
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
          <div id="image-preview-containervalidIDs"></div>
        </div>
        <footer
          class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
          id="footer-custom"
        >
          
        </footer>
  </div>
</div>

<!-- Modal -->
{{-- <form action="" method="post" id="submit-form">
  <div class="modal fade" id="modal-view" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"><?= $title ?> - <span id="action-text"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body">

        </div>
        <div class="modal-footer">
          <div id="footer-custom"></div>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</form>
 --}}

