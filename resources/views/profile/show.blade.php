<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BruteCharge - Profile Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        .font-inter {
            font-family: 'Inter', sans-serif;
        }

        .card-professional {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 16px;
        }

        .card-professional:hover {
            border-color: #3b82f6;
        }

        .btn-primary {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: #2563eb;
        }

        .btn-secondary {
            background: transparent;
            color: #3b82f6;
            border: 2px solid #3b82f6;
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background: #3b82f6;
            color: white;
        }

        .btn-danger {
            background: #ef4444;
            color: white;
            border: none;
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .input-field {
            background: #0f172a;
            border: 2px solid #334155;
            border-radius: 8px;
            padding: 12px 16px;
            color: white;
            width: 100%;
        }

        .input-field:focus {
            outline: none;
            border-color: #3b82f6;
        }

        .section-header {
            background: rgba(30, 41, 59, 0.8);
            border-bottom: 1px solid #334155;
        }
    </style>
</head>

<body class="font-inter bg-slate-900 text-white min-h-screen">

    <!-- Navigation Header -->
    <nav class="fixed top-0 w-full z-50 bg-slate-800 border-b border-slate-700">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}">
                    <div class="flex items-center space-x-3">
                        <h3 class="font-orbitron font-bold text-xl text-neon-blue mb-4">
                            BruteCharge⚡
                        </h3>
                    </div>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-20">
        <!-- Hero Section -->
        <section class="py-16 bg-slate-900">
            <div class="max-w-7xl mx-auto px-6 text-center">
                
                <h1 class="text-6xl font-black text-white mb-6 uppercase tracking-wide">
                   <span class="text-blue-400">Welcome To BruteProfile {{ Auth::user()->name }}</span>
                </h1>
            </div>
        </section>

        <!-- Dashboard Content -->
        <section class="py-16 bg-slate-800">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                    <!-- Beast Profile -->
                    <div class="card-professional overflow-hidden">
                        <div class="section-header px-8 py-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                                    <span class="font-bold text-lg text-white">BW</span>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white">BEAST PROFILE</h3>
                                    <p class="text-gray-400 text-sm">Manage your transformation data</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <form method="POST" action="{{ route('user-profile-information.update') }}">
                                @csrf
                                @method('PUT')
                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-blue-400 mb-3">Beast Name</label>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                            class="input-field" placeholder="Beast Warrior" required>
                                        @error('name')
                                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-blue-400 mb-3">Email</label>
                                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                            class="input-field" placeholder="beast@brutecharge.com" required>
                                        @error('email')
                                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-blue-400 mb-3">Beast
                                            Goals</label>
                                        <select name="training_goal" class="input-field">
                                            <option value="muscle_building" {{ ($user->training_goal ?? '') == 'muscle_building' ? 'selected' : '' }}>Muscle Domination</option>
                                            <option value="fat_loss" {{ ($user->training_goal ?? '') == 'fat_loss' ? 'selected' : '' }}>Fat Loss</option>
                                            <option value="strength_training" {{ ($user->training_goal ?? '') == 'strength_training' ? 'selected' : '' }}>Strength Training</option>
                                            <option value="endurance" {{ ($user->training_goal ?? '') == 'endurance' ? 'selected' : '' }}>Endurance</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn-primary w-full">
                                        UPDATE BEAST PROFILE
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Beast Security -->
                    <div class="card-professional overflow-hidden">
                        <div class="section-header px-8 py-6">
                            <h3 class="text-xl font-bold text-white">BEAST SECURITY</h3>
                            <p class="text-gray-400 text-sm">Protect your transformation journey</p>
                        </div>
                        <div class="p-8">
                            <form>
                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-blue-400 mb-3">Current
                                            Password</label>
                                        <input type="password" placeholder="Enter current password" class="input-field">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-blue-400 mb-3">New
                                            Password</label>
                                        <input type="password" placeholder="Enter new password" class="input-field">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-blue-400 mb-3">Confirm
                                            Password</label>
                                        <input type="password" placeholder="Confirm new password" class="input-field">
                                    </div>

                                    <button type="submit" class="btn-primary w-full">
                                        SECURE BEAST ACCOUNT
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- 2FA Security -->
                    <div class="card-professional overflow-hidden">
                        <div class="section-header px-8 py-6">
                            <h3 class="text-xl font-bold text-white">2FA SECURITY</h3>
                            <p class="text-gray-400 text-sm">Enhanced beast account protection</p>
                        </div>
                        <div class="p-8">
                            <div class="bg-slate-700 rounded-lg p-6 mb-6 border border-slate-600">
                                <div class="text-blue-400 font-semibold text-lg mb-2">Two-Factor Authentication Disabled
                                </div>
                                <p class="text-gray-400 text-sm mb-4">Enable 2FA for enhanced security using your
                                    authenticator app</p>
                            </div>
                            <button class="btn-primary">ENABLE 2FA</button>
                        </div>
                    </div>

                    <!-- Beast Preferences -->
                    <div class="card-professional overflow-hidden">
                        <div class="section-header px-8 py-6">
                            <h3 class="text-xl font-bold text-white">BEAST PREFERENCES</h3>
                            <p class="text-gray-400 text-sm">Customize your beast experience</p>
                        </div>
                        <div class="p-8">
                            <div class="space-y-8">
                                <div>
                                    <label class="block text-sm font-semibold text-blue-400 mb-4">Workout
                                        Intensity</label>
                                    <div class="flex space-x-4">
                                        <button class="btn-secondary text-sm px-4 py-2">BEAST</button>
                                        <button class="btn-primary text-sm px-4 py-2">SAVAGE</button>
                                        <button class="btn-secondary text-sm px-4 py-2">LEGEND</button>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-blue-400 mb-4">Supplement
                                        Focus</label>
                                    <div class="space-y-3">
                                        <label class="flex items-center space-x-3 cursor-pointer">
                                            <input type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-slate-700 border-slate-500 rounded focus:ring-blue-500">
                                            <span class="text-white">Protein Power</span>
                                        </label>
                                        <label class="flex items-center space-x-3 cursor-pointer">
                                            <input type="checkbox" checked
                                                class="w-4 h-4 text-blue-600 bg-blue-600 border-blue-600 rounded focus:ring-blue-500">
                                            <span class="text-white">Creatine Crusher</span>
                                        </label>
                                    </div>
                                </div>

                                <button class="btn-primary w-full">SAVE BEAST SETTINGS</button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Danger Zone -->
                <div class="mt-12">
                    <div class="card-professional overflow-hidden border-red-600">
                        <div class="section-header px-8 py-6 bg-red-900/20">
                            <h3 class="text-2xl font-bold text-red-400">DANGER ZONE</h3>
                            <p class="text-gray-400 text-sm">Irreversible beast account actions</p>
                        </div>
                        <div class="p-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="bg-slate-700 rounded-lg p-6 border border-slate-600">
                                    <h4 class="text-lg font-semibold text-red-400 mb-3">Logout Other Sessions</h4>
                                    <p class="text-gray-400 text-sm mb-4">Secure your beast account by logging out all
                                        other devices</p>
                                    <button
                                        class="btn-secondary text-red-400 border-red-400 hover:bg-red-400 hover:text-white">
                                        LOGOUT OTHER SESSIONS
                                    </button>
                                </div>

                                <div class="bg-slate-700 rounded-lg p-6 border border-slate-600">
                                    <h4 class="text-lg font-semibold text-red-400 mb-3">Delete Beast Account</h4>
                                    <p class="text-gray-400 text-sm mb-4">Permanently delete your beast account and all
                                        data</p>
                                    <button class="btn-danger">DELETE ACCOUNT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Success/Error Messages -->
    @if (session('status'))
        <div class="fixed top-24 right-6 bg-blue-600 text-white px-6 py-4 rounded-lg shadow-lg z-50">
            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="font-semibold">{{ session('status') }}</span>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="fixed top-24 right-6 bg-red-600 text-white px-6 py-4 rounded-lg shadow-lg z-50">
            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-semibold">Please check your inputs</span>
            </div>
        </div>
    @endif

    <script>
        // Auto-hide messages
        setTimeout(() => {
            const messages = document.querySelectorAll('.fixed.top-24');
            messages.forEach(msg => {
                msg.style.opacity = '0';
                setTimeout(() => msg.remove(), 300);
            });
        }, 5000);

        // Form validation
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function (e) {
                const requiredInputs = form.querySelectorAll('input[required]');
                let hasErrors = false;

                requiredInputs.forEach(input => {
                    if (!input.value.trim()) {
                        hasErrors = true;
                        input.style.borderColor = '#ef4444';
                    } else {
                        input.style.borderColor = '#3b82f6';
                    }
                });

                if (hasErrors) {
                    e.preventDefault();
                }
            });
        });

        // Button selection for preferences
        document.querySelectorAll('.btn-secondary').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const parent = this.parentElement;
                if (parent.classList.contains('flex')) {
                    parent.querySelectorAll('button').forEach(btn => {
                        btn.className = 'btn-secondary text-sm px-4 py-2';
                    });
                    this.className = 'btn-primary text-sm px-4 py-2';
                }
            });
        });
    </script>

</body>

</html>