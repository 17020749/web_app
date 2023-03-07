<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dữ liệu khách hàng') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            
                            <tr>
                                <th class="px-6 py-4">Save time</th>
                                <th class="px-6 py-4">METER_ID</th>
                                <th class="px-6 py-4">MA_DDO</th>
                                <th class="px-6 py-4">Chỉ số</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rawData as $value)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $value->SAVEDB_TIME }}</td>
                                <td class="px-6 py-4">{{ $value->METER_ID }}</td>
                                <td class="px-6 py-4">{{ $value->MA_DDO }}</td>
                                <td class="px-6 py-4">{{ $value->CHI_SO }}</td>                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-6">{{ $rawData->onEachSide(4)->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
