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
                <div class="col-12">
                    <h4>Vourcher Categories Count</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 mb-4 col-lg-7 col-12">
                    <div class="card h-100 bg-orange-300">
                        <div class="card-header">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title mb-0">Ghs3 Count: {{ ($v3un + $v3u) }}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                USED:<h4> {{ $v3u}}</h4><br>
                                UNUSED: <h4>{{ $v3un}}</h4><br>
                             </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                    TOTAL: <h4>{{ ($v3un + $v3u)*3 }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-4 col-lg-7 col-12">
                    <div class="card h-100 bg-orange-300">
                        <div class="card-header">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title mb-0">Ghs5 Count: {{ ($v5un + $v5u) }}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                USED:<h4> {{ $v5u}}</h4><br>
                                UNUSED: <h4>{{ $v5un}}</h4><br>
                             </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                    TOTAL: <h4>{{ ($v5un + $v5u)*5 }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-4 col-lg-7 col-12">
                    <div class="card h-100 bg-default">
                        <div class="card-header">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title mb-0">Ghs6 Count: {{ ($v6u +$v6un ) }}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                USED:<h4> {{ $v6u}}</h4><br>
                                UNUSED: <h4>{{ $v6un}}</h4><br>
                             </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                    TOTAL: <h4>{{ ($v6un + $v6u)*6 }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-4 col-lg-7 col-12">
                    <div class="card h-100 bg-default">
                        <div class="card-header">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title mb-0">Ghs10 Count: {{ ($v10u +$v10un ) }}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                USED:<h4> {{ $v10u}}</h4><br>
                                UNUSED: <h4>{{ $v10un}}</h4><br>
                             </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                    TOTAL: <h4>{{ ($v10un + $v10u)*10 }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-4 col-lg-7 col-12">
                    <div class="card h-100 bg-default">
                        <div class="card-header">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title mb-0">Ghs12 Count: {{ ($v12u +$v12un ) }}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                USED:<h4> {{ $v12u}}</h4><br>
                                UNUSED: <h4>{{ $v12un}}</h4><br>
                             </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                    TOTAL: <h4>{{ ($v12un + $v12u)*12 }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-4 col-lg-7 col-12">
                    <div class="card h-100 bg-default">
                        <div class="card-header">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title mb-0">Ghs65 Count: {{ ($v65u +$v65un ) }}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                USED:<h4> {{ $v65u}}</h4><br>
                                UNUSED: <h4>{{ $v65un}}</h4><br>
                             </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                    TOTAL: <h4>{{ ($v65un + $v65u)*65 }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-4 col-lg-7 col-12">
                    <div class="card h-100 bg-default">
                        <div class="card-header">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title mb-0">Ghs150 Count: {{ ($v150u +$v150un ) }}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                USED:<h4> {{ $v150u}}</h4><br>
                                UNUSED: <h4>{{ $v150un}}</h4><br>
                             </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                    TOTAL: <h4>{{ ($v150un + $v150u)*150 }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
