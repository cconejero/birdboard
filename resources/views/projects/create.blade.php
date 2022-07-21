<x-app-layout>

    <form action="/projects"
          class="lg:w-1/2 lg:mx-auto bg-white p-6 md:px-16 rounded shadow"
          method="POST">
        @csrf

        <h1 class="text-2xl font-normal mb-10 text-center">Let's start something new!</h1>

        @include('projects._form', [
            'project' => new App\Models\Project,
            'buttonText' => 'Create Project'
        ])

    </form>
</x-app-layout>
