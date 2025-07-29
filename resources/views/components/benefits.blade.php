<section id="benefits" class="py-20">
    <h2 class="text-4xl font-bold text-white mb-12 text-center">Benefits of Synerque</h2>
    <div x-data="{ active: 'dashboard' }" class="flex flex-col lg:flex-row gap-10">
        <div class="lg:w-1/3">
            <ul class="space-y-4 text-xl text-brand-secondary-text">
                <li><a href="#" @click.prevent="active = 'dashboard'" :class="{ 'bg-brand-card text-white border border-gray-700': active === 'dashboard' }" class="block p-4 rounded-lg font-semibold hover:bg-brand-card hover:text-white transition-colors">Dashboard for the project</a></li>
                <li><a href="#" @click.prevent="active = 'tasks'" :class="{ 'bg-brand-card text-white border border-gray-700': active === 'tasks' }" class="block p-4 rounded-lg font-semibold hover:bg-brand-card hover:text-white transition-colors">Tasks</a></li>
                <li><a href="#" @click.prevent="active = 'resources'" :class="{ 'bg-brand-card text-white border border-gray-700': active === 'resources' }" class="block p-4 rounded-lg font-semibold hover:bg-brand-card hover:text-white transition-colors">Resource accounting</a></li>
                <li><a href="#" @click.prevent="active = 'communication'" :class="{ 'bg-brand-card text-white border border-gray-700': active === 'communication' }" class="block p-4 rounded-lg font-semibold hover:bg-brand-card hover:text-white transition-colors">Communication</a></li>
                <li><a href="#" @click.prevent="active = 'reports'" :class="{ 'bg-brand-card text-white border border-gray-700': active === 'reports' }" class="block p-4 rounded-lg font-semibold hover:bg-brand-card hover:text-white transition-colors">Reports</a></li>
            </ul>
        </div>
        <div class="lg:w-2/3">
            <div x-show="active === 'dashboard'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100">
                <p class="text-brand-secondary-text mb-6 text-lg">
                    All basic information about tasks on one screen. Manage your tasks, create tasks, communicate with colleagues, add people to a task at any time.
                </p>
                <div class="w-full bg-brand-card rounded-lg p-6 border border-gray-700">
                     <div class="aspect-video bg-black rounded-md flex items-center justify-center"><p class="text-brand-secondary-text">Active Tasks UI</p></div>
                </div>
            </div>
            <div x-show="active === 'tasks'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" style="display: none;">
                <p class="text-brand-secondary-text mb-6 text-lg">
                    Create, assign, and track tasks with ease. Set deadlines, priorities, and dependencies to keep your projects on schedule.
                </p>
                <div class="w-full bg-brand-card rounded-lg p-6 border border-gray-700">
                     <div class="aspect-video bg-black rounded-md flex items-center justify-center"><p class="text-brand-secondary-text">Tasks Management UI</p></div>
                </div>
            </div>
            <div x-show="active === 'resources'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" style="display: none;">
                <p class="text-brand-secondary-text mb-6 text-lg">
                    Manage your team's workload and allocate resources effectively. Get a clear overview of who is working on what and when.
                </p>
                <div class="w-full bg-brand-card rounded-lg p-6 border border-gray-700">
                     <div class="aspect-video bg-black rounded-md flex items-center justify-center"><p class="text-brand-secondary-text">Resource Accounting UI</p></div>
                </div>
            </div>
            <div x-show="active === 'communication'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" style="display: none;">
                <p class="text-brand-secondary-text mb-6 text-lg">
                    Communicate with your team directly within tasks. Share files, leave comments, and keep everyone in the loop.
                </p>
                <div class="w-full bg-brand-card rounded-lg p-6 border border-gray-700">
                     <div class="aspect-video bg-black rounded-md flex items-center justify-center"><p class="text-brand-secondary-text">Communication UI</p></div>
                </div>
            </div>
            <div x-show="active === 'reports'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" style="display: none;">
                <p class="text-brand-secondary-text mb-6 text-lg">
                    Generate detailed reports to track project progress and team performance. Get insights to make data-driven decisions.
                </p>
                <div class="w-full bg-brand-card rounded-lg p-6 border border-gray-700">
                     <div class="aspect-video bg-black rounded-md flex items-center justify-center"><p class="text-brand-secondary-text">Reports UI</p></div>
                </div>
            </div>
        </div>
    </div>
</section>