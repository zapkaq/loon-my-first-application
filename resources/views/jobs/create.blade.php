<x-layout>
    <x-slot:heading>
        Edit Job
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH') <!-- Method Spoofing for PATCH -->

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Job</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <!-- Title -->
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" value="{{ $job->title }}"
                                   class="block w-full border rounded px-3 py-2" required>
                        </div>
                        @error('title')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Salary -->
                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <input type="text" name="salary" id="salary" value="{{ $job->salary }}"
                                   class="block w-full border rounded px-3 py-2" required>
                        </div>
                        @error('salary')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-6 flex items-center gap-x-6">
            <a href="/jobs/{{ $job->id }}" class="text-gray-900">Cancel</a>
            <button type="submit" class="bg-indigo-600 text-white px-3 py-2 rounded">Update</button>
        </div>
    </form>

    <!-- Delete Job -->
    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500">Delete Job</button>
    </form>
</x-layout>
