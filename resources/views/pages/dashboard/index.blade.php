@extends('layouts.default')

@section('active', 'dashboard')
@section('content')
  <header class="container text-secondary mt-5">
    <h3> Hallo {{ Auth::user()->name }}, Selamat Datang</h3>
  </header>
  <main class="container mt-5">
    <header>
      <h3>Chart Products</h3>
    </header>
    <div class="row mt-5 ">

      <div class="col-6">
        <div class="p-5 shadow">
          <header class="pb-5">
            <h4>Product By Type</h4>
          </header>
          <canvas id="chartByType" width="100%"></canvas>
        </div>
      </div>
      <div class="col-6">
        <div class="p-5 shadow">
          <header class="pb-5">
            <h4>Product By Stock</h4>
          </header>
          <canvas id="chartByStock" width="100%" height="100px"></canvas>
        </div>
      </div>
    </div>

  </main>
@endsection

@push('afterScripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
  <script>
    window.addEventListener('load', async () => {
      const requestCharts = await fetch(`{{ url('') }}/api/charts-data`, {
        headers: {
          accept: 'application/json',
          'Content-Type': 'application/json',
        },
        method: "GET"
      });
      const responseCharts = await requestCharts.json();

      console.log(responseCharts);
      //   PIE CONFIG
      const dataPie = {
        labels: [],
        datasets: [{
          label: 'Produk Berdasarkan Jenis',
          data: [],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
          ],
          hoverOffset: 4
        }]
      };

      dataPie.labels = responseCharts.pie.labels;
      dataPie.datasets[0].data = responseCharts.pie.total;


      const configPie = {
        type: 'pie',
        data: dataPie,
      };

      //   BAR CONFIG

      const dataBar = {
        labels: responseCharts.bar.labels,
        datasets: [{
          label: 'Stock',
          data: responseCharts.bar.total,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
          ],
          borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
          ],
          borderWidth: 1
        }]
      };

      const configBar = {
        type: 'bar',
        data: dataBar,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        },
      };

      console.log(configBar);
      const PieChart = new Chart(document.querySelector('#chartByType'), configPie)
      const BarChart = new Chart(document.querySelector('#chartByStock'), configBar)
    });
  </script>
@endpush
