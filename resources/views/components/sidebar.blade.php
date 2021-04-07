<!--Sidebar-->
<div class="flex-none bg-jasper-gray space-y-10 top-0 left-0 w-64 h-full min-h-screen">

    <!--Logo-->
    <div class="p-4 flex items-center">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="bg-jasper-gray">
            <img class="h-10 w-15" src='../../images/Logo.PNG'>
            <h1 class="text-4xl ml-2">JASPER</h1>
        </x-nav-link>
    </div>

    <nav class="mt-10">
        <div>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>

            <x-nav-link :href="route('requirements')" :active="request()->routeIs('requirements')">
                {{ __('Requirements') }}
            </x-nav-link>

            <x-nav-link :href="route('documents')" :active="request()->routeIs('documents')">
                {{ __('Documents') }}
            </x-nav-link>

            <x-nav-link :href="route('traceability')" :active="request()->routeIs('traceability')">
                {{ __('Traceability') }}
            </x-nav-link>

            <x-nav-link :href="route('import')" :active="request()->routeIs('import')">
                {{ __('Import') }}
            </x-nav-link>
            
            <a class="">
                <div class="p-4 hover:bg-jasper-purple text-center">
                    <h2 class="text-white text-lg font-sans-roboto align-middle">
                        Export
                    </h2>
                </div>
            </a>
            <a class="">
                <div class="p-4 hover:bg-jasper-purple text-center">
                    <h2 class="text-white text-lg font-sans-roboto align-middle">
                        Settings
                    </h2>
                </div>
            </a>
            <a class="">
                <div class="p-4 hover:bg-jasper-purple text-center">
                    <h2 class="text-white text-lg font-sans-roboto align-middle">
                        Help
                    </h2>
                </div>
            </a>
        </div>
    </nav>
    <div class="p-4">
        <h2 class="text-center w-auto border-t border-white content-center pt-6">
            <a class="text-white text-sm font-sans-roboto align-middle">JASPER &copy;</a>
        </h2>
    </div>
</div>