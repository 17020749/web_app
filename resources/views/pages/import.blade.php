<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nhập dữ liệu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('import.post')}}" method="post">
                        @csrf
                        Name: <input type="text" name="name"><br>
                        E-mail: <input type="text" name="email"><br>
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
