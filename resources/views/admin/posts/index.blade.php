<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="mb-4">
            <a href="{{ route('post.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Post</a>
        </div>
        <table class="table-auto w-full bg-blue-200 text-white"> <!-- Change the background and text color here -->
            <thead>
            <tr>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Content</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-amber-100">
            @foreach ($posts as $post)
                <tr>
                    <td class="border px-4 py-2">{{ $post->title }}</td>
                    <td class="border px-4 py-2">{{ $post->content }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('post.edit', ['post' => $post]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                        <form action="{{ route('post.destroy', ['post' => $post]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
