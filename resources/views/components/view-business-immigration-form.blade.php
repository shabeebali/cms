<div class="w-full">
    <div class="text-2xl my-4 text-center">Application ID: {{ $afdata->application_id }}</div>
    <table class="w-full table table-hover">
        <x-view-business-immigration-form2 :afdata="$afdata" />
    </table>
</div>
