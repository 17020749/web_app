<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cảnh báo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>           
                                <th class="px-6 py-4">METER_NO</th>
                                <th class="px-6 py-4">MA_DDO</th>
                                <th class="px-6 py-4">TEN_KHANG</th>
                                <th class="px-6 py-4">DIA_CHI</th>
                                <th class="px-6 py-4">DON_VI</th>                               
                                <th class="px-6 py-4">ALERT_TIME</th>                                                              
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($alertData as $value)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">  
                                <td class="px-6 py-4">{{ $value->METER_NO }}</td>
                                <td class="px-6 py-4">{{ $value->MA_DDO }}</td>
                                <td class="px-6 py-4">{{ $value->TEN_KHANG }}</td>
                                <td class="px-6 py-4">{{ $value->DIA_CHI }}</td>
                                <td class="px-6 py-4">{{ $value->DON_VI }}</td>                          
                                <td class="px-6 py-4">{{ $value->ALERT_TIME }}</td>
                                <td>
                                    <a href="{{ route('report.edit', ['METER_NO' => $value->METER_NO]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">EDIT</a>
                                </td>                                                         
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                </div>
                <div class="p-6">{{ $alertData->onEachSide(2)->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
