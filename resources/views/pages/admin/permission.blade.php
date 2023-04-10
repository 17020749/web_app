<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Phân quyền') }}
        </h2>
    </x-slot>
     
    <div class="py-12 ">  
         <x-alert></x-alert>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">               
                <div class="p-6 text-gray-900 ">
                    <x-btn-insert></x-btn-insert>
                   
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-white-500 dark:text-white-500">
                            <tr>           
                                <th class="px-6 py-4 border border-white-600">NO.</th>
                                <th class="px-6 py-4 border border-white-600">USERNAME</th>
                                <th class="px-6 py-4 border border-white-600">EMAIL</th>
                                <th class="px-6 py-4 border border-white-600">ROLES</th>
                                <th class="px-6 py-4 border border-white-600">ACTION</th>                                    
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                        @foreach($user as $value)
                            <tr id="{{$value->id}}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-200 h-auto">  
                               <td class="px-6 py-4 border border-white-600 id">{{ $value->id }}</td>
                                <td class="px-6 py-4 border border-white-600 userName">{{ $value->username }}</td>
                                <td class="px-6 py-4 border border-white-600 email">{{ $value->email }}</td>
                                <td class="px-6 py-4 border border-white-600">
                                     <x-btn-roles class="donvi">{{$value->donvi}}</x-btn-roles>
                                </td>                                                                                                         
                                <td class="px-6 py-4 border border-white-600">
                                    <x-btn-edit data-user-id="{{ $value->id }}"
                                   
                                    ></x-btn-edit>
                                    <x-btn-delete  class="view-button"></x-btn-delete>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                         <x-modal-edit  class="@if($errors->has('username')) @endif">
                         </x-modal-edit>
                         <x-modal-alert action=""></x-modal-alert>
                        </table>
                </div>
                <div class="p-6">{{ $user->onEachSide(2)->links() }}</div>
            </div>
        </div>
    </div>   
    </script>
</x-app-layout>
<script>
    const viewButtons = document.querySelectorAll('.view-button');
        form = document.getElementById('formUser');
    viewButtons.forEach((button) => {
        button.addEventListener('click', () => {       
        const row = button.parentNode.parentNode; // lấy hàng chứa button đó            
        // const name = row.querySelector('.userName').innerHTML; // lấy nội dung của cột 'name' trong hàng đó
        // const donvi =row.querySelector('.donvi').textContent.trim();
        var id = row.querySelector('.id').textContent;
        // const email = row.querySelector('.email').textContent; // lấy nội dung của cột 'email' trong hàng đó
        // document.getElementById('titleSubmit').textContent = 'Cập nhập'
        // document.getElementById('userName').value=name;
        // document.getElementById('email').value=email;
        // document.getElementById('donvi').value=donvi;
        // document.getElementById('id').value=id;
      form.setAttribute("action", "{{route('admin.delete')}}");
      document.querySelector('.deleteUser').value = id;
        // form.setAttribute("method", "post");
    });
    });
   
</script>

