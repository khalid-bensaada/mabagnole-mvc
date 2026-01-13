<?php
session_start();


require_once '../classes/client.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Les mots de passe ne correspondent pas.";
        header("Location: sign.php");
        exit;
    }


    $client = new Client(0, "", "", "", "", 0);


    $existing = $client->foundEmail($email);
    if ($existing) {
        $_SESSION['error'] = "Cet email est déjà utilisé.";
        header("Location: sign.php");
        exit;
    }


    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


    $client->setName($name);
    $client->setEmail($email);
    $client->setPassword($hashedPassword);
    $client->setRole("client");


    if ($client->create()) {
        $_SESSION['success'] = "Compte créé avec succès! Vous pouvez maintenant vous connecter.";
        header("Location: login.php");
        exit;
    } else {
        $_SESSION['error'] = "Erreur lors de la création du compte. Réessayez.";
        header("Location: sign.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | MaBagnole</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white w-full max-w-lg rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
        <div class="p-8 md:p-12">
            <div class="text-center mb-10">
                <div class="inline-block bg-blue-100 text-blue-600 p-3 rounded-2xl mb-4">
                    <i class="fas fa-user-plus text-2xl"></i>
                </div>
                <h2 class="text-3xl font-extrabold text-gray-900">Créer un compte</h2>
                <p class="text-gray-500 mt-2">Rejoignez MaBagnole pour gérer vos locations</p>
            </div>
            <?php

            if (isset($_SESSION['error'])) {
                echo '<div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-center">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }

            if (isset($_SESSION['success'])) {
                echo '<div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center">' . $_SESSION['success'] . '</div>';
                unset($_SESSION['success']);
            }
            ?>

            <form id="signupForm" method="POST" class="space-y-5">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1 ml-1">Nom Complet</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" name="full_name" required
                            class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition"
                            placeholder="Jean Dupont">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1 ml-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" name="email" required
                            class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition"
                            placeholder="exemple@mail.com">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1 ml-1">Mot de passe</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password" required
                            class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition"
                            placeholder="••••••••">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1 ml-1">Confirmer le mot de passe</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-shield-alt"></i>
                        </span>
                        <input type="password" id="confirm_password" name="confirm_password" required
                            class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition"
                            placeholder="••••••••">
                    </div>
                    <p id="error-msg" class="text-red-500 text-xs mt-2 hidden">Les mots de passe ne correspondent pas.
                    </p>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3.5 rounded-xl font-bold text-lg hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-0.5">
                    S'inscrire
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-gray-600">Vous avez déjà un compte ?
                    <a href="login.html"
                        class="text-blue-600 font-bold hover:underline underline-offset-4">Connectez-vous</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('signupForm');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');
        const errorMsg = document.getElementById('error-msg');

        form.addEventListener('submit', function(e) {
            if (password.value !== confirmPassword.value) {
                e.preventDefault(); 
                errorMsg.classList.remove('hidden');
                confirmPassword.classList.add('border-red-500', 'ring-red-200');
            } else {
                errorMsg.classList.add('hidden');
                confirmPassword.classList.remove('border-red-500');
            }
        });

        
        confirmPassword.addEventListener('input', () => {
            errorMsg.classList.add('hidden');
            confirmPassword.classList.remove('border-red-500');
        });
    </script>
</body>

</html>