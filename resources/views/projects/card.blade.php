<div class="card flex flex-col" style="height: 200px">
    <a href="{{ $project->path() }}" class="text-black no-underline">
        <h3 class="text-xl font-normal py-4 mb-3 -ml-5 border-l-4 border-blue-400 pl-4">{{ $project->title }}</h3>
    </a>

    <div class="text-sm text-gray-400 mb-4 flex-1">{{ Str::limit($project->description) }}</div>

    <footer>
        <form method="POST" action="{{ $project->path() }}" class="text-right">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-xs">Delete</button>
        </form>
    </footer>
</div>
