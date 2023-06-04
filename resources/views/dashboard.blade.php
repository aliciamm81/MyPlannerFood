<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mr-4 ml-3">
                {{ __('Home') }}
            </h2>
            <ul style="margin-right:15px;margin-left: 60px;" class="flex space-x-6">
                <li style="margin-left:15px"><a href="/recipes">Recipes</a></li>
                <li style="margin-left:15px"><a href="/food">Food</a></li>
                <li style="margin-left:15px"><a href="/menu">Menu</a></li>
            </ul>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>