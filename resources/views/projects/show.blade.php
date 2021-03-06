<x-app-layout>

    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-gray-400 text-sm font-normal">
                <a href="/projects" class="text-gray-400 text-sm font-normal no-underline">My Projects</a>
                / {{ $project->title }}
            </p>

            <div class="flex items-center">
                @foreach($project->members as $member)
                    <img alt="{{ $member->name }}'s avatar"
                         class="rounded-full w-8 mr-2"
                         src="{{ gravatar_url($member->email) }}">
                @endforeach

                <img alt="{{ $project->owner->name }}'s avatar"
                     class="rounded-full w-8 mr-2"
                     src="{{ gravatar_url($project->owner->email) }}">

                <a href="{{ $project->path() . '/edit' }}" class="button ml-4">Edit Project</a>
            </div>
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3 mb-6">
            <div class="lg:w-3/4 px-3">
                <div class="mb-8">
                    <h2 class="text-gray-400 font-normal text-lg mb-3">Tasks</h2>

                    @foreach($project->tasks as $task)
                        <div class="card mb-3">
                            <form action="{{ $task->path() }}" method="POST">
                                @method('PATCH')
                                @csrf

                                <div class="flex">
                                    <input name="body" value="{{ $task->body }}"
                                           class="w-full {{ $task->completed ? 'text-gray-400' : '' }}">
                                    <input name="completed" type="checkbox"
                                           onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                </div>
                            </form>
                        </div>

                    @endforeach

                    <div class="card mb-3">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input placeholder="Add a new task" class="w-full" name="body">
                            <x-form.error name="body" />
                        </form>
                    </div>

                </div>

                <div>
                    <h2 class="text-gray-400 font-normal text-lg mb-3">General Notes</h2>

                    <form action="{{ $project->path() }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <textarea class="card w-full border-0"
                                  name="notes"
                                  style="min-height: 200px"
                                  placeholder="Anything you want to take a note, here."
                        >{{ $project->notes }}</textarea>
                        <x-form.error name="notes" />

                        <button type="submit" class="button">Save</button>
                    </form>
                </div>
            </div>
            <div class="lg:w-1/4 px-3">
                @include('projects.card')
                @include('projects.activity.card')

                @can('manage', $project)
                    @include('projects.invite')
                @endcan
            </div>
        </div>
    </main>

</x-app-layout>
