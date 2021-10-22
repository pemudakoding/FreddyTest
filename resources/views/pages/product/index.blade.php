@extends('layouts.default')

@section('content')
  <main class="container">
    <div class="shadow p-5 rounded mt-5">
      <a href="javascript:void(0)" class="btn btn-sm btn-success add-btn mb-5" data-bs-toggle="modal"
        data-bs-target="#addModal">Tambah
        Produk</a>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Jenis Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Stock</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $product->name }}</td>
              <td>{{ $product->type }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->stock }}</td>
              <td>
                <a href="javascript:void(0)" data-product_id="{{ $product->id }}"
                  class="btn btn-sm btn-info text-white edit-btn" data-bs-toggle="modal"
                  data-bs-target="#updateModal">Edit</a>
                <a href="javascript:void(0)" data-product_id="{{ $product->id }}"
                  class="btn btn-sm btn-danger delete-btn">Hapus</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>

  <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('products.store') }}" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Nama Produk</label>
              <input type="text" class="form-control product-form" id="name" placeholder="Kaos Kekinian" name="name">
            </div>
            <div class="mb-3">
              <label for="type" class="form-label">Jenis Produk</label>
              <input type="text" class="form-control product-form" id="type" placeholder="Kaos" name="type">
            </div>
            <div class="mb-3">
              <label for="stock" class="form-label">Stock</label>
              <input type="text" class="form-control product-form" id="stock" placeholder="Kaos Kekinian" name="stock">
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Harga</label>
              <input type="text" class="form-control product-form" id="price" placeholder="500000" name="price">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary save-product">Tambah</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ubah Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Nama Produk</label>
              <input type="text" class="form-control product-form" id="name" placeholder="Kaos Kekinian" name="name">
            </div>
            <div class="mb-3">
              <label for="type" class="form-label">Jenis Produk</label>
              <input type="text" class="form-control product-form" id="type" placeholder="Kaos" name="type">
            </div>
            <div class="mb-3">
              <label for="stock" class="form-label">Stock</label>
              <input type="text" class="form-control product-form" id="stock" placeholder="Kaos Kekinian" name="stock">
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Harga</label>
              <input type="text" class="form-control product-form" id="price" placeholder="500000" name="price">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary save-product">Ubah</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('afterScripts')
  <script src="{{ asset('js/product.js') }}"></script>
@endpush
