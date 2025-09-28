<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <ul>
        @foreach ($jobs as $job)
            <li>
                <div>
                    <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                        <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
                        <div>
                            <strong class="text-laracasts">{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
                        </div>
                    </a>
                </div>

                <div class="px-4 py-4">
                    @foreach($job->tags as $tag)
                        <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>

                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                    <strong class="text-laracasts">{{ $job->employer->name }}:</strong>
                    {{ $job['title'] }} pays {{ $job['salary'] }} per year.
                </a>

                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                    <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>