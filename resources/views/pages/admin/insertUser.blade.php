<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm người dùng') }}
        </h2>
    </x-slot>
    <div class="py-12 ">  
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">               
                <div class="p-6 text-gray-900 ">
                    @if ($errors->has('message'))
                        <div class=" p-2 bg-gray-200 text-red-700" >  
                        {{__($errors->first('message'))}}</h1> 
                        </div> 
                    @endif
                    <form class="space-y-6" action="{{route('admin.insert')}}" method="post" id="formUser">
                    @csrf
                    @method('put')
                    <div class="flex flex-col md:flex-row">
                        <div class="basis-1/2 mx-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                            <input type="name" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="basis-1/2 mx-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="text" name="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row">
                        <div class="basis-1/3 mx-2">
                            <label for="userName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
                            <input type="text" name="userName" id="userName" value="{{ old('userName') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                         <x-input-error :messages="$errors->get('userName')" class="mt-2" />
                        </div>
                        <div class="basis-1/3 mx-2">
                            <label for="isAdmin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nhóm người dùng</label>
                            <select id="isAdmin" value="user" name="roles"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="1" >Admin</option>
                                <option value="0" >User</option>
                            </select>
                             <x-input-error :messages="$errors->get('roles')" class="mt-2" />
                        </div>  
                          <div class="basis-1/3 mx-2">
                            <label for="donvi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Đơn vị</label>
                            <select id="donvi" name = "donvi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="PA01ND" >Điện lực Thành phố</option>
                                <option value="PA01VB" >Điện lực Vụ Bản</option>
                                <option value="PA01YY" >Điện lực Ý Yên</option>
                                <option value="PA01NT">Điện lực Nam Trực</option>
                                <option value="PA01NH">Điện lực Nghĩa Hưng</option>
                                <option value="PA01GT" >Điện lực Giao Thủy</option>
                                <option value="PA01HH" >Điện lực Hải Hậu</option>
                                <option value="PA01XT">Điện lực Xuân Trường</option>
                                <option value="PA01TN">Điện lực Trực Ninh</option>
                            </select>
                            <x-input-error :messages="$errors->get('donvi')" class="mt-2" />
                        </div>  
                    </div>             
                        <div class="basis-full">
                            <button type="submit" id="titleSubmit" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 w-full">Thêm mới</button>
                        </div>     
                </form>
                </div>
            </div>
        </div>
    </div>   
    </script>
</x-app-layout>

