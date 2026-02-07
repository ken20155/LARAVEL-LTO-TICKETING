<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "violation_id" value = "<?= $data ? $data->violation_id : '' ?>">



<div class="grid-container">
  <div class="col-6 grid-item">
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Description</span>
      <input
        name="description"
        value="<?= $data ? $data->violation_desc : '' ?>"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        required
      />
    </label>
  </div>
  <div class="col-6 grid-item">
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Code</span>
      <input
        name="code"
        value="<?= $data ? $data->violation_code : '' ?>"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        required
      />
    </label>
  </div>
  <div class="col-6 grid-item">
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Price</span>
      <input
        type="number"
        name="price"
        value="<?= $data ? $data->violation_price : '' ?>"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        required
      />
    </label>
  </div>
  <div class="col-6 grid-item">
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Type</span>
      <input
        name="type"
        value="<?= $data ? $data->violation_type : '' ?>"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        required
      />
    </label>
  </div>
</div>
