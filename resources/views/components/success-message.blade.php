@if (session('success'))
    <div class="bg-green-200 p-5 rounded border-b-2 border-green-300 py-5 mb-4">
        <div class="font-medium text-green-600">
            {{ session('success') }}
        </div>
    </div>
@endif
