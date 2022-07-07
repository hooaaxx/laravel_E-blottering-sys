<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="shadow-lg rounded-lg overflow-hidden">
                        <!-- start::Line Chart -->
                        <div class="bg-white p-4 rounded-lg shadow-xl py-8 mt-12">
                            <h4 class="text-xl capitalize">Reports Chart</h4>
                            <div class="mt-6">
                                <canvas id="myChart"></canvas>
                                <select id="date" onchange="timeFrame()">
                                    <option value="month">Month</option>
                                    <option value="year">Year</option>
                                </select>

                                <select id="report" onchange="timeFrame()">
                                    <option value="all">all</option>
                                    <option value="provincial">provincial</option>
                                    <option value="municipal">municipal</option>
                                    <option value="brgy">brgy</option>
                                </select>
                            </div>
                        </div>
                        <!-- end::Line Chart -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

        
        <!-- ALL CHART DATA -->
        <script>

            // ALL REPORTS
            const labelMonth = 'Monthly Reports';
            const monthData = [
                @foreach ($monthly as $month)
                    {{$month->count}},
                @endforeach
            ];
            const monthLabel = [
                @foreach ($monthly as $month)
                    '{{$month->monthname}}',
                @endforeach
            ];

            const labelYear = 'Yearly Reports';
            const yearData = [
                @foreach ($yearly as $year)
                    {{$year->count}},
                @endforeach
            ];
            const yearLabel = [
                @foreach ($yearly as $year)
                    '{{$year->year}}',
                @endforeach
            ];

            // PROVINCIAL REPORTS
            const provincial_labelMonth = 'Provincial Monthly Reports';
            const provincial_monthData = [
                @foreach ($provincial_monthly as $provincial_month)
                    {{$provincial_month->count}},
                @endforeach
            ];
            const provincial_monthLabel = [
                @foreach ($provincial_monthly as $provincial_month)
                    '{{$provincial_month->monthname}}',
                @endforeach
            ];

            const provincial_labelYear = 'Provincial Yearly Reports';
            const provincial_yearData = [
                @foreach ($provincial_yearly as $provincial_year)
                    {{$provincial_year->count}},
                @endforeach
            ];
            const provincial_yearLabel = [
                @foreach ($provincial_yearly as $provincial_year)
                    '{{$provincial_year->year}}',
                @endforeach
            ];

            // MUNICIPAL REPORTS
            const municipal_labelMonth = 'Municipal Monthly Reports';
            const municipal_monthData = [
                @foreach ($municipal_monthly as $municipal_month)
                    {{$municipal_month->count}},
                @endforeach
            ];
            const municipal_monthLabel = [
                @foreach ($municipal_monthly as $municipal_month)
                    '{{$municipal_month->monthname}}',
                @endforeach
            ];

            const municipal_labelYear = 'Municipal Yearly Reports';
            const municipal_yearData = [
                @foreach ($municipal_yearly as $municipal_year)
                    {{$municipal_year->count}},
                @endforeach
            ];
            const municipal_yearLabel = [
                @foreach ($municipal_yearly as $municipal_year)
                    '{{$municipal_year->year}}',
                @endforeach
            ];

            // BRGY REPORTS
            const brgy_labelMonth = 'Barangay Monthly Reports';
            const brgy_monthData = [
                @foreach ($brgy_monthly as $brgy_month)
                    {{$brgy_month->count}},
                @endforeach
            ];
            const brgy_monthLabel = [
                @foreach ($brgy_monthly as $brgy_month)
                    '{{$brgy_month->monthname}}',
                @endforeach
            ];

            const brgy_labelYear = 'Barangay Yearly Reports';
            const brgy_yearData = [
                @foreach ($brgy_yearly as $brgy_year)
                    {{$brgy_year->count}},
                @endforeach
            ];
            const brgy_yearLabel = [
                @foreach ($brgy_yearly as $brgy_year)
                    '{{$brgy_year->year}}',
                @endforeach
            ];

            function timeFrame(){
                const date = document.getElementById('date').value;
                const report =  document.getElementById('report').value;
                console.log(date);
                console.log(report);
                // ALL REPORTS
                if(date === 'month' && report === 'all'){
                    myChart.config.data.datasets[0].data = monthData;
                    myChart.config.data.labels = monthLabel;
                    myChart.config.data.datasets[0].label = labelMonth;
                }
                if(date === 'year' && report === 'all'){
                    myChart.config.data.datasets[0].data = yearData;
                    myChart.config.data.labels = yearLabel;
                    myChart.config.data.datasets[0].label = labelYear;
                }

                // PROVINCIAL REPORT
                if(date === 'month' && report === 'provincial'){
                    myChart.config.data.datasets[0].data = provincial_monthData;
                    myChart.config.data.labels = provincial_monthLabel;
                    myChart.config.data.datasets[0].label = provincial_labelMonth;
                }
                if(date === 'year' && report === 'provincial'){
                    myChart.config.data.datasets[0].data = provincial_yearData;
                    myChart.config.data.labels = provincial_yearLabel;
                    myChart.config.data.datasets[0].label = provincial_labelYear;
                }

                // MUNICIPAL REPORT
                if(date === 'month' && report === 'municipal'){
                    myChart.config.data.datasets[0].data = municipal_monthData;
                    myChart.config.data.labels = municipal_monthLabel;
                    myChart.config.data.datasets[0].label = municipal_labelMonth;
                }
                if(date === 'year' && report === 'municipal'){
                    myChart.config.data.datasets[0].data = municipal_yearData;
                    myChart.config.data.labels = municipal_yearLabel;
                    myChart.config.data.datasets[0].label = municipal_labelYear;
                }

                // BARANGAY REPORT
                if(date === 'month' && report === 'brgy'){
                    myChart.config.data.datasets[0].data = brgy_monthData;
                    myChart.config.data.labels = brgy_monthLabel;
                    myChart.config.data.datasets[0].label = brgy_labelMonth;
                }
                if(date === 'year' && report === 'brgy'){
                    myChart.config.data.datasets[0].data = brgy_yearData;
                    myChart.config.data.labels = brgy_yearLabel;
                    myChart.config.data.datasets[0].label = brgy_labelYear;
                }

                myChart.update();
            }
        </script>
        
        {{-- ALL CHART SETUP --}}
        <script src="{{ asset('js/allchartsreport.js') }}" defer></script>
    @endsection
</x-admin-layout>
