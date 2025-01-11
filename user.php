<div class="container">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
    <i class="bi bi-plus-lg"></i> Tambah User
</button>
    <div class="row">
        <div class="table-responsive" id="user_data">
            
        </div>
        <!-- Awal Modal Tambah-->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">User</label>
                        <input type="text" class="form-control" name="username" placeholder="Tuliskan Username Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="floatingTextarea2">Password</label>
                        <textarea class="form-control" placeholder="Tuliskan Password Anda" name="password" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Akhir Modal Tambah-->
    </div>
</div>

<script>
$(document).ready(function(){
    load_data();
    function load_data(hlm){
        $.ajax({
            url : "user_data.php",
            method : "POST",
            data : {
					            hlm: hlm
				           },
            success : function(data){
                    $('#user_data').html(data);
            }
        })
    } 
    $(document).on('click', '.halaman', function(){
    var hlm = $(this).attr("id");
    load_data(hlm);
});
});
</script>

<?php
include "upload_foto.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil data user berdasarkan session
$username = $_SESSION['username'];
$query = $conn->prepare("SELECT * FROM user WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();

// Proses update data
if (isset($_POST['update_profile'])) {
    $new_username = $_POST['username'];
    $password = $_POST['password'];
    $foto = $_FILES['foto']['name'];
    $foto_lama = $user['foto'];
    $update_password = false;

    // Update password jika diisi
    if (!empty($password)) {
        $password = md5($password); // Enkripsi MD5
        $update_password = true;
    }

    // Proses upload foto jika ada file baru
    if (!empty($foto)) {
        $gambar = "images/";
        $target_file = $gambar . basename($foto);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Validasi ekstensi file
        if (in_array($imageFileType, $valid_extensions)) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                // Hapus foto lama jika bukan default
                if ($foto_lama != 'default.jpg') {
                    unlink($gambar . $foto_lama);
                }
            } else {
                echo "<script>alert('Gagal mengupload foto.');</script>";
                die;
            }
        } else {
            echo "<script>alert('Ekstensi file tidak valid. Hanya JPG, JPEG, PNG, dan GIF diperbolehkan.');</script>";
            die;
        }
    } else {
        $foto = $foto_lama; // Gunakan foto lama jika tidak ada upload baru
    }

    // Update data user
    if ($update_password) {
        $stmt = $conn->prepare("UPDATE user SET username = ?, password = ?, foto = ? WHERE id = ?");
        $stmt->bind_param("sssi", $new_username, $password, $foto, $user['id']);
    } else {
        $stmt = $conn->prepare("UPDATE user SET username = ?, foto = ? WHERE id = ?");
        $stmt->bind_param("ssi", $new_username, $foto, $user['id']);
    }

    $update = $stmt->execute();

    if ($update) {
        $_SESSION['username'] = $new_username; // Update session username
        echo "<script>
            alert('Profil berhasil diperbarui.');
            document.location='admin.php?page=profile';
        </script>";
    } else {
        echo "<script>alert('Gagal memperbarui profil.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
