<x-municipal-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="p-4">
                            <form method="GET" action="{{ route('municipal.brgyblotter.index') }}">
                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative mt-1">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input type="text" name="search" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                                </div>
                                <button
                                    type="submit"
                                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                >
                                    Submit
                                </button>
                            </form>
                        </div>
                        <h2 class="font-semibold p-3 text-xl text-gray-800 leading-tight">
                            Complainant Details
                        </h2>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        User Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Case Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Full name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Phone number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blotters as $blot)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <img src="{{ asset($blot->complainant_img) }}" width= '50' height='50' class="img img-responsive" />
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $blot->user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $blot->case_number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $blot->complainant_lastname }}, {{ $blot->complainant_firstname }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $blot->complainant_number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $blot->complainant_address }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="inline-flex rounded-md shadow-sm" role="group">
                                            <a
                                                href="{{ route('municipal.brgyblotter.show', $blot->id) }}"
                                                class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-l-lg border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256" xml:space="preserve">
                                                    
                                                    <g transform="translate(128 128) scale(0.72 0.72)" style="">
                                                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)" >
                                                        <path d="M 45 63.546 c -12.479 0 -24.958 -5.411 -37.349 -16.231 L 5 45 l 2.651 -2.314 c 24.784 -21.643 49.916 -21.641 74.699 0 L 85 45 l -2.651 2.314 C 69.958 58.135 57.479 63.546 45 63.546 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(216,236,254); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                        <circle cx="50.355000000000004" cy="39.515" r="7.105" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) "/>
                                                        <path d="M 45 65.864 c -14.039 0 -28.078 -6.087 -42.018 -18.26 L 0 45 l 2.982 -2.604 c 27.882 -24.348 56.156 -24.346 84.036 0 L 90 45 l -2.982 2.604 C 73.078 59.777 59.039 65.864 45 65.864 z M 10.636 45 c 23.09 18.544 45.64 18.544 68.728 0 C 56.276 26.457 33.725 26.456 10.636 45 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(216,236,254); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                        <path d="M 45 27.715 c -7.664 0 -13.877 6.213 -13.877 13.877 c 0 7.664 6.213 13.877 13.877 13.877 s 13.877 -6.213 13.877 -13.877 C 58.877 33.928 52.664 27.715 45 27.715 z M 51.073 44.188 c -2.878 0 -5.212 -2.333 -5.212 -5.212 c 0 -2.878 2.333 -5.212 5.212 -5.212 c 2.878 0 5.212 2.333 5.212 5.212 C 56.285 41.855 53.951 44.188 51.073 44.188 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0, 0, 0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                    </g>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $blotters->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-municipal-layout>
