
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
                          <button id="addNewAccount" type="button"
                          class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                        >
                        Add New
                        </button>
                        <button id="refrest-datatable" type="button"
                          class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                        >
                        Refresh
                        </button>
                      </h4>
                        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
          
  
  
                        </div>
                  </div>
                  <div class="card-body px-2 py-2">
                      <div class="table-responsive">
                          <div >
                              <table class="table table-bordered w-full whitespace-no-wrap" id="laravel_datatable">
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>


<!-- Modal -->
<form action="" method="post" id="submit-form">
  <div id="modal-view" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
      <div class="bg-white w-96 p-6 rounded-lg shadow-lg relative" style="

          ">
          <header class="flex justify-end">
              <button
                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
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
            <div class="mt-4 mb-6">
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
