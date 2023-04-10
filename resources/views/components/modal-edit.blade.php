<div id="modal-edit" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-4xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="modal-edit">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h3>
                <form class="space-y-6" action="" method="post" >
                    @csrf
                   
                    <div class="flex flex-row">
                         <div class="basis-1/2">
                            <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">id</label>
                            <input type="text" name="id" id="id" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  >
                           
                        </div>
                         <div class="basis-1/2">
                            <label for="userName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
                            <input type="text" name="userName" id="userName" value="{{ old('userName') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                         <x-input-error :messages="$errors->get('userName')" class="mt-2" />
                        </div>
                       
                      
                    </div>
                    <div >
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    <div class="flex flex-row">
                          <div class="basis-full">
                            <label for="donvi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                            <select id="donvi" value="PA01NH"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="all" >Tất cả đơn vị</option>
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
                        </div>     
                    </div>
                    <div class="flex flex-row">
                        <div class="basis-full">
                            <button type="submit" id="titleSubmit" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 w-full">Cập nhập</button>
                        </div>     
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div> 
