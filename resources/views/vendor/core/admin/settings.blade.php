<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="page-title">
                {{ __('Settings') }}
            </div>
            <div class="toolbar-buttons flex justify-end">
                <button type="submit" form="form1" class="primary-btn">Save</a>
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
                    <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Settings</span>
                </div>
            </li>
        </ol>
    </x-slot>
    <div class="py-12">
        <form id="form1" action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div id="accordion-collapse" data-accordion="open">
                            <h6 id="general-settings-heading">
                                <button type="button"
                                    class="flex items-center focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 justify-between p-5 w-full font-medium text-left border border-gray-200 dark:border-gray-700 border-b-0 text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-t-xl"
                                    data-accordion-target="#general-settings-body" aria-expanded="true"
                                    aria-controls="general-settings-body">
                                    <span>General Settings</span>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0 rotate-180" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h6>
                            <div id="general-settings-body" aria-labelledby="general-settings-heading">
                                <div
                                    class="p-5 border border-gray-200 dark:border-gray-700 dark:bg-gray-900 border-b-0">
                                    <div class="flex flex-col">
                                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                                                <div class="overflow-hidden shadow-md sm:rounded-lg">
                                                    <table class="min-w-full">
                                                        <tbody>
                                                            <!-- Product 1 -->
                                                            <tr
                                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                                <td
                                                                    class="text-right py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/4">
                                                                    Home Page
                                                                </td>
                                                                <td
                                                                    class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400 w-3/4">
                                                                    <select id="homepage_id" name="homepage_id"
                                                                        class="input-text">
                                                                        @foreach ($pages as $page)
                                                                            <option value="{{ $page->id }}"
                                                                                @if ($data['homepage_id'] == $page->id) selected @endif>
                                                                                {{ $page->page_title }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr
                                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                                <td
                                                                    class="text-right py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/4">
                                                                    Logo
                                                                </td>
                                                                <td
                                                                    class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400 w-3/4">
                                                                    <input
                                                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                                        aria-describedby="user_avatar_help" id="logo"
                                                                        name="logo" type="file">
                                                                    @if ($data['logo'])
                                                                        <img src="/storage/{{ $data['logo'] }}"
                                                                            width=150 height="150" />
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
