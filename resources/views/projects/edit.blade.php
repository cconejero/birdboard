<x-app-layout>
    <form action="{{ $project->path() }}"
          class="lg:w-1/2 lg:mx-auto bg-white p-6 md:px-16 rounded shadow"
          method="POST">
        @csrf
        @method('PATCH')

        <h1 class="text-2xl font-normal mb-10 text-center">Edit a Project</h1>

        @include('projects._form', [
            'buttonText' => 'Upate Project'
        ])

    </form>
</x-app-layout>
