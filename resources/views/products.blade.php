<x-layout>
    <section class="py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
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

          {{-- search --}}
          <form action="{{ route('product.index') }}" method="GET">
            @if(request('gender_category'))
                <input type="hidden" name="gender_category" value="{{ request('gender_category') }}">  
            @endif
            @if(request('type_category'))
                <input type="hidden" name="type_category" value="{{ request('type_category') }}">  
            @endif
            @if(request('age_category'))
                <input type="hidden" name="age_category" value="{{ request('age_category') }}">  
            @endif
            <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
              <div class="relative w-full">
                  <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                      <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                      </svg>
                  </div>
                  <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search products" type="search" id="search" name="search" autocomplete="off">
              </div>
              <div>
                  <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Search</button>
              </div>
            </div>
          </form>

          {{-- Filter --}}
          <form action="{{ route('product.index') }}" method="GET">
            <div class="flex items-center justify-between mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
        
                <!-- Dropdown 1: Gender -->
                <div class="relative w-full">
                    <select id="gender_category" name="gender_category" class="block w-full p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option hidden value="">Select Gender</option>
                        <option value="boys" {{ request('gender_category') == 'boys' ? 'selected' : '' }}>Boys</option>
                        <option value="girls" {{ request('gender_category') == 'girls' ? 'selected' : '' }}>Girls</option>
                    </select>
                </div>
        
                <!-- Dropdown 2: Type -->
                <div class="relative w-full">
                    <select id="type_category" name="type_category" class="block w-full p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option hidden value="">Select Type</option>
                        <option value="tops" {{ request('type_category') == 'tops' ? 'selected' : '' }}>Tops</option>
                        <option value="bottoms" {{ request('type_category') == 'bottoms' ? 'selected' : '' }}>Bottoms</option>
                        <option value="sets" {{ request('type_category') == 'sets' ? 'selected' : '' }}>Sets</option>
                        <option value="dresses" {{ request('type_category') == 'dresses' ? 'selected' : '' }}>Dresses</option>
                        <option value="overalls" {{ request('type_category') == 'overalls' ? 'selected' : '' }}>Overalls</option>
                        <option value="loungewears" {{ request('type_category') == 'loungewears' ? 'selected' : '' }}>Loungewears</option>
                        <option value="outerwears" {{ request('type_category') == 'outerwears' ? 'selected' : '' }}>Outerwears</option>
                    </select>
                </div>
        
                <!-- Dropdown 3: Age -->
                <div class="relative w-full">
                    <select id="age_category" name="age_category" class="block w-full p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option hidden value="">Select Age</option>
                        <option value="2-4 yrs" {{ request('age_category') == '2-4 yrs' ? 'selected' : '' }}>2-4 yrs</option>
                        <option value="5-9 yrs" {{ request('age_category') == '5-9 yrs' ? 'selected' : '' }}>5-9 yrs</option>
                        <option value="10-15 yrs" {{ request('age_category') == '10-15 yrs' ? 'selected' : '' }}>10-15 yrs</option>
                    </select>
                </div>
        
                <!-- Submit Button -->
                <div class="relative w-full">
                    <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Apply Filter</button>
                </div>
            </div>
        </form>
       
          {{-- add new product --}}
          <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
            <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">All Products</h2>
            <!-- Modal toggle -->
            <div class="flex justify-end m-5">
              <button id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="text-white inline-flex items-center bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-700">
                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add new product
              </button>
            </div>
          </div>

          <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Create Product
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('product.submit') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                          <input type="string" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ex. Soccer T-Shirt" autocomplete="off">
                        </div>
                        <div>
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                          <input type="string" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ex. Rp99.000" autocomplete="off">
                        </div>
                        <div>
                          <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                          <input type="integer" name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ex. 5" autocomplete="off">
                        </div>
                        <div>
                          <label for="gender_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                          <select name="gender_category_id" id="gender_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option hidden selected="">Select</option>
                            <option value="1">Boys</option>
                            <option value="2">Girls</option>
                          </select>
                        </div>
                        <div>
                          <label for="type_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                          <select name="type_category_id" id="type_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option hidden selected="">Select</option>
                            <option value="1">Tops</option>
                            <option value="2">Bottoms</option>
                            <option value="3">Sets</option>
                            <option value="4">Dresses</option>
                            <option value="5">Overalls</option>
                            <option value="6">Loungewears</option>
                            <option value="7">Outerwears</option>
                          </select>
                        </div>
                        <div>
                          <label for="age_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                          <select name="age_category_id" id="age_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option hidden selected="">Select</option>
                            <option value="1">2-4 yrs</option>
                            <option value="2">5-9 yrs</option>
                            <option value="3">10-15 yrs</option>
                          </select>
                        </div>
                        <div>
                          <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                          <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                        </div>
                        <div class="sm:col-span-2">
                          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                          <textarea name="description" id="description" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write a description..."></textarea>                    
                        </div>
                      </div>
                      <div class="flex items-center space-x-4">
                          <button type="submit" class="btn btn-primary text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                              Create
                          </button>
                          <button data-modal-toggle="defaultModal" type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                              Cancel
                          </button>
                      </div>
                    </form>
                </div>
            </div>
          </div>

          {{-- product cards --}}
          <div class="mb-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse($products as $product)
              <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="h-56 w-full flex items-center justify-center">
                  <a href="/products/{{ $product->slug }}">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-40">
                  </a>
                </div>
                <div class="pt-6">
                  <div class="flex flex-wrap justify-start items-center gap-2 mb-5 text-gray-500">
                    <!-- Gender Category -->
                    <a href="/products?gender_category={{ $product->gender_category->slug }}">
                      <span class="bg-yellow-100 text-yellow-700 text-xs font-medium inline-flex items-center px-3 py-1 rounded-full dark:bg-primary-200 dark:text-primary-800 hover:bg-yellow-200 transition-colors">
                        {{ $product->gender_category->name }}
                      </span>
                    </a>
                    <!-- Type Category -->
                    <a href="/products?type_category={{ $product->type_category->slug }}">
                      <span class="bg-yellow-100 text-yellow-700 text-xs font-medium inline-flex items-center px-3 py-1 rounded-full dark:bg-primary-200 dark:text-primary-800 hover:bg-yellow-200 transition-colors">
                        {{ $product->type_category->name }}
                      </span>
                    </a>
                    <!-- Age Category -->
                    <a href="/products?age_category={{ $product->age_category->slug }}">
                      <span class="bg-yellow-100 text-yellow-700 text-xs font-medium inline-flex items-center px-3 py-1 rounded-full dark:bg-primary-200 dark:text-primary-800 hover:bg-yellow-200 transition-colors">
                        {{ $product->age_category->name }}
                      </span>
                    </a>
                  </div>
          
                  <a href="/products/{{ $product->slug }}" class="text-xl font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                    {{ $product->name }}
                  </a>

                  <p class="text-sm">Stock: {{ $product->stock }}</p>
          
                  <div class="mt-4 flex items-center justify-between gap-4">
                    <p class="text-xl font-extrabold leading-tight text-gray-900 dark:text-white">{{ $product->price }}</p>
          
                    <a href="/products/{{ $product->slug }}" class="inline-flex items-center rounded-lg bg-primary-700 px-2 py-2.5 text-sm font-medium text-white hover:bg-primary-500 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                      View details
                    </a>
                  </div>
                </div>
              </div>
            @empty
            <div>
                <p class="font-semibold text-xl my-4">No products available.</p>       
            </div>
            @endforelse
          </div>         
        </div>
      </section>
</x-layout>