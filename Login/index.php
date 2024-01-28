<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-500 flex items-center justify-center h-screen">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <h2 class="text-2xl font-bold mb-4 text-green-500">Welcome to the Login Page</h2>
        <form action="login.php" method="post">
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                <input type="text" id="username" name="username" required
                    class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:border-green-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                <input type="password" id="password" name="password" required
                    class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:border-green-500">
            </div>

            <button type="submit" name="login"
                class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">Login</button>
        </form>
        <p class="mt-4 text-gray-700">Don't have an account? <a href="register.php" class="text-green-500 hover:underline">Register here</a></p>
    </div>
</body>
</html>
