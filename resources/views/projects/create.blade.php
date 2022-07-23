<x-app-layout>
    <form action="/projects"
          class="lg:w-1/2 lg:mx-auto bg-white p-10 md:px-16 rounded-xl shadow"
          method="POST">
        @csrf

        <h1 class="text-2xl font-normal mb-16 text-center">Let's start something new!</h1>

        <div class="flex">
            <div class="flex-1 mr-4">
                <div class="mb-4">
                    <label for="title" class="text-sm block mb-2">Title</label>
                    <input type="text" id="title" name="title" class="border border-gray-400 p-2 text-xs block w-full rounded">
                </div>

                <div class="mb-4">
                    <label for="description" class="text-sm block mb-2">Description</label>
                    <textarea id="description" name="description" class="border border-gray-400 p-2 text-xs block w-full rounded" rows="7"></textarea>
                </div>
            </div>
        </div>

        <footer class="flex justify-end">
            <a class="button mr-4 bg-white border border-blue-400 text-blue-400" href="/projects">Cancel</a>
            <button class="button">Create Project</button>
        </footer>

    </form>
</x-app-layout>
