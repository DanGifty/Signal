<div class="card bg-white rounded-md">
    <div class="card-body">
        <div class="flex-grow-1 container-p-y container-fluid">
            <div class="row">
                <div class="col-xl-3 mb-4 col-lg-7 col-12">
                    <div class="card h-100 bg-primary">
                        <div class="card-header">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title mb-0">Vourchers  Count</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>{{ $v_count }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-4 col-lg-7 col-12">
                    <div class="card h-100 bg-success">
                        <div class="card-header">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title mb-0">Vourchers Amount</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>{{ number_format($v_sum,2) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-4 col-lg-7 col-12">
                    <div class="card h-100 bg-info">
                        <div class="card-header">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title mb-0">Used  Amount</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>{{ $v_used }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-4 col-lg-7 col-12">
                    <div class="card h-100 bg-danger">
                        <div class="card-header">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title mb-0">Unused  Amount</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>{{ $v_unused }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="card bg-white rounded-md">
    <div class="card-body">
        <div class="flex-grow-1 container-p-y container-fluid">
            <div class="row">
            </div>
        </div>
    </div>
</div>
