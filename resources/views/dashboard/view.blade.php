<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <x-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')">
                Create Blotter
            </x-nav-link>
            <x-nav-link :href="route('dashboard.view')" :active="request()->routeIs('dashboard.view')">
                View Blotter
            </x-nav-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="GET" action="{{ route('dashboard.view') }}">
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
                    <h2 class="font-semibold p-3 text-xl text-gray-800 leading-tight">
                        Respondent Details
                    </h2>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Approved
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Image
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
                            @if ($blotters->isNotEmpty())
                                @foreach ($blotters as $blotter)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        @if ($blotter->approval === 'pending')
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30" height="30" viewBox="0 0 122.88 122.88" style="enable-background:new 0 0 122.88 122.88" xml:space="preserve">
                                                <style type="text/css"><![CDATA[
                                                    .st0{fill-rule:evenodd;clip-rule:evenodd;fill:#FF7900;}
                                                ]]></style>
                                                <g>
                                                    <path class="st0" d="M61.44,0c33.93,0,61.44,27.51,61.44,61.44c0,33.93-27.51,61.44-61.44,61.44C27.51,122.88,0,95.37,0,61.44 C0,27.51,27.51,0,61.44,0L61.44,0z M54.22,37.65c0-9.43,14.37-9.44,14.37,0.02v25.75l16.23,8.59c0.08,0.04,0.16,0.09,0.23,0.15 l0.14,0.1c7.54,4.94,0.53,16.81-7.53,12.15l-0.03-0.02L57.99,73.87c-2.3-1.23-3.79-3.67-3.79-6.29l0.01,0L54.22,37.65L54.22,37.65z"/>
                                                </g>
                                            </svg>
                                        @elseif($blotter->approval === 'revived')
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30" height="30" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
                                                <g><path d="M902.4,791.3c153.2-217.4,100.3-524.9-118-685.5C566.2-54.9,264-8.7,110.9,208.7l72,53C308.1,83.8,555.4,46,733.9,177.5c178.5,131.4,221.8,383,96.5,560.9C705.1,916.1,457.9,954,279.3,822.5l-50.5,71.7C447.1,1054.9,749.2,1008.7,902.4,791.3z"/><path d="M40.3,386.4L297.9,331L10,119.2L40.3,386.4L40.3,386.4z"/></g>
                                            </svg>
                                        @elseif($blotter->approval === 'approved')
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30" height="30" viewBox="0 0 96 96" enable-background="new 0 0 96 96" xml:space="preserve">
                                                <g>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#6BBE66" d="M48,0c26.51,0,48,21.49,48,48S74.51,96,48,96S0,74.51,0,48 S21.49,0,48,0L48,0z M26.764,49.277c0.644-3.734,4.906-5.813,8.269-3.79c0.305,0.182,0.596,0.398,0.867,0.646l0.026,0.025 c1.509,1.446,3.2,2.951,4.876,4.443l1.438,1.291l17.063-17.898c1.019-1.067,1.764-1.757,3.293-2.101 c5.235-1.155,8.916,5.244,5.206,9.155L46.536,63.366c-2.003,2.137-5.583,2.332-7.736,0.291c-1.234-1.146-2.576-2.312-3.933-3.489 c-2.35-2.042-4.747-4.125-6.701-6.187C26.993,52.809,26.487,50.89,26.764,49.277L26.764,49.277z"/>
                                                </g>
                                            </svg>
                                        @elseif($blotter->approval === 'closed')
                                            <svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" width="40" height="40" xmlns="http://www.w3.org/2000/svg">
                                                <path d="m503.07 166.53v178.99c0 18.122-14.705 32.816-32.828 32.816h-428.5c-18.122 0-32.816-14.693-32.816-32.816v-178.99c0-18.122 14.693-32.816 32.816-32.816h428.5c18.123 0 32.828 14.694 32.828 32.816z" fill="#E6E6E6"/>
                                                <path d="m503.07 166.53v178.99c0 18.122-14.705 32.816-32.828 32.816h-231.53l74.276-244.62h157.26c18.122-1e-3 32.827 14.693 32.827 32.815z" fill="#F2F2F2"/>
                                                <path d="m470.25 124.76h-68.064c-4.932 0-8.93 3.998-8.93 8.93s3.998 8.93 8.93 8.93h68.064c13.174 0 23.893 10.719 23.893 23.894v178.98c0 13.175-10.719 23.894-23.893 23.894h-428.49c-13.175 0-23.894-10.719-23.894-23.894v-12.423c0-4.932-3.998-8.93-8.93-8.93s-8.93 3.999-8.93 8.931v12.423c0 23.023 18.731 41.754 41.754 41.754h428.49c23.022 0 41.753-18.731 41.753-41.754v-178.98c0-23.023-18.731-41.754-41.753-41.754z"/>
                                                <path d="m8.93 312.23c4.932 0 8.93-3.998 8.93-8.93v-136.79c0-13.175 10.719-23.894 23.894-23.894h330.66c4.932 0 8.93-3.998 8.93-8.93s-3.998-8.93-8.93-8.93h-330.66c-23.023 0-41.754 18.731-41.754 41.754v136.79c0 4.932 3.998 8.93 8.93 8.93z"/>
                                                <path d="m100.32 216.92c10.602 0 19.227 8.625 19.227 19.227 0 4.932 3.998 8.93 8.93 8.93s8.93-3.998 8.93-8.93c0-20.45-16.638-37.088-37.088-37.088s-37.087 16.638-37.087 37.088v39.699c0 20.45 16.638 37.088 37.088 37.088s37.088-16.636 37.088-37.088c0-4.932-3.998-8.93-8.93-8.93s-8.93 3.998-8.93 8.93c0 10.602-8.625 19.227-19.227 19.227s-19.227-8.625-19.227-19.227v-39.698c-2e-3 -10.603 8.624-19.228 19.226-19.228z"/>
                                                <path d="m215.75 236.15v39.699c0 20.45 16.638 37.088 37.088 37.088s37.088-16.638 37.088-37.088v-39.699c0-20.45-16.638-37.088-37.088-37.088s-37.088 16.637-37.088 37.088zm56.317 0v39.699c0 10.602-8.625 19.227-19.227 19.227s-19.227-8.625-19.227-19.227v-39.699c0-10.602 8.625-19.227 19.227-19.227 10.601 0 19.227 8.624 19.227 19.227z"/>
                                                <path d="m161.98 199.06c-4.932 0-8.93 3.998-8.93 8.93v96.014c0 4.932 3.998 8.93 8.93 8.93h38.375c4.932 0 8.93-3.998 8.93-8.93s-3.998-8.93-8.93-8.93h-29.445v-87.084c0-4.932-3.998-8.93-8.93-8.93z"/>
                                                <path d="m395.76 312.94h44.084c4.932 0 8.93-3.998 8.93-8.93s-3.998-8.93-8.93-8.93h-35.154v-30.148h19.227c4.932 0 8.93-3.998 8.93-8.93s-3.998-8.93-8.93-8.93h-19.227v-30.147h35.154c4.932 0 8.93-3.998 8.93-8.93s-3.998-8.93-8.93-8.93h-44.084c-4.932 0-8.93 3.998-8.93 8.93v96.014c0 4.933 3.997 8.931 8.93 8.931z"/>
                                                <path d="m338.47 216.92h24.004c4.932 0 8.93-3.998 8.93-8.93s-3.998-8.93-8.93-8.93h-24.004c-18.159 0-32.934 14.774-32.934 32.934s14.774 32.934 32.934 32.934c8.311 0 15.074 6.762 15.074 15.073s-6.762 15.073-15.074 15.073h-24.003c-4.932 0-8.93 3.998-8.93 8.93s3.998 8.93 8.93 8.93h24.003c18.159 0 32.935-14.774 32.935-32.934 0-18.159-14.774-32.934-32.935-32.934-8.311 0-15.073-6.762-15.073-15.073s6.761-15.073 15.073-15.073z"/>
                                                <circle cx="469.12" cy="344.06" r="8.93"/>
                                                <circle cx="469.12" cy="167.94" r="8.93"/>
                                                <circle cx="42.865" cy="167.94" r="8.93"/>
                                                <circle cx="42.865" cy="344.06" r="8.93"/>
                                            </svg>
                                        @elseif($blotter->approval === 'passed')
                                            <svg width="40" height="40" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M24 25C28.9725 25 33 20.9725 33 16C33 11.0275 28.9725 7 24 7C19.0275 7 15 11.0275 15 16C15 20.9725 19.0275 25 24 25Z" fill="#333333"/>
                                                <path d="M16.8786 28.2001C17.3814 28.0774 17.8971 28.3283 18.1254 28.7927L22.1893 39.0646L22.786 32.0589C22.8276 31.7097 22.5612 31.4362 22.3125 31.1876C21.75 30.6251 21.75 28.3751 22.3125 27.8126C22.4927 27.6323 22.8462 27.6831 23.262 27.7429C23.495 27.7763 23.7474 27.8125 24 27.8125C24.2524 27.8125 24.505 27.7763 24.7379 27.7427C25.1537 27.683 25.5073 27.6323 25.6875 27.8126C26.25 28.3752 26.25 30.6251 25.6875 31.1876C25.4371 31.4379 25.173 31.7195 25.2149 32.0711L25.8105 39.0649L29.8746 28.7927C30.1029 28.3283 30.6186 28.0774 31.1214 28.2001C36.5255 29.5183 42 32.2063 42 36.25V43H6V36.25C6 32.2063 11.4745 29.5183 16.8786 28.2001Z" fill="#333333"/>
                                            </svg>
                                        @elseif ($blotter->approval === 'passed_to_provincial')
                                            <svg width="40" height="40" enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="189.63" y="502.52" width="132.74" height="9.481" fill="#263238"/>
                                                <path d="m445.63 388.74h-379.26v9.481l18.963 18.963h104.3l66.37 94.815 66.37-94.815h104.3l18.963-18.963v-9.481z" fill="#F44336"/>
                                                <path d="m426.67 0h-341.33l-18.963 18.963v369.78h379.26v-369.78l-18.963-18.963z" fill="#FFECB3"/>
                                                <rect x="189.63" y="37.926" width="132.74" height="350.82" fill="#01579B"/>
                                                <g fill="#FFC107">
                                                    <rect x="246.52" y="161.18" width="18.963" height="56.889"/>
                                                    <rect x="246.52" y="56.889" width="18.963" height="56.889"/>
                                                    <rect x="208.59" y="56.889" width="18.963" height="56.889"/>
                                                    <rect x="284.44" y="56.889" width="18.963" height="56.889"/>
                                                    <rect x="246.52" y="237.04" width="18.963" height="56.889"/>
                                                    <rect x="246.52" y="312.89" width="18.963" height="56.889"/>
                                                </g>
                                                <rect x="94.815" y="161.18" width="94.815" height="94.815" fill="#263238"/>
                                                <rect x="123.26" y="180.15" width="37.926" height="56.889" fill="#FFC107"/>
                                                <rect x="322.37" y="218.07" width="151.7" height="170.67" fill="#263238"/>
                                                <g fill="#FFC107">
                                                    <rect x="350.82" y="237.04" width="37.926" height="56.889"/>
                                                    <rect x="350.82" y="312.89" width="37.926" height="56.889"/>
                                                    <rect x="407.7" y="237.04" width="37.926" height="56.889"/>
                                                    <rect x="407.7" y="312.89" width="37.926" height="56.889"/>
                                                </g>
                                                <rect x="37.926" y="256" width="151.7" height="132.74" fill="#01579B"/>
                                                <g fill="#FFC107">
                                                    <rect x="66.37" y="312.89" width="37.926" height="56.889"/>
                                                    <rect x="123.26" y="312.89" width="37.926" height="56.889"/>
                                                </g>
                                            </svg>
                                        @endif
                                    </th>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset($blotter->respondent_img) }}" width= '50' height='50' class="img img-responsive" />
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $blotter->respondent_lastname }}, {{ $blotter->respondent_firstname }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $blotter->respondent_number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $blotter->respondent_address }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        @if (empty($blotter->case_number))
                                            <div class="inline-flex rounded-md shadow-sm" role="group">
                                                <a
                                                    href="{{ route('dashboard.blotter.edit', $blotter->id) }}"
                                                    class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-l-lg border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                                <form
                                                    method="POST"
                                                    action="{{ route('dashboard.blotter.destroy', $blotter->id) }}"
                                                    onsubmit="return confirm('Are you sure?');"
                                                >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        type="submit"
                                                        class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-r-md border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <a
                                                href="{{ route('dashboard.blotter.show', $blotter->id) }}"
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
                                        @endif
                                        
                                        {{-- <div class="inline-flex rounded-md shadow-sm" role="group">
                                            <button type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-l-lg border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                <svg class="mr-2 w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                                                Edit
                                            </button>
                                            <button type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-r-md border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                <svg class="mr-2 w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd"></path></svg>
                                                Delete
                                            </button>
                                         </div> --}}
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th>
                                        <h2>No blotter found</h2>
                                    </th>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $blotters->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
