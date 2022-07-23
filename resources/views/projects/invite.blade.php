<div class="card flex flex-col mt-3">
    <h3 class="text-xl font-normal py-4 mb-3 -ml-5 border-l-4 border-blue-400 pl-4">
        Invite a user
    </h3>

    <footer>
        <form method="POST" action="{{ $project->path() }}/invitations">
            @csrf

            <div class="mb-3">
                <input type="email" name="email" class="border-gray-400 rounded w-full py-2 px-3" placeholder="Email address">
                <x-form.error name="email" />
            </div>

            <button type="submit" class="button">Invite</button>
        </form>
    </footer>
</div>
