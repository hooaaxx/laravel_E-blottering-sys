<x-brgy-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold p-3 text-xl text-gray-800 leading-tight">
                        Edit Blotter
                    </h2>
                    <form method="POST" action="{{ route('brgy.approved.update', $blotter->id) }}">
                        @csrf
                        @method('PUT')

                        {{-- COMPLAINANT --}}
                        <div class="p-7 bg-gray-300 border-b border-gray-200">
                            <h2 class="mb-6 text-sm font-bold text-blue-900 uppercase dark:text-black">complainant</h2>
                            <div class="grid xl:grid-cols-2 xl:gap-7">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input
                                        type="text"
                                        name="complainant_firstname"
                                        id="floating_first_name"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" "
                                        value="{{ $blotter->complainant_firstname }}"
                                        required />
                                    <label
                                        for="floating_first_name"
                                        class="peer-focus:font-medium absolute text-sm text-black dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                    >
                                        First name
                                    </label>
                                    @error('complainant_firstname') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <input
                                        type="text"
                                        name="complainant_lastname"
                                        id="floating_last_name"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" "
                                        value="{{ $blotter->complainant_lastname }}"
                                        required />
                                    <label
                                        for="floating_last_name"
                                        class="peer-focus:font-medium absolute text-sm text-black dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                    >
                                        Last name
                                    </label>
                                    @error('complainant_lastname') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input
                                        type="tel"
                                        name="complainant_number"
                                        id="floating_phone"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" "
                                        value="{{ $blotter->complainant_number }}"
                                        required />
                                    <label
                                        for="floating_phone"
                                        class="peer-focus:font-medium absolute text-sm text-black dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                    >
                                        Phone number
                                    </label>
                                    @error('complainant_number') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <input
                                        type="text"
                                        name="complainant_address"
                                        id="floating_company"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" "
                                        value="{{ $blotter->complainant_address }}"
                                        required />
                                    <label
                                        for="floating_company"
                                        class="peer-focus:font-medium absolute text-sm text-black dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                    >
                                        Address
                                    </label>
                                    @error('complainant_address') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        {{-- RESPONDENT --}}
                        <div class="p-7 bg-gray-300 border-b border-gray-200">
                            <h2 class="mb-6 text-sm font-bold text-blue-900 uppercase dark:text-black">respondent</h2>
                            <div class="grid xl:grid-cols-2 xl:gap-7">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input
                                        type="text"
                                        name="respondent_firstname"
                                        id="floating_first_name"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" "
                                        value="{{ $blotter->respondent_firstname }}"
                                        required />
                                    <label
                                        for="floating_first_name"
                                        class="peer-focus:font-medium absolute text-sm text-black dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                    >
                                        First name
                                    </label>
                                    @error('respondent_firstname') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <input
                                        type="text"
                                        name="respondent_lastname"
                                        id="floating_last_name"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" "
                                        value="{{ $blotter->respondent_lastname }}"
                                        required />
                                    <label
                                        for="floating_last_name"
                                        class="peer-focus:font-medium absolute text-sm text-black dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                    >
                                        Last name
                                    </label>
                                    @error('respondent_lastname') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input
                                        type="tel"
                                        name="respondent_number"
                                        id="floating_phone"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" "
                                        value="{{ $blotter->respondent_number }}"
                                        required />
                                    <label
                                        for="floating_phone"
                                        class="peer-focus:font-medium absolute text-sm text-black dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                    >
                                        Phone number
                                    </label>
                                    @error('respondent_number') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <input
                                        type="text"
                                        name="respondent_address"
                                        id="floating_company"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" "
                                        value="{{ $blotter->respondent_address }}"
                                        required />
                                    <label
                                        for="floating_company"
                                        class="peer-focus:font-medium absolute text-sm text-black dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                    >
                                        Address
                                    </label>
                                    @error('respondent_address') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        {{-- STATEMENT --}}
                        <div class="p-7 bg-gray-300 border-b border-gray-200">
                            <h2 class="mb-6 text-sm font-bold text-blue-900 uppercase dark:text-black">statement</h2>
                            <div class="relative z-0 w-full mb-6 group">
                                <input 
                                    type="text"
                                    name="when"
                                    id="when"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
                                    placeholder=" "
                                    value="{{ $blotter->when }}"
                                >
                                <label
                                    for="when"
                                    class="peer-focus:font-medium absolute text-sm text-black dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                >
                                    When
                                </label>
                                @error('when') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input
                                    type="text"
                                    name="where"
                                    id="where"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" "
                                    value="{{ $blotter->where }}"
                                    required>
                                <label
                                    for="where"
                                    class="peer-focus:font-medium absolute text-sm text-black dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                >
                                    Where
                                </label>
                                @error('where') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <textarea
                                    name="what"
                                    id="what"
                                    rows="4"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" "
                                    required
                                >{{ $blotter->what }}</textarea>
                                <label
                                    for="what"
                                    class="peer-focus:font-medium absolute text-sm text-black dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                >
                                    What
                                </label>
                                @error('what') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <button
                                type="submit"
                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                            >
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
        <script>
            new Pikaday({
                field: document.getElementById('when'),
                format: 'YYYY-MM-DD'
            })
        </script>
    @endsection
</x-brgy-layout>
