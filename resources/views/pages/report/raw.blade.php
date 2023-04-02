<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dữ liệu khách hàng') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between pb-6 ...">
                <div>
                    <a href="{{ route('report.runJob') }}" class=" p-2 text-white text-xs font-semibold uppercase bg-blue-600 hover:bg-blue-500 shadow-sm rounded-sm mb-3" target="_blank">
                    >> Chạy Job Tổng Hợp
                </a>
                </div>
                 
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <form action="{{route('report.raw')}}" method="get">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" name="keySearch" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                    </form>
                   
                </div>
            </div>
               
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-white-500 dark:text-white-500">
                            <tr>
                                <th class="px-6 py-4 border border-slate-600">
                                    <div class="flex items-center">
                                           METER_NO
                                    </div> 
                                </th>
                                <th class="px-6 py-4 border border-slate-600">
                                    <div class="flex items-center">
                                          MA_DDO
                                    </div>     
                                </th>
                                <th class="px-6 py-4 border border-slate-600" scope="col">
                                    <div class="flex items-center">
                                         TEN_KHANG
                                    </div>
                                   
                                </th>
                                <th class="px-6 py-4 border border-slate-600">
                                    <div class="flex items-center">
                                          DIA_CHI
                                    </div>          
                                </th>
                                <th class="px-6 py-4 border border-slate-600">
                                    <div class="flex items-center">
                                          DON_VI
                                    </div>
                                </th>
                                <th class="px-6 py-4 border border-slate-600">
                                    <div class="flex items-center">
                                          CHI_SO
                                    </div>
                                </th>
                                <th class="px-6 py-4 border border-slate-600">
                                    <div class="flex items-center">
                                          SAVEDB_TIME
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($rawData as $value)
                            <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-200">
                                <td class="px-6 py-4 border border-slate-600">{{ $value->METER_NO }}</td>
                                <td class="px-6 py-4 border border-slate-600">{{ $value->MA_DDO }}</td>
                                <td class="px-6 py-4 border border-slate-600">{{ $value->TEN_KHANG }}</td>
                                <td class="px-6 py-4 border border-slate-600">{{ $value->DIA_CHI }}</td>
                                <td class="px-6 py-4 border border-slate-600">{{ $value->DON_VI }}</td>
                                <td class="px-6 py-4 border border-slate-600">{{ $value->CHI_SO }}</td>
                                <td class="px-6 py-4 border border-slate-600">{{ $value->SAVEDB_TIME }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-6">{{ $rawData->onEachSide(7)->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
