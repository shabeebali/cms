<x-app-layout>
    <div class="container">
        @if ($data->typable_type == 'App\Models\SkilledWorker')
            <x-view-skilled-worker-form :afdata="$data" />
        @endif
        @if ($data->typable_type == 'App\Models\BusinessImmigration')
            <x-view-business-immigration-form :afdata="$data" />
        @endif
    </div>
</x-app-layout>
