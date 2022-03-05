<button
    x-data="{
        dropFiles: false,

        droppingFile(e) {
            e.preventDefault();

            this.dropFiles = false;

            let dataTransfer = new DataTransfer();
            dataTransfer.items.add(e.dataTransfer.files[0]);

            this.$refs.image.files = dataTransfer.files;
            this.$refs.image.dispatchEvent(new Event('change'));
        },
    }"
    x-on:dragenter="$event.preventDefault(); dropFiles=true"
    x-on:dragleave="$event.preventDefault(); dropFiles=false"
    x-on:dragover="$event.preventDefault();"
    x-on:drop="$event.preventDefault(); droppingFile($event)"
    x-on:click="$refs.image.click()"
    x-bind:class="{'bg-blue-50 border-gray-800': dropFiles, 'border-gray-300': !dropFiles}"
    class="relative block w-full border-2 border-dashed rounded-lg p-24 text-center hover:border-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
    id="file-drop"
    type="button"
>
    <x-coolicon-image-alt x-bind:class="{'text-gray-900': dropFiles, 'text-gray-600': !dropFiles}" class="mx-auto h-12 w-12"/>
    <p x-bind:class="{'text-gray-900': dropFiles, 'text-gray-600': !dropFiles}" class="mt-2 block text-sm font-medium">
        Drop your file here, or <span class="text-gray-900 font-semibold">Browse</span>.
    </p>
</button>

<x-library::input.error for="file" class="mt-2 font-medium text-center"/>

<input type="file" wire:model="file" x-ref="image" class="hidden">
