<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="page-title">
                {{ __('Application Forms') }}
            </div>
        </div>
    </x-slot>
    <x-slot name="breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                        </path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Application
                        Forms</span>
                </div>
            </li>
        </ol>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="pagination mb-4">
                        {{ $rows->links() }}
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden ">
                                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                        <thead class="bg-gray-100 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Application ID
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Type
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Status
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-medium tracking-wider text-right text-gray-700 uppercase dark:text-gray-400">
                                                    Created At
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                            @if ($rows->count() == 0)
                                                <tr>
                                                    <td colspan="4"
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        No Data Available</td>
                                                </tr>
                                            @else
                                                @foreach ($rows as $row)
                                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                        <td
                                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <a class="text-blue-800"
                                                                href="{{ route('admin.view-application', $row->id) }}">{{ $row->application_id }}</a>
                                                        </td>
                                                        <td
                                                            class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                                            {{ $row->typable_type == 'App\Models\SkilledWorker' ? 'Skilled Worker' : 'Business Immigration' }}
                                                        </td>
                                                        <td
                                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ ucfirst($row->status) }}</td>
                                                        <td
                                                            class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                            {{ \Carbon\Carbon::parse($row->created_at)->toDateString() }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
