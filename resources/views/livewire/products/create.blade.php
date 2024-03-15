
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

        <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <h1>Add New Product</h1>
        <hr>
          <div class="mt-3">
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Product Name:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" wire:model="name" placeholder="Enter Customer Name">
                    @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" wire:model="price" placeholder="Enter pricet">
                    @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  id="description" wire:model="description" placeholder="Enter products description">
                    @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Vendor ID:</label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="vendor_id" wire:model="vendor_id" placeholder="Enter vendor id"></textarea>
                    @error('vendor_id') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
          </div>
        </div>

        <div class="bg-gray-50 px-4 py-2 space-x-2 sm:px-6 sm:flex sm:flex-row-reverse">

          <button wire:click.prevent="save()" type="button" class="w-24 ml-2 mt-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600">
            Save
          </button>
          <button  wire:click="closeModal()" type="button" class="w-24 mr-2 mt-4 py-2 bg-gray-300 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-500">
            Cancel
          </button>
          </form>
        </div>

      </div>
    </div>
  </div>
