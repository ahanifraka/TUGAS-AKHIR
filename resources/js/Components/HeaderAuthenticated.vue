<script setup>
import { usePage } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

// import Dropdown from '@/Components/Dropdown.vue';
// import DropdownLink from '@/Components/DropdownLink.vue';
// import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

// State for mobile navigation toggle
const showingNavigationDropdown = ref(false);

// Roles from shared props using usePage
const page = usePage();
const roles = computed(() => {
    const user = page.props?.auth?.user;
    return Array.isArray(user?.roles) ? user.roles : [];
});

function hasRole(role) {
    return roles.value.includes(role);
}
</script>

<template>
    <nav class="block lg:hidden border-b border-gray-100 bg-white">
        <!-- Primary Navigation Menu -->
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 justify-between w-full">
                <div class="flex flex-row justify-between lg:justify-start items-center w-full">
                    <!-- Logo moved to Sidebar -->
                    <!-- Navigation moved to Sidebar -->
                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center lg:hidden">
                        <button @click="showingNavigationDropdown = !showingNavigationDropdown"
                            :aria-expanded="showingNavigationDropdown ? 'true' : 'false'" aria-controls="mobile-menu"
                            class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path
                                    :class="{ hidden: showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path
                                    :class="{ hidden: !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Account actions moved to Sidebar -->
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div id="mobile-menu" :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
            class="lg:hidden bg-white border-t border-gray-200 shadow-md">
            <div class="space-y-1 pb-3 pt-2">
                <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                    <span class="inline-flex items-center gap-2"><i class="pi pi-home"></i> Dashboard</span>
                </ResponsiveNavLink>
                <ResponsiveNavLink v-if="hasRole('editor') || hasRole('admin')" :href="route('content-sliders.index')"
                    :active="route().current('content-sliders.*')">
                    <span class="inline-flex items-center gap-2"><i class="pi pi-images"></i> Sliders</span>
                </ResponsiveNavLink>
                <ResponsiveNavLink :href="route('beritas.index')" :active="route().current('beritas.*')">
                    <span class="inline-flex items-center gap-2"><i class="pi pi-book"></i> Berita</span>
                </ResponsiveNavLink>
                <ResponsiveNavLink v-if="hasRole('editor') || hasRole('admin')" :href="route('bumds.index')"
                    :active="route().current('bumds.*')">
                    <span class="inline-flex items-center gap-2"><i class="pi pi-building-columns"></i> BUMD</span>
                </ResponsiveNavLink>
                <ResponsiveNavLink :href="route('albums.index')" :active="route().current('albums.*')">
                    <span class="inline-flex items-center gap-2"><i class="pi pi-images"></i> Albums</span>
                </ResponsiveNavLink>
                <ResponsiveNavLink v-if="hasRole('editor') || hasRole('admin')" :href="route('regulasis.index')"
                    :active="route().current('regulasis.*')">
                    <span class="inline-flex items-center gap-2"><i class="pi pi-file"></i> Regulasi</span>
                </ResponsiveNavLink>
                <ResponsiveNavLink v-if="hasRole('editor') || hasRole('admin')" :href="route('content-pages.index')"
                    :active="route().current('content-pages.*')">
                    <span class="inline-flex items-center gap-2"><i class="pi pi-file-edit"></i> Pages</span>
                </ResponsiveNavLink>
                <ResponsiveNavLink v-if="hasRole('editor') || hasRole('admin')" :href="route('pejabats.index')"
                    :active="route().current('pejabats.*')">
                    <span class="inline-flex items-center gap-2"><i class="pi pi-id-card"></i> Pejabat</span>
                </ResponsiveNavLink>
                <ResponsiveNavLink :href="route('media.index')" :active="route().current('media.*')">
                    <span class="inline-flex items-center gap-2"><i class="pi pi-folder"></i> Media Library</span>
                </ResponsiveNavLink>
                <ResponsiveNavLink v-if="hasRole('admin')" :href="route('users.index')"
                    :active="route().current('users.*')">
                    <span class="inline-flex items-center gap-2"><i class="pi pi-users"></i> Users</span>
                </ResponsiveNavLink>
                <ResponsiveNavLink v-if="hasRole('admin')" :href="route('logs.index')"
                    :active="route().current('logs.*')">
                    <span class="inline-flex items-center gap-2"><i class="pi pi-history"></i> Logs</span>
                </ResponsiveNavLink>
                <ResponsiveNavLink v-if="hasRole('editor') || hasRole('admin')" :href="route('admin.ppid.dashboard')"
                    :active="route().current('admin.ppid.*')">
                    <span class="inline-flex items-center gap-2"><i class="pi pi-info-circle"></i> PPID</span>
                </ResponsiveNavLink>
            </div>

            <!-- Responsive Settings Options -->
            <div class="border-t border-gray-200 pb-1 pt-4">
                <div class="px-4">
                    <div class="text-base font-medium text-gray-800">
                        <div class="text-base font-medium text-gray-800">
                            {{ $page.props.auth.user.name }}
                        </div>
                        <div class="text-sm font-medium text-gray-500">
                            {{ $page.props.auth.user.email }}
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <ResponsiveNavLink :href="route('profile.edit')">
                            Profile
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                            Log Out
                        </ResponsiveNavLink>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>