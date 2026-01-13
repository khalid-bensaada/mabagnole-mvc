<?php
session_start();
require_once '../classes/client.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $client = new Client(0, "", "", "", "", 0);


    $user = $client->foundEmail($email);

    if ($user && password_verify($password, $user['password_C'])) {


        $_SESSION['client_id'] = (int) $user['id'];
        $_SESSION['client_name'] = $user['name'];
        $_SESSION['role'] = $user['role'];



        if ($user['role'] === 'admin') {
            header('Location: ../admin/dashboard.php');
        } else {
            header('Location: ../client/index.php');
        }
        exit;
    } else {
        $error = "Email or password incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MaBagnole</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 h-screen flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl overflow-hidden">
        <div class="p-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800">Welcome Back</h2>
                <p class="text-gray-500 mt-2">Enter your credentials to access your account</p>
            </div>


            <?php if ($error): ?>
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-center">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <!-- FORM -->
            <form method="POST" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                        placeholder="name@company.com">
                </div>

                <div>
                    <div class="flex justify-between mb-2">
                        <label class="text-sm font-medium text-gray-700">Password</label>
                        <a href="#" class="text-sm text-blue-600 hover:underline">Forgot?</a>
                    </div>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                        placeholder="••••••••">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold text-lg hover:bg-blue-700 transition transform hover:scale-[1.02]">
                    Sign In
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-gray-600">Don't have an account? <a href="signup.html"
                        class="text-blue-600 font-bold hover:underline">Create Account</a></p>
            </div>
        </div>
        <div class="bg-gray-50 p-4 text-center text-xs text-gray-400 uppercase tracking-widest">
            MaBagnole Rental Systems
        </div>
    </div>
</body>

</html>