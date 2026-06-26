<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

// Props
const props = defineProps({
    status: { type: Number, default: 403 },
    message: { type: String, default: 'Akses ditolak' }
});

// Methods
const goBack = () => {
    if (typeof window !== 'undefined' && window.history.length > 1) {
        window.history.back();
    } else {
        router.visit('/');
    }
};
</script>

<template>
    <GuestLayout>
        <Head title="403 - Akses Ditolak" />
        
        <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl w-full space-y-8 text-center">
                <!-- 403 Number -->
                <div class="mb-8">
                    <h1 class="text-9xl font-bold text-primary">
                        {{ status }}
                    </h1>
                </div>
                
                <!-- Error Message -->
                <div class="space-y-4">
                    <h2 class="text-3xl font-bold text-gray-900">
                        Akses Ditolak
                    </h2>
                    <p class="text-lg text-gray-600 max-w-sm mx-auto">
                        {{ message || 'Anda tidak memiliki izin untuk mengakses halaman ini.' }}
                    </p>
                </div>
                
                <!-- Illustration -->
                <div class="py-12">
                    <i class="pi pi-lock text-primary" style="font-size: 12rem"></i>
                </div>
                
                <!-- Action Buttons -->
                <div class="space-y-4">
                    <Link 
                        :href="route('index')" 
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105"
                    >
                        <i class="pi pi-home mr-3"></i>
                        Kembali ke Beranda
                    </Link>
                    
                    <div class="text-sm text-gray-500">
                        atau
                    </div>
                    
                    <button 
                        @click="goBack" 
                        class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200"
                    >
                        <i class="pi pi-arrow-left mr-3 mt-1" style="font-size: 0.6rem"></i>
                        Kembali ke Halaman Sebelumnya
                    </button>
                </div>
                
                <!-- Additional Help -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <p class="text-sm text-gray-500">
                        Butuh bantuan? 
                        <Link 
                            href="#" 
                            class="font-medium text-primary hover:primary-hover transition-colors duration-200"
                        >
                            Hubungi kami
                        </Link>
                    </p>
                </div>
            </div>
        </div>
    </GuestLayout>
    
</template>

<style scoped>
/* Additional custom styles if needed */
.bg-clip-text {
    -webkit-background-clip: text;
    background-clip: text;
}
</style>