<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <!-- Content Header (Page header) -->
    <x-content-header heading="Dashboard" title="Dashboard" route-name="dashboard"/>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <x-card b-type="info" i-type="bag" detail="New Orders" count="500" />
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <x-card b-type="success" i-type="stats-bars" detail="Bounce Rate" count="20%" />
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <x-card b-type="warning" i-type="person-add" detail="User Registration" count="240" />
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <x-card b-type="danger" i-type="pie-graph" detail="Unique Visitors" count="1500" />
                </div>

            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Sales
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                    style="position: relative; height: 340px;">
                                    <canvas id="salesChart"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                    <!-- Map card -->
                    <div class="card bg-gradient-primary">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                Visitors
                            </h3>
                            <!-- card tools -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                    <i class="far fa-calendar-alt"></i>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <div class="card-body">
                            <div id="world-map" style="height: 250px; width: 100%;"></div>
                        </div>
                        <!-- /.card-body-->
                        <div class="card-footer bg-transparent">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <div id="sparkline-1"></div>
                                    <div class="text-white">Visitors</div>
                                </div>
                                <!-- ./col -->
                                <div class="col-4 text-center">
                                    <div id="sparkline-2"></div>
                                    <div class="text-white">Online</div>
                                </div>
                                <!-- ./col -->
                                <div class="col-4 text-center">
                                    <div id="sparkline-3"></div>
                                    <div class="text-white">Sales</div>
                                </div>
                                <!-- ./col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @push('script')
        <script>
            // var months = {!! json_encode($labels, JSON_HEX_TAG) !!};
            // var userCount = {!! json_encode($data, JSON_HEX_TAG) !!};
            // or,
            var months = {{ Js::from($labels) }};
            var userCount = {{ Js::from($data) }};

            const data = {
                labels: months,
                datasets: [{
                    label: 'Users Dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: userCount,
                }],
            };

            const config = {
                type: 'line',
                data: data,
                options: {}
            };

            const salesChart = new Chart(
                document.getElementById('salesChart'),
                config
            );
        </script>
    @endpush
</x-app-layout>
