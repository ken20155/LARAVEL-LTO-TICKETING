<style>
    .table-container {
        max-height: 500px; /* Set a height for the scrollable area */
        overflow-y: auto;  /* Enable vertical scrolling */
        border: 1px solid #ddd; /* Optional: Add a border */
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
    .scrollable-table {
        overflow-x: auto; /* Enable horizontal scrolling */
    }
    th {
        background-color: #f2f2f2;
        position: sticky;
        top: 0; /* Position the header at the top */
        z-index: 10; /* Ensure the header is above the content */
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd; /* Optional: Add a bottom border to rows */
    }

    tbody tr:hover {
        color: #f2f2f2; /* Optional: Highlight on hover */
        background-color: #2daf3e; /* Optional: Highlight on hover */
    }
    .text-white{
      color:#ddd !important
    }
</style>


<div class="w-full overflow-x-auto table-containers" style = "margin-bottom:30px">
    
    <div class="grid-container" style = "margin-bottom:15px; margin-right:50px">
        <div class="col-2 grid-item">
            <label class="block mt-2 text-sm">
                <span class="text-gray-700 dark:text-gray-400 text-white">FROM</span>
                <!-- focus-within sets the color for the icon when input is focused -->
                <div
                class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"
                >
                <input
                    class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input dateFilter"
                    value=""
                    id="start"
                    type="date"
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
        <div class="col-2 grid-item">
            <label class="block mt-2 text-sm">
                <span class="text-gray-700 dark:text-gray-400 text-white">TO</span>
                <!-- focus-within sets the color for the icon when input is focused -->
                <div
                class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400"
                >
                <input
                    class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input dateFilter"
                    value=""
                    id="end"
                    type="date"
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
        <div class="col-12 grid-item">
            <button id="addNewAccount" type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" style="height:70px;width:220px;font-size:23px;">Add New Ticket</button>
        </div>

    </div>

    <div style="margin-bottom:10px; width:310px;">

{{-- 
      <button id="allTickets" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        All
      </button>
      <button id="pendingTickets" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Pending
      </button>
      <button id="paidallTickets" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Paid
      </button> --}}
                       <label class="block mt-2 text-sm">
                          <span class="text-gray-700 dark:text-gray-400 text-white">
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

    </div>
    <div style="margin-bottom:10px;width:310px; ">
      {{-- <div class="grid-container" style = "margin-bottom:15px; margin-right:50px">
        <div class="col-4 grid-item">
          <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
            <input class="block pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" id="search_name" placeholder="Search name...." style="width:80%">
            <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
            </div>
          </div>
        </div> --}}
        <label class="block mt-2 text-sm">
          <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
            <input class="block pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" id="search_name" placeholder="Search name...." style="width:100%">
            <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
            </div>
        </label>
      </div>

    </div>
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr
          class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
        >
          <th class="px-4 py-3">#</th>
          <th class="px-4 py-3">Action</th>
          <th class="px-4 py-3">Ticket No.</th>
          <th class="px-4 py-3">Full name</th>
          <th class="px-4 py-3">Violations</th>
          <th class="px-4 py-3">Total Amount</th>
          <th class="px-4 py-3">Added Date</th>
          <th class="px-4 py-3">Status</th>
        </tr>
      </thead>
      <tbody
        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 table-container"
      id = "ticketList">
        {{-- <tr class="text-gray-700 dark:text-gray-400">
          <td class="px-4 py-3">
            <div class="flex items-center text-sm">
              <!-- Avatar with inset shadow -->
              <div
                class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
              >
                <img
                  class="object-cover w-full h-full rounded-full"
                  src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                  alt=""
                  loading="lazy"
                />
                <div
                  class="absolute inset-0 rounded-full shadow-inner"
                  aria-hidden="true"
                ></div>
              </div>
              <div>
                <p class="font-semibold">Hans Burger</p>
                <p class="text-xs text-gray-600 dark:text-gray-400">
                  10x Developer
                </p>
              </div>
            </div>
          </td>
          <td class="px-4 py-3 text-sm">
            $ 863.45
          </td>
          <td class="px-4 py-3 text-xs">
            <span
              class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
            >
              Approved
            </span>
          </td>
          <td class="px-4 py-3 text-sm">
            6/10/2020
          </td>
        </tr> --}}
   


      </tbody>
    </table>
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