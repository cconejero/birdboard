<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="title">Title</label>

    <div class="control">
        <input class="input rounded w-full border border-gray-300"
               name="title"
               placeholder="Title"
               type="text"
               required
               value="{{ $project->title }}">
    </div>

    <x-form.error name="title" />
</div>

<div class="field mb-6">
    <label class="label text-sm mb-2 block"
           for="description">Description</label>

    <div class="control">
                <textarea class="textarea bg-transparent border border-gray-300 rounded p-2 text-xs w-full"
                          name="description"
                          placeholder="I should start learning piano."
                          required
                          rows="10">{{ $project->description }}</textarea>
    </div>

    <x-form.error name="description" />
</div>

<div class="field">
    <div class="control">
        <button class="button is-link mr-2" type="submit">{{ $buttonText }}</button>

        <a href="{{ $project->path() }}">Cancel</a>
    </div>
</div>
