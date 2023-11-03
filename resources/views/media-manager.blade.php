<div>
    <x-library::modal id="media-manager" maxWidth="4xl" hideCancelButton>
        <x-slot name="title">Media Manager</x-slot>

        <x-slot name="content">
            <div>
                @if($file)
                    <x-media-manager::file-detail :file="$file"/>
                @else
                    <div class="lg:hidden">
                        <label for="tabs" class="sr-only">Select a tab</label>

                        <x-library::input.select wire:model="tab" id="tabs" :options="$this->tabOptions" placeholder="Select a tab"/>
                    </div>

                    <div class="pt-4 flex-1 flex items-stretch overflow-hidden lg:space-x-6">
                        <aside class="hidden w-72 bg-white overflow-y-auto lg:block">
                            <nav class="space-y-1" aria-label="Sidebar">
                                <x-media-manager::sidebar-item key="media-library" icon="coolicon-unsplash" :tab="$tab"/>
                                <x-media-manager::sidebar-item key="upload" icon="heroicon-o-upload" :tab="$tab"/>
                                <x-media-manager::sidebar-item key="unsplash" icon="coolicon-unsplash" :tab="$tab"/>
                                <x-media-manager::sidebar-item key="from-url" name="From URL" icon="coolicon-link-02" :tab="$tab"/>
                            </nav>
                        </aside>

                        <main class="flex-1 overflow-y-auto">
                            <div class="w-full mx-auto">
                                @if ($tab === 'upload')
                                    <x-media-manager::upload/>
                                @elseif ($tab === 'unsplash')
                                    <x-media-manager::unsplash/>
                                @elseif ($tab === 'from-url')
                                    <x-media-manager::from-url/>
                                @endif
                            </div>
                        </main>
                    </div>
                @endif
            </div>
        </x-slot>
    </x-library::modal>
</div>
