<div>
    <div x-data="{ isModalOpen: false }" class="overflow-x-auto flex items-center justify-center mt-5">
        <button
            class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring right-full mr-5"
            type="button"
            @click="isModalOpen = !isModalOpen"
        >
            Criar
        </button>

        <table class="divide-y-1 divide-gray-100 bg-white text-sm table-fixed">
            <thead class="ltr:text-left rtl:text-right min-w-10">
            <tr>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Título</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Publicado em</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Categoria</th>
                <th class="px-4 py-2"></th>
            </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
            @foreach($posts as $id => $post)
                <tr>
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $post['title'] }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $post['created_at'] ?? '21/05/2024' }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $post['category'] ?? 'Outros' }}</td>
                    <td class="whitespace-nowrap px-4 py-2">
                        <a
                            class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
                        >
                            View
                        </a>
                    </td>
                    <td class="whitespace-nowrap px-4 py-2">
                        <a
                            class="inline-block rounded bg-green-600 px-4 py-2 text-xs font-medium text-white hover:bg-green-700"
                        >
                            Edit
                        </a>
                    </td>
                    <td class="whitespace-nowrap px-4 py-2">
                        <a
                            class="inline-block rounded bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700"
                        >
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div x-show.important="isModalOpen" class="fixed inset-0 z-50 grid place-content-center bg-black/50 p-4"
             role="dialog" aria-modal="false"
             aria-labelledby="modalTitle">
            <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
                <div class="flex items-start justify-between">
                    <h2 id="modalTitle" class="text-xl font-bold text-gray-900 sm:text-2xl">Criar publicação</h2>

                    <button type="button"
                            class="-me-4 -mt-4 rounded-full p-2 text-gray-400 transition-colors hover:bg-gray-50 hover:text-gray-600 focus:outline-none"
                            aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="mt-4">
                    <p class="text-pretty text-gray-700">
                        Insira o titulo, conteúdo, tags e categoria da publicação
                    </p>

                    <label for="title" class="mt-4 block">
                    <span class="text-sm font-medium text-gray-700">
                      Título
                    </span>

                        <input type="text" id="title"
                               class="mt-0.5 mb-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm" />
                    </label>
                </div>

                <footer class="mt-6 flex justify-end gap-2">
                    <button type="button"
                            class="rounded bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-200">
                        Cancelar
                    </button>

                    <button type="button"
                            class="rounded bg-blue-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-700">
                        Criar
                    </button>
                </footer>
            </div>
        </div>
    </div>
</div>
