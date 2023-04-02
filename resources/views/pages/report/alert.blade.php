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
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-white-500 dark:text-white-500">
                            <tr>           
                                <th class="px-6 py-4 border border-slate-600">METER_NO</th>
                                <th class="px-6 py-4 border border-slate-600">MA_DDO</th>
                                <th class="px-6 py-4 border border-slate-600">TEN_KHANG</th>
                                <th class="px-6 py-4 border border-slate-600">DIA_CHI</th>
                                <th class="px-6 py-4 border border-slate-600 text-gray-500">
                                <select onchange="window.location.href=this.value;">
                                        <option value="{{ route('report.alert', ['donvi' => '']) }}" @if(session('selected_donvi') == '') selected @endif>Tất cả đơn vị</option>
                                        <option value="{{ route('report.alert', ['donvi' => 'PA01ND']) }}" @if(session('selected_donvi') == 'PA01ND') selected @endif>Điện lực Thành phố</option>
                                        <option value="{{ route('report.alert', ['donvi' => 'PA01VB']) }}" @if(session('selected_donvi') == 'PA01VB') selected @endif>Điện lực Vụ Bản</option>
                                        <option value="{{ route('report.alert', ['donvi' => 'PA01YY']) }}" @if(session('selected_donvi') == 'PA01YY') selected @endif>Điện lực Ý Yên</option>
                                        <option value="{{ route('report.alert', ['donvi' => 'PA01NT']) }}" @if(session('selected_donvi') == 'PA01NT') selected @endif>Điện lực Nam Trực</option>
                                        <option value="{{ route('report.alert', ['donvi' => 'PA01NH']) }}" @if(session('selected_donvi') == 'PA01NH') selected @endif>Điện lực Nghĩa Hưng</option>
                                        <option value="{{ route('report.alert', ['donvi' => 'PA01GT']) }}" @if(session('selected_donvi') == 'PA01GT') selected @endif>Điện lực Giao Thủy</option>
                                        <option value="{{ route('report.alert', ['donvi' => 'PA01HH']) }}" @if(session('selected_donvi') == 'PA01HH') selected @endif>Điện lực Hải Hậu</option>
                                        <option value="{{ route('report.alert', ['donvi' => 'PA01XT']) }}" @if(session('selected_donvi') == 'PA01XT') selected @endif>Điện lực Xuân Trường</option>
                                        <option value="{{ route('report.alert', ['donvi' => 'PA01TN']) }}" @if(session('selected_donvi') == 'PA01TN') selected @endif>Điện lực Trực Ninh</option>
                                    </select>                          
                                </th>                               
                                <th class="px-6 py-4 border border-slate-600">ALERT_TIME</th>     
                                <th class="px-6 py-4 border border-slate-600">STT</th>                                 
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                        @foreach($alertData as $value)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-200">  
                               <td class="px-6 py-4 border border-slate-600">{{ $value->METER_NO }}</td>
                                <td class="px-6 py-4 border border-slate-600">{{ $value->MA_DDO }}</td>
                                <td class="px-6 py-4 border border-slate-600">{{ $value->TEN_KHANG }}</td>
                                <td class="px-6 py-4 border border-slate-600">{{ $value->DIA_CHI }}</td>
                                <td class="px-6 py-4 border border-slate-600">
                                    {{ $value->DON_VI }}
                                </td>                          
                                <td class="px-6 py-4 border border-slate-600">{{ $value->ALERT_TIME }}</td>                                                               
                                <td>
                                    <form action="{{ route('report.update', ['meter_no' => $value->METER_NO]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Phúc tra</button>
                                    </form>
                                </td>
                                                                                                
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                </div>
                <div class="p-6">{{ $alertData->appends(['donvi' => session('selected_donvi')])->onEachSide(2)->links() }}</div>
            </div>
        </div>
    </div>   

    </script>
</x-app-layout>

