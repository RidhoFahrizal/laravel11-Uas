

<x-layout-component>
    <x-slot:title>{{$title}}</x-slot:title>

    <body class="bg-gray-100 p-6">
        <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Create a New Post</h2>

            <form action="{{ route('posts.store', $user->id) }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    >
                </div>

                <div>
                    <label for="body" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea
                        name="body"
                        id="body"
                        rows="4"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    ></textarea>
                </div>

                <div>
                    <button
                        type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Create Post
                    </button>
                </div>
            </form>
        </div>
    </body>

</x-layout-component>
