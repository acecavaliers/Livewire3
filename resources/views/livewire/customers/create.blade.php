<div>
    <h1>New Customer</h1>
    <form method="POST" wire:submit="save">
        <div>
            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
            <input id="name" wire:model="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" />
            @error('name')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="credit_limit" class="block font-medium text-sm text-gray-700">Credit Limit</label>
            <input id="credit_limit" wire:model="credit_limit" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" />
            @error('credit_limit')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="slug" class="block font-medium text-sm text-gray-700">Slug</label>
            <textarea id="slug" wire:model="slug" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"></textarea>
            @error('slug')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="address" class="block font-medium text-sm text-gray-700">Address</label>
            <textarea id="address" wire:model="address" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"></textarea>
            @error('address')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <button class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
            Save
        </button>
    </form>
</div>
