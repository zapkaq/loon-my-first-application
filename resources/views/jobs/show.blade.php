<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>

    <div class="px-4 py-6 border border-gray-200 rounded-lg bg-white">
        <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
        <div>
            <strong class="text-laracasts">{{ $job->title }}:</strong> Pays {{ $job->salary }} per year.
        </div>

        <div class="px-4 py-4">
            @foreach($job->tags as $tag)
                <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">
                    {{ $tag->name }}
                </span>
            @endforeach
        </div>

        <!-- Edit Job Button -->
        <div class="mt-4">
            <a href="/jobs/{{ $job->id }}/edit"
                class="inline-block mt-4 rounded-md bg-yellow-500 px-4 py-2 text-white font-semibold hover:bg-yellow-400">
                Edit Job
            </a>

        </div>
    </div>
</x-layout>