<div class="container mt-10">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card my-5">
          <form class="card-body cardbody-color p-lg-5">
               <!-- === component breadcumb == -->
          <nav aria-label="breadcrumb container">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Beranda</a></li>
                  <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('aksesLogin') ?>">Masuk</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Admin</li>
              </ol>
          </nav>
            <div class="text-center">
              <img src="https://i.pinimg.com/736x/13/44/88/1344881a0b7b7b4a766621adbaafa811.jpg" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" name="username" id="Username" aria-describedby="emailHelp"
                placeholder="User Name">
            </div>
            <div class="mb-3">
              <input type="password" name="password" class="form-control" id="password" placeholder="password">
            </div>
            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Masuk</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Lupa
              Kata Sandi? <a href="#" class="text-dark fw-bold"> Hubungi Admin</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>