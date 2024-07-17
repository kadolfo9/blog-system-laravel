<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg text-center">
        <h1 class="text-2xl font-bold sm:text-3xl">Criar nova publicação</h1>

        <p class="mt-4 text-gray-500">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Et libero nulla eaque error neque
            ipsa culpa autem, at itaque nostrum!
        </p>
    </div>

    <form wire:submit.prevent="save" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
        <div>
            <label for="title" class="sr-only">Título</label>

            <div class="relative">
                <input
                    type="text"
                    class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                    wire:model.live="form.title"
                    placeholder="Insira o título"
                />

                <div>
                    @error('form.title')
                    <livewire:error.error wire:model.live="error" error="{{ $message }}" />
                    @enderror
                </div>

                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
        </span>
            </div>
        </div>

        <div>
            <label for="content" class="sr-only">Conteúdo</label>

            <div class="relative">
                <textarea
                    type="text"
                    class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                    wire:model.live="form.content"
                    placeholder="Conteúdo da publicação"
                ></textarea>

                <div>
                    @error('form.content')
                    <livewire:error.error wire:model.live="error" error="{{ $message }}" />
                    @enderror
                </div>

                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
        </span>
            </div>
        </div>

        <div class="flex items-center justify-between">
           <button
                type="submit"
                class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white w-full"
                wire:click.prevent="save"
            >
                Criar
            </button>
        </div>
    </form>
</div>
