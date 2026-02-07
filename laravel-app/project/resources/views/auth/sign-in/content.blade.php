{{-- <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900" style="background-color: #5a2e7a8c !important"> --}}

<?php
  $img = "'".env('APP_URL')."public/main/image/bg-new.jpg'";

  ?>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900" style="background-color: #5a2e7a8c; background-image: url(<?=$img?>); background-size: cover;">
  <div
    class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
  >
    <div class="flex flex-col overflow-y-auto md:flex-row">
      <div class="h-32 md:h-auto md:w-1/2 flex justify-center items-center">
        <img
          style="width:35%"
          aria-hidden="true"
          class="object-cover dark:hidden"
          src="<?= env('APP_URL') ?>public/main/image/logo.jpg"
          alt="Office"
        />
        <img
          style="width:35%"
          aria-hidden="true"
          class="hidden object-cover dark:block"
          src="<?= env('APP_URL') ?>public/main/image/logo.jpg"
          alt="Office"
        />
      </div>
      
      <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
          <form method="POST" id="login-form">

          <h1
            class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
          >
            Signin
          </h1>
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Username</span>
            <input
              class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
              placeholder="Username"
              type="text"
              name="username"
            />
          </label>
          <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Password</span>
            <input
              class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
              placeholder="Password"
              type="password"
              name="password"
            />
          </label>
          <div class="flex mt-6 text-sm">
            <label class="flex items-center dark:text-gray-400">
              <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" required>
              <span class="ml-2">
                I agree to the
                <span class="underline" id="terms-contions-btn">privacy policy</span>
              </span>
            </label>
          </div>
          <!-- You should use a button here, as the anchor is only used for the example  -->
          <button
            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
           type="submit"
          >
            Log in
          </button>
          </form>
  
        </div>
      </div>
    </div>
  </div>
</div>


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
          max-width: 570px;
        
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