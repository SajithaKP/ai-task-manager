<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management | Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #60ade0 0%, #205977 100%);
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .input-field {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(0, 0, 0, 0.05);
            color: #1e293b;
            transition: all .3s ease;
        }

        .input-field:focus {
            background: #fff;
            border-color: #0ea5e9;
            outline: none;
            box-shadow: 0 0 10px rgba(14, 165, 233, .1);
        }

        .input-field::placeholder {
            color: #94a3b8;
        }
    </style>

</head>


<body>

    <div class="glass-card w-[320px] p-6 rounded-3xl">

        <div class="text-center mb-6">
            <h1 class="text-slate-800 text-xl font-bold">Login</h1>
        </div>


        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label class="text-[10px] font-bold text-slate-500 uppercase">Email</label>
                <input type="email" name="email" class="input-field w-full px-3 py-2 rounded-xl text-sm"
                    placeholder="name@mail.com" required>
            </div>


            <div>
                <label class="text-[10px] font-bold text-slate-500 uppercase">Password</label>
                <input type="password" name="password" class="input-field w-full px-3 py-2 rounded-xl text-sm"
                    placeholder="••••••••" required>
            </div>


            <button type="submit"
                class="w-full py-2 rounded-xl bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold transition">

                Sign In

            </button>

        </form>


        <!-- Register Link -->
        <div class="text-center mt-5 text-xs text-slate-600">

            Don't have an account?

            <a href="{{ route('register') }}" class="text-sky-700 font-semibold hover:underline">
                Register
            </a>

        </div>

    </div>

</body>

</html>
