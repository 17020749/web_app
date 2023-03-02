<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dữ liệu khách hàng') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="table-auto table-border">
                        <thead>
                            <tr>
                                <th>Save time</th>
                                <th>METER_ID</th>
                                <th>MA_DDO</th>
                                <th>ACTIVE_KW_INDICATE_TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rawData as $value)
                            <tr>
                                <td>{{ $value->SAVEDB_TIME }}</td>
                                <td>{{ $value->METER_ID }}</td>
                                <td>{{ $value->MA_DDO }}</td>
                                <td>{{ $value->ACTIVE_KW_INDICATE_TOTAL }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $rawData->onEachSide(4)->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
