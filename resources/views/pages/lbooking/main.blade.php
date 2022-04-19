<x-office-layout title="Laporan Booking">
    <!-- Small boxes (Stat box) -->
    <div id="content_list">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Booking</h3>
                        <div class="card-tools" style="margin-right:1%;margin-top:0.4%;">
                            <form id="content_filter">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="date" name="start" onchange="load_list(1);" class="form-control float-right" placeholder="Search">
                                </div>
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="date" name="end" onchange="load_list(1);" class="form-control float-right" placeholder="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div id="list_result"></div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <div id="content_input"></div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-office-layout>