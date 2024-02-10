<script setup>
import axios from 'axios';
import { computed, onMounted, ref } from 'vue';
import AppNavbar from './components/AppNavbar.vue';
import SidebarLeft from './components/SidebarLeft.vue';
import SidebarRight from './components/SidebarRight.vue';
import AppFooter from './components/AppFooter.vue';
import { useAuthUserStore } from './stores/AuthUserStore';
import { useSettingStore } from './stores/SettingStore';

const authUserStore = useAuthUserStore();
const settingStore = useSettingStore();

const currenThemeMode = computed(() => {
    return settingStore.theme === 'dark' ? 'dark-mode' : ''
})
</script>
<template>
    <div v-if="authUserStore.user.name !== ''" class="wrapper" :class="currenThemeMode"
        id="app">
        <AppNavbar />
        <SidebarLeft />
        <div class="content-wrapper">
            <router-view></router-view>
        </div>
        <SidebarRight />
        <AppFooter />
    </div>
    <div v-else class="login-page" :class="currenThemeMode">
        <router-view></router-view>
    </div>
</template>