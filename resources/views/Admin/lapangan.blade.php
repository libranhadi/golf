@extends('layouts.admin', ['title' => 'Dashboard'])
@section('content')
    <div class="section-content section-dashboard-home">
              <div class="container-fluid">
                <h2 class="dashboard-title">Admin Dashboard</h2>
                <p class="dashboard-subtitle">This Is Admin</p>
                <div class="dashboard-content">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="card mb-2">
                        <div class="card-body">
                          <div class="dashboard-card-title">customer</div>
                          <div class="dashboard-card-subtitle">customer</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card mb-2">
                        <div class="card-body">
                          <div class="dashboard-card-title">Revenue</div>
                          <div class="dashboard-card-subtitle">Revenue</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card mb-2">
                        <div class="card-body">
                          <div class="dashboard-card-title">Transaction</div>
                          <div class="dashboard-card-subtitle">transac</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row-mt-3">
                    <div class="col-12 mt-2">
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>    
  @endsection
