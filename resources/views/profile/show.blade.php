@extends('layouts.app')

@section('title')
Личный кабинет
@endsection

@section('content')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<div class="flex-show">
    <div class="show">
        @if($user->avatar)
        <img class="pt-8 rounded-xl" src="data:image/jpeg;base64,{{ base64_encode($user->avatar) }}" alt="Аватар" width="100">
        @else
        <img class="pt-8 rounded-xl" src="{{ asset('image/show/profile.svg') }}" alt="Аватар">
        @endif
        <p class="text-white">{{ $user->name }}</p>
        <p class="text-white text-sm font-thin">{{ $user->email }}</p>
        <button class="custom text-white font-light"><a href="{{ route('profile.edit') }}" class="btn btn-danger text-white font-light">Редактировать профиль</a></button>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="custom text-white font-light" type="submit" class="btn btn-danger">Выйти</button>
        </form>
    </div>

    @if ($user->is_admin==1)
    <div class="diagram">
        <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between">
                <div>
                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Заказы за эту неделю</h5>
                </div>
            </div>
            <div id="area-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                    <p>Last 7 days</p>
                </div>
            </div>
        </div>
        <!-- отчет ворд -->
        <div class="mt-4">
            <button class="custom-btn text-white"><a href="{{ route('admin.download-report') }}" class="btn btn-primary">Скачать отчет</a></button>
        </div>
    </div>
    <script>
        const options = {
            chart: {
                height: "100%",
                maxWidth: "100%",
                type: "area",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            tooltip: {
                enabled: true,
                x: {
                    show: false,
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 6,
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: 0
                },
            },
            series: [{
                name: "Orders",
                data: @json($orderCounts), // Pass order counts
                color: "#1A56DB",
            }, ],
            xaxis: {
                categories: @json($dates), // Pass dates
                labels: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
        }

        if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("area-chart"), options);
            chart.render();
        }
    </script>
    @endif
</div>
@endsection