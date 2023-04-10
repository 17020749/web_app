<a {{$attributes->merge(['href'=>route('admin.insertUser')])}}>
    <button {{ $attributes->merge(['type' => 'button', 'class' => 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800']) }}>
        Thêm mới 
    </button>
</a>
