<x-office-layout title="Promosi">
    <!-- Small boxes (Stat box) -->
    <div id="content_list">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Promosi</h3>
                        <a href="javascript:;" onclick="load_input('{{route('office.promosi.create')}}');" class="btn btn-sm btn-primary" style="float:right;">
                            <i class="fas fa-plus"></i>
                        </a>
                        <div class="card-tools" style="margin-right:1%;margin-top:0.4%;">
                            <form id="content_filter">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="keyword" onkeyup="load_list(1);" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="button" onclick="load_list(1);" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
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