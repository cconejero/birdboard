<x-app-layout>
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-center w-full">
            <h2 class="text-gray-400 text-sm font-normal">My Projects</h2>
            <a href="/projects/create" class="button">New Project</a>
        </div>
    </header>

    <div class="lg:flex lg:flex-wrap -mx-3">
        @forelse($projects as $project)
            <div class="lg:w-1/3 px-3 pb-6">
                <div class="bg-white p-5 rounded-lg shadow" style="height: 200px">
                    <a href="{{ $project->path() }}" class="text-black no-underline">
                        <h3 class="text-xl font-normal py-4 mb-3 -ml-5 border-l-4 border-blue-400 pl-4">{{ $project->title }}</h3>
                    </a>

                    <div class="text-sm text-gray-400">{{ Str::limit($project->description) }}</div>
                </div>
            </div>
        @empty
            <div>No projects yet.</div>
        @endforelse
    </div>

</x-app-layout>
