@extends('app')

@section('content')
    <div class="block header-block header-with-bg">
        <div class="row header-with-icon">
            <h2><span><img src="{{url('images/ic_contractor.svg')}}"/></span>

                Contractors</h2>
        </div>
    </div>

    <div class="push-up-block  wide-header row">

        <div class="columns medium-6 small-12">
            <div class="header-description">
                <div class="big-header">
                    <div class="number big-amount">{!! count($contractors)  !!}</div>
                    <div class="big-title">Contractors</div>
                </div>
                <p>
                    Tenders are to invite bids for a project, or to accept a formal offer such as a takeover bid. Tender
                    usually refers to the process whereby governments and financial institutions invite bids for large
                    projects that must be submitted within a finite deadline.
                </p>
            </div>
        </div>

        <div class="columns medium-6 small-12">
            <div class="chart-section-wrap">
                <div class="each-chart-section">
                    <div class="section-header clearfix">
                        <form class="left-content">
                            <label>
                                <select id="select-goods">
                                    <option value="amount" selected>Based on value</option>
                                    <option value="count">Based on count</option>
                                </select>
                            </label>
                        </form>
                        <ul class="breadcrumbs right-content">
                            <p>Top 5 &nbsp;<span href="#" class="indicator">contractors</span>
                            </p>
                        </ul>
                    </div>
                    <div class="disabled-text">Click on label or graph bar to view in detail.</div>
                    <div class="chart-wrap">
                        <div id="barChart-contractors"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="row table-wrapper ">
        <table id="table_id" class="responsive hover custom-table display persist-area">
            <thead class="persist-header">
            <tr>
                <th>Name</th>
                <th>Tenders</th>
                <th>Scheme</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script type="text/javascript" class="init">
        $('#table_id').DataTable({
            "language": {
                'searchPlaceholder': "Search by contractors",
                "lengthMenu": "Show _MENU_ Contractors"
            },
            "processing": true,
            "serverSide": true,
            "ajax": '/api/contactorData',
            "ajaxDataProp": '',
            "columns": [
                {'data': '_id'},
                {'data': 'count'},
                {'data': 'scheme'},
            ],
            "fnDrawCallback": function () {
                changeDateFormat();
                numericFormat();
                createLinks();
            }
        });

        var createLinks = function () {

            $('#table_id tbody tr').each(function () {
                $(this).css('cursor', 'pointer');
                $(this).click(function () {
                    var contractId = $(this).find("td:first").text();
                    return window.location.assign(window.location.origin + "/contracts/contractor/" + contractId);
                });

            });
        };
    </script>
    <script src="{{url('js/vendorChart.min.js')}}"></script>
    <script src="{{url('js/customChart.min.js')}}"></script>

    <script>
        var contractors = '{!! $contractorsTrends  !!}';

        var makeCharts = function () {
            var widthOfParent = $('.chart-wrap').width();
            createBarChartProcuring(JSON.parse(contractors), "barChart-contractors", "contracts/contractor", widthOfParent, 'amount');
        };

        makeCharts();

        $(window).resize(function () {
            $("#linechart-homepage").empty();
            makeCharts();
        });

    </script>
@endsection