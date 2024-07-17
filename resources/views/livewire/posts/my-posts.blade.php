<div class="overflow-x-auto">
    <button
        class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring right-full"
        type="button"
        wire:click="create_post"
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
</div>
