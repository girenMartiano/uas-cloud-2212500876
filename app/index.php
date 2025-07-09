<?php
require 'dbconn.php';

// Fungsi hapus jika ada parameter 'delete'
if (isset($_GET['delete'])) {
    $nimToDelete = $conn->real_escape_string($_GET['delete']);
    $conn->query("DELETE FROM mahasiswa WHERE nim = '$nimToDelete'");
    header("Location: index.php"); // Hindari resubmit form
    exit;
}

// Fungsi tambah mahasiswa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim   = $conn->real_escape_string($_POST['nim']);
    $nama  = $conn->real_escape_string($_POST['nama']);
    $email = $conn->real_escape_string($_POST['email']);
    $conn->query("INSERT INTO mahasiswa (nim, nama, email) VALUES ('$nim', '$nama', '$email')");
}

// Ambil data mahasiswa
$result = $conn->query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold text-center text-blue-700 mb-8">Daftar Mahasiswa</h1>

        <!-- Form Tambah Mahasiswa -->
        <form method="POST" class="bg-white shadow-md rounded-lg p-6 mb-10">
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">NIM</label>
                <input type="text" name="nim" required class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nama</label>
                <input type="text" name="nama" required class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" required class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <button type="submit" class="bg-blue-600 text-white font-semibold px-4 py-2 rounded hover:bg-blue-700 transition">Tambah Mahasiswa</button>
        </form>

        <!-- Tabel Mahasiswa -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full text-sm text-gray-700">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">NIM</th>
                        <th class="px-6 py-3 text-left">Nama</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4"><?php echo htmlspecialchars($row['nim']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($row['nama']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($row['email']); ?></td>
                            <td class="px-6 py-4">
                                <a href="?delete=<?php echo urlencode($row['nim']); ?>"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')"
                                   class="text-red-600 hover:text-red-800 font-semibold">
                                   Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
