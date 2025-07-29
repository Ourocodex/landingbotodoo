<header x-data="{ mobileMenuOpen: false }" class="py-6 sticky top-0 bg-brand-dark bg-opacity-80 backdrop-blur-md z-50">
    <div class="container mx-auto flex justify-between items-center px-6">
        <h1 class="text-3xl font-bold text-white">Synerque</h1>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-4">
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center gap-2 text-white font-semibold">
                    <span>{{ trans('messages.Language') }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-brand-card rounded-md shadow-lg z-20">
                    <a href="{{ url('lang/es') }}" class="block px-4 py-2 text-sm text-brand-light-text hover:bg-brand-dark">Español</a>
                    <a href="{{ url('lang/en') }}" class="block px-4 py-2 text-sm text-brand-light-text hover:bg-brand-dark">English</a>
                </div>
            </div>

            <a href="#" class="bg-white text-black font-semibold py-2 px-6 rounded-lg hover:bg-gray-200 transition-colors duration-300">
                {{ trans('messages.Try manager') }}
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path :class="{'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    <path :class="{'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
             <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="w-full text-left flex items-center justify-between gap-2 text-white font-semibold px-3 py-2 rounded-md">
                    <span>{{ trans('messages.Language') }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform" :class="{'rotate-180': open}" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" class="mt-2 w-full bg-brand-card rounded-md shadow-lg z-20">
                    <a href="{{ url('lang/es') }}" class="block px-4 py-2 text-sm text-brand-light-text hover:bg-brand-dark">Español</a>
                    <a href="{{ url('lang/en') }}" class="block px-4 py-2 text-sm text-brand-light-text hover:bg-brand-dark">English</a>
                </div>
            </div>
            <a href="#" class="block bg-white text-black font-semibold py-2 px-6 rounded-lg hover:bg-gray-200 transition-colors duration-300 text-center">
                {{ trans('messages.Try manager') }}
            </a>
        </div>
    </div>
</header>