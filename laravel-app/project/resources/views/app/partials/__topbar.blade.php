<header class="z-10 py-4 shadow-md dark:bg-gray-800" style="background-color: #7e3af254 !important">
  <div
    class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
  >
    <!-- Mobile hamburger -->
    <?php 
    if ($session['session']['user_role'] == 1) {
    ?>
    <button
      class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
      @click="toggleSideMenu"
      aria-label="Menu"
    >
      <svg
        class="w-6 h-6"
        aria-hidden="true"
        fill="currentColor"
        viewBox="0 0 20 20"
      >
        <path
          fill-rule="evenodd"
          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
          clip-rule="evenodd"
        ></path>
      </svg>
    </button>
    <?php } ?>
    <!-- Search input -->
    <div class="flex justify-center flex-1 lg:mr-32">
     
    </div>
    <ul class="flex items-center flex-shrink-0 space-x-6">
      <!-- Theme toggler -->
{{--       
      <li class="flex">
        <button
          class="rounded-md focus:outline-none focus:shadow-outline-purple"
          @click="toggleTheme"
          aria-label="Toggle color mode"
        >
          <template x-if="!dark">
            <svg
              class="w-5 h-5"
              aria-hidden="true"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
              ></path>
            </svg>
          </template>
          <template x-if="dark">
            <svg
              class="w-5 h-5"
              aria-hidden="true"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                fill-rule="evenodd"
                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </template>
        </button>
      </li> --}}
      <!-- Profile menu -->
      <li class="relative">
        {{-- <button id="terms-contions-btn" type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Terms and Conditions
          </button> --}}
        <button
          class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
          @click="toggleProfileMenu"
          @keydown.escape="closeProfileMenu"
          aria-label="Account"
          aria-haspopup="true"
        >
        <?php 
        $img = "".env('APP_URL')."public/main/image/icon-profile.png";

        ?>
          <img
            class="object-cover w-8 h-8 rounded-full"
            src="<?=$img?>"
            alt=""
            aria-hidden="true"
          />
        </button>
        <template x-if="isProfileMenuOpen">
          <ul
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click.away="closeProfileMenu"
            @keydown.escape="closeProfileMenu"
            class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
            aria-label="submenu"
          >
            <li class="flex">
              <a
                class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                href="#!"
                id="openSettings"
                data-id="<?=$session['session']['user_id']?>"
              >
                <svg
                  class="w-4 h-4 mr-3"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                  ></path>
                </svg>
                <span>Profile</span>
              </a>
            </li>
            {{-- <li class="flex">
              <a
                class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                href="#"
              >
                <svg
                  class="w-4 h-4 mr-3"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                  ></path>
                  <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span>Settings</span>
              </a>
            </li> --}}
            <li class="flex">
              <a
                class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                href="<?= env('APP_URL') ?>auth/run/logout"
              >
                <svg
                  class="w-4 h-4 mr-3"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                  ></path>
                </svg>
                <span>Log out</span>
              </a>
            </li>
          </ul>
        </template>
      </li>
    </ul>
  </div>
</header>
<style>
      .termsConditions {
        max-height: 500px; /* Set a height for the scrollable area */
        overflow-y: auto;  /* Enable vertical scrolling */
         /* Optional: Add a border */
        
    }
</style>
<div id="terms-contions" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center" style="z-index: 50; ">
  <div class="bg-white w-96 p-6 rounded-lg shadow-lg relative" style="
               min-width: 370px;
            
      ">
      <header class="flex justify-end">
          <button
          type="button"
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
        <div class="mt-4 mb-6 ">
          <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300" style="text-align:center"> TERMS AND CONDITIONS</p>

          <div class="termsConditions">
          <!-- Modal title -->
          <!-- Modal description -->
          <p class="text-sm text-gray-700 dark:text-gray-400 " style="padding-bottom:20px">
            The Traffic Violation Citation Ticketing System is intended for issuing, managing, and processing traffic violation citations and related data. It is developed to enhance the enforcement of traffic laws by automating and streamlining the citation process.
          </p>
          <p class="text-sm text-gray-700 dark:text-gray-400 " style="padding-bottom:20px">
            These Terms and Conditions govern your use of the System. By accessing, using, or engaging with the System, you agree to the following terms and conditions:
          </p>
          <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">1.  Responsibilities of Users</p>
          <ul style="padding-left:30px">
            <li>-Users must use the System solely for lawful purposes, specifically in relation to the management of traffic violations and citations.</li>
            <li>-Unauthorized access, distribution, or modification of the System’s software or data is strictly prohibited.</li>
            <li>-Users are responsible for maintaining the confidentiality of their account information, including login credentials.</li>
          </ul>



          <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">2. System Usage and Access</p>
          <ul style="padding-left:30px">
            <li>-Users must use the System solely for lawful purposes, specifically in relation to the management of traffic violations and citations.</li>
            <li>-Unauthorized access, distribution, or modification of the System’s software or data is strictly prohibited.</li>
            <li>-Users are responsible for maintaining the confidentiality of their account information, including login credentials.</li>
          </ul>

          <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">3. Data Privacy and Security</p>
          <ul style="padding-left:30px">
            <li>-The System may collect and store personal data, including but not limited to vehicle registration details, driver information, and violation history.</li>
            <li>-he Developer and the Client are responsible for implementing adequate security measures to protect the personal data processed by the System.</li>
            <li>-The Developer will not disclose personal data to third parties except as required by law or with the Client’s explicit consent.</li>
          </ul>





          <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">4. Intellectual Property</p>
          <ul style="padding-left:30px">
            <li>-The System, including all software, designs, documentation, and related materials, is the intellectual property of the Developer.</li>
            <li>-Users and Clients are granted a limited, non-exclusive, non-transferable license to use the System as per the terms of this Agreement.</li>
            <li>-Unauthorized reproduction, reverse engineering, or distribution of the System is prohibited.</li>
          </ul>

          <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">5. Third-Party Integration</p>
          <ul style="padding-left:30px">
            <li>-The System may integrate with third-party services (such as payment gateways or government databases). The Developer is not responsible for the performance or security of these third-party services.</li>
            <li>-Users may be subject to the terms and conditions of third-party services when using them in connection with the System.</li>
          </ul>




          <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">6. Maintenance and Support</p>
          <ul style="padding-left:30px">
            <li>-The Developer will provide maintenance and support for the System as agreed upon with the Client.</li>
            <li>-Users are encouraged to report any bugs, issues, or malfunctions to the Developer for timely resolution.</li>
          </ul>
          <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">7. Termination</p>
          <ul style="padding-left:30px">
            <li>-The Developer reserves the right to suspend or terminate access to the System for any User or Client who violates these Terms and Conditions.</li>
            <li>-Upon termination, Users must cease all access to and use of the System.</li>
          </ul>

          <p style="padding-left:30px" class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300"><i>
            By using the System, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions. If you do not agree to the terms, you must cease using the System immediately  
          </i></p>

        </div>


        </div>
        <footer
          class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
          id="footer-custom"
        >
          
        </footer>
  </div>
</div>


<form action="" method="post" id="submit-form-profile">
  <div id="modal-view-profile" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center" style="z-index: 50; ">
      <div class="bg-white w-96 p-6 rounded-lg shadow-lg relative" style="
  
          ">
          <header class="flex justify-end">
              <button
              type="button"
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