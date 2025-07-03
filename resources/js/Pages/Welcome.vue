<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <div class="min-h-screen bg-gray-900 text-white flex flex-col">
        <!-- Header con navegación -->
        <header class="flex justify-end p-6">
            <nav v-if="canLogin" class="flex gap-4">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="text-white hover:text-gray-300 transition-colors"
                >
                    Dashboard
                </Link>

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="text-white hover:text-gray-300 transition-colors"
                    >
                        Log in
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="text-white hover:text-gray-300 transition-colors"
                    >
                        Register
                    </Link>
                </template>
            </nav>
        </header>

        <!-- Contenido principal centrado -->
        <main class="flex-1 flex items-center justify-center">
            <div class="bg-red-600 text-white px-4 py-2 rounded">
                {{ $page.props }}
                
            </div>
        </main>
    </div>
</template>