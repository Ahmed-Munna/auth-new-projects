<x-app-layout>

<div class="container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg ml-auto">
                <div class="card">
                    <div class="card header">
                        <h3 class="ext-lg font-medium text-gray-900 dark:text-gray-100">Update SubCatagory</h3>
                        <label for="category_name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                            @if(session('success'))
                                {{session('success')}}
                            @endif
                        </label>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/subcatagory/update')}}" method="POST">
                           @csrf
                            <div class="mb-3 mt-6">
                                <label for="subcategory_name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Update subCatagory Name</label>
                                <input type="hidden" name="subctg_id" value="{{$subcategory->id}}">
                                <input type="text" value="{{$subcategory->subcategory_name}}" name="subcategory_name" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                                @error('subcategory_name')
                                    <small style="color: red;">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="inline-flex items-center mt-6 px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Update subCatagory</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>