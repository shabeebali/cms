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
                    <a href="{{ route('admin.pages.index') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Pages</a>
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
                {{ __('Edit Page: ' . $data->page_title) }}
            </div>
            <div class="toolbar-buttons flex justify-end">
                <button type="submit" class="success-btn" form="form1">Update</button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="form1" action="{{ route('admin.pages.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="toggle-example" class="flex relative items-center mb-4 cursor-pointer">
                                <input type="checkbox" id="toggle-example" class="sr-only" name="active"
                                    @if ($data->active) checked @endif value="1">
                                <div
                                    class="w-11 h-6 bg-gray-200 rounded-full border border-gray-200 toggle-bg dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Active</span>
                            </label>
                        </div>
                        <div class="mb-6">
                            <label for="page_title" class="input-text-label">Page
                                Heading</label>
                            <input type="text" id="page_title" name="page_title" class="input-text"
                                placeholder="Page Title..." required
                                value="{{ old('page_title', $data->page_title) }}">
                            @error('page_title')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="html_content" class="input-text-label">Page
                                Content</label>
                            <!-- This container will become the editable. -->
                            <textarea id="summernote" name="html_content">{!! $data->html_content !!}</textarea>
                        </div>
                        <div class="mt-6">
                            <label for="page_title" class="input-text-label">URL Key</label>
                            <input type="text" id="page_title" name="url_key" class="input-text"
                                value="{{ old('url_key', $data->url_key) }}">
                            @error('url_key')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('bottom-scripts')
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <script>
            $('#summernote').summernote({
                placeholder: 'Start typing to add content...',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onImageUpload: function(files) {
                        for (var i = 0; i < files.length; i++) {
                            // console.log(files[i]);
                            if (!isFileImage(files[i])) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Upoloaded file is not a valid image. Only images of type .gif, .png, .jpeg, .jpg are allowed',
                                })
                                $.jGrowl(
                                    "Upoloaded file is not a valid image. Only images of type .gif, .png, .jpeg, .jpg are allowed", {
                                        header: 'Error'
                                    })
                            } else {
                                let formData = new FormData();
                                formData.append('file', files[i]);
                                axios.post("{{ route('admin.image.upload') }}", formData).then(function(res) {
                                    if (res.data.message == 'success') {
                                        // console.log(res.data)
                                        $img = $('<img>').attr({
                                            src: res.data.url
                                        });
                                        $('#summernote').summernote('insertNode', $img[0]);
                                    }
                                }).catch(function(error) {
                                    if (error)
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Something went wrong!',
                                        })
                                })
                            }
                        }
                    }
                }
            });

            function isFileImage(file) {
                const acceptedImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

                return file && acceptedImageTypes.includes(file['type'])
            }
        </script>
    @endpush
</x-app-layout>
