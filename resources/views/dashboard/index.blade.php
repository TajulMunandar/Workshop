@extends('dashboard.layouts.main')

@section('content')
  <div class="containter">
    <div class="row g-3">
      <div class="col-sm-6 col-md-4 col-lg">
        <div class="card">
          <div class="card-body d-flex align-items-center">
            <i class="fa-duotone fa-user-circle fa-3x text-primary"></i>
            <div class="d-flex flex-column ms-3">
              <h5 class="card-title fs-6 mb-0">User</h5>
              <p class="card-text fs-4 fw-semibold">{{ $user }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg">
        <div class="card">
          <div class="card-body d-flex align-items-center">
            <i class="fa-duotone fa-books fa-3x text-warning"></i>
            <div class="d-flex flex-column ms-3">
              <h5 class="card-title fs-6 mb-0">Matakuliah</h5>
              <p class="card-text fs-4 fw-semibold">{{ $matakuliah }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg">
        <div class="card">
          <div class="card-body d-flex align-items-center">
            <i class="fa-duotone fa-building fa-3x text-danger"></i>
            <div class="d-flex flex-column ms-3">
              <h5 class="card-title fs-6 mb-0">Prodi</h5>
              <p class="card-text fs-4 fw-semibold">{{ $prodi }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg">
        <div class="card">
          <div class="card-body d-flex align-items-center">
            <i class="fa-duotone fa-newspaper fa-3x text-dark"></i>
            <div class="d-flex flex-column ms-3">
              <h5 class="card-title fs-6 mb-0">Dosen</h5>
              <p class="card-text fs-4 fw-semibold">{{ $dosen }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg">
        <div class="card">
          <div class="card-body d-flex align-items-center">
            <i class="fa-duotone fa-memo-circle-check fa-3x text-info"></i>
            <div class="d-flex flex-column ms-3">
              <h5 class="card-title fs-6 mb-0">Materi</h5>
              <p class="card-text fs-4 fw-semibold">{{ $materi }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
  </div>

  <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['User', 'Mata Kuliah', 'Prodi', 'Dosen', 'Materi'],
        datasets: [{
          label: 'Data',
          data: [{{ $user }}, {{ $matakuliah }}, {{ $prodi }}, {{ $dosen }}, {{ $materi }}],
          fill:true,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection
