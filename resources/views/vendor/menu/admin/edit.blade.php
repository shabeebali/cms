<x-app-layout>
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
                    <a href="{{ route('admin.menus.index') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Menus</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Edit</span>
                </div>
            </li>
        </ol>
    </x-slot>
    <x-slot name="header">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="page-title">
                {{ __('Edit Menu: ' . $menu->name) }}
            </div>
            <div class="toolbar-buttons flex justify-end">
                <button type="button" class="success-btn" form="form1" onclick="saveFn()">Update</button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="form1" action="{{ route('admin.menus.update', $menu->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="toggle-example" class="flex relative items-center mb-4 cursor-pointer">
                                <input type="checkbox" id="toggle-example" class="sr-only" name="active"
                                    @if ($menu->active) checked @endif value="1">
                                <div
                                    class="w-11 h-6 bg-gray-200 rounded-full border border-gray-200 toggle-bg dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Active</span>
                            </label>
                        </div>
                        <div class="mb-6">
                            <label for="title" class="input-text-label">Menu
                                Name</label>
                            <input type="text" id="name" name="name" class="input-text" required
                                value="{{ old('name', $menu->name) }}">
                            @error('name')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <div class="flex flex-row justify-between">
                                <h5>Menu Items</h5>
                                <button class="primary-btn" type="button" onclick="openAddModal()">Add Menu
                                    Item</button>
                            </div>
                            <div class="flex flex-row">
                                <ul class="list" id="menu-items-ul">
                                    @if (old('items', $menu->items))
                                        @foreach (old('items', $menu->items) as $item)
                                            @if ($item['type'] == 'manual')
                                                <li class="menu-item list-item" data-type="{{ $item['type'] }}"
                                                    data-sort="{{ $item['sort'] }}"
                                                    data-title="{{ $item['title'] }}"
                                                    data-class="{{ $item['class'] }}"
                                                    data-target="{{ $item['target'] }}"
                                                    data-url="{{ $item['url'] }}">
                                                    <div class="flex justify-between">
                                                        <div class="flex"><svg
                                                                class="w-6 h-6 cursor-move mr-2" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4">
                                                                </path>
                                                            </svg><span
                                                                class="menu-item-title">{{ $item['title'] }}</span>
                                                        </div><svg
                                                            class="menu-item-edit-btn w-4 h-4 cursor-pointer mt-1"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </li>
                                            @elseif ($item['type'] == 'page')
                                                <li class="menu-item list-item" data-type="{{ $item['type'] }}"
                                                    data-sort="{{ $item['sort'] }}"
                                                    data-title="{{ $item['title'] }}"
                                                    data-class="{{ $item['class'] }}"
                                                    data-target="{{ $item['target'] }}"
                                                    data-page_id="{{ $item['page_id'] }}">
                                                    <div class="flex justify-between">
                                                        <div class="flex"><svg
                                                                class="w-6 h-6 cursor-move mr-2" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4">
                                                                </path>
                                                            </svg><span
                                                                class="menu-item-title">{{ $item['title'] }}</span>
                                                        </div><svg
                                                            class="menu-item-edit-btn w-4 h-4 cursor-pointer mt-1"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="add-modal" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
        <div class="relative px-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-end p-2">
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-toggle="add-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" id="add-item-form" action="#">
                    <div id="type-selection-block">
                        <label for="type" class="input-text-label">Menu
                            Type</label>
                        <select name="type" id="type" class="input-text" required onchange="menuTypeChanged()">
                            <option value="manual">Manual</option>
                            <option value="page">Page Link</option>
                        </select>
                    </div>
                    <div id="title-block">
                        <label for="title" class="input-text-label">Title</label>
                        <input type="text" name="title" id="title" class="input-text" required>
                    </div>
                    <div id="target-block">
                        <label for="target" class="input-text-label">Target</label>
                        <select type="text" name="target" id="target" class="input-text">
                            <option value="_self">Open in same window / tab</option>
                            <option value="_blank">Open in new window / tab</option>
                        </select>
                    </div>
                    <div id="class-block">
                        <label for="class" class="input-text-label">Classes (Optional)</label>
                        <input type="text" name="class" id="class" class="input-text">
                    </div>

                    <button type="button" class="primary-btn w-full" onclick="addMenuItem()">Submit</button>

                </form>
            </div>
        </div>
    </div>
    @push('bottom-scripts')
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
        <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script>
            let editMode = false;
            let editNode = null
            var el = document.getElementById('menu-items-ul');
            $('body').on('change', '#page_id', function() {
                // console.log($('#page_id').val())
                if ($('#page_id').val() != 0) {
                    let text = $('#page_id option:selected').text()
                    $('#title').val(text);
                } else {
                    $('#title').val('');
                }
            })
            Sortable.create(el, {
                onUpdate: function() {
                    let menuItems = $('.menu-item')
                    menuItems.each(function(ind) {
                        $(this).attr('data-sort', (ind + 1))
                        $(this).data('sort', (ind + 1))
                    })
                }
            });

            function openAddModal() {
                editMode = false
                let form = $('#add-item-form');
                let validator = form.validate();
                form.trigger('reset');
                validator.resetForm();
                $('#type').val('page');
                let pageSelectionBlock = $('#page-selection-block');
                if (!pageSelectionBlock.parent().length) {
                    insertPageSelectionBlock()
                }
                let urlBlock = $('#url-block');
                if (urlBlock.parent().length) {
                    urlBlock.remove()
                }
                toggleModal('add-modal', true);
            }

            function menuTypeChanged() {
                let menuType = $('#type').val()
                if (menuType == 'manual') {
                    // Remove page selection block if exists
                    let pageSelectionBlock = $('#page-selection-block');
                    if (pageSelectionBlock.parent().length) {
                        pageSelectionBlock.remove()
                    }
                    insertUrlBlock()
                }

                if (menuType == 'page') {
                    // Remove page selection block if exists
                    let urlBlock = $('#url-block');
                    if (urlBlock.parent().length) {
                        urlBlock.remove()
                    }
                    insertPageSelectionBlock()
                }
            }

            function insertUrlBlock() {
                // Insert Url Block
                let urlBlock = $('<div></div>', {
                    id: 'url-block'
                });
                urlBlock.append($('<label>URL</label>', {
                    for: 'url',
                    class: 'input-text-label',
                }))
                urlBlock.append($('<input>', {
                    name: 'url',
                    id: 'url',
                    class: 'input-text',
                    type: 'URL',
                    required: true
                }));
                urlBlock.insertAfter($('#title-block'))
            }

            function insertPageSelectionBlock() {
                var pageSelectionBlock = $('<div></div>', {
                    id: "page-selection-block"
                });
                pageSelectionBlock.append($('<label>Select Page</label>', {
                    for: 'page_id',
                    class: 'input-text-label',
                }));
                pageSelectionElement = $('<select></select', {
                    class: 'input-text',
                    name: 'page_id',
                    id: 'page_id',
                    required: true
                })
                pageSelectionElement.append('<option value="0">---Select Page---</option>');
                @foreach ($pages as $page)
                    pageSelectionElement.append('<option value="{{ $page->id }}">{{ $page->page_title }}</option>');
                @endforeach
                pageSelectionBlock.append(pageSelectionElement);
                pageSelectionBlock.insertAfter($('#title-block'));
            }

            function addMenuItem() {
                if (!editMode) {
                    let form = $('#add-item-form');
                    let validator = form.validate({
                        url: {
                            url: true,
                            required: true
                        }
                    }).form();
                    let data = form.serializeArray();
                    // console.log(data)
                    if (form.valid()) {
                        let count = $('#menu-items-ul li').length;
                        let str = '';
                        let title = '';
                        data.forEach(function(item) {
                            str += 'data-' + item.name + '="' + item.value + '" ';
                            if (item.name == 'title')
                                title = item.value;
                        })
                        let listElement = $('<li ' + str + ' data-sort="' + (count + 1) +
                            '" class="menu-item list-item"></li>');
                        let handleSvg = $(
                            '<svg class="w-6 h-6 cursor-move mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path></svg>'
                        );
                        let wrapper = $('<div></div>', {
                            class: "flex justify-between"
                        });
                        let insideWrapper = $('<div></div>', {
                            class: 'flex'
                        });
                        insideWrapper.append(handleSvg);
                        let spanString = '<span class="menu-item-title">' + title + '</span>';
                        insideWrapper.append($(spanString));
                        let editSvg = $(
                            '<svg class="menu-item-edit-btn w-4 h-4 cursor-pointer mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>'
                        );
                        wrapper.append(insideWrapper);
                        wrapper.append(editSvg);
                        listElement.append(wrapper)
                        $('#menu-items-ul').append(listElement);
                        toggleModal('add-modal', false);
                    }
                } else {
                    let form = $('#add-item-form');
                    let validator = form.validate({
                        url: {
                            url: true,
                            required: true
                        }
                    }).form();
                    let data = form.serializeArray();
                    // console.log(data)
                    if (form.valid()) {
                        let title = '';
                        data.forEach(function(item) {
                            $(editNode).attr('data-' + item.name, item.value)
                            $(editNode).data(item.name, item.value)
                            if (item.name == 'title')
                                title = item.value;
                        })
                        $(editNode).find('.menu-item-title').html(title)
                        toggleModal('add-modal', false);
                    }
                }
            }
            $('body').on('click', '.menu-item-edit-btn', function() {
                console.log('kitti')
                editMode = true
                let liElement = $(this).parent().parent();
                editNode = liElement;
                let data = liElement.data();
                console.log(data)
                let form = $('#add-item-form');
                let validator = form.validate();
                form.trigger('reset');
                validator.resetForm();
                $('#type').val(data.type);
                if (data.type == 'page') {
                    let pageSelectionBlock = $('#page-selection-block');
                    if (!pageSelectionBlock.parent().length) {
                        insertPageSelectionBlock()
                    }
                    $('#page_id').val(data.page_id)
                    let urlBlock = $('#url-block');
                    if (urlBlock.parent().length) {
                        urlBlock.remove()
                    }
                }
                if (data.type == 'manual') {
                    let urlBlock = $('#url-block');
                    if (!urlBlock.parent().length) {
                        insertUrlBlock()
                    }
                    $('#url').val(data.url)
                    let pageSelectionBlock = $('#page-selection-block');
                    if (pageSelectionBlock.parent().length) {
                        pageSelectionBlock.remove()
                    }
                }
                $('#title').val(data.title)
                $('#target').val(data.target)
                $('#class').val(data.class)
                toggleModal('add-modal', true);
            })

            function saveFn() {
                let form = document.getElementById('form1')
                let fD = new FormData(form)
                if ($('#menu-items-ul li').length == 0) {
                    $.jGrowl('Menu items missing', {
                        group: 'bg-red-700',
                    });
                } else {
                    $('#menu-items-ul li').each(function(ind) {
                        let data = $(this).data()
                        for (key in data) {
                            $(form).append($('<input type="hidden" name="items[' + ind + '][' + key + ']" value="' +
                                data[key] + '">'))
                        }
                        $(form).submit();
                    })

                }

            }
        </script>

    @endpush
</x-app-layout>
