    <div class="login-wrapper">

        <!-- LEFT SIDE -->
        <div class="left-side">
            <h1>UD. Putri Hijau</h1>
            <p>
UD. Putri Hijau adalah usaha penangkaran bibit kelapa sawit yang berlokasi di Anaiwoi. Usaha ini menyediakan bibit sawit unggul yang sehat dan siap tanam, melalui proses penyemaian dan perawatan yang terkontrol. Dengan pelayanan yang baik dan kualitas bibit terjamin, UD. Putri Hijau menjadi mitra terpercaya bagi petani di wilayah sekitar.
            </p>
        </div>

        <!-- RIGHT SIDE -->
        <div class="right-side">
            <h3 class="mb-1">UD. Putri Hijau</h3>
            <small class="d-block mb-4">Sistem Penjualan Bibit Kelapa Sawit</small>

            <form wire:submit="submit" method="POST">
                <div class="mb-4">
                    <label class="form-label text-muted fw-medium">Email</label>
                    <input type="text" class="form-control" wire:model="email" required autofocus>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted fw-medium">Password</label>
                    <input type="password" class="form-control" wire:model="password" required>
                </div>

                <button class="btn btn-login w-100" type="submit">Masuk</button>
            </form>

            <div class="text-center mt-4">
                <small class="text-muted">© 2025 UD. Putri Hijau</small>
            </div>
            <div class="text-center mt-2">
            <small class="text-muted">Sudah punya akun?
                <a href="{{ route('register')}}" class="text-primary fw-bold">Daftar di sini</a>
            </small>
            </div>
        </div>

    </div>
