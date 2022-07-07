<x-municipal-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($blotters as $blotter)
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Complainant Information</h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details.</p>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Complainant Picture</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <img src="{{ asset($blotter->complainant_img) }}" width= '90' height='90' class="img img-responsive" />
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Full name</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $blotter->complainant_lastname }}, {{ $blotter->complainant_firstname }}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Phone number</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $blotter->complainant_number }}
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Address</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $blotter->complainant_address }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Respondent Information</h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details.</p>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Respondent Picture</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <img src="{{ asset($blotter->respondent_img) }}" width= '90' height='90' class="img img-responsive" />
                                    </dd>
                                </div>

                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Full name</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $blotter->respondent_lastname }}, {{ $blotter->respondent_firstname }}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Phone number</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $blotter->respondent_number }}
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Address</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $blotter->respondent_address }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Complaint Information</h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Complaint details.</p>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">When</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $blotter->when }}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Where</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $blotter->where }}
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">What</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $blotter->what }}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Attachments</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <!-- Heroicon name: solid/paper-clip -->
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="ml-2 flex-1 w-0 truncate"> resume_back_end_developer.pdf </span>
                                                </div>
                                                <div class="ml-4 flex-shrink-0">
                                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> Download </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <div class="flex justify-between">
                            <form
                                method="POST" 
                                action="{{ route('municipal.municipalblotter.pass', $blotter->id) }}"
                                onsubmit="return confirm('Are you sure?');"
                            >
                                @csrf
                                @method('PUT')
                                <button
                                    type="submit"
                                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                >
                                    Pass to provincial
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-municipal-layout>
