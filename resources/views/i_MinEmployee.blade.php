@extends('layouts.admin')

@section('title', 'Interactive Visualization')

@push('head-script')
    <script
        src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js">
    </script>
    <title>CodePen - D3 Packed Bubble Chart</title>
    <link rel="canonical" href="https://codepen.io/kendsnyder/pen/vPmQbY">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i");

        body {
            background-color: #e0e0e0;
        }

        select,
        input {
            font: 14px Arial;
        }

        h3 {
            font-size: 16px;
            margin: 15px 0 4px 0;
            padding: 0;
        }

        .first-h3 {
            margin-top: 0;
        }

        fieldset {
            float: left;
            padding: 15px;
            margin: 0;
            background-color: white;
            border: 1px solid #bbb;
        }

        legend {
            background-color: white;
            padding: 3px 8px;
            border: 1px solid #bbb;
        }

        #container {
            width: 960px;
            margin: 0 auto;
            background-color: #e0e0e0;
        }

        .bubble-label {
            text-align: center;
            font-family: Roboto, Arial;
            font-weight: 400;
            line-height: 1.2;
            cursor: default;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .bubble-value {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 300;
            cursor: default;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        button {
            clear: left;
            font-size: 16px;
            margin-top: 10px;
            border-radius: 5px;
            padding: 8px 15px;
            background-color: white;
            border: 1px solid #bbb;
        }

        text {
            fill: #fff;
            transition: all 0.3s;
            text-overflow: ellipsis;
        }

        .label {
            fill: #000;
        }

        .chart {
            margin: 0 auto;
            max-width: 400px;
        }

        .chart-svg {
            width: 100%;
            height: 100%;
        }

        .node {
            cursor: default;
        }

        .node:nth-child(1) .graph {
            -webkit-animation-delay: 0.033s;
            animation-delay: 0.033s;
        }

        .node:nth-child(2) .graph {
            -webkit-animation-delay: 0.066s;
            animation-delay: 0.066s;
        }

        .node:nth-child(3) .graph {
            -webkit-animation-delay: 0.099s;
            animation-delay: 0.099s;
        }

        .node:nth-child(4) .graph {
            -webkit-animation-delay: 0.132s;
            animation-delay: 0.132s;
        }

        .node:nth-child(5) .graph {
            -webkit-animation-delay: 0.165s;
            animation-delay: 0.165s;
        }

        .node:nth-child(6) .graph {
            -webkit-animation-delay: 0.198s;
            animation-delay: 0.198s;
        }

        .node:nth-child(7) .graph {
            -webkit-animation-delay: 0.231s;
            animation-delay: 0.231s;
        }

        .node:nth-child(8) .graph {
            -webkit-animation-delay: 0.264s;
            animation-delay: 0.264s;
        }

        .node:nth-child(9) .graph {
            -webkit-animation-delay: 0.297s;
            animation-delay: 0.297s;
        }

        .node:nth-child(10) .graph {
            -webkit-animation-delay: 0.33s;
            animation-delay: 0.33s;
        }

        .node:nth-child(11) .graph {
            -webkit-animation-delay: 0.363s;
            animation-delay: 0.363s;
        }

        .node:nth-child(12) .graph {
            -webkit-animation-delay: 0.396s;
            animation-delay: 0.396s;
        }

        .node:nth-child(13) .graph {
            -webkit-animation-delay: 0.429s;
            animation-delay: 0.429s;
        }

        .node:nth-child(14) .graph {
            -webkit-animation-delay: 0.462s;
            animation-delay: 0.462s;
        }

        .node:nth-child(15) .graph {
            -webkit-animation-delay: 0.495s;
            animation-delay: 0.495s;
        }

        .node:nth-child(16) .graph {
            -webkit-animation-delay: 0.528s;
            animation-delay: 0.528s;
        }

        .node:nth-child(17) .graph {
            -webkit-animation-delay: 0.561s;
            animation-delay: 0.561s;
        }

        .node:nth-child(18) .graph {
            -webkit-animation-delay: 0.594s;
            animation-delay: 0.594s;
        }

        .node:nth-child(19) .graph {
            -webkit-animation-delay: 0.627s;
            animation-delay: 0.627s;
        }

        .node:nth-child(20) .graph {
            -webkit-animation-delay: 0.66s;
            animation-delay: 0.66s;
        }

        .node:nth-child(21) .graph {
            -webkit-animation-delay: 0.693s;
            animation-delay: 0.693s;
        }

        .node:nth-child(22) .graph {
            -webkit-animation-delay: 0.726s;
            animation-delay: 0.726s;
        }

        .node:nth-child(23) .graph {
            -webkit-animation-delay: 0.759s;
            animation-delay: 0.759s;
        }

        .node:nth-child(24) .graph {
            -webkit-animation-delay: 0.792s;
            animation-delay: 0.792s;
        }

        .node:nth-child(25) .graph {
            -webkit-animation-delay: 0.825s;
            animation-delay: 0.825s;
        }

        .node:nth-child(26) .graph {
            -webkit-animation-delay: 0.858s;
            animation-delay: 0.858s;
        }

        .node:nth-child(27) .graph {
            -webkit-animation-delay: 0.891s;
            animation-delay: 0.891s;
        }

        .node:nth-child(28) .graph {
            -webkit-animation-delay: 0.924s;
            animation-delay: 0.924s;
        }

        .node:nth-child(29) .graph {
            -webkit-animation-delay: 0.957s;
            animation-delay: 0.957s;
        }

        .node:nth-child(30) .graph {
            -webkit-animation-delay: 0.99s;
            animation-delay: 0.99s;
        }

        .node circle {
            transition: transform 200ms ease-in-out;
        }

        .node:hover circle {
            transform: scale(1.05);
        }

        .graph {
            opacity: 0;
            -webkit-animation-name: animateIn;
            animation-name: animateIn;
            -webkit-animation-duration: 900ms;
            animation-duration: 900ms;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            -webkit-animation-timing-function: cubic-bezier(0.7, 0.85, 0.41, 1.21);
            animation-timing-function: cubic-bezier(0.7, 0.85, 0.41, 1.21);
        }

        @-webkit-keyframes animateIn {
            0% {
                opacity: 0;
                transform: scale(0.5) rotate(-8deg);
            }

            100% {
                opacity: 1;
                transform: scale(1) rotate(0);
            }
        }

        @keyframes animateIn {
            0% {
                opacity: 0;
                transform: scale(0.5) rotate(-8deg);
            }

            100% {
                opacity: 1;
                transform: scale(1) rotate(0);
            }
        }

        .d3-tip-outer {
            position: relative;
        }

        .d3-tip {
            font-family: Roboto, sans-serif;
            font-size: 18px;
            font-weight: 100;
            line-height: 1;
            padding: 16px 20px;
            color: #fff;
            border-radius: 6px;
        }

        .d3-stem {
            width: 0;
            height: 0;
            position: absolute;
            bottom: -45px;
            left: 55%;
            border-style: solid;
            border-width: 48px 15px 0 0;
            transform: rotate(17deg);
            transform-origin: 100% 0;
            z-index: 2;
        }
    </style>

    <script>
        window.console = window.console || function(t) {};
    </script>
@endpush


@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0" style="font-weight: 600;">
                <i class="fa-solid fa-user-tie  fa-lg me-2"></i>
                Min Employee / Activities
            </h4>
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
                <i class="fas fa-fw fa-chart-area"></i>
                Data Visualization
            </h1>
        </div>


        <fieldset style="display: flex; flex-direction: column;">
            <legend>Graph Options</legend>
            <h3 class="first-h3">Min Employee</h3>
            <div style="display: flex; flex-direction: column;">
                <select id="limit" style="width: 100%; max-width: 170px;">
                    <!-- Activity options will be populated here -->
                </select>
            </div>
        </fieldset>

        <div id="chart" class="chart ">
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.2.8/d3.min.js"></script>
        <script src="https://d3js.org/d3-hierarchy.v1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3-legend/2.19.0/d3-legend.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3-tip/0.9.1/d3-tip.min.js"></script>


        <script>
            var activities = {!! $activities !!};
            var activityData = {!! $activityData !!};
            const limitSelect = document.querySelector('#limit');

            // Filter activity dropdown based on minimum employee count
            const minEmployeeCount = Math.min(...activityData.map(data => data.employee_count));
            activities = activities.filter(activity => {
                const employeeCount = activityData.find(data => data.activity === activity)?.employee_count ?? 0;
                return employeeCount === minEmployeeCount;
            });

            // Populate dropdown with filtered activity names and employee counts
            activities.forEach(activity => {
                const option = document.createElement('option');
                const employeeCount = activityData.find(data => data.activity === activity)?.employee_count ?? 0;
                option.value = activity;
                option.textContent = `${activity} (${employeeCount} employees)`;
                limitSelect.appendChild(option);
            });

            limitSelect.addEventListener('change', render);

            render();

            function render() {
                const selectedActivity = limitSelect.options[limitSelect.selectedIndex].value;
                let filteredData = activityData.filter(item => item.activity === selectedActivity);

                document.querySelector('#chart').innerHTML = '';

                var diameter = 200,
                    color = d3.scaleOrdinal(d3.schemeCategory20c);

                var bubble = d3.pack()
                    .size([diameter, diameter])
                    .padding(0);

                var svg = d3.select('#chart').append('svg')
                    .attr('viewBox', '0 0 ' + diameter + ' ' + diameter)
                    .attr('width', diameter)
                    .attr('height', diameter)
                    .attr('class', 'chart-svg');

                var root = d3.hierarchy({
                        children: filteredData
                    })
                    .sum(function(d) {
                        return 1; // Each node has equal size
                    });

                bubble(root);

                var node = svg.selectAll('.node')
                    .data(root.children)
                    .enter()
                    .append('g').attr('class', 'node')
                    .attr('transform', function(d) {
                        return 'translate(' + d.x + ' ' + d.y + ')';
                    });

                node.append("circle")
                    .attr("r", function(d) {
                        return d.r;
                    })
                    .style("fill", function(d, i) {
                        return getColor(i, filteredData.length);
                    });

                node.append("text")
                    .attr("dy", "0.2em")
                    .style("text-anchor", "middle")
                    .style('font-family', 'Roboto')
                    .style('font-weight', 'bold')
                    .style('font-size', getFontSizeForItem)
                    .text(d => truncate(d.data.name)) // Use employee name as text on the bubble
                    .style("fill", "black")
                    .style('pointer-events', 'none');

                function truncate(label) {
                    const max = 15;
                    if (label.length > max) {
                        label = label.slice(0, max) + '...';
                    }
                    return label;
                }

                function getColor(idx, total) {
                    const hue = (360 * idx / total) % 360;
                    return `hsl(${hue}, 70%, 50%)`;
                }

                function getFontSizeForItem(d) {
                    return Math.max(11, Math.min(24, 24 * d.r / diameter)) + 'px';
                }
            }
        </script>

    </div>
    <!-- /.container-fluid -->

    @if (session('openModal'))
        <script>
            let modal = "{{ session('openModal') }}";
            setTimeout(function() {
                $('#' + modal).modal('show');
            }, 2000);
        </script>
    @endif

@endsection
