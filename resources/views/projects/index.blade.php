<x-app-layout>
    <div class="flex items-center mb-3">
        <a href="/projects/create">New Project</a>
    </div>

    <div class="flex">
        @forelse($projects as $project)
            <div class="bg-white mr-4 p-5 rounded shadow w-1/3" style="height: 200px">
                <h3 class="text-xl font-normal py-4">{{ $project->title }}</h3>

                <div class="text-sm text-gray-400">{{ Str::limit($project->description) }}</div>
            </div>
        @empty
            <div>No projects yet.</div>
        @endforelse
    </div>

</x-app-layout>
