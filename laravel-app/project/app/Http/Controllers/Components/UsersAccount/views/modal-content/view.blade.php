<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "user_id" value = "<?= $data ? $data->user_id : '' ?>">



<div class="grid-container">
  <div class="col-6 grid-item">
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Username</span>
      <input
        name="username"
        value="<?= $data ? $data->username : '' ?>"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        required
      />
    </label>
  </div>
  <div class="col-6 grid-item">
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Password <?= $data ? '(Please blank if you dont change)' : '' ?></span>
      <input
        name="password"
        value=""
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        <?= $data ? '' : 'required' ?>
      />
    </label>
  </div>
  <div class="col-4 grid-item">
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">First Name</span>
      <input
        type="text"
        name="first_name"
        value="<?= $data ? $data->first_name : '' ?>"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        required
      />
    </label>
  </div>
  <div class="col-4 grid-item">
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Middle Name</span>
      <input
        name="middle_name"
        value="<?= $data ? $data->middle_name : '' ?>"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        required
      />
    </label>
  </div>
  <div class="col-4 grid-item">
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Last Name</span>
      <input
        name="last_name"
        value="<?= $data ? $data->last_name : '' ?>"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        required
      />
    </label>
  </div>
  <div class="col-12 grid-item">
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Email</span>
      <input
        type="email"
        name="email"
        value="<?= $data ? $data->email : '' ?>"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        
      />
    </label>
  </div>
</div>
