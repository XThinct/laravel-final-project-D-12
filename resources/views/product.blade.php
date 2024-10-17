<x-layout>
    <section class="py-8 md:py-12 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
          {{-- heading --}}
          <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
            <div>
              <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                  <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-amber-600 dark:text-gray-400 dark:hover:text-white">
                      <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                      </svg>
                      Home
                    </a>
                  </li>
                  <li>
                    <div class="flex items-center">
                      <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                      </svg>
                      <a href="/products" class="ms-1 text-sm font-medium text-gray-700 hover:text-amber-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Products</a>
                    </div>
                  </li>
                </ol>
              </nav>
            </div>
          </div>

          <div>
          <a href="javascript:history.back()" class="text-sm text-blue-500 hover:underline">
            &laquo; Back
          </a>
          </div>
          
          <br>

          <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
            <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
              <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
              <img class="w-full hidden dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="" />
            </div>
    
            <div class="mt-6 sm:mt-8 lg:mt-0">
              <h1
                class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"
              >
                {{ $product->name }}
              </h1>
              <p class="text-l">Stock: {{ $product->stock }}</p>
              <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                <p
                  class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white"
                >
                {{ $product->price }}
                </p>
               
              </div>
              <br>
              <div class="flex flex-wrap justify-start items-center gap-2 mb-5 text-gray-500">
                <!-- Gender Category -->
                <a href="/gender_category/{{ $product->gender_category->slug }}">
                    <span class="bg-yellow-100 text-yellow-700 text-xs font-medium inline-flex items-center px-3 py-1 rounded-full dark:bg-primary-200 dark:text-primary-800 hover:bg-yellow-200 transition-colors">
                        {{ $product->gender_category->name }}
                    </span>
                </a>
                
                <!-- Type Category -->
                <a href="/type_category/{{ $product->type_category->slug }}">
                    <span class="bg-yellow-100 text-yellow-700 text-xs font-medium inline-flex items-center px-3 py-1 rounded-full dark:bg-primary-200 dark:text-primary-800 hover:bg-yellow-200 transition-colors">
                        {{ $product->type_category->name }}
                    </span>
                </a>
                
                <!-- Age Category -->
                <a href="/age_category/{{ $product->age_category->slug }}">
                    <span class="bg-yellow-100 text-yellow-700 text-xs font-medium inline-flex items-center px-3 py-1 rounded-full dark:bg-primary-200 dark:text-primary-800 hover:bg-yellow-200 transition-colors">
                        {{ $product->age_category->name }}
                    </span>
                </a>
              </div>
    
              <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">    
                <a
                  id="updateProductButton" 
                  data-modal-target="updateProductModal" 
                  data-modal-toggle="updateProductModal" 
                  title=""
                  class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
                  role="button"
                >
                  <svg
                    class="w-5 h-5 -ms-2 me-2"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="none"
                    viewBox="0 0 24 24"
                  >
                  
                    <path
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"
                    />
                  </svg>
    
                  Edit
                </a>

                <!-- Main modal -->
                <div id="updateProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                  <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                      <!-- Modal content -->
                      <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                          <!-- Modal header -->
                          <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                  Update Product
                              </h3>
                              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal">
                                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                  <span class="sr-only">Close modal</span>
                              </button>
                          </div>
                          <!-- Modal body -->
                          <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                              <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="string" name="name" value="{{ $product->name }}" id="name" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              </div>
                              <div>
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="string" name="price" value="{{ $product->price }}" id="price" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              </div>
                              <div>
                                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                                <input type="integer" name="stock" value="{{ $product->stock }}" id="price" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              </div>
                              <div>
                                <label for="gender_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                <select name="gender_category_id" id="gender_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option hidden>{{ $product->gender_category->name }}</option>
                                    <option value="1" {{ $product->gender_category_id == 1 ? 'selected' : '' }}>Boys</option>
                                    <option value="2" {{ $product->gender_category_id == 2 ? 'selected' : '' }}>Girls</option>
                                </select>
                              </div>                            
                              <div>
                                <label for="type_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                <select name="type_category_id" id="type_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option hidden>{{ $product->type_category->name }}</option>
                                    <option value="1" {{ $product->type_category_id == 1 ? 'selected' : '' }}>Tops</option>
                                    <option value="2" {{ $product->type_category_id == 2 ? 'selected' : '' }}>Bottoms</option>
                                    <option value="3" {{ $product->type_category_id == 3 ? 'selected' : '' }}>Sets</option>
                                    <option value="4" {{ $product->type_category_id == 4 ? 'selected' : '' }}>Dresses</option>
                                    <option value="5" {{ $product->type_category_id == 5 ? 'selected' : '' }}>Overalls</option>
                                    <option value="6" {{ $product->type_category_id == 6 ? 'selected' : '' }}>Loungewears</option>
                                    <option value="7" {{ $product->type_category_id == 7 ? 'selected' : '' }}>Outerwears</option>
                                </select>
                              </div>                            
                              <div>
                                <label for="age_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                                <select name="age_category_id" id="age_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option hidden>{{ $product->age_category->name }}</option>
                                    <option value="1" {{ $product->age_category_id == 1 ? 'selected' : '' }}>2-4 yrs</option>
                                    <option value="2" {{ $product->age_category_id == 2 ? 'selected' : '' }}>5-9 yrs</option>
                                    <option value="3" {{ $product->age_category_id == 3 ? 'selected' : '' }}>10-15 yrs</option>
                                </select>
                              </div>                            
                              <div>
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                <div class="mb-2">
                                    @if($product->image)
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-10">
                                    @endif
                                </div>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            </div>                            
                              <div class="sm:col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea name="description" id="description" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write a description...">{{ $product->description }}</textarea>                    
                              </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    Update
                                </button>
                                <button data-modal-toggle="updateProductModal" type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    Cancel
                                </button>
                            </div>
                          </form>
                      </div>
                  </div>
                </div>

                <a
                  id="deleteButton" 
                  data-modal-target="deleteModal" 
                  data-modal-toggle="deleteModal" 
                  title="" 
                  class="text-white mt-4 sm:mt-0 bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 flex items-center justify-center"
                  role="button"
                >
                  <svg
                    class="w-5 h-5 -ms-2 me-2"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="none"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"
                    />
                  </svg>

                  Delete
                </a>

              </div>

              <!-- Main modal -->
              <div id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                        <div class="flex justify-center items-center space-x-4">
                            <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                No, cancel
                            </button>
                            <form action="{{ route('product.delete', $product->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                  Yes, I'm sure
                              </button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>

              <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />
    
              <p class="mb-6 text-gray-500 dark:text-gray-400">
                {{ $product->description }}
              </p>
    
            </div>
          </div>
        </div>
      </section>
</x-layout>